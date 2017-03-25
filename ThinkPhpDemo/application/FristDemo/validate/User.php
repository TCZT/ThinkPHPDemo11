<?php
namespace app\FristDemo\validate;
use think\Validate;
class User extends Validate{
    //验证规则
   protected $rule = [
        ['nickname','min:5','用户名不能为空|用户名必须大于五位'],
       ['email','require|email','email格式不正确'],
      ['birthday','require|dateFormat:Y-m-d','日期格式不正确'],
        ];

}