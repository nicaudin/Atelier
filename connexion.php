<?php
require_once('inc/header.php');
require_once('inc/init.php');

$r = $pdo->query("SELECT * FROM clients");
$client = $r->fetch(PDO::FETCH_ASSOC);





if($_POST){
if($_POST['pseudo'] === $client[pseudo] && $_POST['mdp']=== $client[mdp]){
		
	
			
			echo ("<script> window.location.href = 'admin/index.php'; </script>");


		} }
	


?>




   <section class="inner-intro bg-22 bg-overlay-black-70">
  <div class="container">
     <div class="row text-center intro-title">
           <div class="col-md-6 text-md-left d-inline-block">
             <h1 class="text-white">Se connecter </h1>
           </div>
           <div class="col-md-6 text-md-right float-right">
     </div>
  </div>
</section>


<h1 class="mt-5 text-center"> connexion </h1>

<div class="container">
<form method="post" action="">
	<div>
		<label for="pseudo">pseudo</label>
		<input type="text" name="pseudo" placeholder="votre pseudo" id="pseudo" class="form-control">
	</div>
	<br>
	<div>
		<label for="mdp">mdp</label>
		<input type="password" name="mdp" placeholder="votre mdp" id="mdp" class="form-control">
	</div>
	<br>
	<div>
		<input type="submit" class="btn btn-dark mb-5" value="se connecter">
	</div>
</form>
</div>

<?php
require_once("inc/footer.php");
?>