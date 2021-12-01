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

                    $query = "SELECT * FROM ad_guest_list WHERE guestId='$id' ";
                    $query_run = mysqli_query($connection, $query);

                    foreach ($query_run as $row) {
                ?>

                        <form action="code.php" method="POST">

                            <div class="modal-body">

                                <div class="form-group">
                                    <label> GuestID </label>
                                    <h5><?php echo $row['guestId']; ?></h5>
                                    <input type="hidden" name="edit_id" class="form-control" value="<?php echo $row['guestId']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> Guest Name </label>
                                    <input type="text" name="guestName" class="form-control" placeholder="Enter Full Name" value="<?php echo $row['guestName']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="email" name="guestEmail" class="form-control checking_email" placeholder="Enter Email" value="<?php echo $row['guestEmail']; ?>">
                                    <small class="error_email" style="color: red;"></small>
                                </div>
                                <div class="form-group">
                                    <label> Contact </label>
                                    <input type="text" name="guestContact" class="form-control" placeholder="Enter Contact No." value="<?php echo $row['guestContact']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> How Many Adults? </label>
                                    <input type="number" name="noOfAdults" class="form-control" placeholder="No of Adults" value="<?php echo $row['noOfAdults']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> How Many Childrens? </label>
                                    <input type="number" name="noOfChildren" class="form-control" placeholder="No of Childrens" value="<?php echo $row['noOfChildren']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> Check-In Date </label>
                                    <input type="date" id="checkin" name="checkIn" class="form-control" placeholder="No of Childrens" value="<?php echo $row['checkIn']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> Check-Out Date </label>
                                    <input type="date" id="checkout" name="checkOut" class="form-control" placeholder="No of Childrens" value="<?php echo $row['checkOut']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="roomCategory">Room Category</label>
                                    <select name="roomCategory" class="form-control">
                                        <option selected><?php echo $row['roomCategory']; ?></option>
                                        <option>Single</option>
                                        <option>Double</option>
                                        <option>Triple</option>
                                        <option>Quad</option>
                                        <option>Studio</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="guests.php" type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cancel</a>
                                <button type="submit" name="updateGuest" class="btn btn-primary">Update</button>
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