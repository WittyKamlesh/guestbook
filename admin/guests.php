<?php
include('inc/settings.php');
include('inc/header.php');
include('inc/navbar.php');
?>
<div class="modal fade" id="addguestdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Guest Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Guest Name </label>
                        <input type="text" name="guestName" class="form-control" placeholder="Enter Full Name">
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input type="email" name="guestEmail" class="form-control checking_email" placeholder="Enter Email">
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="form-group">
                        <label> Contact </label>
                        <input type="text" name="guestContact" class="form-control" placeholder="Enter Contact No.">
                    </div>
                    <div class="form-group">
                        <label> How Many Adults? </label>
                        <input type="number" name="noOfAdults" class="form-control" placeholder="No of Adults">
                    </div>
                    <div class="form-group">
                        <label> How Many Childrens? </label>
                        <input type="number" name="noOfChildren" class="form-control" placeholder="No of Childrens">
                    </div>
                    <div class="form-group">
                        <label> Check-In Date </label>
                        <input type="date" name="checkIn" id="checkin" class="form-control" placeholder="No of Childrens">
                    </div>
                    <div class="form-group">
                        <label> Check-Out Date </label>
                        <input type="date" name="checkOut" id="checkout" class="form-control" placeholder="No of Childrens">
                    </div>
                    <div class="form-group">
                        <label for="roomCategory">Room Category</label>
                        <select name="roomCategory" class="form-control">
                            <option selected>Choose...</option>
                            <option>Single</option>
                            <option>Double</option>
                            <option>Triple</option>
                            <option>Quad</option>
                            <option>Studio</option>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addGuestButton" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Guest List</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class=" font-weight-bold text-primary">All Data</h4>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addguestdata">
                Add Guest Data
            </button>
        </div>
        <div class="card-body">
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
            $query = "SELECT * FROM  ad_guest_list WHERE status='1'";
            $query_run = mysqli_query($connection, $query);
            ?>
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email-ID</th>
                            <th>Contact No.</th>
                            <th>Number of Adults</th>
                            <th>Number of Children</th>
                            <th>Check-In Date</th>
                            <th>Check-Out Date</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email-ID</th>
                            <th>Contact No.</th>
                            <th>Number of Adults</th>
                            <th>Number of Children</th>
                            <th>Check-In Date</th>
                            <th>Check-Out Date</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['guestId']; ?></td>
                                    <td><?php echo $row['guestName']; ?></td>
                                    <td><?php echo $row['guestEmail']; ?></td>
                                    <td><?php echo $row['guestContact']; ?></td>
                                    <td><?php echo $row['noOfAdults']; ?></td>
                                    <td><?php echo $row['noOfChildren']; ?></td>
                                    <td><?php echo $row['checkIn']; ?></td>
                                    <td><?php echo $row['checkOut']; ?></td>
                                    <td><?php echo $row['roomCategory']; ?></td>
                                    <td>
                                        <form action="ad-add-edit-guest-list.php" method='post'>
                                            <input type="hidden" name="edit_id" value="<?php echo $row['guestId']; ?>">
                                            <button class="btn btn-warning" name="edit_btn" type="submit">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['guestId']; ?>">
                                            <button type="submit" name="deleteGuest" class="btn btn-danger"> DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<?php
include('inc/scripts.php');
include('inc/footer.php');
?>