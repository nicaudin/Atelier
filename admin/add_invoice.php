<?php require_once('../inc/init.php');?>
<?php require_once('header.php');

// ici on récupère l'id_commmande de la commande qui a été selectionnée dans gestion_commandes.php pour pré-remplir la facture dans la page actuelle


if(isset($_POST['add_invoice']) && !empty($_POST['add_invoice'])){

 $r = $pdo->query("INSERT INTO invoices (
    number_invoice, first_name, last_name, address, postal_code, city, telephone, siret, city_invoice, date_invoice, police_number, brand_car, model_car, type_car, series_car_number, cv_car, price_letters, number_key, total, reprise, reprise_number, ttc_total, way_of_payment, type, warranty, plate_number, km, first_registration_car, clients_id_client)

    VALUES('$_POST[number_invoice]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[address]', '$_POST[postal_code]', '$_POST[city]', '$_POST[telephone]', '$_POST[siret]', '$_POST[city_invoice]','$_POST[date_invoice]', '$_POST[police_number]','$_POST[brand_car]', '$_POST[model_car]','$_POST[type_car]', '$_POST[series_car_number]','$_POST[cv_car]', '$_POST[price_letters]','$_POST[number_key]', '$_POST[total]','$_POST[reprise]', '$_POST[reprise_number]','$_POST[ttc_total]', '$_POST[way_of_payment]','$_POST[type]', '$_POST[warranty]','$_POST[plate_number]', '$_POST[km]','$_POST[first_registration_car]', '$_POST[clients_id_client]')");

 $last_id = $pdo->lastInsertId();
   if ($last_id >= 1) {
      $content .= "<div class=\"alert alert-success\" role=\"alert\">
               La facture a bien été ajouté à la base de données.</div>";
   } else {
      $content .= "<div class=\"alert alert-danger\" role=\"alert\">
               Un problème est survenu lors de l'ajout de la facture. Veuillez réessayer.
           </div>";
   }


}

if (isset($_GET['generer']) && !empty($_GET['generer'])) {
    $r = $pdo->query("SELECT * FROM cars WHERE police_number = '$_GET[police_number]'");
    //$r1 = $pdo->query("SELECT * FROM clients WHERE id_client = '$_GET[id_client]'");
    $gen = $r->fetch(PDO::FETCH_ASSOC);
    //$gen2= $r1->fetch(PDO::FETCH_ASSOC);
}

var_dump($gen);

?>

<?php require_once('header.php');

echo $content;
?>

<h1 class="mt-5 mb-5 text-center">Formulaire d'ajout d'un vehicule</h1> <br><br>

<h2 class="mt-5 mb-5 text-left">Sélectionner un numéro de police</h2>

     

     <form method ="get" action ="">
       
        <div class="col-1">
               
                <select name="police_number" id="police_number" class="form-control">
                          <?php $r = $pdo->query("SELECT * FROM cars");
                     while ($cars = $r->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $police_number["police_number"]; ?>">
                        <?php echo $cars["police_number"];
                     } ?>
                        </option>
               
                
                </select><br>


          </div>

          <input type="submit" value="Générer" class="btn btn btn-dark" name="generer">

     </form>


    <form method="post" action="" enctype="multipart/form-data" class="mt-5">
        <input type="hidden" name="id_car" value="<?=$id_car?>">

        
        
        <div class="row">

            <div class="col">
                <label for="id_client">id_client</label>
                <input type="text" name="id_client" placeholder="marque" id="id_client" class="form-control" value="<?=$gen[id_client]?>"><br>
            </div>

            <div class="col">
                <label for="first_name">first_name</label>
                <input type="text" name="first_name" placeholder="modèle" id="first_name" class="form-control" value="<?=$first_name?>"><br>
            </div>

        
      

            </div>


        <div class="row">

             <div class="col">
                <label for="Last_name">Last_name</label>
                <input type="text" name="Last_name" placeholder="Last_name" id="Last_name" class="form-control"><?=$Last_name?><br>
            </div>

            <div class="col">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" placeholder="telephone" id="telephone" class="form-control"><?=$telephone?><br>
            </div>

            <div class="col">
                <label for="address">Adresse</label>
                <input type="text" name="address" placeholder="numéro de série" id="address" class="form-control"><?=$address?><br>

            </div>

             
        </div>

          <div class="row">
           

            <div class="col">
                <label for="postal_code">Code postal</label>
                <input type="text" name="postal_code" placeholder="postal_code" id="postal_code" class="form-control"><?=$postal_code?><br>
            </div>
       


            <div class="col">
                <label for="city">City</label>
                <input type="text" name="city" placeholder="chveaux" id="city" class="form-control"><?=$city?>
            </div>

             </div>

            
        

        <div class="row">
            <div class="col-6">
                <label for="siret">Siret</label>
                <input type="text" name="siret" placeholder="" id="siret" class="form-control" value="<?=$siret?>"><br>
            </div>
        </div>

        <h2 class="mt-5 mb-5 text-left">Invoice Informations</h2>


        <div class="row">

            <div class="col">
                <label for="number_invoice">Number invoice</label>
                <input type="text" name="number_invoice" placeholder="combustible" id="number_invoice" class="form-control"><?=$number_invoice?><br>
            </div>

            <div class="col">
                <label for="city_invoice">City invoice<label>
                <input type="text" name="city_invoice" placeholder="city_invoice" id="city_invoice" class="form-control"><?=$city_invoice?><br>
            </div>
        </div>

         <div class="row">
            <div class="col">
                <label for="date_invoice">Date invoice</label>
                <input type="text" name="date_invoice" placeholder="" id="date_invoice" class="form-control" value="<?=$date_invoice?>"><br>
            </div>

            <div class="col">
                <label for="police_number">Police number</label>
                <input type="text" name="police_number" placeholder="nombre de clé" id="police_number" class="form-control"><?=$police_number?><br>
            </div>

          </div>

          <h2 class="mt-5 mb-5 text-left">Car details</h2>

          <div class="row">


          <div class="col">
                <label for="breand_car">Brand_car</label>
                <input type="text" name="breand_car" placeholder="" id="breand_car" class="form-control" value="<?=$breand_car?>"><br>
            </div>

        

            <div class="col">
                <label for="model_car">Model car</label>
                <input type="text" name="model_car" placeholder="" id="model_car" class="form-control" value="<?=$model_car?>"><br>
            </div>

            <div class="col">
                <label for="type_car">Type car</label>
                <input type="text" name="type_car" placeholder="informations" id="type_car" class="form-control"><?=$type_car?><br>
            </div>

            <div class="col">
                <label for="series_car_number">Series car number</label>
                <input type="text" name="series_car_number" placeholder ="series_car_number" id="series_car_number" class="form-control"><?=$series_car_number?><br>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <label for="first_registration_car">first registration car</label>
                <input type="text" name="first_registration_car" placeholder="" id="first_registration_car" class="form-control" value="<?=$first_registration_car?>"><br>
            </div>

            <div class="col">
                <label for="cv_car">cv_car</label>
                <input type="text" name="cv_car" placeholder="prix" id="cv_car" class="form-control"><?=$cv_car?><br>
            </div>

            <div class="col">
                <label for="plate_number">plate_number</label>
                <input type="text" name="plate_number" placeholder="plate_number" id="plate_number" class="form-control"><?=$plate_number?><br>
            </div>

              <div class="col">
                <label for="km">km</label>
                <input type="text" name="km" placeholder="km" id="km" class="form-control"><?=$km?><br>
            </div>


        </div>



        <div class="row">
            <div class="col">
                <label for="number_key">number_key</label>
                <input type="text" name="number_key" placeholder="" id="number_key" class="form-control" value="<?=$number_key?>"><br>
            </div>

            </div>


<h2 class="mt-5 mb-5 text-left">Others informations</h2>

          <div class="row">


          <div class="col">
                <label for="price_letters">price_letters</label>
                <input type="text" name="price_letters" placeholder="" id="price_letters" class="form-control" value="<?=$price_letters?>"><br>
            </div>

        

            <div class="col">
                <label for="total">total</label>
                <input type="text" name="total" placeholder="" id="total" class="form-control" value="<?=$total?>"><br>
            </div>

            <div class="col">
                <label for="reprise">reprise</label>
                <input type="text" name="reprise" placeholder="informations" id="reprise" class="form-control"><?=$reprise?><br>
            </div>

            <div class="col">
                <label for="reprise_number">reprise_number</label>
                <input type="text" name="reprise_number" placeholder ="reprise_number" id="reprise_number" class="form-control"><?=$reprise_number?><br>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <label for="ttc_total">ttc_total</label>
                <input type="text" name="ttc_total" placeholder="" id="ttc_total" class="form-control" value="<?=$ttc_total?>"><br>
            </div>

            <div class="col">
                <label for="way_of_paiement">way_of_paiement</label>
                <input type="text" name="way_of_paiement" placeholder="prix" id="way_of_paiement" class="form-control"><?=$way_of_paiement?><br>
            </div>

            <div class="col">
                <label for="type">type</label>
                <input type="text" name="type" placeholder="type" id="type" class="form-control"><?=$type?><br>
            </div>

              <div class="col">
                <label for="warranty">warranty</label>
                <input type="text" name="warranty" placeholder="warranty" id="warranty" class="form-control"><?=$warranty?><br>
            </div>


        </div>



        <div class="row">
            <div class="col">
                <label for="remarks">remarks</label>
                <input type="text" name="remarks" placeholder="" id="remarks" class="form-control" value="<?=$remarks?>"><br>
            </div>

            </div>

               
        <br><input type="submit" value="Créer la facture" class="btn btn btn-dark" name="add_invoice">
    </form>                       
