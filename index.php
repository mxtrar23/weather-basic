<?php
  require_once('constants.php');
  require_once('functions.php');
  require_once('classes.php');
  
  $weather = Weather::fetch_and_create(API_URL);
  $weather_data = $weather->get_all_data();
?>
<?php render_template('head.php',$weather_data); ?>
<?php  render_template('styles.php'); ?>
<?php render_template('main.php',$weather_data); ?>





