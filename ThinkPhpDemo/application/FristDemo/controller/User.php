<?php
namespace app\FristDemo\controller;
use app\FristDemo\model\User as UserModel;
use app\FristDemo\model\Wife;
use think\Controller;
use think\Db;
use app\FristDemo\model\Friends;
class User extends Controller{

    public function delete($id){
        $user = UserModel::get($id);
        if($user){
            echo '用户存在'.'<br>';
            echo 'ID:'.'id'.$user->id.'<hr>';
            if($user->delete()){
                echo '删除成功';
            }
            if($user->wife){
                echo '关联对象存在';
                $user->wife->delete();

            }
        } else{
            echo '用户不存在';
        }
    }
    public function addfriends(){
        $user = UserModel::get();
        echo $user->nickname;
        $user->friends()->saveALL([
            ['name'=>'Jay','sex'=>'man'],
            ['name'=>'Tom','sex'=>'wman'],
            ]
        );
    }
    public function attachf(){
        $user = UserModel::get();
        echo $user->nickname;
        $f = Friends::get(1);
        $user->friends()->attach($f);
    }
    public function deleteall(){
    $res = Db::execute('delete  from think_user');

}
public function readf($id){
      $user = UserModel::get($id);
    echo "输入的id是：".$user->id.'<br>';
      echo "用户名是：".$user->nickname.'<hr>';

      $list = $user->friends;
    foreach ($list as $item) {
        echo 'F.ID：'.$item->id.'<br>';
      }
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
        $user = UserModel::get();  //创建模板对象

       //$data = input('post.');
        //验证器验证

        if($user->allowField(true)->validate(true)->save(input('post.'))){
           echo '成功写入'.$user->nickname;

           /* 1对1关联
            $wife = new Wife;
            $wife->name='Tom';
            $wife->work='Student';
            $user->wife()->save($wife);
           */

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
        echo 'read 方法开始'.'<br>';
        echo '输入的id是：'.$id.'<hr>';
        $user = UserModel::get($id);

        if($user){
            echo '用户ID：'.$user->id;
        }

        //dump($user->toJson());
        //dump($user->visible(['create_time','update_time'])->toArray());
       // dump($user->append(['user_status'])->toArray());

       /*
        echo 'Id:'.$user->id.'<br>';
        echo 'Email'.$user->email.'<br>';
        echo 'Birthday'.$user->birthday.'<hr>';
       */
       isset($user->wife);
      /* if(var_dump($user->wife)){
           echo $user->wife->name;
        }
      */
    }
    //查询多条语句
    public function index(){
        echo '我是index方法';
        $list = UserModel::all();
        $this->assign('list',$list);
        $this->assign('count',count($list));
        return $this->fetch();
        }

  public function create(){
        return view(); //默认解析规则 默认视图目录/类名/方法名.html
  }
}