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
              <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong> Melbourne, 121 King St, Australia</li>
              <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong> (123) 456-789</li>
              <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
            </ul>
          </div>

          <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">
            <h4 class="pt-5">Business <strong>Hours</strong></h4>
            <ul class="list list-icons list-dark mt-2">
              <li><i class="far fa-clock top-6"></i> Monday - Friday - 9am to 5pm</li>
              <li><i class="far fa-clock top-6"></i> Saturday - 9am to 2pm</li>
              <li><i class="far fa-clock top-6"></i> Sunday - Closed</li>
            </ul>
          </div>

          <h4 class="pt-5">Get in <strong>Touch</strong></h4>
          <p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

        </div>

      </div>

    </div>

  </div>

  {{-- <div role="main" class="main">

    <section class="page-header page-header-modern page-header-background page-header-background-md custom-bg-color-grey-1 mb-0" style="background-image: url(img/demos/education/backgrounds/page-header.jpg); background-position: 100% 100%;">
      <div class="container">
        <div class="row mt-5">
          <div class="col align-self-center p-static text-center">
            <h1 class="font-weight-bold text-color-secondary text-10">Contact Us</h1>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row py-3">
        <div class="col">
          <ul class="breadcrumb d-block">
            <li><a href="#">Home</a></li>
            <li class="active">Contact Us</li>
          </ul>
        </div>
      </div>
      <div class="row py-3">
        <div class="col">

          <div class="row d-flex justify-content-center">
            <div class="col-md-3 mb-4 mb-md-0 text-center">
              <div class="feature-box d-flex flex-column align-items-center">
                <div class="feature-box-icon bg-color-quaternary feature-box-icon-extra-large appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="250">
                  <img class="icon-animated" width="100" height="46" src="{{ url('') }}/img/demos/education/icons/icon-pin.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                </div>
                <div class="feature-box-info ps-0 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="150">
                  <p class="mt-2 pt-1 mb-0 text-1 p-relative top-5 text-uppercase">Address</p>
                  <p class="mb-0 text-color-secondary text-4 font-weight-semi-bold">{{ $data->location }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0 text-center">
              <div class="feature-box d-flex flex-column align-items-center">
                <div class="feature-box-icon bg-color-quaternary feature-box-icon-extra-large appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="250">
                  <img class="icon-animated" width="100" height="46" src="{{ url('') }}/img/demos/education/icons/icon-phone-call.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                </div>
                <div class="feature-box-info ps-0 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="150">
                  <p class="mt-2 pt-1 mb-0 text-1 p-relative top-5 text-uppercase">Phone Number</p>
                  <p class="mb-0 text-color-secondary text-4 font-weight-semi-bold">{{ $data->phone }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0 text-center">
              <div class="feature-box d-flex flex-column align-items-center">
                <div class="feature-box-icon bg-color-quaternary feature-box-icon-extra-large appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="250">
                  <img class="icon-animated" width="100" height="46" src="{{ url('') }}/img/demos/education/icons/icon-mail.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                </div>
                <div class="feature-box-info ps-0 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="150">
                  <p class="mt-2 pt-1 mb-0 text-1 p-relative top-5 text-uppercase">E-mail Address</p>
                  <p class="mb-0 text-color-secondary text-4 font-weight-semi-bold"><a href="mailto:{{ $data->email }}" class="text-color-secondary">{{ $data->email }}</a></p>
                </div>
              </div>
            </div>
          </div>

          <hr class="solid mt-5 mb-4">

        </div>
      </div>
      <div class="row pb-5 mb-3">
        <div class="col">
          <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-4">Send a Message</h2>
          <form class="contact-form custom-form-style-1" action="php/contact-form.php" method="POST">
            <div class="contact-form-success alert alert-success d-none mt-4">
              <strong>Success!</strong> Your message has been sent to us.
            </div>

            <div class="contact-form-error alert alert-danger d-none mt-4">
              <strong>Error!</strong> There was an error sending your message.
              <span class="mail-error-message text-1 d-block"></span>
            </div>

            <div class="row row-gutter-sm">
              <div class="form-group col-lg-6 mb-4">
                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required placeholder="Your Name">
              </div>
              <div class="form-group col-lg-6 mb-4">
                <input type="text" value="" data-msg-required="Please enter your phone number." maxlength="100" class="form-control" name="phone" id="phone" required placeholder="Phone Number">
              </div>
            </div>
            <div class="row row-gutter-sm">
              <div class="form-group col-lg-6 mb-4">
                <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required placeholder="Your Name">
              </div>
              <div class="form-group col-lg-6 mb-4">
                <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required placeholder="Subject">
              </div>
            </div>
            <div class="row">
              <div class="form-group col mb-4">
                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required placeholder="Your Message"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="form-group col mb-0">
                <button type="submit" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 mt-4 mb-2" data-loading-text="Loading...">SEND MESSAGE</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <section class="section section-height-3 bg-color-tertiary border-0 m-0">
      <div class="container py-3">
        <div class="row align-items-center justify-content-center text-center text-lg-start">
          <div class="col-md-8 col-lg-9 mb-4 mb-lg-0">
            <h2 class="text-color-primary font-weight-bold mb-0 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="150">Ready to kick-start your career?</h2>
          </div>
          <div class="col-lg-3 text-lg-end">
            <a href="demo-education-courses.html" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 mt-4 mb-2 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="350">GET STARTED NOW</a>
          </div>
        </div>
      </div>
    </section>

  </div> --}}
</x-layout>
