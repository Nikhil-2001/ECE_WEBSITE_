<?php
if(isset($_POST['update'])){
#$roll_no = $_POST['roll_no'];
#$phno = $_POST['phno'];
#$return_date = $_POST['date'];
#$comp_name = $_POST['comps'];
#$no = $_POST['count'];// Storing Selected Value In Variable
include 'db_connection.php';
$conn = OpenCon();
echo "<br>";
echo "Connected to database Successfully"."<br>";
  // Displaying Selected Value
  $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
  $phno = mysqli_real_escape_string($conn, $_POST['phno']);
  $return_date = mysqli_real_escape_string($conn, $_POST['date']);
  $comp_name = mysqli_real_escape_string($conn, $_POST['comps']);
  $no = mysqli_real_escape_string($conn, $_POST['count']);// Attempt insert query execution
  if ($no==0) {
    $no=1;// code...
  }
  $sql = "INSERT INTO data (roll_no, comp_name, no, phno, return_date) VALUES ('$roll_no', '$comp_name', '$no', '$phno', '$return_date')";
  if(mysqli_query($conn, $sql)){
      echo "Records added successfully.";
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }


}
$conn -> close();
#CloseCon($conn);
?>
