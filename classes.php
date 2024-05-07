<?php

class Weather {

  public function __construct(
    public Location $location,
    public Current $current
    )
  {
    
  }

  public function get_all_data() :array {
    $location_data = $this->location->get_data();
    $current_data = $this->current->get_data();
    return array_merge($location_data,$current_data);
  }
  
  public static function fetch_and_create ( string $api_url) :Weather {
    $data = get_data($api_url);
    $location = new Location(
      $data['location']['name'],
      $data['location']['country'],
      $data['location']['localtime']
    );
    $current = new Current(
      $data['current']['condition']['icon'],
      $data['current']['condition']['text'],
      $data['current']['temp_c'],
      $data['current']['wind_kph'],
      $data['current']['wind_degree'],
      $data['current']['wind_dir']
    );
    return new self($location,$current);
  }

}



class Location {
  

  public function __construct(
    private $name,
    private $country,
    private $localtime,
  )
  {
    
  }

  public function get_title ():string {
    return "$this->name ($this->country)";
  }

  public function get_data () :array {
    return array_merge(get_object_vars($this),['fullTitle'=>$this->get_title()]);
  }

  
}

class Current {
  public function __construct(
    private $condition_icon,
    private $condition_text,
    private $temp_c,
    private $wind_kph,
    private $wind_degree,
    private $wind_dir

  )
  {
    
  }

  public function get_direction () :string {
    return match ($this->wind_dir) {
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
      default => $this->wind_dir
    };
  }

  public function get_data () :array {
    return array_merge(get_object_vars($this),['wind_dir_full'=>$this->get_direction()]);
  }

}


?>