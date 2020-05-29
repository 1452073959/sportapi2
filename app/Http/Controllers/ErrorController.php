<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\InternalException;
use App\Exceptions\InvalidRequestException;
use Exception;
use App\Jobs\CloseOrder;
use Mail;
use App\Events\OrderPaid;
use App\Mail\OrderShipped;
class ErrorController extends Controller
{
    //异常
    public function isValid()
    {
//        throw new \Exception('这是一个异常');
        try {
            $error = 'Always throw this error';
            throw new Exception($error);
            // 从这里开始，tra 代码块内的代码将不会被执行
            echo 'Never executed';
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), '<br>';
        }
// 继续执行
        echo 'Hello World';
    }
    //队列

    public function store(Request $request)
    {
//        Mail::to($request->user()) ->queue(new OrderShipped($order));
//        给队列设置延时
        dispatch(new CloseOrder(1));

//        return response(1231231);
    }

//事件
    public function OrderPaid()
    {
        $this->afterPaid(123456);
    }

    //邮件
    public function ship(Request $request, $orderId)
    {
//        $order = Order::findOrFail($orderId);

        // 发送订单...
        $to = '1452073959@qq.com';

        Mail::to($to)->send(new OrderShipped());
    }
}
