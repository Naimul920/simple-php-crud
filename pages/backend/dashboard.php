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
                        Crud Form-1
                    </div>
                    <div class="card-body">
                        <h3 class="text-danger text-center"> <?php echo isset($message) ? $message:'';?> </h3>
                        <form action="action.php" method="post">
                            <div class="row mb-3">
                                <label class="col-md-3 ">Full Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="full_name" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 ">Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 ">Mobile</label>
                                <div class="col-md-9">
                                    <input type="number" name="mobile" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 ">Message</label>
                                <div class="col-md-9">
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <label class="col-md-3 "></label>
                                <div class="col-md-9">
                                    <input type="submit" name="btn" class="btn btn-success px-5" value="Submit">
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
