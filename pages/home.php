<?php include 'pages/includes/header.php'?>

<section class="py-5 bg-secondary ">
    <div class="container ">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        LOGIN
                    </div>
                    <div class="card-body">
                        <h4 class="text-danger text-center"><?php echo isset($result) ? $result : '';?></h4>
                        <form action="action.php" method="post">
                            <div class="row mb-3">
                                <label class="col-md-3" >Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3" >Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-9">
                                    <input type="submit" name="btn" class="btn btn-success px-5" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'pages/includes/footer.php'?>
