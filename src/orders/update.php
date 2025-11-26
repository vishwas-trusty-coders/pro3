<?php
session_start();
/** Load Essentials & Database */
require_once(__DIR__ . '/../../config/app.php');
require_once($db_url);


if(!empty($_POST['order_id'])){
    $sql = "update orders set status='completed' where id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s",$_POST['order_id']);
    mysqli_stmt_execute($stmt);
    header("Location: /src/orders/archive.php");
}


//save table sorting in session
if(!empty($_POST['page'])){
    $data=['column'=>$_POST['column_name'],'direction'=>$_POST['direction']];
    $_SESSION[$_POST['page']]=$data;
}

if(!empty($_POST['status'])){
$sql = "update order_items set status='".$_POST['status']."' where id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s",$_POST['id']);
    mysqli_stmt_execute($stmt);
    echo('status updated'.$_POST['id']);
}



if(!empty($_POST['change_process'])){
$sql = "update order_items set progress='".$_POST['val']."' where id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s",$_POST['id']);
    mysqli_stmt_execute($stmt);
    echo('change process');
}

if(!empty($_POST['change_in_stock'])){
$sql = "update order_items set in_stock='".$_POST['val']."' where id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s",$_POST['id']);
    mysqli_stmt_execute($stmt);
    echo('change in stock');
}

?>