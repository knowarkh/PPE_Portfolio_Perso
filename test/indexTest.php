<html>
<head>
<!-- <link rel="stylesheet" media="screen" type="text/css" -->
<!-- 	href="./aero.css" /> -->
<title>COMPETENCE</title>
</head>

<body>


<?php
include ("../db/Connexion.php");
include ("../db/DAOs.php");

// ---test CRUD STAGIAIRE---
// createStagiaire();
// readStagiaire();
// updateStagiaire();
// deleteStagiaire();

// ---test CRUD ACTIVITE---
// createActivite();
// readActivite();
// updateActivite();
// deleteActivite();

// ---test CRUD COMPETENCE---
// createComp();
// readComp();
// updateComp();
// deleteComp();

// ---test CRUD PROJET---
// createProj();
// readProjet();
// updateProj();
// deleteProj();

// ---test CRUD DUCUMENTATION---
// createDoc();
// readDoc();
// updateDoc();
// deleteDoc();

// ---test CRUD RESSOURCE---
// createRess();
// readRess();
// updateRess();
// deleteRess();

// ---test CRUD VALIDATION---
// createVal();
// readVal();
// updateVal();
// deleteVal();

// ---TABLE STAGIAIRE---

/**
 * test create stagiaire
 * avant attribut mdp
 */
function createStagiaire()
{
    $daoStagiaire = new \DAO\Stagiaire\StagiaireDAO();
    $stag = new \Competence\Stagiaire\Stagiaire("Macron", "Manu", "manu.macron@elysee.com", "motDe");
    echo $stag;
    $daoStagiaire->create($stag);
    echo "stagiaire créé : $stag";
}

/**
 * test read stagiaire
 */
function readStagiaire()
{
    $daoStag = new \DAO\Stagiaire\StagiaireDAO();
    $stag = $daoStag->read(1);
    
    echo "trouvé : $stag";
    $stag = $daoStag->read(1);
    echo "trouvé : $stag";
}

/**
 * test update stagiaire
 */
function updateStagiaire()
{
    $daoStag = new \DAO\Stagiaire\StagiaireDAO();
    $stag = $daoStag->read(2);
    $stag->setNom("Jean-Claude");
    $daoStag = $daoStag->update($stag);
    echo $stag;
}

/**
 * test delete stagiaire
 */
function deleteStagiaire()
{
    $daoStagiaire = new \DAO\Stagiaire\StagiaireDAO();
    $stag = $daoStagiaire->read(3);
    echo "avant: $stag";
    $daoStagiaire->delete($stag);
    echo "effacé : $stag";
}

// ---TABLE ACTIVITE---

/**
 * test create activite
 */
function createActivite()
{
    $daoAct = new \DAO\Activite\ActiviteDAO();
    $activite = new \Competence\Activite\Activite("luge", "descente", "station");
    echo $activite;
    $daoAct->create($activite);
    echo "activite créée : $activite";
}

/**
 * test read activite
 */
function readActivite()
{
    $daoAct = new \DAO\Activite\ActiviteDAO();
    $activite = $daoAct->read(1);
    echo "trouvé : $activite";
}

/**
 * test update activite
 */
function updateActivite()
{
    $daoAct = new \DAO\Activite\ActiviteDAO();
    $activite = $daoAct->read(2);
    $activite->setProcessus("saut");
    $daoAct = $daoAct->update($activite);
    echo $activite;
}

/**
 * test delete activite
 */
function deleteActivite()
{
    $daoAct = new \DAO\Activite\ActiviteDAO();
    $activite = $daoAct->read(3);
    $daoAct->delete($activite);
    echo "effacé : $activite";
}

// ---TABLE COMPETENCE---

/**
 * test create competence
 */
function createComp()
{
    $daoComp = new \DAO\Competence\CompetenceDAO();
    $comp = new \Competence\Competence\Competence(2, "piste noire");
    echo $comp;
    $daoComp->create($comp);
    echo "competence créée : $comp";
}

/**
 * test read competence
 */
function readComp()
{
    $daoComp = new \DAO\Competence\CompetenceDAO();
    $comp = $daoComp->read(1);
    echo "trouvé : $comp";
}

/**
 * test update competence
 */
function updateComp()
{
    $daoComp = new \DAO\Competence\CompetenceDAO();
    $comp = $daoComp->read(2);
    $comp->setDescription("piste rouge");
    $daoComp = $daoComp->update($comp);
    echo $comp;
}

/**
 * test delete competence
 */
function deleteComp()
{
    $daoComp = new \DAO\Competence\CompetenceDAO();
    $comp = $daoComp->read(3);
    echo "avant: $comp";
    $daoComp->delete($comp);
    echo "effacé : $comp";
}

// ---TABLE PROJET---

/**
 * test create projet
 */
function createProj()
{
    $daoProj = new \DAO\Projet\ProjetDAO();
    $proj = new \Competence\Projet\Projet("PPE Android");
    echo $proj;
    $daoProj->create($proj);
    echo "projet créé : $proj";
}

/**
 * test read projet
 */
function readProjet()
{
    $daoProj = new \DAO\Projet\ProjetDAO();
    $proj = $daoProj->read(1);
    echo "trouvé : $proj";
}

/**
 * test update projet
 */
function updateProj()
{
    $daoProj = new \DAO\Projet\ProjetDAO();
    $proj = $daoProj->read(2);
    $proj->setDenomination("PPE individuel");
    $daoProj = $daoProj->update($proj);
    echo $proj;
}

/**
 * test delete projet
 */
function deleteProj()
{
    $daoProj = new \DAO\Projet\ProjetDAO();
    $proj = $daoProj->read(3);
    $daoProj->delete($proj);
    echo "effacé : $proj";
}

// ---TABLE DOCUMENTATION---
function createDoc()
{
    $daoDoc = new \DAO\Documentation\DocumentationDAO();
    $doc = new \Competence\Documentation\Documentation(2, 4, "Ceci est une description");
    echo $doc;
    $daoDoc->create($doc);
    echo "documentation créée : $doc";
}

function readDoc()
{
    $daoDoc = new \DAO\Documentation\DocumentationDAO();
    $doc = $daoDoc->read(1);
    echo "trouvé : $doc";
}

function updateDoc()
{
    $daoDoc = new \DAO\Documentation\DocumentationDAO();
    $doc = $daoDoc->read(2);
    $doc->setDescription("nouvelle description");
    $daoDoc = $daoDoc->update($doc);
    echo $doc;
}

function deleteDoc()
{
    $daoDoc = new \DAO\Documentation\DocumentationDAO();
    $doc = $daoDoc->read(3);
    $daoDoc->delete($doc);
    echo "effacé : $doc";
}

// ---TABLE RESSOURCE---
function createRessT()
{
    $daoRess = new \DAO\Ressource\RessourceDAO();
    $ress = new \Competence\Ressource\Ressource("../Doc/Fichier.pdf", "image");
    echo $ress;
    $daoRess->create($ress);
    echo "ressource créée : $ress";
}

function readRessT()
{
    $daoRess = new \DAO\Ressource\RessourceDAO();
    $ress = $daoRess->read(5);
    echo "trouvé : $ress";
}

function updateRessT()
{
    $daoRess = new \DAO\Ressource\RessourceDAO();
    $ress = $daoRess->read(2);
    $ress->setTypeFichier("texte");
    $daoRess = $daoRess->update($ress);
    echo $ress;
}

function deleteRessT()
{
    $daoRess = new \DAO\Ressource\RessourceDAO();
    $ress = $daoRess->read(3);
    $daoRess->delete($ress);
    echo "effacé : $ress";
}

// ---TABLE VALIDATION---
function createVal()
{
    $daoVal = new \DAO\Validation\ValidationDAO();
    $val = new \Competence\Validation\Validation(4, 6, "TP SI");
    echo $val;
    $daoVal->create($val);
    echo "validation créée : $val";
}

function readVal()
{
    $daoVal = new \DAO\Validation\ValidationDAO();
    $val = $daoVal->read(1);
    echo "trouvé : $val";
}

function updateVal()
{
    $daoVal = new \DAO\Validation\ValidationDAO();
    $val = $daoVal->read(6);
    $val->setContexte("TP Info");
    $daoVal = $daoVal->update($val);
    echo "modif ok : $val";
}

function deleteVal()
{
    $daoVal = new \DAO\Validation\ValidationDAO();
    $val = $daoVal->read(1);
    $daoVal->delete($val);
    echo "effacé : $val";
}

?>

<?php
include ("../db/Connexion.php");

// $daoStagiaire = new \DAO\Stagiaire\StagiaireDAO ();
// $stag=$daoStagiaire->read(1);
// echo "avant: $stag";
// $daoStagiaire->delete($stag);
// echo "effacé : $stag";

// ---Test hashage MdP---
// $hash = '$2y$10$YHCt9Jkh406sn6JAXwp8NeW22G.51cPi17IRl07moU92tKEUz4xHK';
// if (password_verify('passe', $hash)) {
// echo 'Le mot de passe est valide !';
// } else {
// echo 'Le mot de passe est invalide.';
// }

echo DB\Connexion\Connexion::getTableauCompetences(1);

?>

    </body>
</html>

