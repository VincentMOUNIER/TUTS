<?php /* Template Name: Confirmation association */ ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class="main page">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->
      <p> Hey </p>
      <?php
      function generer_mot_de_passe($nb_caractere)
      {
        $mot_de_passe = "";

        $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789+@!$%?&";
        $longeur_chaine = strlen($chaine);

        for($i = 1; $i <= $nb_caractere; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $mot_de_passe .= $chaine[$place_aleatoire];
        }

        return $mot_de_passe;
      }



      if(isset($_POST['form_confirm'])) {
        global $wpdb;

        $id_num = $_POST['reg_idnum'];

        $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_association WHERE num_id = '$id_num'" );

        if (is_null($row)){

          $login = uniqid('TUTS'); // TODO generate login
          $mdp = generer_mot_de_passe(mt_rand(8,12)); // TODO generate mdp
          $reg_idnum= $_POST['reg_idnum'];
          $reg_name = $_POST['reg_name'];
          $reg_addr = $_POST['reg_addr'];
          $reg_website = $_POST['reg_website'];
          $reg_ref_name = $_POST['reg_ref_name'];
          $reg_ref_pname = $_POST['reg_ref_pname'];
          $reg_ref_fonction = $_POST['reg_ref_fonction'];
          $reg_ref_tel = $_POST['reg_ref_tel'];
          $reg_ref_mail =$_POST['reg_ref_mail'];
          $reg_mission = $_POST['reg_mission'];
          $reg_act =$_POST['reg_act'];
          $reg_val = $_POST['reg_val'];
          $reg_projet = $_POST['reg_projet'];

          $result = $wpdb->insert("{$wpdb->prefix}tuts_association", array('login' => $login, 'mdp'=>$mdp, 'num_id'=>$reg_idnum,'nom'=> $reg_name, 'adresse' => $reg_addr, 'site_web' =>  $reg_website, 'nom_ref' =>  $reg_ref_name, 'prenom_ref' =>  $reg_ref_pname, 'fonction_ref' => $reg_ref_fonction,
          'tel_ref' => $reg_ref_tel ,'email_ref' =>  $reg_ref_mail, 'mission' =>  $reg_mission, 'activite'  =>  $reg_act,  'valeur'  =>  $reg_val,'projet' => $reg_projet ));
          if ($result!==false) {echo "Votre enregistrement a été pris en compte, vous recevrez un mail contenant vos informations de connexion après confirmation de notre part" ;}
          else {echo"Une erreur lors du traitement a été relevé, veuillez réessayer.";}
          //TODO Traitement de l'insertion
        }else{
          echo "Ce numéro d'identification a déjà été entré, si vous vous êtes inscrit récemment, veuillez attendre confirmation de notre part pour ainsi obtenir vos identifiants" ;
          //TODO Afficher message d'erreur si le num_id est déjà utilisé
        }


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
