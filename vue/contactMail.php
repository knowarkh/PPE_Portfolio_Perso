<?php
$nom=$_POST['name'];
$mail=$_POST['email'];
$objet="Contact site BTS SIO mcla";
$message=$_POST['message'];

//voici la version Mine
$headers = "MIME-Version: 1.0\r\n";

//ici on détermine le mail en format text
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

//ici on détermine l'expediteur et l'adresse de réponse
$headers .= "From: $nom <$mail>\r\nReply-to : $nom <$mail>\nX-Mailer:PHP";

$subject="$objet";
$destinataire="siovannes.mcla@gmail.com";
$body="$message";
$success=mail($destinataire,$subject,$body,$headers);
// ini_set('SMTP', 'localhost');
// ini_set('smtp_port', 25);
if ($success) {
    echo "Votre mail a été envoyé avec succès<br>";
} else {
    echo "Une erreur s'est produite";
}

?>

<p align="center">Vous allez bientot etre redirigé vers la page d'acceuil<br>
Si vous n'etes pas redirigé au bout de 5 secondes cliquez <a href="#">ici 
</a></p>