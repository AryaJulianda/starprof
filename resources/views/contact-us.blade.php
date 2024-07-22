<x-layout>
  <div role="main" class="main">

    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
    {{-- <div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div> --}}
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2836335618967!2d106.83001020803346!3d-6.226284960946507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f96ef78ef8bf%3A0x5f977fd63b4489a3!2sCyber%202%20Tower!5e0!3m2!1sid!2sid!4v1721583738247!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div class="container">

      <div class="row py-4">
        <div class="col-lg-6">

          <h2 class="font-weight-bold text-8 mt-2 mb-0">Contact Us</h2>
          <p class="mb-4">Feel free to ask for details, don't save any questions!</p>

          <form class="contact-form" action="php/contact-form.php" method="POST">
            <div class="contact-form-success alert alert-success d-none mt-4">
              <strong>Success!</strong> Your message has been sent to us.
            </div>

            <div class="contact-form-error alert alert-danger d-none mt-4">
              <strong>Error!</strong> There was an error sending your message.
              <span class="mail-error-message text-1 d-block"></span>
            </div>

            <div class="row">
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Full Name</label>
                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required>
              </div>
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Email Address</label>
                <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label class="form-label mb-1 text-2">Subject</label>
                <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="subject" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label class="form-label mb-1 text-2">Message</label>
                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control text-3 h-auto py-2" name="message" required></textarea>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <input type="submit" value="Send Message" class="btn btn-primary btn-modern" data-loading-text="Loading...">
              </div>
            </div>
          </form>

        </div>
        <div class="col-lg-6">

          <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
            <h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
            <ul class="list list-icons list-icons-style-2 mt-2">
              <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong> {{ $data->location }}</li>
              <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong> {{ $data->phone }}</li>
              <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="mailto:{{ $data->email }}">{{ $data->email }}</a></li>
            </ul>
          </div>

          <h4 class="pt-5">Get in <strong>Touch</strong></h4>
          <p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

        </div>

      </div>

    </div>

  </div>
</x-layout>
