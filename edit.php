<?php require_once 'inc/connection.php'; ?>
<?php include 'inc/header.php'; ?>
<?php require_once 'App.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">

            <?php
            if ($request->get('id')) {

                $id = $request->get('id');


                $runquery = $conn->prepare("select * from products where id=:id");
                $runquery->bindParam(":id", $id);
                $runquery->execute();

                if ($runquery->rowCount() == 1) {
                    $products = $runquery->fetch(PDO::FETCH_ASSOC);
                }
            } else {
            }


            ?>
            <form action="handlers/edit.php?id=<?php echo $id  ?>" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">  </label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $products['name']  ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label"> </label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $products['price'] ; ?>" >
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"> </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"> <?php echo  $products['body'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label"> </label>
                    <input class="form-control" type="file" id="formFile" name="image" value="<?php echo $products['image'] ?>">
                </div>

                <div class="col-lg-3">
                    <img src="images/<?php echo $products['image'] ?>" class="card-img-top">
                </div>

                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>