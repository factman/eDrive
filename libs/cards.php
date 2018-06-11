
      <!-- Header -->
      <header class="w3-container w3-border-bottom w3-margin-bottom w3-text-theme" style="padding-top:22px">
        <h2><i class="fa fa-dashboard"></i> My Dashboard</h2>
      </header>

      <!-- Cards -->
      <div class="w3-row-padding w3-margin-bottom">
        <a href="?url=documents" class="w3-third w3-hover-none w3-button w3-margin-bottom">
          <div class="w3-container w3-blue w3-padding-16">
            <div class="w3-left"><i class="fa fa-file-text w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3><?php echo($content->documents); ?></h3>
            </div>
            <div class="w3-clear"></div>
            <h4 class="w3-left-align">Documents</h4>
          </div>
        </a>
        <a href="?url=pictures" class="w3-third w3-hover-none w3-button w3-margin-bottom">
          <div class="w3-container w3-pink w3-padding-16">
            <div class="w3-left"><i class="fa fa-image w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3><?php echo($content->pictures); ?></h3>
            </div>
            <div class="w3-clear"></div>
            <h4 class="w3-left-align">Pictures</h4>
          </div>
        </a>
        <a href="?url=audios" class="w3-third w3-hover-none w3-button w3-margin-bottom">
          <div class="w3-container w3-green w3-padding-16">
            <div class="w3-left"><i class="fa fa-music w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3><?php echo($content->audios); ?></h3>
            </div>
            <div class="w3-clear"></div>
            <h4 class="w3-left-align">Audios</h4>
          </div>
        </a>
        <a href="?url=videos" class="w3-third w3-hover-none w3-button w3-margin-bottom">
          <div class="w3-container w3-purple w3-padding-16">
            <div class="w3-left"><i class="fa fa-film w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3><?php echo($content->videos); ?></h3>
            </div>
            <div class="w3-clear"></div>
            <h4 class="w3-left-align">Videos</h4>
          </div>
        </a>
        <a href="?url=archives" class="w3-third w3-hover-none w3-button w3-margin-bottom">
          <div class="w3-container w3-indigo w3-padding-16">
            <div class="w3-left"><i class="fa fa-file-archive-o w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3><?php echo($content->archives); ?></h3>
            </div>
            <div class="w3-clear"></div>
            <h4 class="w3-left-align">Archives</h4>
          </div>
        </a>
        <a href="?url=files" class="w3-third w3-hover-none w3-button w3-margin-bottom">
          <div class="w3-container w3-deep-orange w3-padding-16">
            <div class="w3-left"><i class="fa fa-file w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3><?php echo($content->files); ?></h3>
            </div>
            <div class="w3-clear"></div>
            <h4 class="w3-left-align">Files</h4>
          </div>
        </a>
      </div>
      <hr>