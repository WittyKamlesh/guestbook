<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "guestbook");

    //for admin data
    if (isset($_POST['registerbtn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['confirmpassword'];

        if ($password === $cpassword) {
            $encPass = md5($password);
            $query = "INSERT INTO ad_admin_user (userName,userEmail,userPass) VALUES ('$username','$email','$encPass')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            } else {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
        } else {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
        }
    }
    if (isset($_POST['updatebtn'])) {
        
        $id = $_POST['edit_id'];
        $username = $_POST['edit_username'];
        $email = $_POST['edit_email'];
        $password = $_POST['edit_password'];
        $encPass = md5($password);

        $query = "UPDATE ad_admin_user SET userName='$username', userEmail='$email', userPass='$encPass' WHERE userId='$id' ";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['status'] = "Your Data is Updated";
            $_SESSION['status_code'] = "success";
            header('Location: register.php');
        } else {
            $_SESSION['status'] = "Your Data is NOT Updated";
            $_SESSION['status_code'] = "error";
            header('Location: register.php');
        }
    }
    if(isset($_POST['delete_btn']))
    {
        $id = $_POST['delete_id'];
        $query = "UPDATE ad_admin_user SET status='0' WHERE userId='$id' ";
        //In case completely delete use $query = "DELETE FROM ad_admin_user WHERE userId='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['status'] = "Your Data is Deleted";
            $_SESSION['status_code'] = "success";
            header('Location: register.php'); 
        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT DELETED";       
            $_SESSION['status_code'] = "error";
            header('Location: register.php'); 
        }    
    }



    //login
    if(isset($_POST['login_btn']))
    {
        $email_login = $_POST['emaill']; 
        $password_login = $_POST['passwordd'];
        $supPass = md5($password_login); 

        $query = "SELECT * FROM ad_admin_user WHERE userEmail='$email_login' AND userPass='$supPass' LIMIT 1";
        $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
            $_SESSION['username'] = $email_login;
            header('Location: index.php');
    } 
    else
    {
            $_SESSION['status'] = "Email / Password is Invalid";
            header('Location: login.php');
    }
        
    }
    if(isset($_POST['logout_btn']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header('Location: login.php');
    }





    //for Guest data
    if (isset($_POST['addGuestButton'])) {
        $guestName = $_POST['guestName'];
        $guestEmail = $_POST['guestEmail'];
        $guestContact = $_POST['guestContact'];
        $noOfAdults = $_POST['noOfAdults'];
        $noOfChildren = $_POST['noOfChildren'];
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];
        $roomCategory = $_POST['roomCategory'];

        $query = "INSERT INTO ad_guest_list (guestName,guestEmail,guestContact,noOfAdults,noOfChildren,checkIn,checkOut,roomCategory) VALUES ('$guestName','$guestEmail','$guestContact','$noOfAdults','$noOfChildren','$checkIn','$checkOut','$roomCategory')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "Guest Information Added";
                $_SESSION['status_code'] = "success";
                header('Location: guests.php');
        } else {
                $_SESSION['status'] = "Guest Information Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: guests.php');
            }
    }
    if (isset($_POST['updateGuest'])) {
        
        $id = $_POST['edit_id'];
        $guestName = $_POST['guestName'];
        $guestEmail = $_POST['guestEmail'];
        $guestContact = $_POST['guestContact'];
        $noOfAdults = $_POST['noOfAdults'];
        $noOfChildren = $_POST['noOfChildren'];
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];
        $roomCategory = $_POST['roomCategory'];
        $query = "UPDATE ad_guest_list SET guestName='$guestName', guestEmail='$guestEmail', guestContact='$guestContact', noOfAdults='$noOfAdults', noOfChildren='$noOfChildren', checkIn='$checkIn', checkOut='$checkOut', roomCategory='$roomCategory' WHERE guestId='$id' ";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['status'] = "Guest Information is Updated";
            $_SESSION['status_code'] = "success";
            header('Location: guests.php');
        } else {
            $_SESSION['status'] = "Guest Information is NOT Updated";
            $_SESSION['status_code'] = "error";
            header('Location: guests.php');
        }
    }
    if(isset($_POST['deleteGuest']))
    {
        $id = $_POST['delete_id'];
        $query = "UPDATE ad_guest_list SET status='0' WHERE guestId='$id' ";
        //In case completely delete use $query = "DELETE FROM ad_guest_list WHERE guestId='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['status'] = "Guest Information is Deleted";
            $_SESSION['status_code'] = "success";
            header('Location: guests.php'); 
        }
        else
        {
            $_SESSION['status'] = "Guest Information is NOT DELETED";       
            $_SESSION['status_code'] = "error";
            header('Location: guests.php'); 
        }    
    }
?>