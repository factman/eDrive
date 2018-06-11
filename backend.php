<!DOCTYPE html>
<html>
  <head>
    <title>eDrive - Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/LOGO.png"/>
    <!-- CSS Libs -->
    <link rel="stylesheet" href="css/w3css.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="w3-light-grey">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-theme w3-large" style="z-index:4">
      <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="toggleSidebar();"><i class="fa fa-bars"></i> </button>
      <a href="dashboard.php" class="w3-bar-item w3-button w3-hover-theme"><img src="images/LOGO Word White.png" height="30"/></a>
      <a href="?logout" class="w3-bar-item w3-right w3-button w3-hover-theme"><i class="fa fa-sign-out"></i> Sign Out</a>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
      <div class="w3-container w3-row w3-padding w3-margin-bottom">
        <div class="w3-col s4">
          <img src="images/user.png" class="w3-circle w3-margin-right" height="70" />
        </div>
        <div class="w3-col s8 w3-bar">
          <span class="w3-large">Welcome <br/>
            <strong><?php echo($user->name); ?></strong>
          </span>
        </div>
      </div>
      <a href="dashboard.php" class="w3-button w3-block w3-left-align w3-xlarge"><i class="fa fa-dashboard"></i> My Dashboard</a>
      <div class="w3-bar-block">
        <a class="w3-bar-item w3-xlarge w3-button w3-theme-d3 w3-hover-theme" onclick="document.getElementById('browsFile').click()"><i class="fa fa-cloud-upload"></i> Upload</a>
        <a href="?url=documents" class="w3-bar-item w3-button w3-padding w3-hover-gray w3-xlarge"><i class="fa fa-file-text w3-text-blue fa-fw"></i>&nbsp; Documents</a>
        <a href="?url=pictures" class="w3-bar-item w3-button w3-padding w3-hover-gray w3-xlarge"><i class="fa fa-picture-o w3-text-pink fa-fw"></i>&nbsp; Pictures</a>
        <a href="?url=audios" class="w3-bar-item w3-button w3-padding w3-hover-gray w3-xlarge"><i class="fa fa-music w3-text-green fa-fw"></i>&nbsp; Audios</a>
        <a href="?url=videos" class="w3-bar-item w3-button w3-padding w3-hover-gray w3-xlarge"><i class="fa fa-film w3-text-purple fa-fw"></i>&nbsp; Videos</a>
        <a href="?url=archives" class="w3-bar-item w3-button w3-padding w3-hover-gray w3-xlarge"><i class="fa fa-file-archive-o w3-text-indigo fa-fw"></i>&nbsp; Archives</a>
        <a href="?url=files" class="w3-bar-item w3-button w3-padding w3-hover-gray w3-xlarge"><i class="fa fa-file w3-text-deep-orange fa-fw"></i>&nbsp; Files</a>
        <br><br>
      </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="toggleSidebar()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
