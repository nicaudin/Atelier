<?php require_once('../inc/init.php');

// Si j'ai une action GET égal à supprimer avec en paramètre $_GET[id_produit]
// je supprime le produit en base
if(isset($_GET["action"]) && $_GET["action"] == "supprimer"){
    $pdo->query("DELETE FROM clients WHERE id_client = '$_GET[id_client]'");
    $content .= "<div class='alert alert-success' role='alert'>Le client a bien été supprimé!</div>";
}

// Si j'ai une action GET égal à modifier avec en paramètre $_GET[id_produit]
// je modifie le produit en base
if(isset($_GET["action"]) && $_GET["action"] == "modifier"){
    $r = $pdo->query("SELECT * FROM clients WHERE id_client= '$_GET[id_client]'");
    $client_actuel = $r->fetch(PDO::FETCH_ASSOC);
}

// Si je suis dans le cadre d'une modification/ ou d'un ajout
// alors je mets à jour les donnéés récupérées depuis le POST
if($_POST){



    foreach ($_POST as $key => $value) {
        $_POST[$key] = addslashes($value);
    }

    // Si c'est une modification je fait un update en bdd

    if(isset($_GET["action"]) && $_GET["action"] == "modifier"){
        $r = $pdo->query("UPDATE clients SET first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', address = '$_POST[address]', postal_code = '$_POST[postal_code]', city = '$_POST[city]', telephone = '$_POST[telephone]', type = '$_POST[type]', siret = '$_POST[siret]', date_of_birth = '$_POST[date_of_birth]', place_of_birth = '$_POST[place_of_birth]',sexe = '$_POST[sexe]' WHERE id_client = '$_POST[id_client]'");

        $id_client = $r->rowCount();

        if($id_client >=1 ){
            $content .= "<div class='alert alert-success' role='alert'>Le client a bien été modifié!</div>";
        }

    }else{ // Si c'est un ajout je fais un insert en base
            $r = $pdo->query("INSERT INTO clients (
    first_name, last_name, address, postal_code, city, telephone, type, siret, date_of_birth, place_of_birth, sexe)
    VALUES('$_POST[first_name]', '$_POST[last_name]', '$_POST[address]', '$_POST[postal_code]', '$_POST[city]', '$_POST[telephone]', '$_POST[type]', '$_POST[siret]', '$_POST[date_of_birth]', '$_POST[place_of_birth]', '$_POST[sexe]')");

            // Je récupère le dernier ID inséré
    $id_client = $pdo->lastInsertId();
  

    if($id_client>=1){
        
        $content .= "<div class='alert alert-success' role='alert'>
      Le client a bien été ajouté au catalogue;
    </div>";
    }
    }

}

?>



<?php

// je récupère en base tous les produits pour les afficher
$r = $pdo->query("SELECT * FROM clients");
$content .= "<table class='table table-bordered mt-5 ' >";
$content .= "<tr>";
// Ici je récupère les noms des columns pour les afficher dynamiquement
for ($i=0; $i < $r->columnCount(); $i++) {
    $column = $r->getColumnMeta($i);
    $content .= "<th>$column[name]</th>";
}

$content .= "<th> modification </th>";
$content .= "<th> suppression </th>";
$content .= "</tr>";

// Ici j'itère dans les différentes données pour alimenter mon tableau dynamiquement
while($clients = $r->fetch(PDO::FETCH_ASSOC)) {
    $content .= "<tr>";
    foreach($clients as $key => $value) {
        if($key == "photo") {
            $content .= "<td> <img src=\"$value\" width=\"70\" class=\"img-fluid\"> </td>";
        } else{
            $content .= "<td> $value </td>";
        }
    }
    $content .= "<td> <a href=\"?action=modifier&id_client=$clients[id_client]\"> Modifier </a> </td>";
    $content .= "<td> <a href=\"?action=supprimer&id_client=$clients[id_client]\"> Supprimer </a> </td>";
    $content .= "</tr>";
}


    $content .= "</table>";


// ICI si je suis dans le cadre d'une modification
    // je récupère et j'affiche les donées actuellement en base
    // Sinon c'est que je suis dans le cadre d'un ajout et donc j'initialise 
    // les champs avec du vide
    // chaque variable définie ci-dessous fait l'objet d"un echo dans la value d"un input
$id_client = (isset($client_actuel['id_client'])) ? $client_actuel['id_client'] : '';
$first_name = (isset($client_actuel['first_name'])) ? $client_actuel['first_name'] : '';
$last_name = (isset($client_actuel['last_name'])) ? $client_actuel['last_name'] : '';
$address = (isset($client_actuel['address'])) ? $client_actuel['address'] : '';
$postal_code = (isset($client_actuel['postal_code'])) ? $client_actuel['postal_code'] : '';
$city = (isset($client_actuel['city'])) ? $client_actuel['city'] : '';
$telephone = (isset($client_actuel['telephone'])) ? $client_actuel['telephone'] : '';
$type = (isset($client_actuel['type'])) ? $client_actuel['type'] : '';
$siret = (isset($client_actuel['siret'])) ? $client_actuel['siret'] : '';
$date_of_birth = (isset($client_actuel['date_of_birth'])) ? $client_actuel['date_of_birth'] : '';
$place_of_birth = (isset($client_actuel['place_of_birth'])) ? $client_actuel['place_of_birth'] : '';
$sexe = (isset($client_actuel['sexe'])) ? $client_actuel['sexe'] : '';

?>
  
<!-- ------------------------------------------------------------------------------ -->
<?php require_once('header.php');

echo $content;
?>

<h1 class="mt-5 text-center">Formulaire d'ajout client</h1>

    <form class="mt-5 pt-5" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id_client" value="<?=$id_client?>">
        
        <div class="row">

            <div class="col">
                <label for="first_name">Prénom</label>
                <input type="text" name="first_name" placeholder="prénom" id="first_name" class="form-control" value="<?=$first_name?>"><br>
            </div>

            <div class="col">
                <label for="last_name">Nom</label>
                <input type="text" name="last_name" placeholder="nom" id="last_name" class="form-control" value="<?=$last_name?>"><br>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <label for="titre">Adresse</label>
                <input type="text" name="address" placeholder="adresse" id="address" class="form-control" value="<?=$address?>"><br>
            </div>

            <div class="col">
                <label for="postal_code">Code postal</label>
                <input type="text" name="postal_code" placeholder="code postal" id="postal_code" class="form-control"><?=$postal_code?><br>
            </div>

             <div class="col">
                <label for="city">Ville</label>
                <input type="text" name="city" placeholder="ville" id="city" class="form-control" value="<?=$city?>"><br>
            </div>
        </div>

          <div class="row">
           

            <div class="col">
                <label for="telephone">Téléphone</label>
                <input type="tel" name="telephone" placeholder="telephone" id="telephone" class="form-control"><?=$telephone?><br>
            </div>
       

              <div class="col">
                <label for="type">type</label>
                <select name="type" id="type" class="form-control">
                <option <?php if($type == '0') echo 'selected'; ?>>0</option>
                <option <?php if($type == '1') echo 'selected'; ?>>1</option>
                
            </select><br>

            </div>

            <div class="col">
                <label for="siret">Siret</label>
                <input type="tel" name="siret" placeholder="siret" id="siret" class="form-control"><?=$siret?><br>
            </div>

             </div>

            
        

        <div class="row">
            <div class="col">
                <label for="date_of_birth">Date de naissance</label>
                <input type="date" name="date_of_birth" placeholder="" id="date_of_birth" class="form-control" value="<?=$date_of_birth?>"><br>
            </div>

            <div class="col">
                <label for="place_of_birth">Lieu de naissance</label>
                <input type="tel" name="place_of_birth" placeholder="lieu de naissance" id="place_of_birth" class="form-control"><?=$place_of_birth?><br>
            </div>

            <div class="col">
                <label for="sexe">Sexe</label>
                <input type="tel" name="sexe" placeholder="sexe" id="sexe" class="form-control"><?=$sexe?><br>
            </div>
        </div>


        
        <br><input type="submit" value="enregistrer le client" class="btn btn btn-dark">
    </form>                       

    