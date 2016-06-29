<?php /* Template Name: Confirmation Benevole */ ?>
<?php get_header('aide'); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-2 contenu aside">

      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
    </div>

    <div class="col-lg-8 contenu texte_contenu">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->

      <?php

      if( isset($_POST['reg_genre'])
      &&isset($_POST['reg_nom'])
      &&isset($_POST['reg_prenom'])
      &&isset($_POST['reg_commune'])
      &&(isset($_POST['reg_mail']) || isset($_POST['reg_telephone']))



      ) { //TODO ameliorer la validation d'un formulaire complet ( ??? button grisé si formulaire non complet js)
        global $wpdb;
        $id_offre = $_POST['post_id'];
        $bnom = $_POST['reg_nom'];
        $bprenom = $_POST['reg_prenom'];
        $bcommune = $_POST['reg_commune'];
        $bmail = $_POST['reg_mail'];
        $btel = $_POST['reg_telephone'];
        $bdate = $_POST['reg_date'];
        $bheure = $_POST['reg_heure'];
        $bdeja = $_POST['reg_dejabene'];
        $bconnututs = $_POST['reg_cb_tuts'];
        $binfos = $_POST['reg_infos'];
        $dateinscrit = getdate();





        $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_inscription WHERE id_offre= '$id_offre' AND nom='$bnom' and prenom='$bprenom'" );

        if (is_null($row)){
          //TODO a faire verifier

          $result = $wpdb->insert("{$wpdb->prefix}tuts_inscription",
          array(
            'id_offre' => $id_offre,
            'nom' => $bnom,
            'prenom'=> $bprenom,
            'commune' => $bcommune,
            'addr_mail' => $bmail,
            'telephone' => $btel,
            'date' => $bdate,
            'horaire' => $bheure,
            'benevolat' => $bdeja,
            'connaissance' => implode($bconnututs, ", "),
            'info' => $binfos,
              'date_inscrit' => $dateinscrit['year'] . "/". $dateinscrit['mon'] ."/". $dateinscrit['mday']
           ));

          if ($result!==false) {
            //TODO envoyer un mail

            echo "<p>Merci de vous être inscrit à cette offre, vous êtes dorénavant un Bénévole d'un Jour!</p>

            <p>Un mail à été envoyé au responsable de l'expérience. Il vous contactera  pour valider votre inscription et convenir des détails de la mission.</p>

            <p>Si le responsable d'expérience ne vous appelle pas d'ici 7 jours, veuillez contacter l'association en question ou choisir une autre mission!</p>" ;
          } else {
            echo"<p> Une erreur lors du traitement a été relevé, veuillez nous contacter à l'adresse mail tousunistoussolidaires@gmail.com. </p>";
            echo '<button style ="display:inline"class="btn btn-warning btn-lg" onclick="history.go(-1)"> Modifier le formulaire</button>';
          }
          //TODO Traitement de l'insertion

      }else{
        echo "<p>";
        echo "Vous semblez être déjà inscrit pour cette offre, si vous souhaitez la refaire, veuillez contacter l'association en question." ;
        echo "</p>";

        //TODO Afficher message d'erreur si le num_id est déjà utilisé
      }


    } else {
      echo "<p>";
      echo " Certains champs n'ont pas été saisi, veuillez remplir le formulaire.";
      echo "</p>";
      echo '<button style ="display:inline"class="btn btn-warning btn-lg" onclick="history.go(-1)"> Modifier le formulaire</button>';
    }
    ?>
  <a href="<?=home_url( '/' )?> " class="btn btn-default btn-lg" role="button">Retour à l'accueil principal</a>
  </div>

  <div class="col-lg-2 contenu aside">
    <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_b.gif" alt="" id="aside_b"/> -->
  </div>
</div>
<!-- Row -->

  <img alt="" class="img-responsive image_bas" src ="<?php bloginfo('template_url'); ?>/img/Bannierebas.png">

<div class="clear">

</div>



</div>
<!-- Container fluid -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/tuts_script.js"></script>

<?php get_footer(); ?>
