<?php   
 require_once '../App.php';
 require_once '../inc/connection.php';

if ($request->get('id')) {
    
$id= $request->get('id') ;

$runquery = $conn->prepare("select * from products where id=:id");
$runquery->bindParam(":id", $id);
$runquery->execute();

if ($runquery->execute() ==1) {
    $runquery = $conn->prepare("delete from products where id=:id");
$runquery->bindParam(":id", $id,pdo::PARAM_STR);
$runquery->execute();
}else {
   
}
if ($runquery->execute()) {

    $request->header('../index.php');

}else {
}



}else {

}