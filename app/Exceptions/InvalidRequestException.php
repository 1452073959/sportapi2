<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
//异常处理
class InvalidRequestException extends Exception
{
    //先执行构造函数,然后自动执行render
    public function __construct(string $message = "", int $code = 400)
    {
        parent::__construct($message, $code);
    }

    public function render(Request $request)
    {
        //如果请求是ajax就返回状态码
        if ($request->expectsJson()) {
            // json() 方法第二个参数就是 Http 返回码
            return response()->json(['msg' => $this->message, 'code'=>$this->code]);
        }
        dump($request);
        return response($this->getMessage().$this->code);

    }

}
