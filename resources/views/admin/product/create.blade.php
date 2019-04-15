@extends('admin.dashboard')
@section('content')
<!-- general form elements disabled -->
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Создать продукт</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{route('p.store')}}" method="POST" enctype="multipart/form-data">
            <!-- text input -->
            @csrf
            <div class="form-group">
                <label>Название продукта</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="title" required>
            </div>
            <div class="form-group">
                <label>Категория продуктов</label>
                <select name="cat_id" class="form-control">
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name_ru}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Язык продукта</label>
                <select name="locale" class="form-control">
                    <option value="uz">Uzbek</option>
                    <option value="ru" selected>Russian</option>
                </select>
            </div>
            <div class="form-group">
                <label> Статус продукта</label>
                <select name="status" class="form-control">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                </select>
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label>Описание продукта</label>
                <textarea class="form-control" rows="3" id="editor" name="body" placeholder="Enter ..." required></textarea>
            </div>
            <br>
            <!-- select -->
            <label>Картинка продукта</label>
            <div class="form-group">
                <img id="blah" alt="your image" class="pull-left" src="/vendor/dashboard/img/noimage.jpg" style="height:260px;width:260px;border-color: #0b97c4">
               <br><br> <br><br> <br><br> <br><br> <br><br> <br>
                <input type="file" class="btn btn-info"  required  name="image"
                       onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Submit" name="" style="width: 100%;height: 35px">
            </div>

        </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection