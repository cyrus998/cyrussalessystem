<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return view('sale.index');
    }

    public function data()
    {

        if (auth()->user()->role == 'admin') {
            $sales = Sale::where('total_items', '!=', 0)->orderBy('created_at', 'desc')->get();
        } else {
            $sales = Sale::where('total_items', '!=', 0)->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        return datatables()
            ->of($sales)
            ->addIndexColumn()
            ->addColumn('date', function ($sales) {
                return indonesia_date($sales->created_at->format('Y-m-d'), false);
            })
            ->addColumn('total_items', function ($sales) {
                return $sales->total_items;
            })
            ->addColumn('total_price', function ($sales) {
                return indonesia_format($sales->total_price);
            })
            ->addColumn('cashier', function ($sales) {
                return $sales->user->name;
            })
            ->addColumn('action', function ($sales) {
                return '
                <div class="d-flex justify-content-center">
                    <div class="dropdown no-arrow">
                        <a class="btn btn-sm dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="true">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a onclick="showDetail(`' . route('sale.show', $sales->id) . '`)" class="dropdown-item rounded">View Detail</a>
                            </li>
                            
                            <li>
                                <a href="' .  route('sale.edit', $sales->id) . '" class="dropdown-item rounded">Updates</a>
                            </li>
                            <li>
                                <a onclick="deleteData(`' . route('sale.destroy', $sales->id) . '`)" class="dropdown-item bg-danger rounded">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $sales = new Sale();
        $sales->total_items = 0;
        $sales->total_price = 0;
        $sales->user_id = auth()->user()->id;
        $sales->save();

        session(['sale_id' => $sales->id]);

        return redirect()->route('transaction.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'received' => 'required|numeric',
        ]);

        $sale = Sale::find(session('sale_id'));
        $sale = $sale->update([
            'total_items' => $request->total_items,
            'total_price' => $request->total_price,
        ]);

        session(['last_sale' => [
            'id' => session('sale_id'),
            'received' => $request->received,
        ]]);

        session()->forget('sale_id');

        return redirect()->route('sale.index')->with('success', 'Transaction successfully saved!');
    }

    public function show($id)
    {
        $detail = SaleDetail::with('products')
            ->where('sale_id', $id)
            ->get();

        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('code', function ($detail) {
                return '<span class="badge bg-success">' . $detail->products['code'] . '</span>';
            })
            ->addColumn('name', function ($detail) {
                return $detail->products['name'];
            })
            ->addColumn('price', function ($detail) {
                return 'Php ' . indonesia_format($detail->price);
            })
            ->addColumn('subtotal', function ($detail) {
                return 'Php ' . indonesia_format($detail->subtotal);
            })
            ->rawColumns(['code'])
            ->make(true);
    }

    public function edit($id)
    {
        session(['sale_id' => $id]);
        return redirect()->route('transaction.index');
    }

    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();

        $saleDetail = SaleDetail::where('sale_id', $id);
        $saleDetail->delete();

        (session('sale_id') == $id) ? session()->forget('sale_id') : null;

        return response()->json(
            'Data deleted successfully!',
            200
        );
    }

    public function print()
    {
        (session('last_sale')) ?: abort(404);

        $sale = Sale::find(session('last_sale')['id']);
        $saleDetail = SaleDetail::with('products')
            ->where('sale_id', session('last_sale')['id'])
            ->get();

        return view('sale.print', compact('sale', 'saleDetail'));
    }
}
