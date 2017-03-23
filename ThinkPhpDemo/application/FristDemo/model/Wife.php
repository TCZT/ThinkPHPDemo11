<?php
namespace app\FristDemo\model;
use think\Model;
class Wife extends Model{
    public function user(){
          return $this->belongsTo(User);
    }
}