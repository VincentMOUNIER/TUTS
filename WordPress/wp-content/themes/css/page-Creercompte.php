
<?php /* Template Name: Creation Compte */ ?>

<?php //TODO Un input pour le logo et le gerer ?>
<?php get_header('aide'); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-2 contenu aside">

      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
    </div>

    <div class="col-lg-8 contenu texte_contenu">
      <div class="main page">
        <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
        <!-- Partie identification -->
        <div class="row" id="formulaire" >
          <form action="confirmation" method="post" id="idform" onsubmit="return verifAll(this)">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="form-group">
                <label> Je suis : </label>
                <input type="radio" name="reg_type" value="association" id="reg_type_ass" checked>Une association
                <input type="radio" name="reg_type" value="collectif" id="reg_type_col">Un collectif
              </div>
              <div class="form-group">
                <label id="textinp1">Numéro d'identification:</label>
                <input type="text" class="form-control" name="reg_idnum" id="reg_idnum">
                <input type="hidden" class="form-control" name="reg_assref" id="reg_assref">
              </div>

              <div class="form-group">
                <label for="email">Nom:</label>
                <input type="text" class="form-control" id="reg_name" name="reg_name" onblur="checkNom(this)">
              </div>
              <div class="form-group">
                <label for="email">Adresse :</label>
                <textarea row="4" class="form-control" id="reg_addr" name="reg_addr"></textarea>
              </div>
              <div class="form-group">
                <label for="email">Site Web:</label>
                <input type="text" class="form-control" id="reg_website" name="reg_website">
              </div>
            </div>

            <div class="col-lg-6 col-lg-offset-3">
              <fieldset>
                <legend>Référent</legend>
                <div class="form-group">
                  <label for="email">Nom Référent:</label>
                  <input type="text" class="form-control"  id="reg_ref_name" name="reg_ref_name">
                </div>
                <div class="form-group">
                  <label for="email">Prénom référent:</label>
                  <input type="text" class="form-control" id="reg_ref_pname" name="reg_ref_pname">
                </div>
                <div class="form-group">
                  <label for="email">Fonction Référent:</label>
                  <input type="text" class="form-control" id="reg_ref_fonction" name="reg_ref_fonction">
                </div>
                <div class="form-group">
                  <label for="email">Telephone Référent:</label>
                  <input type="text" class="form-control" id="reg_ref_tel" name="reg_ref_tel">
                </div>
                <div class="form-group">
                  <label for="email">Email Référent:</label>
                  <input type="email" class="form-control" id="reg_ref_mail" name="reg_ref_mail">
                </div>
              </fieldset>
            </div>
            <div class="col-lg-6 col-lg-offset-3">
              <fieldset>
                <legend>Description</legend>
                <div class="form-group">
                  <label for="comment">Mission(s):</label>
                  <textarea class="form-control" rows="5" name="reg_mission"></textarea>
                </div>
                <div class="form-group">
                  <label for="comment">Activité:</label>
                  <textarea class="form-control" rows="5" name="reg_act"></textarea>
                </div>
                <div class="form-group">
                  <label for="comment">Valeurs/Fondamentaux:</label>
                  <textarea class="form-control" rows="5" name="reg_val"></textarea>
                </div>
                <div class="form-group">
                  <label for="comment">Projet(s):</label>
                  <textarea class="form-control" rows="5" name="reg_projet"></textarea>
                </div>
                <div class="row">
                  <label>Domaine(s) d'activité</label>
                </div>

                <div class="col-lg-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Accompagnement Social">Accompagnement Social</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Citoyenneté et Droits de Humains">Citoyenneté et Droits de Humains</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Culture" >Culture</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Développement local">Développement local</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Diversité Culturelle">Diversité Culturelle</label>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Economie Sociale et Solidaire">Economie Sociale et Solidaire</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Education">Education</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Environnement">Environnement</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Insertion">Insertion</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Loisir">Loisir</label>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Protection et Défense des animaux">Protection et Défense des animaux</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Santé">Santé</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Solidarité internationale et action humanitaire">Solidarité internationale et action humanitaire</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Sport">Sport</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="domain_group[]" value="Autre">Autre</label>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
          <div class="col-lg-6 col-lg-offset-3">
            <fieldset>
              <legend id="charte">Charte</legend>
              <div class="row" id="charte_contenu">
                <?php if (have_posts()) : ?>
                  <?php while (have_posts()) : the_post(); ?>
                    <div class="post">
                      <div class="post-content"> <?php the_content(); ?> </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" id ="usecond"name ="usecond" value="">J'accepte les conditons ci dessus</label>
              </div>
            </br></br>
            <!-- TODO Faire le JS pour disable le button if not checked -->
          </fieldset>

          <p style="text-align: center;">

            <p style="text-align: center;"><button type="submit" class="btn btn-default" type="button" id="btsubmit" >Finaliser l'inscription</button></p>
          </a>
        </p>
        <input type="hidden" name="form_confirm" value="1"/>
      </form>
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


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script lang="javascript">
var ass = document.getElementById("reg_type_ass");
var col = document.getElementById("reg_type_col");

var textinp = document.getElementById("textinp1");
var regidnum = document.getElementById("reg_idnum");
var regassref = document.getElementById("reg_assref");

window.addEventListener("load",changetype);
ass.addEventListener("click",changetype);
col.addEventListener("click",changetype);
document.getElementById("usecond").addEventListener("change",checkTerm);






function changetype() {
  if (ass.checked){
    textinp.textContent = "Numéro d'identification:";
    regidnum.removeAttribute("value");
    regassref.setAttribute("type","hidden");
    regassref.setAttribute("value","1");
    regidnum.setAttribute("type","text");


  }
  if (col.checked){
    textinp.textContent = "Association Referente:";
    regassref.removeAttribute("value");
    regidnum.setAttribute("type","hidden");
    regidnum.setAttribute("value","1");
    regassref.setAttribute("type","text");

  }
}
function verifAll(f){
  var nameOk = checkNom(f.reg_name);
  var addrOk = checkAddr(f.reg_addr);
  var websiteOk = checkWebsite(f.reg_website);
  var refNameOk = checkRefName(f.reg_ref_name);
  var refPnameOk = checkRefPname(f.reg_ref_pname);
  var refFonctionOk = checkRefFonction(f.reg_ref_fonction);
  var refTelOk = checkRefTel(f.reg_ref_tel);
  var refMailOk = checkRefMail(f.reg_ref_mail);
  var termOk = checkTerm(f.usecond);

  if (nameOk && addrOk && websiteOk && refNameOk && refPnameOk && refFonctionOk && refTelOk && refMailOk &&  termOk) {
    return true;
  }else {
    alert("Veuillez remplir correctement tous les champs");
    return false;
  }
}

function checkNom(input){

  if(input.value === ""){

    return false;

  }else{

    return true;

  }
}
function checkAddr(input){

  if(input.value === ""){
    return false;
  }else{
    return true;
  }
}
function checkWebsite(input){

  if(input.value === ""){
    return false;
  }else{
    return true;
  }
}
function checkRefName(input){

  if(input.value === ""){
    return false;
  }else{
    return true;
  }
}
function checkRefPname(input){

  if(input.value === ""){
    return false;
  }else{
    return true;
  }
}
function checkRefFonction(input){

  if(input.value === ""){
    return false;
  }else{
    return true;
  }
}
function checkRefTel(input){
  // TODO LIMIT 10 CHAR
  if(input.value === ""){
    return false;
  }else{
    return true;
  }
}
function checkRefMail(input){

  if(input.value === ""){
    return false;
  }else{
    return true;
  }
}


function checkTerm(input) {
  var check = document.getElementById("usecond");
  if (check.checked === true) {
    return true;
  } else {
    return false;
  }

}
</script>
</div>
</div>
</div>
<?php get_footer(); ?>
