<?php
namespace app\FristDemo\model;
use think\Model;
class User extends Model {
    /*
    //读取器
     protected function getBirthdayAttr($birthday){
         return date('Y-m-d',$birthday);
     }
     //修改器
    protected function  setBirthdayAtrr($value){
        return strtotime($value);
    }
*/
    /*
    protected function scopeId($query){
        $query->where('id','>',2);
        return $query;
    }
    protected $insert = ['status'=>1];//自动完成功能
    protected $dateFormat ='Y/m/d';
    protected $type = [
      'Birthday' =>'timestamp',
    ];
    */
    /*
    protected static function base($query){
        $query->where('email','not in','null');
}
    */
    //范围一定要设置为publie !!!!
    public function wife(){
        return $this->hasOne('Wife');  //一定要对应模型名 区分大小写
    }
    public function  friends(){
          return $this->belongsToMany('Friends','user_friends');
    }
    }