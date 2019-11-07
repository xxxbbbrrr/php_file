<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new PDO($dsn,"root","");
$id=$_GET['id'];

if(!empty($_GET['do'])){
    if($_GET['do']=="true"){
        $sql="select * from files where id='$id'";
        $origin=$pdo->query($sql)->fetch();
        $origin_file=$origin['path'];
        unlink($origin_file);

        $sql="delete from files where id='$id'";
        $pdo->exec($sql);
        header("location:manage.php");   
    }else{
        header("location:manage.php");
    }
}
?>

你是否確認刪除檔案？
<a href="?do=true&id=<?=$id;?>">確認刪除</a>====
<a href="?do=false&id=<?=$id;?>">取消</a>