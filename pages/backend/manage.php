<?php include 'pages/backend/includes/header.php'?>
<?php if (!isset($_SESSION['id']))
{
    header('Location:action.php?page=home');
}
?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card ">
                    <label class="card-header">
                        Manage Product
                    </label>
                    <div class="card-body">
                        <h4 class="text-center text-success">
                            <?php
                            if (isset($_SESSION['message']))
                            {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>
                        </h4>
                        <table class="table table-bordered">
                            <thead class="">
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Stock Amount</th>
                            <th>Product Description</th>
                            <th>Product Image</th>
                            <th>Action</th>
                            </thead>
                            <?php foreach ($products as $product) { extract($product) ?>
                            <tbody>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $stock; ?></td>
                            <td><?php echo $description; ?></td>
                            <td>
                                <img src="<?php echo $image; ?>" height="50" width="50" class="text-center" style="border-radius: 100px">
                            </td>
                            <td>
                                <a href="action.php?page=edit&id=<?php echo $id;?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <a href="action.php?page=delete&id=<?php echo $id;?>" onclick="confirm('Are you sure..?')" class="btn btn-sm btn-danger" >
                                   <i class="fa fa-trash"></i>
                                </a>
                            </td>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'pages/backend/includes/footer.php'?>
