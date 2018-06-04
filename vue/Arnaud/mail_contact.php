<?php
//---Test--
$EmailFrom = "collet.arn@gmail.com";
$EmailTo = "collet.arn@gmail.com";
$Subject = "Contact site perso BTS SIO";
$Name = Trim(stripslashes($_POST['name']));
$Email = Trim(stripslashes($_POST['email']));
$Message = Trim(stripslashes($_POST['message']));

// validation
$validation=true;
if (!$validation) {
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
    exit;
}

// corps de mail :
$Body = "";
$Body .= "Nom: ";
$Body .= $Name;
$Body .= "\n";
// $Body .= "Tel: ";
// $Body .= $Tel;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// envoi email :
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirection page succes :
if ($success){
    print "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";
}
else{
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
?>