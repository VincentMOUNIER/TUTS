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

      add_settings_section('tuts_mail_section','Envoi d\'un mail general', array($this, 'section_html'), 'tuts_mail_settings');

    }

    public function section_html(){
      echo 'Mail à envoyer :';
    }


    public function add_admin_menu() {
      $hook = add_submenu_page('tuts', 'Mail','Envoi de Mail','manage_options','tuts_mail',array($this, 'mail_menu_html'));
      add_submenu_page('tuts', 'Parameters','Parametres du plugin','manage_options','tuts_parameters',array($this, 'parameters_menu_html'));
      add_submenu_page('tuts', 'Base de données','Base de données','manage_options','tuts_bd',array($this, 'bd_menu_html'));
      add_action('load-'.$hook, array($this, 'process_action'));

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

      </style>




      <form method="post" action="">
        <?php  settings_fields('tuts_mail_settings') ?>
        <label>Expediteur</label>
        <input type="email" name="tuts_mail_sender" value="<?php echo get_option('tuts_mail_sender') ?>"/>
        <label>Objet</label>
        <input type="text" name="tuts_mail_object" />
        <label>Message</label>
        <textarea name="tuts_mail_message" /></textarea>
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






    public function bd_menu_html() {
      ?>



      <?php
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
