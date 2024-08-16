<?php
  require 'checkLogin.php';
  require 'config.php';
  
  $records = $conn->prepare('SELECT * FROM class WHERE id = :class');
  $records->bindParam(':class', $_GET['class']);
  $records->execute();
  $exam = $records->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCA UCC Admin -</title>

    <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <?php
        include("./navBar.php")
        ?>
 
       <div id="wrapper">
 
       <?php
        include("./sideNav.php")
        ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="addAttendanceBatches.php">View Batches</a></li>
            <li class="breadcrumb-item">Edit Attendance</li>
          </ol>
          <!--  Buttons  -->
          
          <div class="box-btn">
          <a class="btn btn-outline-dark btn-bread" href="addAttendanceBatches.php">Back</a>
          </div>
          <!-- DataTables Example -->
          <div class="card mb-3">
                    <div class="card-body">
                        <form method="POST" action="validateEditAttendance.php">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="date" id="date" value="<?php echo $_GET['date']; ?>" class="form-control">
                                        <input type="hidden" name="batch" value="<?php echo $_GET['batch'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php
                                $count = 0;
                                $stmt = $conn->prepare('SELECT * FROM attendance WHERE id = :id AND date = :date');
                                $stmt->bindParam(':id', $_GET['id']);
                                $stmt->bindParam(':date', $_GET['date']);
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<div class="form-group col-6">' . $row['roll'] . '</div>';
                                    echo '<div class="form-group col-2"><input type="hidden" name="roll[' . $count . ']" value="' . $row['roll'] . '">
                                        <select name="absent[' . $count . ']" class="form-control">';
                                    if ($row['absent'] == 0) {
                                        echo '<option value="0">present</option>
                                              <option value="1">absent</option>';
                                    } else {
                                        echo '<option value="1">absent</option>
                                              <option value="0">present</option>';
                                    }
                                    echo '</select>
                                        </div><div class="col-12"><hr></div>';
                                    $count += 1;
                                }
                                ?>
                            </div>
                            <input type="hidden" name="count" value="<?php echo $count; ?>">
                            <input name="submit" type="submit" value="EDIT ATTENDANCE" class="btn btn-outline-dark">
                        </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>MCA UCC Attendance Management</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
