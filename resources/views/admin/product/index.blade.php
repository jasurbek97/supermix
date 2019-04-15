@extends('admin.dashboard')

@section('content')

    <!-- TO DO List -->
    <div class="box box-primary">
        <div class="box-header">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title ">Список продуктов</h3>
          <div class="pull-right">{{$products->links()}}</div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
            <ul class="todo-list">
                @foreach($products as $product)
                <li>
                    <!-- drag handle -->
                    <span class="handle">
                       <img src="/{{$product->category->image}}" style="max-width: 30px">
                      </span>
                    <!-- checkbox -->
                    <input type="checkbox" {{($product->status == 1)?'checked':''}} >

                    <span class="text">{{$product->title}}</span>
                    <!-- Emphasis label -->
                    <small class="label label-info"><i class="fa fa-clock-o btn btn-lg"></i>{{date('j.m.Y',strtotime($product->updated_at))}}</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                        <div class="col-sm-4">
                            <a href="{{route('p.edit',$product->id)}}"><i class="fa fa-edit btn btn-info btn-sm">  </i></a>
                        </div>
                        <div class="col-sm-4">
                            <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('p.destroy',$product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="fa fa-trash-o btn btn-info btn-sm"></button>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <a href="{{route('p.create')}}"><button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Добавить продукт</button></a>
        </div>
    </div>
    <!-- /.box -->

    @endsection