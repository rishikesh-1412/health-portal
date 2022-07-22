<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
		if(isset($_GET[editid]))
		{
			$sql ="UPDATE appointment SET patientid='$_POST[select4]',departmentid='$_POST[select5]',appointmentdate='$_POST[appointmentdate]',appointmenttime='$_POST[time]',doctorid='$_POST[select6]',status='$_POST[select]' WHERE appointmentid='$_GET[editid]'";
			if($qsql = mysqli_query($con,$sql))
			{
				echo "<script>alert('appointment record updated successfully...');</script>";
			}
			else
			{
				echo mysqli_error($con);
			}	
		}
		else
		{
			$sql ="INSERT INTO appointment(patientid,departmentid,appointmentdate,appointmenttime,doctorid,status) values('$_POST[select4]','$_POST[select5]','$_POST[appointmentdate]','$_POST[time]','$_POST[select6]','$_POST[select]')";
			if($qsql = mysqli_query($con,$sql))
			{
				echo "<script>alert('Appointment record inserted successfully...');</script>";
			}
			else
			{
				echo mysqli_error($con);
			}
		}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Patient Report Panel</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <p>
    

<!-- Toggle #1 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Patient Profile</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php include("patientdetail.php"); ?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->

<!-- Toggle #2 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Appointment record</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php include("appointmentdetail.php"); ?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->


<!-- Toggle #3 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Treatment record</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php include("treatmentdetail.php"); ?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->

<!-- Toggle #4 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Prescription record</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php
        include("prescriptiondetail.php");
		?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->

<!-- Toggle #5 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Billing Report</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php
        $billappointmentid= $rsappointment[0]; 
		include("viewbilling.php"); ?>
        </p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->


<?php
if(isset($_SESSION[adminid]))
{
?>
    <!-- Toggle #6 -->
    <div class="toggle">
        <!-- Toggle Link -->
        <a href="#" title="Title of Toggle" class="toggle-trigger">Payment Report</a>
        <!-- Toggle Content to display -->
        <div class="toggle-content">
            <p><?php
            $billappointmentid= $rsappointment[0]; 
            include("viewpaymentreport.php"); ?>
                      <?php
                if(!isset($_SESSION[patientid]))
                {
					
	$sqlbilling_records ="SELECT * FROM billing WHERE appointmentid='$billappointmentid'";
	$qsqlbilling_records = mysqli_query($con,$sqlbilling_records);
	$rsbilling_records = mysqli_fetch_array($qsqlbilling_records);
	if($rsbilling_records[discharge_date] == "0000-00-00")
	{
				  ?>  
				  <table width="557" border="3">
			  <tbody>
				<tr>
				  <th scope="col"><div align="center"><a href="paymentdischarge.php?appointmentid=<?php echo $rsappointment[0]; ?>&patientid=<?php echo $_GET[patientid]; ?>">Make Payment</a></div></th>
				</tr>
			  </tbody>
			</table>
			<?php
	}
                }
                ?>
            </p>
        </div><!-- .toggle-content (end) -->
    </div><!-- .toggle (end) -->
<?php
}
?>
    </p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
?>
