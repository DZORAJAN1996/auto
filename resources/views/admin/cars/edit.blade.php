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
                            <h3 class="card-title">Добавить автомобиль</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('admin.cars.index')}}" class="btn btn-default">
                                    Все автомобиль
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <div class="row">
                                <div class="col-xl-12 mb-4 mb-xl-0">
                                    <section>
                                        <form action="{{route('admin.cars.update',$car->id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="card card-primary">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="brand_id">Бренд</label>
                                                                @include('admin.includes.select',['name'=>'brand_id','data'=>$brands,'selected'=>$car->brand_id])
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="model_id">Модел</label>
                                                                @include('admin.includes.select',['name'=>'model_id','data'=>$models,'selected'=>$car->model_id])

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="image">Фото</label>
                                                                <input type="file" name="image" class="form-control"
                                                                       accept="image/png, image/gif, image/jpeg">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <img src="{{asset('uploads/'.$car->image)}}"
                                                                 id="previewImage" style="max-width: 150px" alt="">
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="year">Год выпуска</label>
                                                                <input type="number"
                                                                       value="{{old('year')?old('year'):$car->year}}"
                                                                       id="year" name="year" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="number_plate">Госномер автомобиля</label>
                                                                <input type="text"
                                                                       value="{{old('year')?old('year'):$car->year}}"
                                                                       name="number_plate" id="number_plate"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="coloe">Цвет </label>
                                                                <input type="text"
                                                                       value="{{old('color')?old('color'):$car->color}}"
                                                                       name="color" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="transmission">Коробка передач </label>
                                                                <select name="transmission" id="transmission"
                                                                        class="form-control">
                                                                    <option
                                                                        value="automatic" {{old('transmission') && old('transmission')=='automatic'?'selected':$car->transmission=='automatic'?'selected':""}}>
                                                                        Автомат
                                                                    </option>
                                                                    <option
                                                                        value="manual" {{old('transmission') && old('transmission')=='manual'?'selected':$car->transmission=='manual'?'selected':""}}>
                                                                        Механика
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="transmission">Цена аренды в сутки </label>
                                                                <input type="number"
                                                                       value="{{old('price')?  old('price') : $car->price}}"
                                                                       name="price" id="price" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>

                                            <button type="submit" class="btn btn-success">Редактировать </button>
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
@section('script')
    <script>
        $(() => {
            function getModels() {
                $.ajax({
                    url: "{{route('admin.get.models')}}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        brand_id: $('select[name=brand_id]').val(),
                    }, success: function (data) {
                        $('#model_id').empty();
                        $.each(data.models, function (key, val) {
                            $('#model_id').append(`<option value="${val.id}">${val.name}</option>`);
                        })
                    }
                })
            }

            $('select[name=brand_id]').on('change', function (e) {
                getModels()
            })

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var i;
                    for (i = 0; i < input.files.length; ++i) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#previewImage').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }

            $("input[name=image]").change(function () {
                readURL(this);
            });
        })

    </script>
@endsection
