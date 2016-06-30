<?php /* Template Name: Offre PDF */ ?>
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

$pdf->SetWidths(array((210-30)/2,(210-30)/2));        // array( longueur de la premiere colonne, longueur de la deuxieme )
$pdf->Cell(0,8,utf8_decode('Details de l\'expérience'),1,2,'C'); // Cellule de "présentation"

                                /* Ligne Titre */
$pdf->Row(array(utf8_decode("Titre de l'expérience"),get_field("titre_de_lexperience")));

                                /* Ligne Type d'experience */
$type = get_field_object("type_dexperience");
foreach( $type['value'] as $term ):
  $stringtype .= "- ".$term->name."\n";
endforeach;
$pdf->Row(array(utf8_decode("Type d'expérience"),utf8_decode($stringtype)));

                                /* Accessibilité */
$accessibilite = get_field("accessibilite");
if (is_array($accessibilite)) {
  if (in_array("Mineur", $accessibilite)) {
    $stracces.= "- Accessible aux personnes mineures \n";
  } else {
    $stracces .= "- N'est pas accessible aux personnes mineures \n";
  }
  if (in_array("Handicap", $accessibilite)) {
    $stracces .= "- Accessible aux personnes possédant un handicap \n";
  } else {
    $stracces .= "- N'est pas accessible aux personnes possédant un handicap \n";
  }
} else {
$stracces .= "- N'est pas accessible aux personnes mineurs \n";
$stracces .= "- N'est pas accessible aux personnes possédant un handicap \n";
}
$pdf->Row(array(utf8_decode("Accessibilité"),utf8_decode($stracces)));

                      /* Adresse de l'experience*/
$location = get_field("adresse_de_l_experience");
$pdf->Row(array(utf8_decode("Adresse de l'expérience"),utf8_decode($location['address'])));

                      /* Moyen d'acces et detail d'acces*/
$moyenAcces = get_field("moyen_dacces");
if (is_array($moyenAcces)) {
  $pdf->Row(array(utf8_decode("Moyen d'accès"),utf8_decode(implode(", ", $moyenAcces))));
  $detailAcces = get_field("moyen_detail");
  $pdf->Row(array(utf8_decode("Details d'accès"),utf8_decode($detailAcces)));
} else {
  $pdf->Row(array(utf8_decode("Moyen d'accès"),utf8_decode("Non renseigné") ) );
}

                      /* Row Details reférent */
$pdf->Cell(0,8,utf8_decode('Details du responsable d\'expérience'),1,2,'C');

                      /* Nom Prenom Fonction Telephone */
$pdf->Row(array(utf8_decode("Nom"),utf8_decode(get_field("nom_du_referent")) ) );
$pdf->Row(array(utf8_decode("Prénom"),utf8_decode(get_field("prenom_du_referent")) ) );
$pdf->Row(array(utf8_decode("Fonction"),utf8_decode(get_field("fonction_du_referent")) ) );
$pdf->Row(array(utf8_decode("Téléphone"),utf8_decode(get_field("telephone_du_referent")) ) );

                      /* Dates */
$pdf->SetWidths(array(210-30));  // Les prochaines lignes seront des lignes non séparées donc une seule colonne
$pdf->Cell(0,8,utf8_decode('Dates de l\'expérience'),1,2,'C');
if (have_rows("date")) {  // Cas d'un repeater "date" est le nom du repeater
    while (have_rows("date"))  {
      the_row();                                                    // On recupere chaque element du repeater : à savoir la date,
      $date = date("d/m/y", get_sub_field('date'));                              // l'heure de debut, l'heure de fin et le nb de places
      $time = date("H:i", get_sub_field('date'));
      $duree = get_sub_field('duree');
      $nbPlaces = get_sub_field('nombre_de_places_disponibles');

      // Ensuite on les affiche un par un dans un liste (?) il faut aussi verifier s'il s'agit de celui qui a poster l'offre

      $strdate .= "- ". $date . " à ". $time . " d'une durée approximative de " . $duree . " heures pour environ " . $nbPlaces ." personnes.";
      $strdate .= "\n";
    }

    $pdf->Row(array(utf8_decode($strdate)));
  } else {
    $pdf->Cell(0,8,utf8_decode("Pas de date renseignée"),1,2,'C');
  }


                  /* Definition */

$pdf->Cell(0,8,utf8_decode("Description de l'offre"),1,2,'C');
$pdf->Row(array(utf8_decode(get_field("definition"))));
$pdf->Output();
?>

<?php get_header('aide');?>

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
