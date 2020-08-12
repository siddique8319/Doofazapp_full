 <!-- Footer -->
    <footer class="footer">
      <strong>ThemeKit</strong> v4.0.0 &copy; Copyright 2015
    </footer>
    <!-- // Footer -->

  </div>
  <!-- /st-container -->

  <!-- Modal -->
  <div class="modal fade image-gallery-item" id="showImageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-header">
        On my way to the top
      </div>
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <img class="img-responsive" src="images/place1-full.jpg" alt="Place">
    </div>
  </div>

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "admin",
      skins: {
        "default": {
          "primary-color": "#3498db"
        }
      }
    };
  </script>

  <!-- Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. -->
  <script src="{{URL::asset('frontendadmin/js/vendor/all.js')}}"></script>
      <script>
          $( "#show" ).click(function() {
          $( "sho" ).show( "fast" );
          });
      </script>
 

  <script src="{{URL::asset('frontendadmin/js/app/app.js')}}"></script>

  <script src="{{ asset('js/app.js') }}" defer></script>

  
</div>
</body>


<!-- Mirrored from themekit.frontendmatter.com/dist/themes/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2019 19:23:14 GMT -->
</html>