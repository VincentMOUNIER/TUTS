
<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbname=tuts;charset=utf8', 'root', 'root');
} catch (Exception $e) {
  die('erreur :'  . $e->getMessage());
}

  if (!empty($_POST['mail']))
  {
    $query=$bdd->prepare('select * from tuts_preinscription where mail=?');
    $query->execute(array($_POST['mail']));
    $row = $query->rowCount();
    $bdd->beginTransaction();

    if ($row > 0 ) {
      echo '0';

    } else {

      echo "1";
      $queryadd =$bdd->prepare('INSERT INTO `tuts_preinscription` (`mail`) VALUES(?);');
      $queryadd->execute(array($_POST['mail']));



    }
  }

  ?>
