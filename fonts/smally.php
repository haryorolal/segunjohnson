<?php
	
	
	 if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['zip']) && isset($_POST['phone']) && isset($_POST['fax']) && isset($_POST['email']) ){
    if(!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['zip']) && !empty($_POST['phone']) && !empty($_POST['fax']) && !empty($_POST['email'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];
        $fax = $_POST['fax'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Kindly provide valid email";
        }else{
            $body = $name."\n".$email."\n".$phone."\n".$message;
            if(mail('s.johnson@sjagroupng.com', 'Website Response', $body, 'From: response@mywebsite.com'))
            {
             header("location:http://www.sjagroupng.com/contact_us.php");  
            }else{
                echo "There is a problem in sending mail.";
            }
        }
    } else{
        echo "All fields are required.";
    }
}else{
    echo "Not ok";
}

?>




<?php
    //conection to database
    
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'sjagroup_smallDB');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
$query = "INSERT INTO `contsmall` (name, address, zip, phone, fax, email, message) VALUES ('$name', '$address', '$zip', '$phone','$fax', '$email', '$message')";
$result = mysqli_query($connection, $query);
?>