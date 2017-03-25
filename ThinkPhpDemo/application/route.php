<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'user/:id' =>'app/FristDemo/User/read',
    'user'=>'app/FristDemo/User/index',
    'user/create' =>'app/FristDemo/User/create',
    'user/deleteall'=>'app/FristDemo/User/deleteall',
    'delete/:id' =>'app/FristDemo/User/delete',
    'readf/:id'=>'app/FristDemo/User/readf'

];

