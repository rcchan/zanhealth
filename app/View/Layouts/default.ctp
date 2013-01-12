<!DOCTYPE html>
<html>
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>
      ZanHealth: <?php echo $title_for_layout; ?>
    </title>
    <?php echo $this->Html->meta('icon'); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?
      echo $this->Html->css('default.css');
      echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
      echo $this->Html->script('bootstrap.min');

      echo $this->fetch('meta');
      echo $this->fetch('css');
      echo $this->fetch('script');
    ?>
  </head>
  <body>
    <div id="flash" class="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo $this->Session->flash(); ?>
    </div>
    <div id="container" class="span10 offset1">
      <div class="row">
        <div id="header" class="span10">
          <?= $this->Html->image('banner.jpg', array('class' => 'banner')) ?>
          <?= $this->element('navbar'); ?>
        </div>
      </div>
      <div class="row">
        <div id="content" class="span10">
          <?php echo $this->fetch('content'); ?>
        </div>
      </div>
      <div class="row">
        <div id="footer" class="span10">
        </div>
      </div>
    </div>
  </body>
</html>
