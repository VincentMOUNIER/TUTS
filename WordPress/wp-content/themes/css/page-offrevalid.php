<?php /* Template Name: Valider offre */ ?>
<?php
if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
} else {
  $post = get_post($_POST['post_id']);
  $post_user = $post->post_author;
  $current_user = wp_get_current_user();
  if ($current_user->ID != $post_user) {
    wp_redirect( get_permalink( $post->post_parent )); exit;
  }
}

$fields = get_fields($_POST['post_id']); // On recupere les informations du post
$post = get_post($_POST['post_id']);
global $wpdb;
setup_postdata( $post );

$author = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_association where id_user = '$post->post_author'");


require( ABSPATH."wp-includes/mc_table.php");
$upload_dir = wp_upload_dir();
$pdf = new PDF_MC_Table("P",'mm','A4');
$pdf->SetMargins(15,15);
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetTitle("Offre d'expérience", true);
/** HEADER PDF -> TITRE, LOGO, ASSOCIATION **/
$pdf->Cell(0,10,utf8_decode('Offre d\'expérience'),1,1,'C'); //TITRE
$pdf->Image($upload_dir['basedir']."/TuTS_Logo-sans-date-ni-base-CMJN.jpg",null,40,50,50); // LOGO


$pdf->Cell(0,15,"","",1); // Cell pour ajuster en y     // ASSOCIATION
$pdf->Cell(60); // Cell pour ajuster en x

$pdf->SetFont("Arial",'',12);
$pdf->Rect(55+15,40,210-55-30,45);                      // 15 = marge , 210 = Taille total A4, 55 = Taille logo + 5 mm de marge
$pdf->MultiCell(210-65-30,5,utf8_decode("
Nom Association / Collectif : ".$author->nom."\n
Nom Référent : ".$author->nom_ref." ".$author->prenom_ref."\n
Téléphone Référent : ".$author->tel_ref."\n
Mail Référent : ".$author->email_ref."\n
"),0,'L');
                                                      // FIN ASSOCIATION

                                                      // DEBUT DATE SOUMISSION DE L'OFFRE
$pdf->Cell(0,10,'',0,2); // marge puis retour à la ligne
$pdf->Cell(0,10,utf8_decode("Offre soumis le ".$post->post_date."."),0,2);
                                                      // FIN DATE SOUMISSION DE L'Offre
                                                      //
                                                      // DEBUT TABLEAU RECAP DE L'Offre

$pdf->SetWidths(array((210-30)/2,(210-30)/2));
$pdf->Cell(0,8,utf8_decode('Details de l\'expérience'),1,2,'C');
$pdf->Row(array(utf8_decode("Titre de l'expérience"),get_field("titre_de_lexperience")));
$type = get_field_object("type_dexperience");

foreach( $type['value'] as $term ):
$stringtype .= "- ".$term->name."\n";
endforeach;

$pdf->Row(array(utf8_decode("Type d'expérience"),utf8_decode($stringtype)));


//
// function pdfRow($pdf,$title,$info) {
//
//   $nb_chariot = (INT)(mb_strlen($info,'utf-8')/27);
//   for ($i=0; $i < $nb_chariot; $i++) {
//     $chariot .="\n";
//   }
//   $pdf->MultiCell((210-30)/2,8,utf8_decode($title.$chariot),1,'L'); // TITRE DE LA LIGNE
//   $current_x = $pdf->GetX();
//   $current_y = $pdf->GetY();
//
//   $pdf->SetXY($current_x+((210-30)/2),$current_y-(8) ); // If nbchariot > 0 8*nbchariot else = 8
//   $pdf->setFillColor(210,210,210);
//   $pdf->MultiCell((210-30)/2,8,utf8_decode($info.$nb_chariot),1,'L',true);  //INFORMATION DE L'OFFRE
//   $pdf->setFillColor(0,0,0);
// }
//
// pdfRow($pdf,'Titre de l\'expérience',"wwwwwwwwwwwwwwwwwwwwwww"); // 1ere ligne "Titre"


//
// pdfRow($pdf,'Type d\'expérience',$stringtype);


$pdf->Output();

?>
<?php get_header('aide');
function child_theme_head_script() { ?>
  <link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" />
  <?php }
  add_action( 'wp_head', 'child_theme_head_script' );?>

  <div class="container-fluid conteneur">

    <div class="row">

      <div class="col-lg-2 contenu aside">

        <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
      </div>

      <div class="col-lg-8 contenu texte_contenu">
        <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
        <!-- Partie identification -->
        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
              Votre offre a été publié, vous allez être redirigé vers vos offres.
              <a href="<?=get_page_link(110)?> ">Cliquez ici</a> si vous n'avez pas été redirigé.
              <?php




              //TODO Changer draft into publish $_POST['post_id']
              $title = get_field("titre_de_lexperience", $_POST['post_id']);
              $current_post = array (
                  'ID' => $_POST['post_id'],
                  'post_status' => 'publish',
                  'post_title' => $title
              );

              wp_update_post($current_post);





              ?>
            <?php endwhile; ?>


          </div><!-- #content -->
        </div><!-- #primary -->
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
  <script>

  </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



  <script src="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
  <?php get_footer(); ?>
