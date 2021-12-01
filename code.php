<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "guestbook");
    if (isset($_POST['addGuestButtonUser'])) {
        $guestName = $_POST['guestName'];
        $guestEmail = $_POST['guestEmail'];
        $guestContact = $_POST['guestContact'];
        $noOfAdults = $_POST['noOfAdults'];
        $noOfChildren = $_POST['noOfChildren'];
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];
        $roomCategory = $_POST['roomCategory'];
        $parent = dirname($_SERVER['REQUEST_URI']);

        $query = "INSERT INTO ad_guest_list (guestName,guestEmail,guestContact,noOfAdults,noOfChildren,checkIn,checkOut,roomCategory) VALUES ('$guestName','$guestEmail','$guestContact','$noOfAdults','$noOfChildren','$checkIn','$checkOut','$roomCategory')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "Guest Information Added";
                $_SESSION['status_code'] = "success";
                header('Location: index.php');
        } else {
                $_SESSION['status'] = "Guest Information Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: index.php');
            }
    }
?>