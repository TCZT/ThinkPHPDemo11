<?php
namespace app\FristDemo\controller;
use think\Controller;
use think\Db;
use think\image\Exception;
use think\Session;
use think\Request;
class Index extends Controller
{
    use \traits\controller\Jump;
    public function index()
    {      $index = new Index();
        // return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
        /* 获取数据库数据
         $data = DB::name('data')->find();
         $this->assign('result',$data);
         return $this->fetch();
 */
        /*原生查询
        echo '<br>';
         $res = DB::name('data')->execute('insert into think_data (name) values ("Yangx")');
         dump($res);
         echo '<br>';
         $res = DB::name('data')->query('select * from think_data where name = :name',['name'=>"zhangT"]);
         dump($res);
        */

        /*查询构造器查询
         $res = DB::name('data')->where('name','Yangx')->delete();
         var_dump($res);
 */
        /*  查询构造器+查询助手
         $db = db('data');
         $db->where('name','YangP')->delete();
         $res = $db->insert(['name'=>'YangX']);
         $db->where('name','YangX')->update(['name'=>'YangP']);
         $res = $db->where('name','YangP')->field('d')->limit(2)->order('id','desc')->select();
         var_dump($res);
   */
        //事务处理
        DB::transaction(function(){

            DB::name('data')->insert(['name'=>'Zhang55']);
            DB::name('data')->insert(['name'=>'ZhangTest11']);

        });
        echo "测试是否运行";

       /*

         DB::startTrans();
        try{

        }catch (Exception $e){

        }
*/
    }

     public function hello($name='world',$password=''){
        dump($this->request->param('name') ) ;
        $this->assign('name',$name);
        return $this->fetch();
     }
    public function testResponse($name='world'){

         $data = ['Zhang'=>'Teng'];
        var_dump($data) ;
         echo '<hr>';
         $time = strtotime(date('H:i:s'));
         //一直循环
        while(true) {
            //十秒后跳转
            $time1 = strtotime(date('H:i:s'));
            if($time1-$time>10){
                $this->redirect('https://www.baidu.com');
                break;
             }

         }



    }
}
