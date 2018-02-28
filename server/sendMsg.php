<?php

//

if(!empty($vCode) || !empty($cellNo) || !empty($_SESSION['pswd'])){

    $username = $password = $message = $numbers = "";

    $url = "https://www.winsms.co.za/api/batchmessage.asp?";

    $userp = "user=";

    $passwordp = "&password=";

    $messagep = "&message=";

    $numbersp = "&Numbers=";

    $username = "qinisozwane11@gmail.com";
    $password = "Mangethe91";
    $message = "Activation code : ".$vCode."\n\nLogin Details:\nUsername : ".$cellNo."\nPassword : ".$_SESSION['pswd']."\n-----------------------------\nFrom Commercial Club.";
    $numbers = $cellNo;

    $encmessage = urlencode(utf8_encode($message));

    $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;

    $fp = fopen($all, 'r');
    while(!feof($fp)){
    $line = fgets($fp, 4000);
    echo "<br>";
    echo "Responce";
    echo "<br>";
    print($line);
    echo "<br>";
    }
    fclose($fp);
}
?>