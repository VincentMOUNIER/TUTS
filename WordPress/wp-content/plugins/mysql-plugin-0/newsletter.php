<?php
include_once plugin_dir_path(__FILE__).'/newsletterwidget.php';

class Tuts_Newsletter
{
    public function __construct()
    {
      add_action('widgets_init', function() {
        register_widget('Tuts_Newsletter_Widget');
        add_action('wp_loaded', array($this, 'save_email'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));

      } );
    }



/* Menu Plugin */
    public function register_settings() {
      register_setting('tuts_mail_settings', 'tuts_mail_sender');
      register_setting('tuts_mail_settings', 'tuts_mail_object');
      register_setting('tuts_mail_settings', 'tuts_mail_message');
      add_settings_section('tuts_mail_section','Envoi d\'un mail general', array($this, 'section_html'), 'tuts_mail_settings');

      add_settings_field('tuts_mail_sender', 'Expediteur', array($this, 'sender_mail_html'),'tuts_mail_settings','tuts_mail_section');
      add_settings_field('tuts_mail_object', 'Objet', array($this, 'object_mail_html'),'tuts_mail_settings','tuts_mail_section');
      add_settings_field('tuts_mail_message', 'Message', array($this, 'message_mail_html'),'tuts_mail_settings','tuts_mail_section');
    }

    public function section_html(){
      echo 'Mail à envoyer (ce message s\'enverra à toute personne ayant renseigné son email grâce à la page vitrine) :';
    }


    public function add_admin_menu() {
      $hookmail = add_submenu_page('tuts', 'Mail','Envoi de Mail','manage_options','tuts_mail',array($this, 'mail_menu_html'));
      add_submenu_page('tuts', 'Parameters','Parametres du plugin','manage_options','tuts_parameters',array($this, 'parameters_menu_html'));
      $hookassociation = add_submenu_page('tuts', 'Associations','Association en Attente','manage_options','tuts_pending_ass',array($this, 'pending_menu_html'));
      add_action('load-'.$hookmail, array($this, 'process_action'));
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
      $receive = $wpdb->get_results("SELECT email FROM {$wpdb->prefix}tuts_email");
      $header = array('From : '.$_POST['tuts_mail_sender']);
      $textresult =0;
      foreach($receive as $_receive) {
        $result = wp_mail($_receive->email,$_POST['tuts_mail_object'],$_POST['tuts_mail_message'],$header);
        if($result) { $textresult++;}

      }
      $_POST['cptresult'] = $textresult;





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
      <form method="post" action="options.php">
        <?php settings_fields('tuts_mail_settings')?>
        <label> E-mail de l'expéditeur </label>
      <input type="email" name="tuts_mail_sender" value="<?php echo get_option('tuts_mail_sender') ?>"/>
      </form>
      <?php submit_button();
    }




    public function sender_mail_html() {
      ?>

      <input type="email" name="tuts_mail_sender" value="<?php echo get_option('tuts_mail_sender') ?>" id="inputmail"/>
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

    public function pending_menu_html() {

      echo '<h1>'.get_admin_page_title().'</h1>';
      echo '<p> Ici vous gerer les associations en cours de validation </p>';
      global $wpdb;

      $resultat = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tuts_association WHERE validation = 0 ");
      $sqlError = $wpdb->last_error;
      if ($sqlError == "") {
          if ($wpdb->num_rows > 0){
            ?>
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
            <?php
          }
      }else{
        //TODO Gerer les erreurs
        echo "SQLERROR";
        echo $erreurSql;
      }



    }

    public function send_verification() {
      global $wpdb;
      $resultat = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tuts_association WHERE validation = 0 ");
      $sqlError = $wpdb->last_error;
      if ($sqlError == "") {
        foreach($resultat as $row){
          if (isset($_POST[$row->id_association])){

            if($_POST[$row->id_association]=="accept"){
              //TODO send mail accept et set validation = 1
              
              $wpdb->update("{$wpdb->prefix}tuts_association", array('validation'=> '1'), array( 'id_association' => $row->id_association ), array('%d'));

            } else {
              //TODO send mail refuse et Supprimer de la table ( stocker dans une liste noire ? )

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

  $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}tuts_email (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");

}

public function save_email() {
  if (isset($_POST['mail']) && !empty($_POST['mail'])){
    global $wpdb;
    $email = $_POST['mail'];

    $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_email WHERE email = '$email'");

    if(is_null($row)){
      $wpdb->insert("{$wpdb->prefix}tuts_email",array('email' => $email ));
    }

  }
}


}


?>
