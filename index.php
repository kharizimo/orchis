<?php 
require 'Orchis-3.0/orchis.php';

$model=['nom','sexe'];
$data=['sexe'=>'M','nom'=>"MA'CARI"];
echo SQLs::insert('tbl',$data,$model);

?> 
<select name="test" id="test">
    <?=Combo::count([10,12],['no_data'=>[-1,'Gouttez']])?>
</select>