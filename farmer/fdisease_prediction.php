<?php
include('fsession.php');
ini_set('memory_limit', '-1');

if (!isset($_SESSION['farmer_login_user'])) {
  header("location: ../index.php");
} // Redirecting To Home Page
$query4 = "SELECT * from farmerlogin where email='$user_check'";
$ses_sq4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($ses_sq4);
$para1 = $row4['farmer_id'];
$para2 = $row4['farmer_name'];

?>

<!DOCTYPE html>
<html>
<?php include('fheader.php');  ?>

<body class="bg-white" id="top">

  <?php include('fnav.php');  ?>


  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <!-- ======================================================================================================================================== -->

    <div class="container ">

      <div class="row">
        <div class="col-md-8 mx-auto text-center">
          <span class="badge badge-danger badge-pill mb-3">Prediction</span>
        </div>
      </div>

      <div class="row row-content">
        <div class="col-md-12 mb-3">

          <div class="card text-white bg-gradient-success mb-3">
            <form action="#" method="POST" enctype="multipart/form-data">
              <div class="card-header">
                <span class=" text-info display-4"> Disease Prediction </span>

              </div>

              <div class="card-body text-dark">

                <table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">

                  <thead>
                    <tr class="font-weight-bold text-default">
                      <th>
                        <center> Image</center>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                      <td>
                        <div class="-grouformp">
                          <input type="file" name="image" accept="image/*">

                        </div>
                      </td>

                      <td>
                        <center>
                          <div class="form-group ">
                            <input type="submit" value="Disease" name="Disease_Predict">
                          </div>
                        </center>
                      </td>
                    </tr>
                  </tbody>


                </table>
              </div>
            </form>
          </div>
          <div class="card text-white bg-gradient-success mb-3">
            <div class="card-header">
              <span class=" text-success display-4"> Result </span>
            </div>

            <h4>
              <?php


              // if (isset($_POST['Disease_Predict'])) {
              //     if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
              //         $uploadedFile = $_FILES['image']['tmp_name'];

              //         if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
              //             $command = escapeshellcmd("python ML/disease_prediction/disease_prediction.py $uploadedFile");
              //             $output = passthru($command);
              //             echo $output;
              //         } else {
              //             echo "Failed to upload image.";
              //         }
              //     } else {
              //         echo "No image uploaded or an error occurred during upload.";
              //     }
              // }

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if file was uploaded without errors
                if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                  $uploadDir = 'C:/xampp/htdocs/agriculture-portal-main/farmer/ML/disease_prediction/uploadimage/';
                  $uploadedFile = $uploadDir . basename($_FILES['image']['name']);

                  // Move the uploaded file to the specified folder
                  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
                    $command = escapeshellcmd("python ML/disease_prediction/disease_prediction.py $uploadedFile");
                    $output = passthru($command);
                    $lines = explode("\n", $output);

// Print all lines except the first two
			for ($i = 1; $i < count($lines); $i++) {
    			echo $lines[$i] . PHP_EOL;
}
                  } else {
                    echo "<p>Failed to move the uploaded file.</p>";
                  }
                } else {
                  echo "<p>No image uploaded or an error occurred during upload.</p>";
                }
              }
              ?>
            </h4>
          </div>
        </div>
      </div>
    </div>

  </section>

  <?php require("footer.php"); ?>

</body>

</html>