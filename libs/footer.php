<!-- Footer -->
      <footer class="w3-container w3-padding-16 w3-theme">
        <h2>eDrive</h2>
        <p>Designed & Develop By: Mohammed Odunayo Fatai</p>
        <p>Phone Number: +2347066780373</p>
        <p>Email Address: factman60@gmail.com</p>
      </footer>

<form action="?upload" method="POST" class="w3-hide" enctype="multipart/form-data" id="upload">
  <input type="file" name="file" class="w3-hide" id="browsFile" onchange="document.getElementById('upload').submit()" />
</form>

<button title="Upload" class="w3-btn w3-xxlarge w3-theme-d3 w3-hover-theme w3-circle w3-right" style="position: fixed; right: 30px; bottom: 30px;" onclick="document.getElementById('browsFile').click()"><i class="fa fa-cloud-upload"></i></button>

      <!-- End page content -->
    </div>
  
    <!-- JavaScript Libs -->
    <script src="js/w3js.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
