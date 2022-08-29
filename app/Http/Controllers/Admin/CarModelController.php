<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarModelRequest;
use App\Models\Brands;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = CarModel::orderBy('id', 'DESC')->with('brand')->paginate(10);
        $data = [
            'models' => $models,
            'page_title' => 'Модель'
        ];

        return view('admin.models.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brands::all();
        if ($brands->count() == 0) {
            return redirect()->back()->with('error', 'Сначала добавите марка');
        }
        $data = [
            'page_title' => 'Добавить модель',
            'brands' => $brands
        ];
        return view('admin.models.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarModelRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarModelRequest $request)
    {
        $user_id = \Auth::id();
        $data['name'] = $request->input('name');
        $data['brand_id'] = $request->input('brand_id');
        $data['created_by'] = $user_id;
        $data['updated_by'] = $user_id;

        CarModel::create($data);
        \Session::flash('success', 'Модел успешно добавлена');
        return redirect()->route('admin.models.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = CarModel::findOrfail($id);
        $brands = Brands::all();
        if ($brands->count() == 0) {
            return redirect()->back()->with('error', 'Сначала добавите марка');
        }
        $data = [
            'page_title' => 'Редактировать модель',
            'brands' => $brands,
            'model' => $model,
        ];

        return view('admin.models.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarModelRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarModelRequest $request, $id)
    {
        $model = CarModel::findOrfail($id);
        $user_id = \Auth::id();
        $data['name'] = $request->input('name');
        $data['brand_id'] = $request->input('brand_id');
        $data['updated_by'] = $user_id;
        $model->update($data);

        \Session::flash('success', 'Модел успешно отредактирован');
        return redirect()->route('admin.models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CarModel::findOrfail($id);
        $model->delete();
        \Session::flash('success', 'Модел успешно удален');
        return redirect()->route('admin.models.index');
    }
}
