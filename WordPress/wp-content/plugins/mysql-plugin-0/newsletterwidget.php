<?php
class Tuts_Newsletter_Widget extends WP_Widget
{
  public function __construct()
  {
    parent::__construct('tuts_newsletter', 'Newsletter', array('description' => 'Un formulaire d\'inscription à la newsletter.'));
  }

  public function widget($args, $instance)
  {
    echo $args['before_widget'];
    echo $args['before_title'];
    echo apply_filters('widget_title', $instance['title']);
    echo $args['after_title'];
    ?>

    <div class="row">
      <div class="col-lg-6 col-md-8 col-xs-10 col-sm-10 col-xs-offset-1 col-md-offset-2 col-sm-offset-1 col-lg-offset-3 text-center">
        <form action="#" method="post" class="form-horizontal" name="getmailform" id="getmailform">
          <div class="form-group">
            <div class="col-lg-8 col-md-8 col-xs-10 col-sm-10 col-xs-offset-1 col-md-offset-2 col-sm-offset-1 col-lg-offset-2">
              <input type="email" id="mail" name="mail" class="form-control" placeholder="exemple@gmail.com">
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default" id="button-submit" data-toggle="tooltip" >Me prévenir</button>
          </div>
        </form>
      </div>
    </div>
    <?php
    echo $args['after_widget'];
  }
}

?>
