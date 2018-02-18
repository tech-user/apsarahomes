<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="refresh" CONTENT="4;URL=contactus.html">
<title>send_mail</title>
</head>

<body>

<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "info@apsaranextgenhomesindiapvtltd.com";
 
    $email_subject = "APSARA PORTAL";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['cell']) ||
		
		!isset($_POST['address']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
 
    }
 
     
 
    $name = $_POST['name']; // required
 
    $email_from = $_POST['email']; // required
 
    $cell = $_POST['cell']; // required
 
    $address = $_POST['address']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 
 
 
 	$string_exp = "/^[ ()+]*([0-9][ ()+]*){10}$/" ;
	
  if(!preg_match($string_exp,$cell)) {
 
    $error_message .= 'The Cell Number you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name : ".clean_string($name)."\n";
 
    $email_message .= "E-mail : ".clean_string($email_from)."\n";
 
    $email_message .= "Cell No : ".clean_string($cell)."\n";
 
    $email_message .= "Address : ".clean_string($address)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 
 
?>
<!-- thank you message-->

<div id="thanks" style="margin-left:auto; margin-right:auto; margin-top:250px; width:500px; height:300px;">
<p align="center"><img src="images/thank_you_logo.jpg" width="351" height="99" alt="thank_you_logo" /></p>
<p style="text-decoration: none; font-style: italic; font-size: 13px; list-style-type: none; font-family: Arial, Helvetica, sans-serif; size: 20px; text-align: center;"><b>" Your Message Sent Successfully..!!! " <br />
<br />
<br />
* <span class="redirect">This Page will redirect in 5 seconds... If not</span> <a href="contactus.html"><span class="click">click here</span></a>

</b></p>

</div>
 
<?php
 
}
 
?>
</body>
</html>