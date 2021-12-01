<?php
session_start();
include('inc/header.php');
include('database/dbconfig.php');
?>

<body class="bg-gradient-primary">


  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                    <?php
                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['status'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
                      unset($_SESSION['status']);
                    }
                    ?>
                  </div>
                  <form class="user" action="code.php" method="POST">

                    <div class="form-group">
                      <input type="email" name="emaill" class="form-control form-control-user" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="passwordd" class="form-control form-control-user" placeholder="Password">
                    </div>

                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include('inc/scripts.php');

  ?>
</body>

</html>