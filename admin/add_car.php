<?php require_once('../inc/init.php');

// Si j'ai une action GET égal à supprimer avec en paramètre $_GET[id_produit]
// je supprime le produit en base
if(isset($_GET["action"]) && $_GET["action"] == "supprimer"){
    $pdo->query("DELETE FROM cars WHERE id_car = '$_GET[id_car]'");
    $content .= "<div class='alert alert-success' role='alert'>La voiture a bien été supprimé!</div>";
}

// Si j'ai une action GET égal à modifier avec en paramètre $_GET[id_produit]
// je modifie le produit en base
if(isset($_GET["action"]) && $_GET["action"] == "modifier"){
    $r = $pdo->query("SELECT * FROM cars WHERE id_car= '$_GET[id_car]'");
    $car_actuel = $r->fetch(PDO::FETCH_ASSOC);
}

// Si je suis dans le cadre d'une modification/ ou d'un ajout
// alors je mets à jour les donnéés récupérées depuis le POST
if($_POST){



    foreach ($_POST as $key => $value) {
        $_POST[$key] = addslashes($value);
    }

    // Si c'est une modification je fait un update en bdd

    if(isset($_GET["action"]) && $_GET["action"] == "modifier"){
        $r = $pdo->query("UPDATE cars SET brand_car = '$_POST[brand_car]', model_car = '$_POST[model_car]', gearbox = '$_POST[gearbox]', motor = '$_POST[motor]', type_car = '$_POST[type_car]', series_car_number = '$_POST[series_car_number]', first_registration_car = '$_POST[first_registration_car]', cv_car = '$_POST[cv_car]', ch_car = '$_POST[ch_car]', car_energy = '$_POST[car_energy]',plate_number = '$_POST[plate_number]', km = '$_POST[km]', number_key = '$_POST[number_key]', ext_color = '$_POST[ext_color]', in_color = '$_POST[in_color]', global_information = '$_POST[global_information]', options = '$_POST[options]', imgs = '$_POST[imgs]', seiling_price = '$_POST[seiling_price]', price_letters = '$_POST[price_letters]', purchase_price = '$_POST[purchase_price]', purchase_commission_price = '$_POST[purchase_commission_price]', status = '$_POST[status]', old_seiling_price = '$_POST[old_seiling_price]', year = '$_POST[year]', police_number = '$_POST[police_number]', provider = '$_POST[provider]', purchase_date = '$_POST[purchase_date]', origin = '$_POST[origin]', carscol = '$_POST[carscol]', availability = '$_POST[availability]' WHERE id_car = '$_POST[id_car]'");

        $id_car = $r->rowCount();

        if($id_car >=1 ){
            $content .= "<div class='alert alert-success' role='alert'>La voiture a bien été modifié!</div>";
        }

    }else{ // Si c'est un ajout je fais un insert en base
            $r = $pdo->query("INSERT INTO cars (
    brand_car, model_car, gearbox, motor, type_car, series_car_number, first_registration_car, cv_car, ch_car, car_energy, plate_number, km, number_key, ext_color, in_color, global_information, options, imgs, seiling_price, price_letters, purchase_price, purchase_commission_price, status, old_seiling_price, year, police_number, provider, purchase_date, origin, carscol, availability)

    VALUES('$_POST[brand_car]', '$_POST[model_car]', '$_POST[gearbox]', '$_POST[motor]', '$_POST[type_car]', '$_POST[series_car_number]', '$_POST[first_registration_car]', '$_POST[cv_car]', '$_POST[ch_car]', '$_POST[car_energy]', '$_POST[plate_number]','$_POST[km]','$_POST[number_key]','$_POST[ext_color]','$_POST[in_color]','$_POST[global_information]','$_POST[options]','$_POST[imgs]','$_POST[seiling_price]','$_POST[price_letters]','$_POST[purchase_price]','$_POST[purchase_commission_price]','$_POST[status]','$_POST[old_seiling_price]','$_POST[year]','$_POST[police_number]','$_POST[provider]','$_POST[purchase_date]','$_POST[origin]','$_POST[carscol]','$_POST[availability]')");

            // Je récupère le dernier ID inséré
    $id_car = $pdo->lastInsertId();
  

    if($id_car>=1){
        
        $content .= "<div class='alert alert-success' role='alert'>
      Le véhicule a bien été ajouté au catalogue;
    </div>";
    }
    }

}

// je récupère en base tous les produits pour les afficher
$r = $pdo->query("SELECT * FROM cars");
$content .= "<table class='table table-bordered mt-5 mt-5'>";
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
while($cars = $r->fetch(PDO::FETCH_ASSOC)) {
    $content .= "<tr>";
    foreach($cars as $key => $value) {
        if($key == "photo") {
            $content .= "<td> <img src=\"$value\" width=\"70\" class=\"img-fluid\"> </td>";
        } else{
            $content .= "<td> $value </td>";
        }
    }
    $content .= "<td> <a href=\"?action=modifier&id_car=$cars[id_car]\"> Modifier </a> </td>";
    $content .= "<td> <a href=\"?action=supprimer&id_car=$cars[id_car]\"> Supprimer </a> </td>";
    $content .= "</tr>";
}


    $content .= "</table>";


// ICI si je suis dans le cadre d'une modification
    // je récupère et j'affiche les donées actuellement en base
    // Sinon c'est que je suis dans le cadre d'un ajout et donc j'initialise 
    // les champs avec du vide
    // chaque variable définie ci-dessous fait l'objet d"un echo dans la value d"un input
$id_car = (isset($car_actuel['id_car'])) ? $car_actuel['id_car'] : '';
$brand_car = (isset($car_actuel['brand_car'])) ? $car_actuel['brand_car'] : '';
$model_car = (isset($car_actuel['model_car'])) ? $car_actuel['model_car'] : '';
$gearbox = (isset($car_actuel['gearbox'])) ? $car_actuel['gearbox'] : '';
$motor = (isset($car_actuel['motor'])) ? $car_actuel['motor'] : '';
$type_car = (isset($car_actuel['type_car'])) ? $car_actuel['type_car'] : '';
$series_car_number = (isset($car_actuel['series_car_number'])) ? $car_actuel['series_car_number'] : '';
$first_registration_car = (isset($car_actuel['first_registration_car'])) ? $car_actuel['first_registration_car'] : '';
$cv_car = (isset($car_actuel['cv_car'])) ? $car_actuel['cv_car'] : '';
$ch_car = (isset($car_actuel['ch_car'])) ? $car_actuel['ch_car'] : '';
$car_energy = (isset($car_actuel['car_energy'])) ? $car_actuel['car_energy'] : '';
$plate_number = (isset($car_actuel['plate_number'])) ? $car_actuel['plate_number'] : '';
$km = (isset($car_actuel['km'])) ? $car_actuel['km'] : '';
$number_key = (isset($car_actuel['number_key'])) ? $car_actuel['number_key'] : '';
$ext_color = (isset($car_actuel['ext_color'])) ? $car_actuel['ext_color'] : '';
$in_color = (isset($car_actuel['in_color'])) ? $car_actuel['in_color'] : '';
$global_information = (isset($car_actuel['global_information'])) ? $car_actuel['global_information'] : '';
$options = (isset($car_actuel['options'])) ? $car_actuel['options'] : '';
$imgs = (isset($car_actuel['imgs'])) ? $car_actuel['imgs'] : '';
$seiling_price = (isset($car_actuel['seiling_price'])) ? $car_actuel['seiling_price'] : '';
$price_letters = (isset($car_actuel['price_letters'])) ? $car_actuel['price_letters'] : '';
$purchase_price = (isset($car_actuel['purchase_price'])) ? $car_actuel['purchase_price'] : '';
$purchase_commission_price = (isset($car_actuel['purchase_commission_price'])) ? $car_actuel['purchase_commission_price'] : '';
$status = (isset($car_actuel['status'])) ? $car_actuel['status'] : '';
$old_seiling_price = (isset($car_actuel['old_seiling_price'])) ? $car_actuel['old_seiling_price'] : '';
$year = (isset($car_actuel['year'])) ? $car_actuel['year'] : '';
$police_number = (isset($car_actuel['police_number'])) ? $car_actuel['police_number'] : '';
$provider = (isset($car_actuel['provider'])) ? $car_actuel['provider'] : '';
$purchase_date = (isset($car_actuel['purchase_date'])) ? $car_actuel['purchase_date'] : '';
$origin = (isset($car_actuel['origin'])) ? $car_actuel['origin'] : '';
$carscol = (isset($car_actuel['carscol'])) ? $car_actuel['carscol'] : '';
$availability = (isset($car_actuel['availability'])) ? $car_actuel['availability'] : '';



?>
  
<!-- ------------------------------------------------------------------------------ -->
<?php require_once('header.php');

echo $content;
?>

<h1 class="mt-5 mb-5 text-center">Formulaire d'ajout d'un vehicule</h1>


    <form method="post" action="" enctype="multipart/form-data" class="mt-5">
        <input type="hidden" name="id_car" value="<?=$id_car?>">
        
        <div class="row">

            <div class="col">
                <label for="brand_car">Marque</label>
                <input type="text" name="brand_car" placeholder="marque" id="brand_car" class="form-control" value="<?=$brand_car?>"><br>
            </div>

            <div class="col">
                <label for="model_car">Modèle</label>
                <input type="text" name="model_car" placeholder="modèle" id="model_car" class="form-control" value="<?=$model_car?>"><br>
            </div>

        
            <div class="col">
                <label for="gearbox">Boîte de vitesse</label>
                <select name="gearbox" id="gearbox" class="form-control">
                <option <?php if($gearbox == 'automatique') echo 'selected'; ?>>automatique</option>
                <option <?php if($gearbox == 'manuelle') echo 'selected'; ?>>manuelle</option>
                
            </select><br>

            </div>
</div>

        <div class="row">

             <div class="col">
                <label for="motor">Motorisation</label>
                <input type="text" name="motor" placeholder="motor" id="motor" class="form-control"><?=$motor?><br>
            </div>

            <div class="col">
                <label for="type_car">Numéro type carte grise</label>
                <input type="text" name="type_car" placeholder="type_car" id="type_car" class="form-control"><?=$type_car?><br>
            </div>

            <div class="col">
                <label for="series_car_number">Numéro de série</label>
                <input type="text" name="series_car_number" placeholder="numéro de série" id="series_car_number" class="form-control"><?=$series_car_number?><br>

            </div>

             
        </div>

          <div class="row">
           

            <div class="col">
                <label for="first_registration_car">Date première immatriculation</label>
                <input type="date" name="first_registration_car" placeholder="first_registration_car" id="first_registration_car" class="form-control"><?=$first_registration_car?><br>
            </div>
       


            <div class="col">
                <label for="cv_car">Chevaux</label>
                <input type="text" name="cv_car" placeholder="chveaux" id="cv_car" class="form-control"><?=$cv_car?>
            </div>

             </div>

            
        

        <div class="row">
            <div class="col">
                <label for="ch_car">Chevaux fiscaux</label>
                <input type="text" name="ch_car" placeholder="" id="ch_car" class="form-control" value="<?=$ch_car?>"><br>
            </div>

            <div class="col">
                <label for="car_energy">Combustible</label>
                <input type="text" name="car_energy" placeholder="combustible" id="car_energy" class="form-control"><?=$car_energy?><br>
            </div>

            <div class="col">
                <label for="plate_number">Plaque d'immatriculation<label>
                <input type="text" name="plate_number" placeholder="plate_number" id="plate_number" class="form-control"><?=$plate_number?><br>
            </div>
        </div>

         <div class="row">
            <div class="col">
                <label for="km">kilométrage</label>
                <input type="text" name="km" placeholder="" id="km" class="form-control" value="<?=$km?>"><br>
            </div>

            <div class="col">
                <label for="number_key">Nombre de clé</label>
                <input type="text" name="number_key" placeholder="nombre de clé" id="number_key" class="form-control"><?=$number_key?><br>
            </div>

            <div class="col">
                <label for="ext_color">Couleur extérieur</label>
                <input type="text" name="ext_color" placeholder="ext_color" id="ext_color" class="form-control"><?=$ext_color?><br>
            </div>
        </div>

        <div class="row">

            <div class="col">
                <label for="in_color">Couleur intérieur</label>
                <input type="text" name="in_color" placeholder="" id="in_color" class="form-control" value="<?=$in_color?>"><br>
            </div>

            <div class="col">
                <label for="global_information">Informations détaillées</label>
                <input type="text" name="global_information" placeholder="informations" id="global_information" class="form-control"><?=$global_information?><br>
            </div>

            <div class="col">
                <label for="options">Options</label>
                <input type="text" name="options" placeholder="options" id="options" class="form-control"><?=$options?><br>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <label for="imgs">Photos</label>
                <input type="text" name="imgs" placeholder="" id="imgs" class="form-control" value="<?=$imgs?>"><br>
            </div>

            <div class="col">
                <label for="seiling_price">Prix de vente</label>
                <input type="text" name="seiling_price" placeholder="prix" id="seiling_price" class="form-control"><?=$seiling_price?><br>
            </div>

            <div class="col">
                <label for="price_letters">Prix en lettre</label>
                <input type="text" name="price_letters" placeholder="price_letters" id="price_letters" class="form-control"><?=$price_letters?><br>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <label for="purchase_price">Prix d'achat</label>
                <input type="text" name="purchase_price" placeholder="" id="purchase_price" class="form-control" value="<?=$purchase_price?>"><br>
            </div>

            <div class="col">
                <label for="purchase_commission_price">Commission achat</label>
                <input type="text" name="purchase_commission_price" placeholder="commission achat" id="purchase_commission_price" class="form-control"><?=$purchase_commission_price?><br>
            </div>

            <div class="col">
                <label for="status">Status</label>
                <input type="text" name="status" placeholder="status" id="status" class="form-control"><?=$status?><br>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="old_seiling_price">Ancien prix de vente</label>
                <input type="text" name="old_seiling_price" placeholder="ancien prix de vente" id="old_seiling_price" class="form-control" value="<?=$old_seiling_price?>"><br>
            </div>

            <div class="col">
                <label for="year">Année</label>
                <input type="text" name="year" placeholder="année" id="year" class="form-control"><?=$year?><br>
            </div>

            <div class="col">
                <label for="police_number">Numéro de police</label>
                <input type="text" name="police_number" placeholder="police_number" id="police_number" class="form-control"><?=$police_number?><br>
            </div>
        </div>

<div class="row">
            <div class="col">
                <label for="provider">Provenance</label>
                <input type="text" name="provider" placeholder="" id="provenance" class="form-control" value="<?=$provider?>"><br>
            </div>

            <div class="col">
                <label for="purchase_date">Date d'achat</label>
                <input type="date" name="purchase_date" placeholder="date d'achat" id="purchase_date" class="form-control"><?=$purchase_date?><br>
            </div>

            <div class="col">
                <label for="origin">Fournisseur</label>
                <input type="text" name="origin" placeholder="Fournisseur" id="origin" class="form-control"><?=$origin?><br>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="carscol">Carscol</label>
                <input type="text" name="carscol" placeholder="" id="carscol" class="form-control" value="<?=$carscol?>"><br>
            </div>

            <div class="col">
                <label for="availability">Disponibilité</label>
                <input type="tel" name="availability" placeholder="disponibilité" id="availability" class="form-control"><?=$availability?><br>
            </div>

           
        </div>


        
        <br><input type="submit" value="Ajouter le vehicule" class="btn btn btn-dark">
    </form>                       

    