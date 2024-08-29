 <?php
    require_once '../App.php';
    require_once '../inc/connection.php';

    if (!$request->post('submit')) {

        $name = $request->post('name');
        
        $body = $request->post('body');
        $price = $request->post('price');
        $image = $_FILES['image'];
        $imagename = $image['name'];
        $imagetmpname = $image['tmp_name'];
        $size = $image['size'] / (1024 * 1024);
        $ext = strtolower(pathinfo($imagename, PATHINFO_EXTENSION));
        $error = $image['error'];
        $newname = uniqid() . ".$ext";

        $required->check("name", $name);
        $Validation->endValidate("name", $name, ["Required", "Str"]);
        $errors = $Validation->getError();

        $required->check("body", $body);
        $Validation->endValidate("body", $body, ["Required", "Str"]);
        $errors = $Validation->getError();

        $required->check("price", $price);
        $Validation->endValidate("price", $price, ["Required", "Str"]);
        $errors = $Validation->getError();

        $array_ext = ['png', 'jpg', 'jpeg', 'gif'];

        $runquery = $conn->prepare("INSERT INTO products(`name`,`body`,`price`,`image`) VALUES (:name, :body, :price, :image)");
        $runquery->bindParam(':name', $name);
        $runquery->bindParam(':body', $body);
        $runquery->bindParam(':price', $price);
        $runquery->bindParam(':image', $newname);

        if ($runquery->execute()) {

            move_uploaded_file($imagetmpname, "../images/$newname");


            $request->header('../index.php');
        }
    } else {
        $request->header('../index.php');
    }
