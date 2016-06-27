<?php
include_once plugin_dir_path(__FILE__).'/newsletterwidget.php';
include_once plugin_dir_path(__FILE__).'/formtransitionwidget.php';
class Tuts_Newsletter
{
  public function __construct()
  {
    add_action('wp_loaded', array($this, 'save_email'));
    add_action('admin_menu', array($this, 'add_admin_menu'),20);
    add_action('admin_init', array($this, 'register_settings'));
    add_action('widgets_init', function() {
      register_widget('Tuts_Newsletter_Widget');
      register_widget('Tuts_FormBenevole_Widget');
    } );


  }



  /* Menu Plugin */
  public function register_settings() {

    register_setting('tuts_mail_settings', 'tuts_mail_object');
    register_setting('tuts_mail_settings', 'tuts_mail_message');
    register_setting('tuts_mail_settings', 'tuts_mail_dest');

    register_setting('tuts_mail_settings', 'tuts_sendaccept_message');
    register_setting('tuts_mail_settings', 'tuts_sendrefuse_message');

    add_settings_section('tuts_mail_section','Envoi d\'un mail general', array($this, 'section_html'), 'tuts_mail_settings');


    add_settings_field('tuts_mail_dest','Destinaire : ' , array($this, 'dest_mail_html'),'tuts_mail_settings','tuts_mail_section');
    add_settings_field('tuts_mail_object', 'Objet', array($this, 'object_mail_html'),'tuts_mail_settings','tuts_mail_section');

    add_settings_field('tuts_mail_message', 'Message', array($this, 'message_mail_html'),'tuts_mail_settings','tuts_mail_section');
  }

  public function section_html(){
    echo 'Mail à envoyer (ce message s\'enverra à toute personne ayant renseigné son email grâce à la page vitrine) :';
  }


  public function add_admin_menu() {
    // Initialisation des differents menus
    add_submenu_page('tuts', 'Parameters','Parametres du plugin','manage_options','tuts_parameters',array($this, 'parameters_menu_html'));
    add_submenu_page('tuts','ListMail','Liste des Mail','manage_options','tuts_listmail',array($this,'listmail_html'));

    $hookmail = add_submenu_page('tuts', 'Mail','Envoi de Mail','manage_options','tuts_mail',array($this, 'mail_menu_html'));
    add_action('load-'.$hookmail, array($this, 'process_action'));

    $hookassociation = add_submenu_page('tuts', 'Associations','Association en Attente','manage_options','tuts_pending_ass',array($this, 'pending_menu_html'));
    add_action('load-'.$hookassociation, array($this, 'verification_confirmform'));

  }

  public function verification_confirmform(){
    if (isset($_POST['form_pending'])) {
      $this->send_verification();
    }
  }


  public function process_action(){
    if (isset($_POST['send_mail'])) {
      $this->send_mail();

    }
  }


  public function send_mail(){
    global $wpdb;

    if ($_POST['tuts_mail_dest_asso']==="on" && $_POST['tuts_mail_dest_bene']==="on"){
      $receive = $wpdb->get_results("SELECT email FROM {$wpdb->prefix}tuts_email");
    }elseif ($_POST['tuts_mail_dest_asso']==="on") {
      $receive = $wpdb->get_results("SELECT email FROM {$wpdb->prefix}tuts_email where type='association'");
    }elseif ($_POST['tuts_mail_dest_bene']==="on") {
      $receive = $wpdb->get_results("SELECT email FROM {$wpdb->prefix}tuts_email where type='benevole'");
    }

    $header = array('From : '.$_POST['tuts_mail_sender']);
    $textresult =0;
    foreach($receive as $_receive) {
      $result = wp_mail($_receive->email,$_POST['tuts_mail_object'],$_POST['tuts_mail_message'],$header);
      if($result) { $textresult++;}

    }
    $_POST['cptresult'] = $textresult;





  }


  public function listmail_html() {
    echo '<h1>'.get_admin_page_title().'</h1>';
    echo '<p> Ici vous trouverez les mails enregistrés </p>';

    global $wpdb;
    $select = $wpdb->get_results("SELECT * from {$wpdb->prefix}tuts_email");
    ?>
    <table>
      <thead>
        <td>Email</td>
        <td>Type</td>
      </thead>
      <tbody>
        <?php
        foreach($select as $row){
          echo "<tr>";
          echo "<td>". $row->email ."</td>";
          echo "<td>". $row->type." </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
    <?php

  }

  public function mail_menu_html() {
    echo '<h1>'.get_admin_page_title().'</h1>';
    echo '<p> Ici vous managerez les envois de mail </p>';
    ?>
    <style>
    #inputobject {
      width : 20%;
    }

    textarea {
      width : 100%;
      height: 350px;
    }
    </style>
    <form method="post" action="">
      <?php  settings_fields('tuts_mail_settings') ?>
      <?php  do_settings_sections('tuts_mail_settings') ?>
      <input type="hidden" name="send_mail" value="1"/>
      <?php submit_button("Envoyer"); ?>
    </form>
    <p><?php if(isset($_POST['send_mail'])) {
      echo "Vous avez envoyé ce mail à ".$_POST['cptresult']." boites mail.";?></p><?php
    }
  }



  public function parameters_menu_html(){
    echo '<h1>'.get_admin_page_title().'</h1>';
    echo '<p> Ici vous parametrerez les options du plugin </p>';?>
    <style>
    textarea {
      width : 100%;
      height: 350px;
    }
    </style>



    <form method="post" action="options.php">
      <?php settings_fields('tuts_mail_settings')?>
      <p> Vous parametrerez le modele de mail pour l'envoi des identifiants ajouter [identifiant] à l'endroit souhaité pour afficher les identifiants </p>
      <label> Mail à envoyer (validation) :  </label>
      <textarea  name="tuts_sendaccept_message" ><?php echo get_option('tuts_sendaccept_message')?></textarea>

      <p> Vous parametrerez le modele de mail lors d'un refus </p>

      <label> Mail à envoyer (refus) :  </label>
      <textarea  name="tuts_sendrefuse_message" ><?php echo get_option('tuts_sendrefuse_message')?></textarea>


      <?php submit_button();?>


    </form>
    <?php
  }






  public function object_mail_html(){
    ?>

    <input type="text" name="tuts_mail_object" id="inputobject"/>
    <?php
  }

  public function message_mail_html(){
    ?>

    <textarea name="tuts_mail_message" id="inputmsg"/></textarea>
    <?php
  }

  public function dest_mail_html(){
    ?>

    <label><input type="checkbox" name="tuts_mail_dest_asso" id="inputdestasso"/>Associations/Collectifs</label>
    <label><input type="checkbox" name="tuts_mail_dest_bene" id="inputdestbene"/>Benevoles</label>

    <?php
  }

  public function pending_menu_html() {

    echo '<h1>'.get_admin_page_title().'</h1>';
    echo '<p> Ici vous gerez les associations en cours de validation </p>';
    global $wpdb;

    $resultat = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tuts_association WHERE validation = 0 ");
    $sqlError = $wpdb->last_error;
    if ($sqlError == "") {
      if ($wpdb->num_rows > 0){
        ?>
        <div>
        <form action="" method="POST">

          <table>
            <thead>
              <td>Nom Association</td>
              <td>Id Association</td>

                <td>Accepter</td>
                <td>Refuser</td>
              </thead>
              <tbody>
                <?php
                foreach($resultat as $row){
                  echo "<tr>";
                  echo "<td>". $row->nom ."</td>";
                  echo "<td>". $row->num_id." </td>";
                  echo '<td><input type="radio" name="'.$row->id_association.'" value="accept"></td>';
                  echo '<td><input type="radio" name="'.$row->id_association.'" value="refuse"></td>';
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
            <input type="hidden" name="form_pending" value="1"> <!-- Valeur pour verifier si on a soumis le formulaire au chargement de la page (voir verification_confirmform() plus haut)-->
            <button type="submit">Valider</button>

            <style>
            .cell-div {
              width : 400px;
              word-break: break-all;
              vertical-align :top;
              display : inline-block;
            }
            p, h3{
              margin : 3px;
              margin-left : 20px;
            }
            p {
              margin-bottom : 10x;
              margin-left : 30px;
            }
            h2,H1 {
              text-align : center ;
            }

            </style>


            <div>
              <?php
              foreach($resultat as $row){

                ?>
              <div class="cell-div">

                <H1> <?php echo $row->nom?> <H1>
                  <H2> General </H2>
                  <H3> Type </H3>
                  <p> <?php if ($row->ass_referente==NULL) {
                    echo "Association";
                  } else {
                    echo "Collectif";
                  }
                  ?>
                   </p>

                  <H3> Adresse </H3>
                  <p><?php echo $row->adresse?></p>

                  <H3> Site Web </H3>
                  <p> <?php echo $row->site_web?> </p>

                  <H2> Referent </H2>
                  <H3>Nom Referent</H3>
                  <p> <?php echo $row->nom_ref?></p>

                  <H3>Prenom Referent</H3>
                  <p><?php echo $row->prenom_ref?> </p>

                  <H3>Fonction Referent</H3>
                  <p><?php echo $row->fonction_ref?></p>

                  <H3>Telephone Referent</H3>
                  <p><?php echo $row->tel_ref?></p>

                  <H3>Email Referent</H3>
                  <p><?php echo $row->email_ref?></p>

                  <H2> Informations </H2>

                  <H3>Activite</H3>
                  <p> <?php echo $row->activite?> </p>

                  <H3>Valeur</H3>
                  <p> <?php echo $row->valeur?> </p>

                  <H3>Domaine d'action</H3>
                  <p> <?php echo $row->act?> </p>
                </div>
              <?php
              }
              ?>
              </div>
            </div>




              <?php
            }else{
              echo "<p> Vous n'avez aucune association en attente de confirmation</p>";
            }
          }else{
            //TODO Gerer les erreurs
            echo "SQLERROR";
            echo $erreurSql;
          }


          ?>
          <script type="text/javascript">
          jQuery.noConflict();

          jQuery(function(){
            var allRadios = jQuery('input[type=radio]')
            var radioChecked;
            var setCurrent =
            function(e) {
              var obj = e.target;
              radioChecked = jQuery(obj).attr('checked');
            }
            var setCheck =
            function(e) {

              if (e.type == 'keypress' && e.charCode != 32) {
                return false;
              }
              var obj = e.target;

              if (radioChecked) {
                jQuery(obj).attr('checked', false);
              } else {
                jQuery(obj).attr('checked', true);
              }
            }
            jQuery.each(allRadios, function(i, val){
              var label = jQuery('label[for=' + jQuery(this).attr("id") + ']');

              jQuery(this).bind('mousedown keydown', function(e){
                setCurrent(e);
              });
              label.bind('mousedown keydown', function(e){
                e.target = jQuery('#' + jQuery(this).attr("for"));
                setCurrent(e);
              });
              jQuery(this).bind('click', function(e){
                setCheck(e);
              });
            });
          });
          </script>
          <?php



        }

        // Envoi de mail avec identifiant lors de la confirmation de la part de l'administrateur
        public function send_verification() {
          global $wpdb;
          $resultat = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tuts_association WHERE validation = 0 ");
          $sqlError = $wpdb->last_error;
          if ($sqlError == "") {
            foreach($resultat as $row){
              if (isset($_POST[$row->id_association])){

                if($_POST[$row->id_association]=="accept"){
                  //TODO send mail accept

                  $str_loginpw ="Utilisateur : ".$row->login."\nMot de passe : ".$row->mdp ;
                  $message = str_ireplace("[identifiant]",$str_loginpw,get_option('tuts_sendaccept_message'));

                  $header = array('From : '.get_option('tuts_mail_sender'));

                  wp_mail($row->email_ref,"Vos identifants Tous Unis Tous Solidaires",$message,$header);

                  $wpdb->update("{$wpdb->prefix}tuts_association", array('validation'=> '1'), array( 'id_association' => $row->id_association ), array('%d'));
                  wp_update_user(array ('ID' => $row->id_user, 'role' => 'publisher'));
                } elseif ($_POST[$row->id_association]=="refuse"){

                  wp_mail($row->email_ref,"Tous Unis Tous Solidaires",get_option('tuts_sendrefuse_message'),$header);

                  $wpdb->delete ("{$wpdb->prefix}tuts_association", array('id_association' => $row->id_association));



                }

              } // fin if pour verifier si on a decidé pour une association ou non


            }
          }else{
            //TODO Gerer les erreurs
            echo "SQLERROR";
            echo $erreurSql;
          }

        }




        /*End menu Plugin */





        public function form($instance)
        {
          $title = isset($instance['title']) ? $instance['title'] : '';
          ?>
          <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
          </p>
          <?php
        }

        public static function install() {

          global $wpdb;

          $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}tuts_email (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL);");

          /*TABLE ASSOCIATION*/
          $wpdb->query("CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}tuts_association` (
          `id_association` int(11) NOT NULL,
          `id_user` int(11) NOT NULL,
          `login` varchar(255) NOT NULL,
          `mdp` varchar(255) NOT NULL,
          `num_id` varchar(255) DEFAULT NULL,
          `ass_referente` varchar(255) DEFAULT NULL,
          `nom` varchar(255) NOT NULL,
          `adresse` varchar(255) NOT NULL,
          `site_web` varchar(255) NOT NULL,
          `nom_ref` varchar(255) NOT NULL,
          `prenom_ref` varchar(255) NOT NULL,
          `fonction_ref` varchar(255) NOT NULL,
          `tel_ref` varchar(10) NOT NULL,
          `email_ref` varchar(100) NOT NULL,
          `mission` text NOT NULL,
          `activite` text NOT NULL,
          `valeur` text NOT NULL,
          `projet` text NOT NULL,
          `act_id` int(11) NOT NULL,
          `validation` int(11) NOT NULL DEFAULT '0'
        );");
        $wpdb->query("ALTER TABLE `{$wpdb->prefix}tuts_association`
        ADD PRIMARY KEY (`id_association`);");
        $wpdb->query("ALTER TABLE `{$wpdb->prefix}tuts_association`
        MODIFY `id_association` int(11) NOT NULL AUTO_INCREMENT;");


        /*TABLE HORAIRE*/
        $wpdb->query("CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}tuts_horaire` (
        `id_horaire` int(11) NOT NULL,
        `id_offre` int(11) NOT NULL,
        `h_debut` varchar(20) NOT NULL,
        `h_fin` varchar(20) NOT NULL,
        `nb_places` int(11) NOT NULL,
        `date` varchar(50) NOT NULL
      );");
      $wpdb->query("ALTER TABLE `{$wpdb->prefix}tuts_horaire`
      ADD PRIMARY KEY (`id_horaire`);");
      $wpdb->query("ALTER TABLE `{$wpdb->prefix}tuts_horaire`
      MODIFY `id_horaire` int(11) NOT NULL AUTO_INCREMENT;");

      /*TABLE inscription*/

      $wpdb->query("CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}tuts_inscription` (
      `id_inscription` int(11) NOT NULL,
      `id_offre` int(11) NOT NULL,
      `id_horaire` int(11) NOT NULL,
      `nom` varchar(255) NOT NULL,
      `prenom` varchar(255) NOT NULL,
      `addr_mail` varchar(255) NOT NULL,
      `telephone` varchar(10) NOT NULL,
      `connaissance` varchar(255) NOT NULL
    );");
    $wpdb->query("ALTER TABLE `{$wpdb->prefix}tuts_inscription`
    ADD PRIMARY KEY (`id_inscription`);");
    $wpdb->query("ALTER TABLE `{$wpdb->prefix}tuts_inscription`
    MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT;");

    /*TABLE OFFRE*/
    $wpdb->query("CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}tuts_offre` (
    `id_offre` int(11) NOT NULL,
    `titre` varchar(255) NOT NULL,
    `definition` text NOT NULL,
    `type` varchar(255) NOT NULL,
    `acces` varchar(255) NOT NULL,
    `adresse` varchar(255) NOT NULL,
    `moyen_acces` varchar(255) NOT NULL,
    `nom_ref` varchar(255) NOT NULL,
    `prenom_ref` varchar(255) NOT NULL,
    `fonction_ref` varchar(255) NOT NULL,
    `tel_ref` varchar(10) NOT NULL
  );");
  $wpdb->query("ALTER TABLE `{$wpdb->prefix}tuts_offre`
  ADD PRIMARY KEY (`id_offre`);");
  $wpdb->query("ALTER TABLE `{$wpdb->prefix}tuts_offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT;");




}

public function save_email() {
  if (isset($_POST['nouvassmail']) && !empty($_POST['nouvassmail'])){
    global $wpdb;
    $email = $_POST['nouvassmail'];
    if(($_POST['nouvetatasso']) == 'association'){
      $etat = "association";
    }else {
      $etat = "benevole";
    }

    $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_email WHERE email = '$email'");

    if(is_null($row)){
      $wpdb->insert("{$wpdb->prefix}tuts_email",array('email' => $email, 'type' => $etat ));
    }

  }
}


}


?>
