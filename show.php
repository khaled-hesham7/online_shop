<?php require_once 'inc/connection.php'; ?>
<?php include 'inc/header.php'; ?>
<?php require_once 'App.php'; ?>

<?php     
if ($request->get('id')) {
    $id = $request->get('id') ;
    $runquery = $conn->prepare("select * from products where id=:id");
    $runquery->bindParam(":id", $id);
    $runquery->execute();
    
    if ( $runquery->execute()) {
        $products = $runquery->fetch(PDO::FETCH_ASSOC) ;
        

        }else{

            $request->header('../index.php');
        }

    }else{
$request->header('index.php');
    }
?>


<div class="container my-5">

    <div class="row">


    <div class="col-lg-6">
            <img src="images/<?php echo $products['image'] ;  ?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 > name: <?php echo $products['name'] ;  ?></h5>
            <p class="text-muted"> price: <?php echo $products ['price'] ;  ?> </p>
            <p><?php echo $products['body'] ;  ?></p>
            <a href="index.php" class="btn btn-primary">Back</a>
            <a href="edit.php?id=<?php  echo $products['id'] ; ?>" class="btn btn-info">Edit</a>
            <a href="handlers/delete.php?id=<?php echo $products['id'] ; ?> class="btn btn-danger">Delete</a>
        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>