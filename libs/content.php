<!-- Header -->
      <header class="w3-container w3-border-bottom w3-margin-bottom <?php echo($content->color->text); ?>" style="padding-top:22px">
        <h2><i class="fa <?php echo($content->icon); ?>"></i> <?php echo($content->title); ?></h2>
      </header>

      <div class="w3-container">
        <table class="w3-table w3-striped w3-hoverable w3-white w3-large">
          <thead class="<?php echo($content->color->bg); ?>">
            <tr class="w3-border-bottom">
              <th><i class="fa <?php echo($content->icon); ?> w3-large"></i></th>
              <th>Name</th>
              <th>Date</th>
              <th>Size</th>
              <th>Download</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($content->files as $file){ ?>
            <tr>
              <td><i class="fa <?php echo($content->icon); ?> <?php echo($content->color->text); ?> fa-2x"></i></td>
              <td><?php echo($file->name); ?></td>
              <td><?php echo($file->fileDate); ?></td>
              <td><?php echo($file->fileSize); ?></td>
              <td><a href="?download=<?php echo($dir); ?>/<?php echo($file->id); ?>" class="w3-button w3-theme-d3 w3-hover-theme w3-round-xlarge"><i class="fa fa-cloud-download"></i> Download</a></td>
              <td><a href="?delete=<?php echo($dir); ?>/<?php echo($file->id); ?>" class="w3-button w3-red w3-hover-dark-gray w3-round-xlarge"><i class="fa fa-trash"></i> Delete</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
<hr/>
<br/>