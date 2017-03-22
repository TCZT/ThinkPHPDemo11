<?php
namespace app\FristDemo\controller;
use app\FristDemo\model\User as UserModel;
use think\Controller;

class User  {

    public function delect($id){
        $user = UserModel::get($id);
        if($user){
            $user->delete();
            echo '删除成功';
        } else{
            echo '用户不存在';
        }
    }
    public function update($id){

    }
    public  function add(){
        $user = new UserModel;  //创建模板对象
        $user->nickname='YangX';
        $user->email='12@qq.com';
        $user->birthday='1995-06-19';
        if($user->save()){
            return '成功写入';
        }
        else {
            return '失败';
        }
    }

    public function read($id=''){
        $user = UserModel::get($id);
        echo 'Id:'.$user->id.'<br>';
        echo 'Email'.$user->email.'<br>';
        echo 'Birthday'.$user->birthday.'<hr>';
    }
    //查询多条语句
    public function index(){
        $list = UserModel::scope('Id')->all(); //调用scope方法进行范围查询
        foreach ($list as $item){
            echo $item->id.'<br>';
            echo $item->nickname.'<hr>';
        }
    }

}