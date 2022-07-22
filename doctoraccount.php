<?php
  session_start();
  if(!isset($_SESSION['doctorid'])){
    echo "<script>window.location='doctorlogin.php';</script>";
  }
  include("headers.php");
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Doctor Account</li>
    </ul>
  </div>
</div>

<div class="wrapper col4">
  <div id="container">
    <?php
      $a1 = "SELECT `doctorname` FROM doctor WHERE doctorid='$_SESSION[doctorid]'";
      $a2 = mysqli_query($con,$a1);
      $a3 = mysqli_fetch_array($a2);
    ?>
    <h1>Welcome <b><?php echo $a3['doctorname']; ?></b>, </h1>
    <h1>Number of Appointment Records : 
      <?php
        $sql = "SELECT * FROM appointment WHERE doctorid='$_SESSION[doctorid]'";
        $qsql = mysqli_query($con,$sql);
        echo mysqli_num_rows($qsql);
      ?>
    </h1>
    <h1>Number of Patient Records : 
      <?php
        $sql = "SELECT DISTINCT patientid FROM appointment WHERE (status='Approved' AND doctorid='$_SESSION[doctorid]')";
        $qsql = mysqli_query($con,$sql);
        echo mysqli_num_rows($qsql);
      ?>
    </h1>
  </div>
</div>

<div class="clear"></div>

<?php
  include("footers.php");
?>