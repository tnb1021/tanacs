<?php
function edit($params){
    //DBの接続情報
    
    $host = 'localhost';
    $username = 'name';
    $password = 'pass';
    $dbname = 'db';
	//DBコネクタを生成
	$Mysqli = new mysqli($host, $username, $password, $dbname);
	if ($Mysqli->connect_error) {
			error_log($Mysqli->connect_error);
			exit;
    }
    
    //入力された検索条件からSQl文を生成
    $where = [];
    $ename = "'".$params['etitle']."'";
    $eloc = "'".$params['edes']."'";
    

    
   if(!empty($params['etitle']) && !empty($params['edes'])){
        #$sql = "insert into np values ('" . $inn ."', '" . $inl ."')";
        $sql = "update tbname set des=".$eloc."  where title = ".$ename;
    }

   
	
	//SQL文を実行する
    $UserDataSet = $Mysqli->query($sql);
 
    
}



