<?php
function getUserData($params){
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
	if(!empty($params['title'])){
		$where[] = "title like '%{$params['title']}%'";
	}
	if(!empty($params['des'])){
        $where[] = "des like '%{$params['des']}%'";		
	}
	
	if($where){
		$whereSql = implode(' AND ', $where);
		$sql = 'select * from tbname where ' . $whereSql ;
	}else{
		$sql = 'select * from tbname';
	}
    
    //echo ($sql);

	//SQL文を実行する
    $UserDataSet = $Mysqli->query($sql);
	//扱いやすい形に変える
	$result = [];
    
    //while($row = $UserDataSet->fetch_assoc()){
    //while($row = $UserDataSet->fetch_array(MYSQLI_ASSOC))  {
    while($row = mysqli_fetch_array($UserDataSet, MYSQLI_ASSOC)) { 
        $result[] = $row;
                
	}
	
	
	return $result;
}

