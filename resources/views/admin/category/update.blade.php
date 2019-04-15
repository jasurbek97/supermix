@extends('admin.dashboard')
@section('content')

        <div class="modal-content">
            <form method="POST" action="{{route('c.update',$category->id)}}" enctype="multipart/form-data">
                 @method('PUT')
                <div class="modal-header">

                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Обновить категорию</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название категории на узбекском</label>
                                    <input type="text" name="name_uz" class="form-control" id="exampleInputEmail1" value="{{$category->name_uz}}" placeholder="Enter category in uz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Название категории на русском</label>
                                    <input type="text" name="name_ru" class="form-control" id="exampleInputPassword1" value="{{$category->name_ru}}" placeholder="Enter category in ru">
                                </div>
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputFile">Картинка </label>
                                    <input type="file" id="exampleInputFile"  name="image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                    <img id="blah" alt="your image" src="/{{$category->image}}" style="height:160px;width:160px;border-color: #0b97c4"><br>


                                </div>
                                <div class="checkbox">
                                    <h5><b>Статус</b></h5>

                                    <label class="switch" style="margin-right: 20px" >
                                        <input type="checkbox" id="status" value="1"  name="status" {{($category->status == 1)?'checked':''}}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- /.box-body -->


                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="{{route('c.index')}}"><button type="button" class="btn btn-default pull-left" data-dismiss="modal"><<</button></a>
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </form>

        </div>
@endsection