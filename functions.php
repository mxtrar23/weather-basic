<?php
  declare(strict_types=1);

  function render_template(string $template, array $data = []) {
    extract($data);
    require 'templates/'.$template;
  }

  function get_data(string $url) :array {
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $result = curl_exec($ch);
    return json_decode($result,true);
  }

  function get_direction (string $dir) :string {
    return match ($dir) {
      'N'=> 'North',
      'S'=> 'South',
      'E'=> 'East',
      'O'=> 'West',
      'NE'=> 'Northeast',
      'SE'=> 'Southeast',
      'SW'=> 'Southwest',
      'NW'=> 'Northwest',
      'WNW'=>'West-northwest',
      'NNW'=>'North-northwest',
      'NNE'=>'North-northeast',
      'ENE'=>'East-northeast',
      'ESE'=>'East-southeast',
      'SSE'=>'South-southeast',
      'SSW'=>'South-southwest',
      'WSW'=>'West-southwest',
      default => $dir
    };
  }

?>