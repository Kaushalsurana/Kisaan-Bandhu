<?php
include ('fsession.php');
ini_set('memory_limit', '-1');

if(!isset($_SESSION['farmer_login_user'])){
header("location: ../index.php");} // Redirecting To Home Page
$query4 = "SELECT * from farmerlogin where email='$user_check'";
              $ses_sq4 = mysqli_query($conn, $query4);
              $row4 = mysqli_fetch_assoc($ses_sq4);
              $para1 = $row4['farmer_id'];
              $para2 = $row4['farmer_name'];
			  
?>

<!DOCTYPE html>
<html>
<?php include ('fheader.php');  ?>

  <body class="bg-white" id="top">
  
<?php include ('fnav.php');  ?>

 
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
				<form role="form" action="#" method="post" >  
				  <div class="card-header">
				  <span class=" text-info display-4" > Yield Prediction  </span>	
				  
				  </div>

				  <div class="card-body text-dark">
					 
				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">

    <thead>
					<tr class="font-weight-bold text-default">
					<th><center> State</center></th>
					<th><center>District</center></th>
					<th><center>Season</center></th>
					<th><center>Crop</center></th>
					<th><center>Area</center></th>
					<th><center>Prediction</center></th>
					
					
        </tr>
    </thead>
 <tbody>
                                 <tr class="text-center">

                                   <td>
                                    	<div class="form-group">
										<select  name="state" class="form-control" required>
										<option value="Karnataka">Karnataka</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
											<option value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam">Assam</option>
											<option value="Bihar">Bihar</option>
											<option value="Chhattisgarh">Chhattisgarh</option>
											<option value="Goa">Goa</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Haryana">Haryana</option>
											<option value="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand">Jharkhand</option>
											<option value="Kerala">Kerala</option>
											<option value="Madhya Pradesh">Madhya Pradesh</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Manipur">Manipur</option>
											<option value="Meghalaya">Meghalaya</option>
											<option value="Mizoram">Mizoram</option>
											<option value="Nagaland">Nagaland</option>
											<option value="Odisha">Odisha</option>
											<option value="Punjab">Punjab</option>
											<option value="Rajasthan">Rajasthan</option>
											<option value="Sikkim">Sikkim</option>
											<option value="Tamil Nadu">Tamil Nadu</option>
											<option value="Telangana">Telangana</option>
											<option value="Tripura">Tripura</option>
											<option value="Uttarakhand">Uttarakhand</option>
											<option value="Uttar Pradesh">Uttar Pradesh</option>
											<option value="West Bengal">West Bengal</option>
											<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
											<option value="Chandigarh">Chandigarh</option>
											<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
											<option value="Daman and Diu">Daman and Diu</option>
											<option value="Delhi">Delhi</option>
											<option value="Lakshadweep">Lakshadweep</option>
											<option value="Puducherry">Puducherry</option>
											
										</select>
																				
										</div>
                                    </td>

									<td>
										<div class="form-group ">
										<select id="district" name="district" class="form-control" required>
										  <option value="">Select a district</option>
										  <option value="BAGALKOT">Bagalkot</option>
										  <option value="BANGALORE_RURAL">Bangalore Rural</option>
										  <option value="BELGAUM">Belgaum</option>
										  <option value="BELLARY">Bellary</option>
										  <option value="BENGALURU_URBAN">Bengaluru Urban</option>
										  <option value="BIDAR">Bidar</option>
										  <option value="BIJAPUR">Bijapur</option>
										  <option value="CHAMARAJANAGAR">Chamarajanagar</option>
										  <option value="CHIKBALLAPUR">Chikballapur</option>
										  <option value="CHIKMAGALUR">Chikmagalur</option>
										  <option value="CHITRADURGA">Chitradurga</option>
										  <option value="DAKSHIN_KANNAD">Dakshin Kannad</option>
										  <option value="DAVANGERE">Davangere</option>
										  <option value="DHARWAD">Dharwad</option>
										  <option value="GADAG">Gadag</option>
										  <option value="GULBARGA">Gulbarga</option>
										  <option value="HAVERI">Haveri</option>
										  <option value="HASSAN">Hassan</option>
										  <option value="KODAGU">Kodagu</option>
										  <option value="KOLAR">Kolar</option>
										  <option value="KOPPAL">Koppal</option>
										  <option value="MANDYA">Mandya</option>
										  <option value="MYSORE">Mysore</option>
										  <option value="RAMANAGARA">Ramanagara</option>
										  <option value="RAICHUR">Raichur</option>
										  <option value="SHIMOGA">Shimoga</option>
										  <option value="TUMKUR">Tumkur</option>
										  <option value="UDUPI">Udupi</option>
										  <option value="UTTAR_KANNAD">Uttar Kannad</option>
										  <option value="YADGIR">Yadgir</option>
										</select>

										</div>
                                    </td>
									
									<td>
										<div class="form-group ">
									
													<select name="Season" class="form-control" id="season" required>
													<option value="">Select Season ...</option>
													<option name="Kharif" value="Kharif">Kharif</option>
													<option name="Rabi" value="Rabi">Rabi</option>
													<option name="Summer" value="Summer">Summer</option>
													<option name="WholeYear" value="WholeYear">Whole Year</option>
											
													</select>
										</div>

									</td>
									
									<td>
                                    	<div class="form-group" >
										<select id="crop" class="form-control" name="crops" required>
									  <option value="">Select crop</option>
									</select>
											
										</div>
                                    </td>
									<script> 
document.getElementById("season").addEventListener("change", function() {  
 
const districtDropdown = document.getElementById('district');
const seasonDropdown = document.getElementById('season');
const cropDropdown = document.getElementById('crop');

 console.log(districtDropdown);
   console.log(seasonDropdown);
  console.log(cropDropdown);
  
  const selectedDistrict = districtDropdown.value;
  const selectedSeason = seasonDropdown.value;

  // Clear the current crop options
  cropDropdown.innerHTML = '<option value="">Select crop</option>';
  
  // If both district and season are selected, add the corresponding crop options to the dropdown
if (selectedDistrict && selectedSeason) {
  const options = cropOptions[selectedDistrict][selectedSeason];
  for (const option of options) {
    const optionElement = document.createElement('option');
    optionElement.value = option; // Set the value to the option text
    optionElement.text = option;
    cropDropdown.appendChild(optionElement);
  }
}
  
}); 
</script>  
									<td>
                                    	<div class="form-group">
											<input type = "number" step=0.01 name="area" placeholder="Area in Hectares" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    <center>
										<div class="form-group ">
											<button type="submit" value="Yield" name="Yield_Predict" class="btn btn-success btn-submit">Predict</button>
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
				  <span class=" text-success display-4" > Result  </span>					
				  </div>

					<h4>
					<?php 
					
					
					if(isset($_POST['Yield_Predict'])){

					$state=trim($_POST['state']);
					$district=trim($_POST['district']);
					$season=trim($_POST['Season']);
					$crops=trim($_POST['crops']);
					$area=trim($_POST['area']);


					echo "Predicted crop yield (in Quintal) is: ";

					$Jstate=json_encode($state);
					$Jdistrict=json_encode($district);
					$Jseason=json_encode($season);
					$Jcrops=json_encode($crops);
					$Jarea=json_encode($area);

					$command = escapeshellcmd("python ML/yield_prediction/yield_prediction.py $Jstate $Jdistrict $Jseason $Jcrops $Jarea ");
                    $output = passthru($command);
					echo $output;	
					
					}

                    ?>
					</h4>
            </div>
 
	
	
            </div>
          </div>  
       </div>
		 
</section>

    <?php require("footer.php");?>

</body>
</html>

