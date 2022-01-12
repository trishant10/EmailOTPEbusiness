<?php
session_start();
$user_id = '';
$conn = mysqli_connect("localhost","root","","user_otp_login");

$email = $_SESSION['user_email'];
if($email != false){
    $sql = "SELECT * FROM registered_user WHERE user_email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $user_name = $fetch_info['user_name'];
        
    }
}

?>
<!DOCTYPE html>
<html>
<title>homepage</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<div class="w3-content" style="max-width:1400px">


<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>WELCOME TO YOUR PERSONAL BLOG</b></h1>
  <h2>HELLO <?php echo $user_name; ?></h2>
</header>


<div class="w3-row">


<div class="w3-col l8 s12">
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3><b>LOCKDOWN</b></h3>
      <h5>2020 Lockdown, <span class="w3-opacity">1st December, 2020</span></h5>
    </div>

    <div class="w3-container">
      <p>"Lockdown" has been declared the word of the year for 2020 by Collins Dictionary, after a sharp rise in its usage during the pandemic.

It "encapsulates the shared experience of billions of people", Collins said.

Lexicographers registered more than 250,000 usages of "lockdown" during 2020, up from just 4,000 last year.

Other pandemic-linked terms on the 10-strong list include "furlough", "key worker", "self-isolate" and "social distancing" as well as "coronavirus".

According to the dictionary, lockdown is defined as "the imposition of stringent restrictions on travel, social interaction, and access to public spaces".</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">0</span></span></p>
        </div>
      </div>
    </div>
  </div>
  <hr>

  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3><b>CHORONA VIRUS</b></h3>
      <h5>Choronavirus, <span class="w3-opacity">5th December, 2020</span></h5>
    </div>

    <div class="w3-container">
      <p>A coronavirus is a kind of common virus that causes an infection in your nose, sinuses, or upper throat. Most coronaviruses aren't dangerous.

In early 2020, after a December 2019 outbreak in China, the World Health Organization identified SARS-CoV-2 as a new type of coronavirus. The outbreak quickly spread around the world.

COVID-19 is a disease caused by SARS-CoV-2 that can trigger what doctors call a respiratory tract infection. It can affect your upper respiratory tract (sinuses, nose, and throat) or lower respiratory tract (windpipe and lungs).

It spreads the same way other coronaviruses do, mainly through person-to-person contact. Infections range from mild to deadly.

SARS-CoV-2 is one of seven types of coronavirus, including the ones that cause severe diseases like Middle East respiratory syndrome (MERS) and sudden acute respiratory syndrome (SARS). The other coronaviruses cause most of the colds that affect us during the year but aren’t a serious threat for otherwise healthy people.</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-badge">2</span></span></p>
        </div>
      </div>
    </div>
  </div>
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
    <div class="w3-container w3-white">
      <h4><b>DEMON</b></h4>
      <p>The term "demon" is derived from the Greek word daimon meaning divine power, fat, or god. The actual translation of demon means "replete with wisdom" connoting that the demons were highly knowledgeable creatures, evident in their knowledge of an individual's secretive sins. Demons were fallen angels who followed Lucifer from his expulsion from heaven by God to hell. The demonologists heavily believed that the sole purpose of a demon is "to tempt humankind into immoral acts and come between humans and God (Guiley 91)."</p>
    </div>
  </div><hr>
  
  
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <button class="w3-button w3-black w3-padding-large w3-margin-bottom">
  	<div align="right"><a href="logout.php" >logout</a></div></button>
</footer>

</body>
</html>
