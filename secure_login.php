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

if(isset($_POST['submit1'])){
$uname = test_input($_POST['uname']);
$passwd= test_input($_POST['psw']);  // Storing Selected Value In Variable    $pass = md5( $pass );
date_default_timezone_set('Asia/Calcutta');

include 'db_connection.php';
$db = OpenCon();

    // Default values
    $total_failed_login = 3;
    $lockout_time       = 1;
    $account_locked     = false;

    // Check the database (Check user information)
    if ($data = $db->prepare('SELECT failed_login_count,locked_out_timestamp FROM auth WHERE uname = (?) LIMIT 1;')) {
      $data->bind_param('s',$uname);
      $data->execute();
      //$row = $data->fetch();
      $result = $data->get_result();
      $row = $result->fetch_array(MYSQLI_ASSOC);
      // code...
    }
    else {
    $error = $db->errno . ' ' . $db->error;
    echo $error; // 1054 Unknown column 'foo' in 'field list'
}

    // Check to see if the user has been locked out.
  //  echo("Failed login count : ".$row['failed_login_count']."<br>");
    if( $row[ 'failed_login_count' ] >= $total_failed_login )  {
        // User locked out.  Note, using this method would allow for user enumeration!
        echo("This account has been locked due to too many incorrect logins.");

        // Calculate when the user would be allowed to login again
        $last_login = strtotime( $row[ 'locked_out_timestamp' ] );
        $timeout    = $last_login + ($lockout_time * 60);
        $timenow    = time();


        echo("The last login was: " . date ("h:i:s", $last_login) . "<br>");
        echo("The timenow is: " . date ("h:i:s", $timenow) . "<br>");
        echo("The timeout is: " . date ("h:i:s", $timeout) . "<br>");


        // Check to see if enough time has passed, if it hasn't locked the account
        if( $timenow < $timeout ) {
            $account_locked = true;
             print "The account is locked <br>";
        }
    }

    // Check the database (if username matches the password)
    if ($data = $db->prepare('SELECT * FROM auth WHERE uname = (?) LIMIT 1;')) {
      $data->bind_param('s',$uname);
      $data->execute();
      $result = $data->get_result();
      $row = $result->fetch_array(MYSQLI_ASSOC);
      // code...
    }
    else {
    $error = $db->errno . ' ' . $db->error;
    echo $error; // 1054 Unknown column 'foo' in 'field list'
}
    // $data = $db->prepare( 'SELECT * FROM auth WHERE uname = (?) LIMIT 1;' );
    // $data->bind_param('s', $uname);
    // //$data->bindParam( ':password', $pass, PDO::PARAM_STR );
    // $data->execute();

    $tocheck=$row['passwd'];
    //echo "Password : ".$row['passwd'];
    $validPassword = password_verify($passwd, $tocheck);
    //echo($validPassword);
    //echo($account_locked);
    // If its a valid login...
    if(( $account_locked == false ) && $validPassword) {
        // Get users details
        //$avatar       = $row[ 'avatar' ];
        $failed_login = $row[ 'failed_login_count' ];
        $last_login   = $row[ 'locked_out_timestamp' ];

        // Login successful
        echo "<p>Welcome to the password protected area <em>{$uname}</em></p>";
        //echo "<img src=\"{$avatar}\" />";

        // Had the account been locked out since last login?
        if( $failed_login >= $total_failed_login ) {
            echo "<p><em>Warning</em>: Someone might of been brute forcing your account.</p>";
            echo "<p>Number of login attempts: <em>{$failed_login}</em>.<br />Last login attempt was at: <em>${last_login}</em>.</p>";
        }

        // Reset bad login count
        $data = $db->prepare( 'UPDATE auth SET failed_login_count = "0" WHERE uname = (?) LIMIT 1;' );
        $data->bind_param( 's', $uname);
        $data->execute();
    }
    else {
        // Login failed
        //sleep( rand( 2, 4 ) );

        // Give the user some feedback
        echo "<pre><br />Username and/or password incorrect.<br /><br/>Alternative, the account has been locked because of too many failed logins.<br />If this is the case, <em>please try again in {$lockout_time} minutes</em>.</pre>";

        // Update bad login count
        $data = $db->prepare( 'UPDATE auth SET failed_login_count = (failed_login_count + 1) WHERE uname = (?) LIMIT 1;' );
        $data->bind_param( 's', $uname);
        $data->execute();
    }

    // Set the last login time
    $data = $db->prepare( 'UPDATE auth SET locked_out_timestamp = now() WHERE uname = (?) LIMIT 1;' );
    $data->bind_param( 's', $uname);
    $data->execute();
}

// Generate Anti-CSRF token


?>
