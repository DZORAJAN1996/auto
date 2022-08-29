@extends('layouts.admin')
@section('content')
    <section class="content">
        <div class="container">
            @include('admin.includes.alerts')
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header">
                            <h3 class="card-title">Список модель</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('admin.cars.create')}}" class="btn btn-default">
                                    Добавить
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Фото</th>
                                    <th>Марка</th>
                                    <th>Модель</th>
                                    <th>Год выпуска</th>
                                    <th>Госномер</th>
                                    <th>Цвет</th>
                                    <th>Коробка передач </th>
                                    <th>Цена в сутки </th>
                                    <th>*</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr>

                                        <td><img src="{{asset('uploads/'.$car->image)}}" class="img-fluid" style="max-width: 100px" alt=""></td>
                                        <td>{{!empty($car->brand) ? $car->brand->name :""}}</td>
                                        <td>{{!empty($car->model) ? $car->model->name :""}}</td>
                                        <td>{{$car->year}}</td>
                                        <td>{{$car->number_plate}}</td>
                                        <td>{{$car->color}}</td>
                                        <td>{{$car->transmission=='manual'?'механика':"автомат"}}</td>
                                        <td>{{$car->price}}</td>


                                        <td>
                                            <a href="{{route('admin.cars.edit',$car->id)}}" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('admin.cars.destroy',$car->id)}}" method="POST"
                                                  style="display: contents">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Вы уверен?')"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    {{$cars->links()}}

                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>


    </section>
    <!-- /.modal -->
@endsection
