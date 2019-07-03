<?php
/** Created By wene<china_wangyu@aliyun.com>, Data: 2019/7/3 */


namespace WangYu;

use think\exception\Handle;
use think\facade\Log;
use WangYu\lib\RenderException;

/**
 * Class Exception 异常基类扩展
 * @package WangYu
 */
class Exception extends Handle
{
    public $code = 400;
    public $message = '异常错误';
    public $error_code = 100000;

    /**
     * 错误处理
     * @param \Exception $e
     * @return \think\Response|\think\response\Json
     */
    public function render(\Exception $e)
    {
        $type = RenderException::getExceptionType($e);
        $result = RenderException::$type();
        if ($type === 'default'){
            if (config('app_debug')) {
                return parent::render($e);
            } else {
                $this->code = 500;
                $this->message = '服務器內部錯誤，不想告訴你';
                $this->error_code = 1000;
                $this->recordErrorLog($e);
            }
        }
        return json($result, $this->code);
    }

    // 记录错误日志
    private function recordErrorLog(\Exception $e)
    {
        Log::init([
            'type' => 'File',
            'path' => '',
            'level' => ['error'],
            'close' => false
        ]);
        Log::record($e->getMessage(), 'error');
    }
}