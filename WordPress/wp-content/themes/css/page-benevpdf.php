<?php /* Template Name: Benevole PDF */ ?>
<?php
$fields = get_fields($_POST['post_id']); // On recupere les informations du post
$post = get_post($_POST['post_id']);
global $wpdb;
setup_postdata( $post );

$author = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_association where id_user =".$post->post_author);


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
$pdf->Rect(55+15,40,210-55-30,25);                      // 15 = marge , 210 = Taille total A4, 55 = Taille logo + 5 mm de marge
$pdf->MultiCell(210-65-30,5,utf8_decode("
Nom Association / Collectif : ".$author->nom."\n
Nom Référent : ".$author->nom_ref." ".$author->prenom_ref."\n
\n
\n\n\n
"),0,'L');
                                                      // FIN ASSOCIATION



                                                      // DEBUT TABLEAU RECAP DE L'Offre

$pdf->SetWidths(array((210-30)/2,(210-30)/2));        // array( longueur de la premiere colonne, longueur de la deuxieme )
$pdf->Cell(0,8,utf8_decode('Details de l\'expérience'),1,2,'C'); // Cellule de "présentation"

                                /* Ligne Titre */
$pdf->Row(array(utf8_decode("Titre de l'expérience"),utf8_decode(get_field("titre_de_lexperience"))));

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

      // Ensuite on les affiche un par un dans un liste (?) il faut aussi verifier s'il s'agit de celui qui a poster l'offre

      $strdate .= "- ". $date . " à ". $time . " d'une durée approximative de " . $duree . " heures.";
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
