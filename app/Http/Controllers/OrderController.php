<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendRequest;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(8);;
      return view('admin.order.index',compact('orders'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SendRequest $request)
    {


        Order::create([
           'name' =>$request->name,
           'number'=>$request->number,
        ]);



        $to_name = 'TO_NAME';
        $to_email = 'masterok3233@mail.ru';
        $data = array(
            'name'=>$request->name,
            "number" => $request->number
        );

        Mail::send('mail.order', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('🗣Поступил новый заказ');
        });




        $apiToken = config('services.telegram.token');
        $chatId = config('services.telegram.chatId');

        if( $curl = curl_init() ) {

            curl_setopt($curl, CURLOPT_URL, "https://api.telegram.org/bot".$apiToken."/sendMessage?chat_id=".$chatId."&text="."🗣Поступил новый заказ                                                                 "."🙎🏻‍♂️Имя:".$request->name."                                             📱Тел Номер:".$request->number."           ⏰Время заказа:".date('j.m.Y  H:i a', time()));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            curl_exec($curl);
            curl_close($curl);

            $request->session()->flash('message', 'Ваш запрос принят!');
            return back();

              }
            $request->session()->flash('message','Ваш запрос не отправлен!');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $order->view = true;
        $order->save();
        return back();
    }


public function noteStore(Request $request){
    $this->validate($request,[
        'note' => 'min:1',
    ]);
    $o = new Order;
    $o->note = $request->note;
    $o->save();
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return back()->with('success','Order deleted');
    }


}
