<?php 
//①データ取得ロジックを呼び出す
include_once('search.php');
$userData = getUserData($_GET);
include_once('insert.php');
$insertData = insert($_GET);
include_once('edit.php');
$editData = edit($_GET);
include_once('delete.php');
$deleteData = delete($_GET);


?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHPの検索機能</title>
<link rel="stylesheet" href="style.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<style type="text/css">
    #mapField{
      width: 500px;
      height: 500px;
      margin: auto;
    }	
</style>
</head>

<body>
<div class="col-xs-6 col-xs-offset-3">
<h1 id = 'index'>目次</h1>
<a href = '#search'>商品検索</a><br>
<a href = '#edit'>編集</a><br>
<a href = '#delete'>削除</a><br>
<a href = '#add'>データを追加</a><br>

</div>
<h1 class="col-xs-6 col-xs-offset-3" id ='search'>商品管理システム</h1>
<div class="col-xs-6 col-xs-offset-3 well">

	<?php //②検索フォーム ?>
	<form method="get">
		<div class="form-group">
			<label for="InputTitle">商品名(100文字まで)</label>
			<input name="title" class="form-control" id="InputTitle" value="<?php echo isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '' ?>">
        </div>
        <div class="form-group">
			<label for="InputDes">商品説明のキーワード検索</label>
			<input name="des" class="form-control" id="InputDes" value="<?php echo isset($_GET['des']) ? htmlspecialchars($_GET['des']) : '' ?>">
        </div>
		
		<button type="submit" class="btn btn-default" name="search">検索</button>
	</form>
</div>
<div class="col-xs-6 col-xs-offset-3">
	<?php //③取得データを表示する ?>
	<?php if(isset($userData) && count($userData)): ?>
		<p class="alert alert-success"><?php echo count($userData) ?>件見つかりました。</p>
		<table class="table">
			<thead>
				<tr>
					<th>商品名</th>
					<th>説明</th>
          <th>値段</th>
          <th>画像</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($userData as $row): ?>
					<tr>
						<td><?php echo htmlspecialchars($row['title']) ?></td>
            <td><?php echo htmlspecialchars($row['des']) ?></td>
            <td><?php echo htmlspecialchars($row['cost'])?></td>
            <td><?php echo "<img src=\"".$row['pic']."\" alt=\"画像\" width=100 height=100 ></a><br />"?></td>;
                
					</tr>
                <?php endforeach; ?>
            </tbody>           
        </table>
       
	<?php else: ?>
		<p class="alert alert-danger">検索対象は見つかりませんでした。</p>
	<?php endif; ?>
    <a href = "#search">目次へ</a>/
    <a href = "#edit">データを編集</a>/
    <a href = "#delete">データの削除</a>/
    <a href = "#add">データの追加</a>/
</div>

<h1 class="col-xs-6 col-xs-offset-3" id='edit'>データ編集</h1>
<div class="col-xs-6 col-xs-offset-3 well">

	<?php //②検索フォーム ?>
	<form method="get">
		<div class="form-group">
			<label for="InputEtitle">編集したい商品名</label>
			<input name="etitle" class="form-control" id="InputEtitle" value="<?php echo isset($_GET['etitle']) ? htmlspecialchars($_GET['title']) : '' ?>">
        </div>
        <div class="form-group">
			<label for="InputEdes">修正後の商品説明</label>
			<input name="edes" class="form-control" id="InputEdes" value="<?php echo isset($_GET['edes']) ? htmlspecialchars($_GET['edes']) : '' ?>">
        </div>
		
		<button type="submit" class="btn btn-default" name="search">編集</button>
    </form>
    
</div>

<div class ="col-xs-6 col-xs-offset-3">
    <p><?php echo $_GET['etitle']?>を編集しました。</p>
</div>

<h1 class="col-xs-6 col-xs-offset-3" id='delete'>データ削除</h1>
<div class="col-xs-6 col-xs-offset-3 well">

	<?php //②検索フォーム ?>
	<form method="get">
		<div class="form-group">
			<label for="InputDeltitle">削除する商品名</label>
			<input name="deltitle" class="form-control" id="InputDeltitle" value="<?php echo isset($_GET['deltitle']) ? htmlspecialchars($_GET['deltitle']) : '' ?>">
    </div>
		
		<button type="submit" class="btn btn-default" name="search">削除</button>
    </form>
    
</div>

<div class ="col-xs-6 col-xs-offset-3">
    <p><?php echo $_GET['deltitle']?>を削除しました。</p>
</div>


<h1 class="col-xs-6 col-xs-offset-3" id='add'>データ追加</h1>
<div class="col-xs-6 col-xs-offset-3 well">

	<?php //②検索フォーム ?>
	<form method="get">
		<div class="form-group">
			<label for="InputInstitle">商品名</label>
			<input name="institle" class="form-control" id="InputInstitle" value="<?php echo isset($_GET['institle']) ? htmlspecialchars($_GET['institle']) : '' ?>">
        </div>
        <div class="form-group">
			<label for="InputInsdes">商品説明</label>
			<input name="insdes" class="form-control" id="InputInsdes" value="<?php echo isset($_GET['insdes']) ? htmlspecialchars($_GET['insdes']) : '' ?>">
        </div>
        <div class="form-group">
			<label for="InputInscost">値段</label>
			<input name="inscost" class="form-control" id="InputInscost" value="<?php echo isset($_GET['inscost']) ? htmlspecialchars($_GET['inscost']) : '' ?>">
        </div>
        <div class="form-group">
			<label for="InputInspic">商品画像のURL</label>
			<input name="inspic" class="form-control" id="InputInspic" value="<?php echo isset($_GET['inspic']) ? htmlspecialchars($_GET['inspic']) : '' ?>">
        </div>
		<button type="submit" class="btn btn-default" name="search">追加</button>
    </form>
    
</div>

<div class ="col-xs-6 col-xs-offset-3">
    <p><?php echo $_GET['institle']?>を追加しました。</p>
</div>

</html>