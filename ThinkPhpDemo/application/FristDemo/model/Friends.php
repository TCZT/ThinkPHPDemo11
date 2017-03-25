<?php
namespace app\FristDemo\model;
use think\Model;

class friends extends Model{
    public function user(){
        return $this->belongsToMany('User','think_user_friends');
    }
}