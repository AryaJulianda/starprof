<footer id="footer">
  <div class="container my-4">
    <div class="row pt-5 py-lg-5 justify-content-center">
      <div class="col-5 col-md-6 col-lg-3 mb-5 mb-lg-0">
        <h5 class="text-6 text-transform-none font-weight-semi-bold text-color-light mb-4">Location</h5>
        <p class="text-4 mb-0">{{ $location }}</p>
      </div>
      <div class="col-7 col-md-6 col-lg-3 mb-5 mb-lg-0">
        <h5 class="text-6 text-transform-none font-weight-semi-bold text-color-light mb-4">Call Us Now</h5>
        <p class="text-7 text-color-light font-weight-light mb-2"><a href="tel:{{ $phone }}" class="text-decoration-none text-color-light">{{ $phone }}</a></p>
      </div>
      <div class="col-5 col-md-6 col-lg-3">
        <h5 class="text-6 text-transform-none font-weight-semi-bold text-color-light mb-4">Social Media</h5>
        <ul class="footer-social-icons social-icons m-0">
          <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="instagram"><i class="fab fa-instagram text-2"></i></a></li>
          <li class="social-icons-youtube"><a href="http://www.youtube.com/" target="_blank" title="youtube"><i class="fab fa-youtube text-2"></i></a></li>
          <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in text-2"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="footer-copyright footer-copyright-style-2 pb-4">
      <div class="py-2">
        <div class="row py-4">
          <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
            <p>© Copyright 2024. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

</div>
{{-- End Body Class --}}

<!-- Vendor -->
<script src="{{ url('') }}/vendor/plugins/js/plugins.min.js"></script>
<script src="{{ url('') }}/vendor/jquery.countdown/jquery.countdown.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ url('') }}/js/theme.js"></script>

<!-- Theme Custom -->
<script src="{{ url('') }}/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="{{ url('') }}/js/theme.init.js"></script>

</body>

</html>
