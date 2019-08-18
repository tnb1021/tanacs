<?php
function delete($params){
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
    $where[] = $params['deltitle'];
    
    
    $in = '"'.implode($where).'"';

    
   if(!empty($params['deltitle'])){
        #$sql = "insert into np values ('" . $inn ."', '" . $inl ."')";
        $sql = "delete from tbname where title = (". $in . ")";
    }
	
	//SQL文を実行する
    $UserDataSet = $Mysqli->query($sql);
    //扱いやすい形に変える
    
}



