<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Brands;
use App\Models\CarModel;
use App\Models\Cars;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Lib\Helper;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::with(['brand','model'])->paginate(10);
        $data = [
            'page_title'=>'Автомобили',
            'cars'=>$cars,
        ];

        return view('admin.cars.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brands::orderBy('name')->get();
        $data = [
            'brands'=>$brands,

        ];
        return view('admin.cars.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $user_id = \Auth::id();
        $data['created_by'] = $user_id;
        $data['updated_by'] = $user_id;
        $data['brand_id'] = $request->input('brand_id');
        $data['model_id'] = $request->input('model_id');
        $data['year'] = $request->input('year');
        $data['number_plate'] = $request->input('number_plate');
        $data['color'] = $request->input('color');
        $data['transmission'] = $request->input('transmission');
        $data['price'] = $request->input('price');
        $data['image'] = Helper::upload($request->file('image'));

        Cars::create($data);
        \Session::flash('success','Автомобиль успешно добавлено');
        return redirect()->route('admin.cars.index');
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
        $car = Cars::findOrfail($id);
        $brands = Brands::orderBy('name')->get();
        $models = CarModel::where('brand_id',$car->brand_id)->get();

        $data = [
            'page_title'=>'Редактировать автомобиль ',
            'brands'=>$brands,
            'models'=>$models,
            'car'=>$car

        ];
        return view('admin.cars.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Cars::findOrfail($id);
        $user_id = \Auth::id();
        $data['updated_by'] = $user_id;
        $data['brand_id'] = $request->input('brand_id');
        $data['model_id'] = $request->input('model_id');
        $data['year'] = $request->input('year');
        $data['number_plate'] = $request->input('number_plate');
        $data['color'] = $request->input('color');
        $data['transmission'] = $request->input('transmission');
        $data['price'] = $request->input('price');
        $data['image'] = $request->hasFile('image')? Helper::upload($request->file('image'),$car->image) : $car->image;
        $car->update($data);
        \Session::flash('success','Автомобиль успешно отредактирован');
        return redirect()->route('admin.cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Cars::findOrfail($id);
        $car->delete();
        \Session::flash('success','Автомобиль успешно удален');
        return redirect()->route('admin.cars.index');

    }
}
