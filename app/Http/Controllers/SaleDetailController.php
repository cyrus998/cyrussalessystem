<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if ($sale_id = session('sale_id')) {
            return view('sale_detail.index', compact('products', 'sale_id'));
        } else {
            return redirect()->route('transaction.new');
        }
    }

    public function data($id)
    {
        $details = SaleDetail::with('products')
            ->where('sale_id', $id)
            ->get();

        $data = array();
        $total = 0;
        $total_items = 0;

        foreach ($details as $item) {
            $row = array();
            $row['code'] = '<span class="badge bg-success">' . $item->products['code'] . '</span>';
            $row['name'] = $item->products['name'];
            $row['price'] = 'Php ' . indonesia_format($item->price);
            $row['quantity'] = '<input type="number" class="form-control form-control-sm quantity" data-id="' . $item->id . '" value="' . $item->quantity . '">';
            $row['subtotal'] = 'Php ' . indonesia_format($item->subtotal);
            $row['action'] = '<a onclick="deleteData(`' . route('transaction.destroy', $item->id) . '`)" class="btn btn-sm btn-danger btn-icon-split"><span
                                        class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                    <span class="text">Delete</span></a>';
            $data[] = $row;

            $total += $item->price * $item->quantity;
            $total_items += $item->quantity;
        }

        $data[] = [
            'code' => '
                <div class="total d-none">' . $total . '</div>
                <div class="total_items d-none">' . $total_items . '</div>',
            'name' => '',
            'price'  => '',
            'quantity'      => '',
            'subtotal'    => '',
            'action'        => '',
        ];

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['action', 'code', 'quantity'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $products = Product::where('id', $request->productId)->first();

        if (!$products) {
            return response()->json('Data failed to save', 400);
        }

        $detail = new SaleDetail();
        $detail->sale_id = $request->saleId;
        $detail->product_id = $products->id;
        $detail->price = $products->price;
        $detail->quantity = 1;
        $detail->subtotal = $products->price;
        $detail->save();

        return response()->json('Data saved successfully', 200);
    }

    public function update(Request $request, $id)
    {
        $detail = SaleDetail::find($id);
        $detail->quantity = $request->quantity;
        $detail->subtotal = $detail->price * $request->quantity;
        $detail->update();
    }

    public function destroy($id)
    {
        $detail = SaleDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }

    public function loadForm($total = 0, $received = 0)
    {
        $payed   = $total;
        $change = ($received != 0) ? $received - $payed : 0;
        $data    = [
            'total' => indonesia_format($total),
            'pay' => indonesia_format($payed),
            'change' => indonesia_format($change),
        ];

        return response()->json($data);
    }
}
