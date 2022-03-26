<?php

$errors = [];
$data = [];


// NAME
if (empty($_POST["name"])) {
    $errors['name'] = 'Name is required.';
}

// PHONE
if (empty($_POST["phone"])) {
    $errors['phone'] = 'Phone is required.';
}

// EMAIL
if (empty($_POST["email"])) {
    $errors['email'] = 'Email is required.';
}

 
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);


$EmailTo = "ortalboch@gmail.com";
$Subject = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";

 
// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);
 
// redirect to success page
if ($success && $errors == ""){
    echo "success";
 }else{
     if($errors == ""){
         echo "Something went wrong :(";
     } else {
         echo $errors;
     }
 }
  
 
?>
