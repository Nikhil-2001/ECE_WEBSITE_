<?php
    //echo '<script type="text/javascript">alert("'.$msg.'");</script>';
    function alert($msg) { ?>

      <script type="text/javascript">
alert("<?php echo preg_replace("/\r?\n/", "\\n", addslashes($msg)); ?>");
</script>

        <?php   die(); }

if(isset($_POST['search1'])){
$rollno = $_POST['rollno'];  // Storing Selected Value In Variable
#alert("You have entered :" .$rollno);
include 'db_connection.php';
$conn = OpenCon();
#echo "<br>";
#alert("Connected to database Successfully"."<br>");

$sql = "SELECT comp_name,no FROM data WHERE roll_no='".$_POST['rollno']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

        $data="component          count\n";
        #alert("".$data);
    while($row = $result->fetch_assoc()) { $data=$data.$row["comp_name"]."          ".$row["no"]."\n"; }
      alert($data);
      alert("Successfully");
}

else
 {alert("Data not found in the records");}


}
$conn -> close();
?>
