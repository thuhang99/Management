<?php 
$connect=mysqli_connect('localhost','root','','db_management');

if(!$connect){
	echo "Khong the ket noi!";
} else {
	mysqli_set_charset($connect, 'utf8');
}
 ?>
