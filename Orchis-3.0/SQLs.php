<?php 
class SQLs{
    public static function addslash($array){
        $ret=[];
        foreach($array as $k=>$v){
            $ret[$k]=addslashes($v);
        }
        return $ret;
    }
    public static function insert($table,$item=[],$model=[]){
        $first=true;$k=$v='';
        foreach($model as $m){
            if(isset($item[$m])){
                $m_=addslashes($item[$m]);
                $k.=($first?'':',').$m;
                $v.=($first?'':',')."'{$m_}'";
            }
            $first=false;
        }
        return "insert into $table($k) values($v)";
    }
}