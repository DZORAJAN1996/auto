@extends('layouts.admin')
@section('content')
    <section class="content">
        <div class="container">
            @include('admin.includes.alerts')
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header">
                            <h3 class="card-title">Список марки</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('admin.brands.create')}}" class="btn btn-default">
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
                                    <th width="20%">*</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>

                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->name}}</td>

                                        <td>
                                            <a href="{{route('admin.brands.edit',$brand->id)}}" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('admin.brands.destroy',$brand->id)}}" method="POST"
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
                                    {{$brands->links()}}

                                </div>
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
