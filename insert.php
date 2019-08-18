<?php
function insert($params){
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
    $where[] = $params['institle'];
    $where[] = $params['insdes'];
    $where[] = $params['inscost'];
    $where[] = $params['inspic'];
    
    $in = '"'.implode('","',$where).'"';

    
   if(!empty($params['institle']) && !empty($params['insdes'])){
        $sql = "insert into tbname values (". $in . ")";
    }
	
	//SQL文を実行する
    $UserDataSet = $Mysqli->query($sql);
    //扱いやすい形に変える
    
}



