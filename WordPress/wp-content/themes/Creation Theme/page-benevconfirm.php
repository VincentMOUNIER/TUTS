<?php /* Template Name: Confirmation Benevole */ ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class="main page">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->
      <p> Hey </p>
      <?php


      // Utiliser les $_SESSION ?




      if(!empty($_POST['form_confirm'])&&
      !empty( $_POST['reg_name'])&&
      !empty( $_POST['reg_addr'])&&
      !empty( $_POST['reg_website'])&&
      !empty( $_POST['reg_ref_name'])&&
      !empty( $_POST['reg_ref_pname'])&&
      !empty( $_POST['reg_ref_fonction'])&&
      !empty( $_POST['reg_ref_tel'])&&
      !empty($_POST['reg_ref_mail'])&&
      !empty( $_POST['reg_mission'])&&
      !empty($_POST['reg_act'])&&
      !empty( $_POST['reg_val'])&&
      !empty( $_POST['reg_projet'])


      ) { //TODO ameliorer la validation d'un formulaire complet ( ??? button grisé si formulaire non complet js)
        global $wpdb;


        $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_association WHERE ass_referente = '$reg_assref'AND nom = '$reg_name'" );

        if (is_null($row)){
          //TODO a faire verifier

          $result = $wpdb->insert("{$wpdb->prefix}tuts_inscription",
          array('id_user'=> $user_id,
          'login' => $login,
          'mdp'=>$mdp,
          'num_id'=>$reg_idnum,
          'ass_referente' => $reg_assref,
          'nom'=> $reg_name,
          'adresse' => $reg_addr,
          'site_web' =>  $reg_website,
          'nom_ref' =>  $reg_ref_name,
          'prenom_ref' =>  $reg_ref_pname,
          'fonction_ref' => $reg_ref_fonction,
          'tel_ref' => $reg_ref_tel ,
          'email_ref' =>  $reg_ref_mail,
          'mission' =>  $reg_mission,
          'activite'  =>  $reg_act,
          'valeur'  =>  $reg_val,
          'projet' => $reg_projet ));

          if ($result!==false) {
            echo "Votre enregistrement a été pris en compte, vous recevrez un mail contenant vos informations de connexion après confirmation de notre part" ;
          }
          else {echo"Une erreur lors du traitement a été relevé, veuillez réessayer.";}
          //TODO Traitement de l'insertion

      }else{
        echo "Vous vous êtes inscrit récemment, veuillez attendre confirmation de notre part pour obtenir vos identifiants" ;


        //TODO Afficher message d'erreur si le num_id est déjà utilisé
      }


    } else {
      echo " Certains champs n'ont pas été saisi, veuillez remplir le formulaire.";
    }
    ?>

  </div>
</div>
</div>


<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>
