<?php
require_once '../inc/connection.php';
require_once '../App.php';



if ($request->get('id')) {
  $runquery = $conn->prepare("select * from products where id=:id");
  $runquery->bindParam(":id", $id);
  $runquery->execute();

  $id = $request->get('id');
  $price = $request->post('price');
  $body = $request->post('body');
  $name = $request->post('name');
  $runquery->execute();
  $row = $runquery->fetch(PDO::FETCH_ASSOC);
  $oldimage = $row['image'];  


  $required->check("name", $name);
  $Validation->endValidate("name", $name, ["Required", "Str"]);
  $errors = $Validation->getError();

  $required->check("body", $body);
  $Validation->endValidate("body", $body, ["Required", "Str"]);
  $errors = $Validation->getError();

  $required->check("price", $price);
  $Validation->endValidate("price", $price, ["Required", "Str"]);
  $errors = $Validation->getError();  



 $runquery = $conn->query("UPDATE products SET  `name`='$name' ,  `price`='$price' , `body`='$body' ,   `image`='$oldimage'  WHERE `id`='$id' ") ;

  $runquery->fetch(PDO::FETCH_ASSOC);

  $request->header('../index.php');




}
















