<?php

try{

$db_host='localhost';
$db_name='femaviee';
$db_user='root';
$db_pass='';

$fecha= date('Ymd-His');
$salida_sql=$db_name.'_'.$fecha.'.sql';

$dump= "mysqldump -h$db_host -u$db_user -p$db_pass  $db_name > $salida_sql";
system($dump,$output);

}catch(Exception $e){
	echo $e->GetMessage();
}

?>