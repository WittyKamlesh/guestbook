<?php
include('inc/settings.php');
include('inc/header.php');
include('inc/navbar.php');
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py3">
            <div class="card-body">
                <h2 class="m-10 font-weight-bold text-primary text-uppercase">Edit Admin Profile</h2>
                <hr>
                <?php

                if (isset($_POST['edit_btn'])) {
                    $id = $_POST['edit_id'];

                    $query = "SELECT * FROM ad_admin_user WHERE userId='$id' ";
                    $query_run = mysqli_query($connection, $query);

                    foreach ($query_run as $row) {
                ?>

                        <form action="code.php" method="POST">

                            <div class="modal-body">

                                <div class="form-group">
                                    <label> UserID </label>
                                    <h5><?php echo $row['userId']; ?></h5>
                                    <input type="hidden" name="edit_id" class="form-control" value="<?php echo $row['userId']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> Username </label>
                                    <input type="text" name="edit_username" class="form-control" placeholder="Enter Username" value="<?php echo $row['userName']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="edit_email" class="form-control checking_email" placeholder="Enter Email" value="<?php echo $row['userEmail']; ?>">
                                    <small class="error_email" style="color: red;"></small>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="edit_password" class="form-control" placeholder="Enter Password" value="<?php echo $row['userPass']; ?>">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="register.php" type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cancel</a>
                                <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                <?php
                    }
                }
                ?>
                </button><br><br>
            </div>
        </div>
    </div>
</div>
<?php
include('inc/scripts.php');
include('inc/footer.php');
?>