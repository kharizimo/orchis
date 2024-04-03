<?php 
class Combo{
    public static function array($items=[],$options=[]){
        $default=$options['default']??'<EMPTY>';
        $ret='';
        if(isset($options['no_data'])){
            $no_data_key=$options['no_data'][0]??'';
            $no_data_val=$options['no_data'][1]??'Selectionnez';
            $ret.='<option disabled value="'.$no_data_key.'">'.$no_data_val.'</option>';
        }
        foreach($items as $item){
            $selected=$default==$item?'selected':'';
            $ret.='<option '.$selected.' value="'.$item.'">'.$item.'</option>';
        }
        return $ret;
    }
    public static function list($items=[],$options=[]){
        $default=$options['default']??'<EMPTY>';
        $i=$options['start']??0;
        $step=$options['step']??1;
        $ret='';
        if(isset($options['no_data'])){
            $no_data_key=$options['no_data'][0]??'';
            $no_data_val=$options['no_data'][1]??'Selectionnez';
            $ret.='<option disabled value="'.$no_data_key.'">'.$no_data_val.'</option>';
        }
        foreach($items as $item){
            $selected=$default==$item?'selected':'';
            $ret.='<option '.$selected.' value="'.$i.'">'.$item.'</option>';
            $i+=$step;
        }
        return $ret;
    }
    public static function count($items=[],$options=[]){
        $default=$options['default']??'<EMPTY>';
        $i=$options['start']??0;
        $step=$options['step']??1;
        $zerofill=$options['zerofill']??1;
        $ret='';
        if(isset($options['no_data'])){
            $no_data_key=$options['no_data'][0]??'';
            $no_data_val=$options['no_data'][1]??'Selectionnez';
            $ret.='<option disabled value="'.$no_data_key.'">'.$no_data_val.'</option>';
        }
        for($i=$items[0];;$i+=$step){
            if($step>0){
                if($i>$items[1])
                    break;
            }
            else{
                if($i<$items[1])
                    break;
            }
            $item=sprintf("%0{$zerofill}d",$i);
            $selected=$default==$item?'selected':'';
            $ret.='<option '.$selected.' value="'.$item.'">'.$item.'</option>';
        }
        return $ret;
    }
    public static function object($items=[],$options=[]){
        $default=$options['default']??'<EMPTY>';  
        foreach($items as $key=>$val){
            $selected=$default==$key?'selected':'';
            $ret.='<option '.$selected.' value="'.$key.'">'.$val.'</option>';            
        }
    }
    public static function data($items=[],$options=[]){
        $default=$options['default']??'<EMPTY>';    
        if(isset($options['no_data'])){
            $no_data_key=$options['no_data'][0]??'';
            $no_data_val=$options['no_data'][1]??'Selectionnez';
            $ret.='<option disabled value="'.$no_data_key.'">'.$no_data_val.'</option>';
        } 
        $key=$options['key']??'id';
        $val=$options['val']??'lib';
        foreach($items as $item){
            $selected=$default==$item[$key]?'selected':'';
            $ret.='<option '.$selected.' value="'.$item[$key].'">'.$item[$val].'</option>';
        }   
    }
}