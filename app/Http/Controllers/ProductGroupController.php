<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductGroup;
use App\Feature;
use App\Product;
use App\FeatureValue;


class ProductGroupController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'productgroup' => 'required|min:4|unique:product_groups'
        ]);
        ProductGroup::create([
            'productgroup' => $request->productgroup
        ]);
        session()->flash('status', 'Product group added successfully');
        return response()->json(['productgroup' => $request->productgroup, 'msg' => 'Product group added successfully']);
    }
    public function view()
    {
        $datas = ProductGroup::orderBy('id', 'DESC')->get();
        return view('admin.view_group')->with('datas', $datas);
    }
    public function edit($id)
    {
        $data = ProductGroup::find($id);
        return view('admin.edit_group')->with('datas', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'productgroup' => 'required|min:4|unique:product_groups'
        ]);
        $data = ProductGroup::find($id);
        $data->productgroup = $request['productgroup'];
        $data->save();
        return redirect('/viewgroup')->with('status', 'Group updated successfull.');
    }
    public function destroy($id)
    {
        $data = ProductGroup::find($id);
        $data->delete();
        return redirect('/viewgroup')->with('status', "Group deleted successfully");
    }

    public function fetchfeature(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Feature::where('productgroup_id', '=', $id)->get();
            return response()->json([
                'features' => $data,
            ]);
        }
    }
    public function viewpage()
    {
        $datas = Product::all();
        $product = Product::latest()->take(6)->get();
        return view('welcome')->with('products', $product)->with('datas', $datas);
    }
    public function compareproduct(Request $request)
    {
        $first = $request->input('p1');
        $second = $request->input('p2');
        $third = $request->input('p3');
        $fourth = $request->input('p4');

        $firstdata = Product::find($first);
        $seconddata = Product::find($second);
        $thirddata = Product::find($third);
        $fourthdata = Product::find($fourth);
        $mobiles = [];
        if ($firstdata) {
            array_push($mobiles, $firstdata);
        }
        if ($seconddata) {
            array_push($mobiles, $seconddata);
        }
        if ($thirddata) {
            array_push($mobiles, $thirddata);
        }
        if ($fourthdata) {
            array_push($mobiles, $fourthdata);
        }
        //  return $mobiles;
        $productGroup = ProductGroup::all();
        $data = [];
        if (sizeof($mobiles) > 1) {
            foreach ($productGroup as $row) {
                $tempArray['group_name']  = $row->productgroup;
                $tempArray['id'] = $row->id;
                $features = Feature::where('productgroup_id', '=', $row->id)->get();
                $featuresData = [];
                foreach ($features as $feature) {
                    $key = $feature->feature;
                    $featuresValue  = [];
                    array_push($featuresValue, $key);
                    foreach ($mobiles as $mobile) {
                        $featureValue = FeatureValue::where('attribute', '=', $key)->where('product_id', '=', $mobile->id)->where('group_id', '=', $row->id)->first();
                        if (!$featureValue) {
                            array_push($featuresValue, null);
                        } else {
                            array_push($featuresValue, $featureValue->value);
                        }
                    }
                    $featuresData[] = $featuresValue;
                }
                $tempArray['features'] = $featuresData;
                $data[] = $tempArray;
            }
        }
        return view('compare_product')->with('firstdata', $firstdata)
            ->with('seconddata', $seconddata)
            ->with('thirddata', $thirddata)
            ->with('fourthdata', $fourthdata)
            ->with('data', $data);
    }
}
