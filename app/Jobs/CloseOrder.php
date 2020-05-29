<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
// 代表这个类需要被放到队列中执行，而不是触发时立即执行
class CloseOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    //导入模型
    protected $order;
//* 创建一个新的job实例传数据
//    public function __construct($delay)
//    {
////        $this->order = $order;
//        // 设置延迟的时间，delay() 方法的参数代表多少秒之后执行
//        $this->delay($delay);
//    }
    public function __construct($delay)
    {
//        $this->order = $order;
        // 设置延迟的时间，delay() 方法的参数代表多少秒之后执行
//        parent::__construct($delay);
        $this->delay($delay);
//        dump($this);
    }

    // 定义这个任务类具体的执行逻辑
    // 当队列处理器从队列中取出任务时，会调用 handle() 方法
    public function handle()
    {

        echo $this->delay;
//        echo 123;
        //方法里面写干什么;
        $data= array(
            'title'=> '123456',
            'body'=> '123456'
        );
        $view = 'welcome';
        $from = '1452073959@qq.com';
        $name = '心下雪';
        $to = '1452073959@qq.com';
        $subject = "买菜超级加倍";

        Mail::send($view,$data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

}
