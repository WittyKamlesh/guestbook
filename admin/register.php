<?php
include('inc/settings.php');
include('inc/header.php');
include('inc/navbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
            <small class="error_email" style="color: red;"></small>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- End of Main Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py3">
      <div class="card-body">
        <h2 class="m-10 font-weight-bold text-primary text-uppercase">Admin Profile</h2>
        <hr>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addadminprofile">
          Add Admin Profile
        </button><br><br>


        <?php
        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          unset($_SESSION['success']);
        }
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
          echo '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">' . $_SESSION['status'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          unset($_SESSION['status']);
        }
        $query = "SELECT * FROM  ad_admin_user WHERE status='1'";
        $query_run = mysqli_query($connection, $query);
        ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Password</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
                  <tr>
                    <th scope="row"><?php echo $row['userId']; ?></th>
                    <td><?php echo $row['userName']; ?></td>
                    <td><?php echo $row['userEmail']; ?></td>
                    <td>**********</td>
                    <!-- In case want to show password use <td><?php //also remove this comment echo $row['userPass']; ?></td>--->
                    <td>
                      <form action="ad-add-edit-admin-user.php" method='post'>
                        <input type="hidden" name="edit_id" value="<?php echo $row['userId']; ?>">
                        <button class="btn btn-warning" name="edit_btn" type="submit">EDIT</button>
                    </td>
                    </form>
                    <td>
                      <form action="code.php" method="post">
                        <input type="hidden" name="delete_id" value="<?php echo $row['userId']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                      </form>
                    </td>
                  </tr>
              <?php
                }
              } else {
                echo "No Records Found";
              } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include('inc/scripts.php');
include('inc/footer.php');
?>