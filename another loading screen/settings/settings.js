

// THIS STILLS UNDER MANAGEMENT, PLEASE JUST IGNORE THIS.

// THIS STILLS UNDER MANAGEMENT, PLEASE JUST IGNORE THIS.

// THIS STILLS UNDER MANAGEMENT, PLEASE JUST IGNORE THIS.

// THIS STILLS UNDER MANAGEMENT, PLEASE JUST IGNORE THIS.


function CurrentFile( filename, total ) {
$("#downloads").document.write("Downloading " + filename + ". Files remaining: " + total).fadeIn(300);

}

function SetStatusChanged( status ) {
  status = status;
  document.getElementById("statustext").innerHTML = "<p>" + status + "</p>";
  if(status = "Sending client info..."){
  	document.getElementById("progress").innerHTML = "<div class='progress'><img style="width: 51px; height: 51px;" src="images/loading.gif"></div>";
  }
}

function GameDetails( servername, mapname, maxplayers, gamemode ) {
	servername = servername;
	mapname = mapname;
	maxplayers = maxplayers;
	gamemode = gamemode;
	document.GetElementById("maxplayers").innerHTML = "<p><b>Max Players:</b><br>" + maxplayers + "</p>";


}






