<?php /* Template Name: Confirmation association */ ?>
<?php get_header('aide'); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-2 contenu aside">

      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
    </div>

    <div class="col-lg-8 contenu texte_contenu">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->
      <p> Hey </p>
      <?php
      function generate_login($car) {
$string = "TUTS_";
$chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
srand((double)microtime()*1000000);
for($i=0; $i<$car; $i++) {
$string .= $chaine[rand()%strlen($chaine)];
}
return $string;
}

// APPEL
// Génère une chaine de longueur 20




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

        if ($_POST['reg_assref']==="1"){ // si c'est assoss
        $reg_idnum= $_POST['reg_idnum'];
        $reg_assref = NULL;

          $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_association WHERE num_id = '$reg_idnum'" );
      } elseif ($_POST['reg_idnum']==="1") { // si c'est collectif
        $reg_assref= $_POST['reg_assref'];
        $reg_idnum= NULL;
        $reg_name = $_POST['reg_name'];


          $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_association WHERE ass_referente = '$reg_assref' AND nom = '$reg_name'" );
      }



        if (is_null($row)){
          do {
          $login = generate_login(5);
        } while (username_exists( $login ));

           //TODO a faire verifier


          $mdp = wp_generate_password( $length=10, $include_standard_special_chars=false );

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
          $reg_domaineaction = implode(" | ", $_POST['domain_group']);

          $userdata = array (
          'user_login'  =>  $login,
          'user_pass'    =>  $mdp,
          'user_email'   =>  $reg_ref_mail,
          'display_name' => $reg_name
          );

          $user_id = wp_insert_user( $userdata );
          if ( is_wp_error( $user_id ) ) {
              echo $user_id->get_error_message();
            }


          $result = $wpdb->insert("{$wpdb->prefix}tuts_association",
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
          'projet' => $reg_projet,
          'act' => $reg_domaineaction));

          if ($result!==false) {




            echo "Votre enregistrement a été pris en compte, vous recevrez un mail contenant vos informations de connexion après confirmation de notre part" ;




          } else { echo "Une erreur lors du traitement a été relevé, veuillez réessayer.";
            wp_delete_user($user_id);
          }
          //TODO Traitement de l'insertion

        }else{
          echo "Vous vous êtes inscrit récemment, veuillez attendre confirmation de notre part pour obtenir vos identifiants" ;



        }


      } else {
          echo " Certains champs n'ont pas été saisi, veuillez remplir le formulaire.";
      }
      ?>

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
