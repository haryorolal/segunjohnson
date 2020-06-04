<?php
	

if((isset($_POST['Fullname']) && !empty($_POST['Fullname']))
&& (isset($_POST['Email']) && !empty($_POST['Email']))
&& (isset($_POST['Phone']) && !empty($_POST['Phone']))){
	$Fullname = $_POST['Fullname'];
	$Email = $_POST['Email'];
	$Phone = $_POST['Phone'];
	$Comment = $_POST['Comment'];
	
	$to = 'haryorolal2@gmail.com';
	$headers = "From: $Fullname\n Email: $Email\n Comment:\n $Comment";
    
	
	if( mail($to, $Phone, $Comment, $headers)){
		echo "E-Mail Sent successfully, we will get back to you soon.";
		header("location:https://www.sjagroupng.com/contact_us.php")
	}
	
}
?>




<?php
    //conection to database
    
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'myDB');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
$query = "INSERT INTO `contact` (Fullname, Email, Phone, Comment) VALUES ('$Fullname', '$Email', '$Phone', '$Comment')";
$result = mysqli_query($connection, $query);
?>