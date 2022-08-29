<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brands::orderBy('id','DESC')->paginate(10);
        $data = [
            'page_title' => 'Марки',
            'brands'=>$brands,
        ];

        return view('admin.brands.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BrandsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandsRequest $request)
    {
        $data = $request->all();
        $data['created_by'] = \Auth::id();
        $data['updated_by'] = \Auth::id();
        Brands::create($data);
        \Session::flash('success','Марка успешно добавлена');
        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brands::findOrfail($id);
        $data = [
            'brand'=>$brand,
            'page_title'=>'Редактировать марка '.$brand->name,
        ];
        return view('admin.brands.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BrandsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandsRequest $request, $id)
    {
        $brand = Brands::findOrfail($id);
        $data['updated_by'] = \Auth::id();
        $data['name'] = $request->input('name');
        $brand->update($data);

        \Session::flash('success','Марка успешно отредактирован');
        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brands::findOrfail($id);
        $brand->delete();
        \Session::flash('success','Марка успешно удален');
        return redirect()->route('admin.brands.index');
    }
}
