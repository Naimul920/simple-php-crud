<?php include 'pages/backend/includes/header.php'?>
<?php if (!isset($_SESSION['id']))
{
    header('Location:action.php?page=home');
}
?>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            Edit Product
                        </div>
                        <div class="card-body">
                            <h4 class="text-center text-danger"><?php echo isset($message) ? $message: '' ; ?></h4>
                            <form action="action.php" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-md-3 ">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" required value="<?php echo $name ?>">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 ">Product Price</label>
                                    <div class="col-md-9">
                                        <input type="number" name="price" class="form-control" required value="<?php echo $price?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 ">Stock Amount</label>
                                    <div class="col-md-9">
                                        <input type="number" name="stock" class="form-control" required value="<?php echo $stock ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 ">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" required ><?php echo $description?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 ">Product Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control" value="<?php echo $image?>">
                                        <img src="<?php echo $productInfo['image']?>" height="80" width="80">
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <label class="col-md-3 "></label>
                                    <div class="col-md-9">
                                        <input type="submit" name="btn" class="btn btn-success px-5" value="Update Product">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include 'pages/backend/includes/footer.php'?>