<?php 

$conn = mysqli_connect("localhost", 'root', '', 'spms'); 
if (mysqli_connect_errno($conn)) {
	echo "connection failed :(" . mysqli_connect_errno($conn);
}
