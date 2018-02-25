
<?php
$servername="localhost";$username="root";$password="";$dbName="cc";
$conn= new mysqli($servername,$username,$password,$dbName);
if(!$conn)
{
echo" not connected";	
}else{
//echo"connected";	
}
?>
