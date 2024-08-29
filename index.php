<?php require_once 'inc/connection.php'; ?>
<?php include 'inc/header.php'; ?>
<?php require_once 'App.php'; ?>



<div class="container my-5">

    <div class="row">

        <?php

        $runquery = $conn->query("select * from products");
        if ($runquery->rowCount() > 0) {
            while ($products = $runquery->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 mb-3">

                    <div class="card">
                        <img src="images/<?php echo $products['image'] ;  ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $products['name'] ;  ?></h5>
                            <p class="text-muted"><?php echo $products['price'] ;  ?></p>
                            <p class="card-text"> <?php echo $products['body'] ;  ?> </p>
                            <a href="show.php?id=<?php echo $products['id'] ; ?>" class="btn btn-primary">Show</a>

                            <a href="edit.php?id=<?php echo $products['id']  ?>" class="btn btn-info">Edit</a>
                            <a href="handlers/delete.php?id=<?php echo $products['id'] ; ?>" class="btn btn-danger">Delete</a>

                        </div>
                    </div>

                </div>



            <?php  }
        } else {  ?>



        <?php }

        ?>




        <div class="col-lg-4 mb-3">



        </div>

        <div class="col-lg-4 mb-3">





        </div>


    </div>

</div>



<?php include 'inc/footer.php'; ?>