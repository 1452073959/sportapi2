<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        //

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        dd($this);
        //配置邮件发送者
//        return $this->from('example@example.com')
//            ->view('emails.orders.shipped');
        //邮件视图
//        return $this->view('view.name');
//        纯文本
        return $this ->text();

    }
}
