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
                        Manage Message info
                    </div>
                    <div class="card-body">
                        <h3 class="text-danger text-center"> <?php echo isset($message) ? $message:'';?> </h3>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Full Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($students as $student) { ?>
                            <tr>
                                <td><?php echo $student['id']; ?></td>
                                <td><?php echo $student['full_name']; ?></td>
                                <td><?php echo $student['mobile']; ?></td>
                                <td><?php echo $student['email']; ?></td>
                                <td><?php echo $student['message']; ?></td>
                                <td class="">
                                    <a href="action.php?status=edit&id=<?php echo $student['id']; ?>" class="btn bg-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="" class="btn bg-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'pages/backend/includes/footer.php'?>
