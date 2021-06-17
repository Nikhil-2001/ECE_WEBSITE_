<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function destroy()
{
  session_start();

  unset($_SESSION["uname"]);
  alert("Logged out as ".$_SESSION["uname"]);
  echo "<script>alert(logged out )</script>";
  session_unset();

  // destroy the session
  session_destroy();
  header("Location:index.php");
}

destroy();
?>
