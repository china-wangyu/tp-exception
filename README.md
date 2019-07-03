# tp-exception
TP5.1 的异常基类扩展

# `composer` 安装

```php
composer require wangyu/tp-exception
```

# 使用说明

## （1）首先继承 `\WangYu\BaseException`

- 例如：

```php
class RouteException extends \WangYu\BaseException
{
    public $code = 400;
    public $message = '反射路由设置错误';
    public $error_code = 66668;
}
```

## (2) 修改 `thinkphp5.1` 的 `/config/app.php` 里面 `exception_handle`参数

修改为以下内容

```php
// 异常处理handle类 留空使用 \think\exception\Handle
'exception_handle'       => 'WangYu\Exception',
```