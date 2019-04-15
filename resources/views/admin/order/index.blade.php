@extends('admin.dashboard')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Таблица заказов</h3>
                        <div class=" pull-right" style="width: 300px;">
                            {{ $orders->links() }}
                        </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Заказчик</th>
                            <th>Тел. номер</th>
                            <th>Статус</th>
                            <th>Время отправки</th>
                            <th>Посмотреть</th>
                            <th>Удалить</th>

                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->number}}</td>
                            <td><span class="{{($order->view == true)?'label label-success':'label label-danger'}}">
                                   {{($order->view == true)?'Seen':'Unseen'}} </span></td>
                            <td>{{date('j.m.Y',strtotime($order->created_at))}} at {{date('g:ia',strtotime($order->created_at))}}</td>
                        <td>
                            <a href="{{route('order.show',$order->id)}}" class="{{($order->view == true)?'fa fa-eye btn btn-success btn-md ':'fa fa-eye-slash btn btn-danger btn-md'}}" ></a>
                        </td>
                            <td>
                                <form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('o.destroy',$order->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"  class="fa fa-trash-o btn btn-info btn-sm"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>


            <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>


@endsection