<?php
/** Created By wene<china_wangyu@aliyun.com>, Data: 2019/7/3 */


namespace WangYu;

/**
 * Class BaseException 异常基类扩展
 * @package WangYu
 */
abstract class BaseException  extends \Exception
{
    public $code = 400;
    public $message = '异常错误';
    public $error_code = 100000;

    public function __construct($params = [])
    {
        isset($params['code']) && $this->code = $params['code'];
        isset($params['message']) && $this->message = $params['message'];
        isset($params['error_code']) && $this->error_code = $params['error_code'];
        parent::__construct($this->error_code.$this->message,$this->code);
    }
}