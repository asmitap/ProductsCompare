<?php

namespace App\Http\Controllers;

use App\FeatureValue;
use App\ProductGroup;
use App\Feature;
use App\Product;
use App\Variant;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function product()
    {
        $data = [];
        $group = ProductGroup::all();
        foreach ($group as $row) {
            $temp['id'] = $row->id;
            $temp['group_name'] = $row->productgroup;
            $temp['features'] = Feature::where('productgroup_id', '=', $row->id)->get();
            $data[] = $temp;
        }
        $products = Product::all();
        return view('admin.product')->with('datas', $data)->with('products', $products);
    }
    public function storeproduct(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|min:4|unique:products',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'keys.*' => '',
            'values.*' => '',
            'product_id.*' => '',
            'group_id' => '',
            'variant' => '',
        ]);
        // return response()->json($request);
        $product = new Product();
        $file  = $request->image;
        $fileName = "image" . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs("upload", $fileName);
        $product->image = $path;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->save();
        if ($request->variants) {
            $variants = $request->variants;
            foreach ($variants as $index => $variant) {
                $data = new Variant;
                $data->product_variant_a = $product->id;
                $data->product_variant_b = $variant;
                $data->save();
            }
        }
        $keys = $request->keys;
        foreach ($keys as $index => $key) {
            $group = new FeatureValue;
            $group->attribute = $key;
            $group->value = $request->values[$index];
            $group->product_id = $product->id;
            $group->group_id = $request->group_id[$index];
            $group->save();
        }
        session()->flash('status', 'Product added successfully');
        return view('viewproduct');
    }

    public function viewproduct()
    {
        $products = Product::all();
        return view('admin.view_product')->with('products', $products);
    }

    public function editProduct($id)
    {
        $data = Product::find($id);
        return view('admin.edit_product', compact('data'));
    }

    public function updateProduct(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required|min:4|unique:products',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);
        $data = Product::find($id);
        $data->product_name = $request['product_name'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('upload'), $filename);
            $data->image = $request->file('image')->getClientOriginalName();
        }
        $data->description = $request['description'];
        $data->save();
        return back();
    }
    public function destroyProduct($id)
    {
        $data = Product::find($id);
        $data->delete();
        return back();
    }
}
