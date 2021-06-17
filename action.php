<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['comp'];  // Storing Selected Value In Variable
echo "You have selected :" .$selected_val;
include 'db_connection.php';
$conn = OpenCon();
echo "<br>";
echo "Connected to database Successfully"."<br>";
  // Displaying Selected Value
  $sql = "SELECT total FROM list WHERE comp_name='".$_POST['comp']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "Total: " . $row["total"]."<br>";
          $total=$row["total"];
          echo $total."<br>";
        }
      $sql = "SELECT no FROM data WHERE comp_name='".$_POST['comp']."'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              #echo "Borrowed: " . $row["no"]."<br>";
              $remaining=(int)$total-(int)$row["no"];
              echo "Available : ".$remaining."<br>";}
      }
      else{echo"data not found in records";}
  }
  else
   {
      echo "Data not found in the records";
  }

}
$conn -> close();
#CloseCon($conn);
?>
