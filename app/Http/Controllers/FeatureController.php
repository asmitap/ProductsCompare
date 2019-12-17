<?php

namespace App\Http\Controllers;

use App\ProductGroup;
use App\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function products($id)
    {
        $data = ProductGroup::find($id);
        $feature = Feature::orderBy('id', 'DESC')->where('productgroup_id', '=', $id)->get();
        return view('admin.feature', compact('data'))->with('featur', $feature);
    }
    public function storefeature(Request $request)
    {
        $this->validate($request, [
            'productgroup_id' => 'required',
            'feature' => 'required|min:4'
        ]);
       // try {
            Feature::create([
                'feature' => $request->feature,
                'productgroup_id' => $request->productgroup_id
            ]);
            session()->flash('status', 'Product feature added successfully');
            return response()->json(['feature' => $request->feature, 'msg' => 'Product feature added successfully']);
       // } catch (\Exception $e) {
            return response()->json(['msg' => 'Product feature doesnot created']);
       // }
    }
    public function editfeature($id)
    {
        $data = Feature::find($id);
        return view('admin.editfeature', compact('data'));
    }
    public function updatefeature(Request $request, $id)
    {
        $this->validate($request, [
            'productgroup_id' => 'required',
            'feature' => 'required|min:4'
        ]);
        $data = Feature::find($id);
        $data->productgroup_id = $request['productgroup_id'];
        $data->feature = $request['feature'];
        $data->save();
        return back();
    }
    public function destroyfeature($id)
    {
        $data = Feature::find($id);
        $data->delete();
        return back();
    }
}
