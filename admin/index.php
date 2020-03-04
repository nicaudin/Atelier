<?php require_once('../inc/init.php');

  



if(isset($_GET["action"]) && $_GET["action"] == "deconnexion"){
	
	header("Refresh:0; url=../connexion.php");
	exit();
}
?>




<!-- ------------------------------------------------------------------------------ -->
<?php require_once('header.php'); ?>

                        <h1>Bienvenue sur le BackOffice SH AUTO</h1>
                        <p>Selectionnez l'une des rubriques dans le menu ci-dessus</p>

               
