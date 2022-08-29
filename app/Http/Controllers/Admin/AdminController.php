<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\CarModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function GetModels(Request $request){
        $models = CarModel::where('brand_id',$request->brand_id)->select('name','id')->get();
        return response()->json(['models'=>$models]);
    }
}
