@extends('layouts.admin')
@section('content')
    <section class="content">
        <div class="container">
            <div class="col-md-12">
                @include('admin.includes.alerts')

            </div>
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header">
                            <h3 class="card-title">Добавить модел</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('admin.models.index')}}" class="btn btn-default">
                                    Все моделы
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <div class="row">
                                <div class="col-xl-12 mb-4 mb-xl-0">
                                    <section>
                                        <form action="{{route('admin.models.update',$model->id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="card card-primary">

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name">Название</label>
                                                        <input type="text" class="form-control" value="{{old('name')?old('name') : $model->name}}"
                                                               name="name" id="name" placeholder="Название">
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="brand_id">Бренд</label>
                                                        @include('admin.includes.select',
                                                        ['name'=>'brand_id','data'=>$brands,'selected'=>$model->id])
                                                    </div>
                                                </div>


                                            </div>

                                            <button type="submit" class="btn btn-success">Редактировать</button>
                                        </form>
                                    </section>
                                    <!-- Section: Live preview -->

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
