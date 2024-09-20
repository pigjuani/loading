<html>
  <head>
    <title>Loading Screen</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="config/settings.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<?php

		require 'settings/settings.php';
		$steamid64 = $_GET["id"];
    $mapname = $_GET["mapname"]; 
		if(isset($steamid64)) {
		$info = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$api."&steamids=".$steamid64);
		$jsondecode = json_decode($info, true);
		$avatar = $jsondecode["response"]["players"][0]["avatarfull"];
		$name = $jsondecode["response"]["players"][0]["personaname"];
		$tosteamid1 = bcsub($steamid64, '76561197960265728') & 1;
		$tosteamid2 = (bcsub($steamid64, '76561197960265728')-$tosteamid1)/2;
		$steamid = "STEAM_0:".$tosteamid1.":".$tosteamid2;}

		if($music['enable'] == "true"){ ?>
  <script type="text/javascript">$(document).ready(function(){$('.audio').prop("volume",<?php echo $music['volume']; ?>);});</script>
<?php
  if($music['random'] == "true"){
    $dir = "songs/";
    $song = scandir($dir);
    $i = rand(2, sizeof($song)-1); 
    
    echo "<audio class='audio' autoplay autobuffer='autobuffer'>";
      echo "<source type='audio/ogg' src='songs/" . $song[$i] . "'>";
    echo "</audio>";
  } else {
    echo "<audio class='audio' autoplay autobuffer='autobuffer'>";
      echo "<source type='audio/ogg' src='songs/" . $music['musicname'] . "'>";
    echo "</audio>";
  }
  
 } ?>




  </head>
  
  <body>
  <img class='background' src='<?php echo $background['general'];?>' />

<div class='container'>
<div class='servername'><?php echo $servername; ?></div>
<br>
</div>

<div class='slot_1-box'>
<div><?php echo $slot1['header'];?></div>
<p> <?php echo $slot1['line1'];?></p><hr>
<p> <?php echo $slot1['line2'];?></p><hr>
<p> <?php echo $slot1['line3'];?></p><hr>
<p><?php echo $slot1['line4'];?></p><hr>
<p><?php echo $slot1['line5'];?></p>
</div>

<div class='slot_2-box'>
<div><?php echo $slot2['header'];?></div>
<p><?php echo $slot2['line1'];?></p><hr>
<p><?php echo $slot2['line2'];?></p><hr>
<p><?php echo $slot2['line3'];?></p><hr>
<p><?php echo $slot2['line4'];?></p><hr>
<p><?php echo $slot2['line5'];?></p>
</div>



<div id='slot_3-box'>
<img class='backgroundinfo'  style='max-width:<?php echo $width."; max-height:"; echo $height.";"; ?>' src='<?php echo $background['info'];?>' />
<div>Server Info</div>
<p>Server name: <?php echo $servername;?></p>
<p>Current map: <?php echo $mapname;?></p>
</div>
</div>


<?php if($music['showplayingsong'] == 'true'){ ?>
<div class='playingsong-box'>
<div style='text-align:center;'>
<div class='playingsong'>Playing right now:<br> <?php if($music['random'] == "true"){ echo substr($song[$i],0,-4); }else{ echo substr($music['musicname'],0,-4); }?></div>
</div>
</div>
<?php } ?>


<div id='downloads-box'>
<div id='downloads'></div>
<div id='statustext'><p>Retrieving server info...</p></div>


</div>
<div class='box'>
<div class="avatarbox">
<img class="avatar" src="<?php if(isset($steamid)){ echo htmlspecialchars($avatar); }?>">
</div>
<div class='namebox'>
<div class='name'><?php echo $name;?></div>
</div>
<div class='loading'>

</div>
</div>









 
</body>
</html>