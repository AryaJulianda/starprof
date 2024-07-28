<x-layout>
  <!-- Sweet Alert-->
  <link href="{{ url('admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

  <style>
    /* Untuk browser berbasis Webkit seperti Chrome dan Safari */
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Untuk Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>

  <div role="main" class="main">

    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
    {{-- <div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div> --}}
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2836335618967!2d106.83001020803346!3d-6.226284960946507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f96ef78ef8bf%3A0x5f977fd63b4489a3!2sCyber%202%20Tower!5e0!3m2!1sid!2sid!4v1721583738247!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div class="container">

      <div class="row py-4">
        <div class="col-lg-6">

          <h2 class="font-weight-bold text-8 mt-2 mb-0">Contact Us</h2>
          <p class="mb-4">Feel free to ask for details, don't save any questions!</p>

          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif


          <form class="contact-form" id="contactForm" action="{{ url('submit-registration') }}" method="POST">
            @csrf
            <div class="contact-form-success alert alert-success d-none mt-4">
              <strong>Success!</strong> Your message has been sent to us.
            </div>

            <div class="contact-form-error alert alert-danger d-none mt-4">
              <strong>Error!</strong> There was an error sending your message.
              <span class="mail-error-message text-1 d-block"></span>
            </div>

            <div class="row">
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Nama Lengkap Peserta</label>
                <input type="text" value="" maxlength="100" class="form-control text-3 h-auto py-2" name="nama_lengkap" required>
              </div>
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control text-3 h-auto py-2" required>
                  <option value="">-- Pilih Jenis Kelamin --</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Tempat Lahir</label>
                <input type="text" value="" maxlength="100" class="form-control text-3 h-auto py-2" name="tempat_lahir" required>
              </div>
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Tanggal Lahir</label>
                <input type="date" value="" class="form-control text-3 h-auto py-2" name="tanggal_lahir" required>
              </div>
              <div class="form-group col-lg-12">
                <label class="form-label mb-1 text-2">Alamat Lengkap</label>
                <textarea maxlength="5000" rows="2" class="form-control text-3 h-auto py-2" name="alamat_lengkap" required></textarea>
              </div>
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Email Address</label>
                <input type="email" value="" maxlength="100" class="form-control text-3 h-auto py-2" name="email" required>
              </div>
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">No Handphone</label>
                <input type="number" value="" class="form-control text-3 h-auto py-2" name="phone" required>
              </div>
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Program Category</label>
                <select name="program_category" id="program_category" class="form-control text-3 h-auto py-2" required>
                  <option value="">-- Pilih Program Category --</option>
                  @foreach ($program_categories as $item)
                    <option value="{{ $item->category_name }}" data-categoryId="{{ $item->id }}">{{ $item->category_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label class="form-label mb-1 text-2">Nama Program</label>
                <select name="nama_program" id="nama_program" class="form-control text-3 h-auto py-2" disabled>
                  <option value="">-- Pilih Nama Program --</option>
                  @foreach ($programs as $item)
                    <option value="{{ $item->prog_name }}" data-categoryId="{{ $item->prog_category }}">{{ $item->prog_name }}</option>
                  @endforeach
                </select>
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
                <label class="form-label mb-1 text-2">Registration Date</label>
                <input type="date" value="" class="form-control text-3 h-auto py-2" id="registration_date" name="registration_date" readonly>
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

          {{-- <h4 class="pt-5">Get in <strong>Touch</strong></h4>
          <p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}

        </div>

      </div>

    </div>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const programCategory = document.getElementById('program_category');
      const programName = document.getElementById('nama_program');

      programCategory.addEventListener('change', function() {
        const selectedCategoryId = this.options[this.selectedIndex].getAttribute('data-categoryId');

        // Reset and disable programName select
        programName.innerHTML = '<option value="">-- Pilih Nama Program --</option>';
        programName.disabled = true;
        programName.required = false;

        if (selectedCategoryId) {
          @foreach ($programs as $item)
            if (selectedCategoryId === "{{ $item->prog_category }}") {
              programName.innerHTML += '<option value="{{ $item->prog_name }}" data-categoryId="{{ $item->prog_category }}">{{ $item->prog_name }}</option>';
            }
          @endforeach

          programName.disabled = false;
          programName.required = true;
        }
      });

      const registrationDateInput = document.getElementById('registration_date');
      const today = new Date().toISOString().split('T')[0];
      registrationDateInput.value = today;
    });

    $(document).ready(function() {
      $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        const formData = $(this).serialize();
        Swal.fire({
          title: 'Processing...',
          text: 'Please wait while we are submitting your message.',
          allowOutsideClick: false,
          showConfirmButton: false,
          onBeforeOpen: () => {
            Swal.showLoading();
          }
        });

        $.ajax({
          url: "{{ url('submit-registration') }}",
          method: 'POST',
          data: formData,
          success: function(response) {
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: 'Your message has been sent successfully.'
            });
          },
          error: function(xhr) {
            console.error(xhr);
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'There was an error sending your message.'
            });
          }
        });
      });
    });
  </script>

  {{-- Sweetalert2 --}}
  <script src="{{ url('admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

</x-layout>
