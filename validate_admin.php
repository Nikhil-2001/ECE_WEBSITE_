<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  #$data=mysql_real_escape_string($data);
  return $data;
};
#if ($_SERVER["REQUEST_METHOD"] == "POST")
if(isset($_POST['submit1'])){
$uname = test_input($_POST['uname']);
$passwd= test_input($_POST['psw']);  // Storing Selected Value In Variable
include 'db_connection.php';
$conn = OpenCon();
echo "<br>";
echo "Connected to database Successfully"."<br>";
  // Displaying Selected Value
  if ($uname != "" && $passwd!= ""){

        $sql= "select * from auth where uname='".$uname."' and passwd='".$passwd."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
              if ($row["uname"]==$uname) {
                  $_SESSION['uname'] = $uname;
                if(isset($_SESSION["uname"]))
                {

                    header('Location: admin-home.php');
                // code...
              }
              }
              else {


                header('Location: index.php');
              }
              }
            }
          }
        }
