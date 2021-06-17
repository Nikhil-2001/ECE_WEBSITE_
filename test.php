
<?php

//The original plaintext password.
$password = 'kali';
//$entered_pass='kali';
$tocheck='$2y$10$V7TprCeHXEGpEDb4yINBr.IaYoC0w6rCEQrFHJ9f7NK9LCMwxjnru';
//Hash it with BCRYPT.
$passwordHashed = password_hash($password, PASSWORD_BCRYPT);

//Print it out.
echo $passwordHashed."<br>";
//$tocheck=password_hash($entered_pass, PASSWORD_BCRYPT);
//echo $tocheck;
$validPassword = password_verify($password, $tocheck);
    if($validPassword){
        echo("All is good. Log the user in.");
    }
?>
