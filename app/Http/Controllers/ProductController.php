<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('product.index', compact('categories'));
    }

    public function data()
    {
        $products = Product::all();

        return datatables()
            ->of($products)
            ->addIndexColumn()
            ->addColumn('selectAll', function ($products) {
                return '<input type="checkbox" name="id[]" value="' . $products->id . '">';
            })
            ->addColumn('code', function ($products) {
                return '<span class="badge bg-success">' . $products->code . '</span>';
            })
            ->addColumn('category', function ($products) {
                return $products->category->name;
            })
            ->addColumn('price', function ($products) {
                return indonesia_format($products->price);
            })
            ->addColumn('action', function ($products) {
                return '
                <div class="d-flex justify-content-center">
                    <div class="dropdown no-arrow">
                        <a class="btn btn-sm dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="true">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a onclick="editForm(`' . route('product.update', $products->id) . '`)" class="dropdown-item" href="#">Update</a></li>
                            <li><a onclick="deleteData(`' . route('product.destroy', $products->id) . '`)" class="dropdown-item" href="#">Remove</a></li>
                        </ul>
                    </div>
                </div>
                ';
            })
            ->rawColumns(['selectAll', 'code', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $products = Product::latest('id')->first() ?? new Product();

        preg_match('/PRD-0*(\d+)/', $products->code, $matches);

        $request['code'] =  'PRD-' . add_zero_infront((int)$matches[1] + 1, 6);

        $products = Product::create([
            'category_id' => $request->productCategoryId,
            'code' => $request->code,
            'name' => $request->productName,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
        ]);

        return response()->json(
            'Data saved successfully!',
            200
        );
    }

    public function show($id)
    {
        $products = Product::findOrFail($id);

        return response()->json($products);
    }

    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->name = $request->productName;
        $products->category_id = $request->productCategoryId;
        $products->price = $request->productPrice;
        $products->description = $request->productDescription;
        $products->update();

        return response()->json(
            'Data updated successfully!',
            200
        );
    }

    public function destroy($id)
    {
        $categories = Product::findOrFail($id);
        $categories->delete();

        return response()->json(
            'Data deleted successfully!',
            200
        );
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $products = Product::findOrFail($id);
            $products->delete();
        }

        return response(null, 204);
    }
}
