<main>
  <section class="card">
    <h2><?=$fullTitle?></h2>
    <p>Local time: <?=$localtime?></p>
    <section>
      <img src="https:<?= $condition_icon?>"/>
      <h4><?= $condition_text?></h4>
      <h2><?= $temp_c ?> °C</h2>
      <hr/>
      <span>Wind</span>
      <p><?=$wind_kph?> km/h, <?=$wind_degree?>° <?=$wind_dir?> </p>
      <a href="https://www.weatherapi.com/" title="Free Weather API"><img src='//cdn.weatherapi.com/v4/images/weatherapi_logo.png' alt="Weather data by WeatherAPI.com" border="0"></a>
    </section>
  </section>
</main>