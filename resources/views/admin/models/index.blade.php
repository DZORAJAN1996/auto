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
                                <a href="{{route('admin.models.create')}}" class="btn btn-default">
                                    Добавить
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Название</th>
                                    <th>Марка</th>
                                    <th width="20%">*</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($models as $model)
                                    <tr>

                                        <td>{{$model->id}}</td>
                                        <td>{{$model->name}}</td>
                                        <td>{{!empty($model->brand) ? $model->brand->name :""}}</td>

                                        <td>
                                            <a href="{{route('admin.models.edit',$model->id)}}" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('admin.models.destroy',$model->id)}}" method="POST"
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
                                    {{$models->links()}}

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
