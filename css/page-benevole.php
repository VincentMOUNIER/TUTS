<?php /* Template Name: Bénévole */ ?>
<?php get_header('aide'); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-2 contenu aside">

      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
    </div>

    <div class="col-lg-8 contenu texte_contenu">
        <!--  Partie personnalisable WordPress-->
        <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
        <div class="col-lg-7 connexion">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="post">

                <div class="post-content"> <?php the_content(); ?> </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <!-- Partie moteur de recherche -->
        <div class="col-lg-5 connexion" id="moteur">
          <form class="" action="../resultat-de-recherche" method="post">
            <input type="checkbox" name="date_d" value="">
            <p>
              Date de début :
            </p>
            <select class="" name="date_d_select">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
            Octobre 2016
            <br>
            <input type="checkbox" name="date_f" value="date_f">
            <p>
              Date de fin :
            </p>
            <select class="" name="date_f_select">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
            Octobre 2016
            <br>
            <input type="checkbox" name="lieu" value="lieu">
            <p>
              Lieu :
            </p>
            <select class="" name="lieu_select">
              <option>Lyon</option>
              <option>Albigny-sur-Saône</option>
              <option>Bron</option>
              <option>Cailloux-sur-Fontaines</option>
              <option>Caluire-et-Cuire</option>
              <option>Champagne-au-Mont-d'Or</option>
              <option>Charbonnières-les-Bains</option>
              <option>Charly</option>
              <option>Chassieu</option>
              <option>Collonges-au-Mont-d'Or</option>
              <option>Corbas</option>
              <option>Couzon-au-Mont-d'Or</option>
              <option>Craponne</option>
              <option>Curis-au-Mont-d'Or</option>
              <option>Dardilly</option>
              <option>Décines-Charpieu</option>
              <option>Ecully</option>
              <option>Feyzin</option>
              <option>Fleurieu-sur-Saône</option>
              <option>Fontaines-Saint-Martin</option>
              <option>Fontaines-sur-Saône</option>
              <option>Francheville</option>
              <option>Genay</option>
              <option>Givors</option>
              <option>Grigny</option>
              <option>Irigny</option>
              <option>Jonage</option>
              <option>La Mulatière</option>
              <option>Limonest</option>
              <option>La Tour de Salvagny</option>
              <option>Lissieu</option>
              <option>Lyon</option>
              <option>Marcy-l'Etoile</option>
              <option>Meyzieu</option>
              <option>Mions</option>
              <option>Montanay</option>
              <option>Neuville-sur-Saône</option>
              <option>Oullins</option>
              <option>Pierre-Bénite</option>
              <option>Poleymieux-au-Mont-d'Or</option>
              <option>Quincieux</option>
              <option>Rillieux-la-Pape</option>
              <option>Rochetaillée-sur-Saône</option>
              <option>Saint-Cyr-au-Mont-d'Or</option>
              <option>Saint-Didier-au-Mont-d'Or</option>
              <option>Saint-Fons</option>
              <option>Saint-Genis-Laval</option>
              <option>Saint-Genis-les-Ollières</option>
              <option>Saint-Germain-au-Mont-d'Or</option>
              <option>Saint-Priest</option>
              <option>Saint-Romain-au-Mont-d'Or</option>
              <option>Sainte-Foy-lès-Lyon</option>
              <option>Sathonay-Camp</option>
              <option>Sathonay-Village</option>
              <option>Solaize</option>
              <option>Tassin-la-Demi-Lune</option>
              <option>Vaulx-en-Velin</option>
              <option>Vénissieux</option>
              <option>Vernaison</option>
              <option>Villeurbanne</option>
              <option>Autre</option>
            </select>
            <br>
            <input type="checkbox" name="type_exp" value="">
            <p>
              Type d'expérience :
            </p>
            <select class="" name="type_exp_select">
              <option value="Accompagnement social">Accompagnement social</option>
              <option value="Accueil">Accueil</option>
              <option value="Activité manuelle">Activité manuelle</option>
              <option value="Administration">Administration</option>
              <option value="Animation / Encadrement de groupes">Animation / Encadrement de groupes</option>
              <option value="Autre">Autre</option>
              <option value="Distribution / collecte">Distribution / collecte</option>
              <option value="Ecoute">Ecoute</option>
              <option value="Formation / Education">Formation / Education</option>
              <option value="Information et Communication">Information et Communication</option>
              <option value="Informatique">Informatique</option>
              <option value="Juridique">Juridique</option>
              <option value="Manutention et technique">Manutention et technique</option>
              <option value="Organisation et Logistique">Organisation et Logistique</option>
              <option value="Visite">Visite</option>
            </select>
            <br>
            <input type="checkbox" name="dom_action" value="">
            <p>
              Domaine d'action :
            </p>
            <!-- <select class="" name="dom_action_select">
              <option value="Accompagnement Social">Accompagnement Social</option>
              <option value="Citoyenneté et Droits de Humains">Citoyenneté et Droits de Humains</option>
              <option value="Culture">Culture</option>
              <option value="Développement local">Développement local</option>
              <option value="Diversité Culturelle">Diversité Culturelle</option>
              <option value="Economie Sociale et Solidaire">Economie Sociale et Solidaire</option>
              <option value="Education">Education</option>
              <option value="Environnement">Environnement</option>
              <option value="Insertion">Insertion</option>
              <option value="Loisir">Loisir</option>
              <option value="Protection et Défense des animaux">Protection et Défense des animaux</option>
              <option value="Santé">Santé</option>
              <option value="Solidarité internationale et action humanitaire">Solidarité internationale et action humanitaire</option>
              <option value="Sport">Sport</option>
              <option value="Autre">Autre</option>
            </select> -->
            <div class="col-lg-6">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Accompagnement Social" class="check_dom">Accompagnement Social</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Citoyenneté et Droits de Humains" class="check_dom">Citoyenneté et Droits de Humains</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Culture" class="check_dom">Culture</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Développement local" class="check_dom">Développement local</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Diversité Culturelle" class="check_dom">Diversité Culturelle</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Economie Sociale et Solidaire" class="check_dom">Economie Sociale et Solidaire</label>
              </div>

            </div>
            <div class="col-lg-6">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Education" class="check_dom">Education</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Environnement" class="check_dom">Environnement</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Insertion" class="check_dom">Insertion</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Loisir" class="check_dom">Loisir</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Protection et Défense des animaux" class="check_dom">Protection et Défense des animaux</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Santé" class="check_dom">Santé</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Solidarité internationale et action humanitaire" class="check_dom">Solidarité internationale et action humanitaire</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Sport" class="check_dom">Sport</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Autre" class="check_dom">Autre</label>
              </div>
            </div>

            <br>
            <input type="checkbox" name="horaire" value="">
            <p>
              Tranche horaire :
            </p>
            <select class="" name="horaire_select">
              <option value="8h00 à 12h00">8h00 à 12h00</option>
              <option value="12h00 à 14h00">12h00 à 14h00</option>
              <option value="14h00 à 18h00">14h00 à 18h00</option>
              <option value="après 18h00">après 18h00</option>
            </select>
            <br>
            <input type="checkbox" name="access" value="">
            <p>
              Accessibilité :
            </p>
            <select class="" name="access_select">
              <option value="Mineur">Mineur</option>
              <option value="Handicapé">Handicapé</option>
            </select>
            <br>
            <input type="submit" name="rechercher" value="Rechercher" class="btn-default">
          </form>
        </div>
      </div>

  </div>
  <!-- Row -->
  <div class="col-lg-2 contenu aside">
    <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_b.gif" alt="" id="aside_b"/> -->
  </div>

  <img alt="" class="img-responsive image_bas" src ="<?php bloginfo('template_url'); ?>/img/Bannierebas.png">

  <div class="clear">

  </div>



</div>
<!-- Container fluid -->


<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<?php get_footer(); ?>
