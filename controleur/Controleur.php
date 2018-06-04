<?php
include ("../db/DAOs.php");

//Assembler tous les tests des variables envoyées dans une fonction testerDonneesreçues()

/**
 * Condition: appelle la fonction traitement ressource lorsque l'element nom du formulaire ressource
 * est rempli
 * @param $_POST['nomRessource']
 **/
if (isset($_POST['nomRessource'])){
    traitementRessource($_POST['nomRessource'], $_FILES['maRessource']);
}


/**
 * Fonction qui traite le formulaire d'ajout de ressource: Teste le fichier envoyé, l'ajoute
 * au serveur puis à la base de données. Affiche un message d'erreur ou de réussite.
 * @param $_POST['nomRessource'] $nomRessource
 * @param $_FILES['maRessource'] $maRessource
 **/
function traitementRessource($nomRessource, $maRessource){
    
    //vérifier à chaque ajout de fichier qu'il n'en existe pas déjà un sous le
    //mm nom
    //retirer les espaces si il en existe dans le nom du fichier
 
    $cheminDossier = "../uploads/";
    $maxSize = 10000;
    $extensionsValides = array(
        'jpg',
        'txt',
        'pdf',
        'png',
        'ods'
    );
    
    //Créer le dossier uploads si il n'existe pas déjà, les ressources
    //s'enregistreront à cet endroit
    if (! file_exists($cheminDossier)) {
        mkdir($cheminDossier);
    }
    
    //Test du nom de la ressource, si elle existe et la converti obligatoirement en chaîne de caractères
    if (isset($nomRessource)) {
        $nomRessource= (string) $nomRessource;
    }
    //Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($maRessource) and $maRessource['error'] == 0) {
        //Teste la taille du fichier
        if ($maRessource['size'] > $maxSize) {
            
            // Teste le type de fichier(extension)
            // 1. strrchr renvoi l'extension avec le point
            // 2. substr(chaîne,1) ignore le premier caractère de la chaine
            // 3. strtolower met l'extension en minuscule
            $extensionRessource = strtolower(substr(strrchr($maRessource['name'], "."), 1));
            if (in_array($extensionRessource, $extensionsValides)) {
                
                // move_uploaded_files(arg1,arg2) envoi le document dans un dossier permanent du serveur (avant
                // d'appeler cette fonction il est placé dans un dossier temporaire).
                $result = move_uploaded_file($maRessource['tmp_name'], $cheminDossier . basename($maRessource['name']));
                if ($result) {
                    $message = 'Le fichier a bien été sauvé dans le serveur';
                    
                    
                    // ajoute la ressource a la base de données
                    createRess($nomRessource, $cheminDossier . basename($maRessource['name']), $maRessource['type'], $maRessource['size']);
                    $message = '<a href="'.$cheminDossier.basename($maRessource['name']).'">'.$nomRessource.'</a>';
                    
                } else {
                    $message = 'Lextension est mauvaise';
                }
            } else {
                $message = 'Le fichier est trop gros';
            }
        } else {
            $message = 'Lenvoi nest pas effectue';
        }
        echo '<p>' . $message . '<p>';
    }
     
}

/**
 * Crée la ressource
 * @param $name
 * @param $chemin
 * @param $typeFichier
 * @param $tailleFichier
 **/
function createRess($name,$chemin,$typeFichier,$tailleFichier){
    $daoRess = new \DAO\Ressource\RessourceDAO();
    $ress= new \Competence\Ressource\Ressource($name, $chemin, $typeFichier, $tailleFichier);
    $daoRess->create($ress);
    
}

/**
 * Lire la ressource
 * @param $num
 **/
function readRess($num){
    $daoRess = new \DAO\Ressource\RessourceDAO();
    $ress = $daoRess->read($num);
}

/**
 * Met à jour la ressource
 * @param $num
 * @param $nom
 * @param $typeFichier
 **/
function updateRess($num, $nom, $typeFichier){
    $daoRess = new \DAO\Ressource\RessourceDAO();
    $ress = $daoRess->read($num);
    $ress->setTypeFichier($typeFichier);
    $ress->setNom($nom);
    $daoRess = $daoRess->update($ress);
}

/**
 * Supprime la ressource
 * @param $num
 **/
function deleteRess($num){
    $daoRess = new \DAO\Ressource\RessourceDAO();
    $ress = $daoRess->read($num);
    $daoRess->delete($ress);
}

/**
 * Create utilisateur avec mot de passe hashé
 **/
function createUtilisteur($nom, $prenom, $mail, $password)
{
    // ---Test ajout stagiaire avec mdp hashé---
    $daoStagiaire = new \DAO\Stagiaire\StagiaireDAO();
    $options = array(
        'cost' => 11
    );
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stag = new \Competence\Stagiaire\Stagiaire($nom, $prenom, $mail, $hashed_password);
    //echo $stag;
    $daoStagiaire->create($stag);
    //echo "stagiaire créé : $stag";
}

/**
 * Test d'authentification de l'utilisateur
 * @param $mail
 * @param $password
 * @return boolean
 */
function is_utilisateur_valide($mail, $password)
{
    $sql = "SELECT * FROM STAGIAIRE WHERE mail =:mail";
    $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
    
    $stmt->execute(array(
        'mail' => $mail
    ));
    
    $rep = false;
    if ($data = $stmt->fetch()) {
        
        $rep=password_verify($password, $data['mdp']);
        session_start();
        $_SESSION['id'] = $data['idS'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['mail'] = $data['mail'];
        
    }
    return $rep;
}

?>