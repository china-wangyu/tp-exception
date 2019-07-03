<?php
/** Created By wene<china_wangyu@aliyun.com>, Data: 2019/7/3 */


namespace WangYu\lib;

/**
 * Class RenderException 异常处理类
 * @package WangYu\lib
 */
class RenderException
{
    protected static $type = [
        'default' => 'render',
        '\LinCmsTp5\exception\BaseException' => 'linCmsTp',
    ];


    /**
     * 默认错误输出
     * @param $exception
     * @return array
     */
    public static function render($exception):array
    {
        $result = [
            'msg' => $exception->message,
            'code' => $exception->error_code,
            'request_url' => request()->path()
        ];
        return $result;
    }

    /**
     * 获取异常类型
     * @return string|null
     */
    public static function getExceptionType($exception):?string
    {
        if (isset(static::$type[get_class($exception)])){
            return static::$type[get_class($exception)];
        }
        static::$type['default'];
    }

    /**
     * 专属 LinCmsTp 的异常输出
     * @param $exception
     * @return array
     */
    public static function linCmsTp($exception):array
    {
        $result = [
            'msg' => $exception->message,
            'error_code' => $exception->error_code,
            'request_url' => request()->path()
        ];
        return $result;
    }
}