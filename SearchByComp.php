<?php
    //echo '<script type="text/javascript">alert("'.$msg.'");</script>';
function alert($msg) { ?> <script type="text/javascript">alert("<?php echo preg_replace("/\r?\n/", "\\n", addslashes($msg)); ?>");
</script><?php   die(); }

if(isset($_POST['search2'])){
$comp = $_POST['comp'];
include 'db_connection.php';
$conn = OpenCon();
$sql = "SELECT * FROM data WHERE comp_name='".$_POST['comp']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
//  $_SESSION['uname'] = "kali";
      if(isset($_SESSION["uname"]))
      {
        $data="Students having ".$comp." are : \n";
        #alert("".$data);
    while($row = $result->fetch_assoc()) { $data=$data.$row["sname"]."          ".$row["roll_no"]."\n"; }
      alert($data);
      alert("Successfully");
      }
      else {
        $sql = "SELECT comp_count FROM comp WHERE comp_name='".$_POST['comp']."'";
        $result1 = $conn->query($sql);
        $row = $result1->fetch_assoc();
        if($row["comp_count"]>0)
        alert("Status : available");
        else {
          alert("Status Unavailable");
        }
      }
header('Location: index.php');
}

else
 {alert("Data not found in the records");
header('Location: index.php');
 }



}
$conn -> close();
?>
