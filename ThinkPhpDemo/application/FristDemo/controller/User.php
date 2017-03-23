<?php
namespace app\FristDemo\controller;
use app\FristDemo\model\User as UserModel;
use app\FristDemo\model\Wife;
use think\Controller;
use think\Validate;
use think\Db;
class User  {

    public function delete($id){
        $user = UserModel::get($id);
        if($user){
            echo '用户存在';
            echo 'id'.$user->id;
            if($user->wife){
                echo '关联对象存在';
                $user->wife->delete();

            }
        } else{
            echo '用户不存在';
        }
    }
    public function deleteall(){
    $res = Db::execute('delete  from think_user');

}
    public function update($id){
         $user = UserModel::get($id);
         if($user){
             echo '用户名称是：'.$user->nickname;
             $user->nickname="update";
             $user->save();
             if($user->wife){
                $user->wife->name='update';
                $user->wife->save();  //和管理写入有区别
             }
         }
         else{
             echo '用户不存在';
         }
    }
    public function addWife(){
        $wife = new Wife();
        $wife->name='Yangx';
        $wife->work='Student';
        $wife->save();
    }
    public  function add(){
        $user = new UserModel;  //创建模板对象
       /*
       $user->nickname='YangX';
        $user->email='12@qq.com';
        $user->birthday='1995-06-19';
       */
       $data = input('post.');




         //验证器验证
        if($user->allowField(true)->validate()->save(input('post.'))){
           echo '成功写入'.$user->nickname;
            $wife = new Wife;
            $wife->name='Tom';
            $wife->work='Student';
            $user->wife()->save($wife);

        }
        else {
            return '失败';
        }

    }

    //进行关联添加操作
    public function add1(){
        $user = new UserModel;
        $user->nickname='Zhang1';
        $user->save();
        $w = new Wife;
        $w->name="jay";
        $user->wife()->save($w);
    }



    public function read($id=''){
        $user = UserModel::get($id,'wife');
        echo 'Id:'.$user->id.'<br>';
        echo 'Email'.$user->email.'<br>';
        echo 'Birthday'.$user->birthday.'<hr>';
        if($user->wife){
           echo $user->wife->name;
        }
    }
    //查询多条语句
    public function index(){
        echo '我是index方法';
        $list = UserModel::scope('Id')->all(); //调用scope方法进行范围查询
        foreach ($list as $item){
            echo $item->id.'<br>';
            echo $item->nickname.'<hr>';
        }
    }
  public function create(){
        return view(); //默认解析规则 默认视图目录/类名/方法名.html
  }
}