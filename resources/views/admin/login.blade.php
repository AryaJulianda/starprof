<!doctype html>
<html lang="en" data-bs-theme="light">

<x-admin-header>
  <x-slot:title>Login</x-slot:title>
</x-admin-header>

<body data-sidebar="light">

  <div class="account-pages my-5 pt-sm-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
              <div class="row">
                <div class="col-7">
                  <div class="text-primary p-4">
                    <h5 class="text-primary">Welcome Back !</h5>
                    <p>Sign in to continue to StarProf Admin Panel</p>
                  </div>
                </div>
                <div class="col-5 align-self-end">
                  <img src="{{ url('admin/images/profile-img.png') }}" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="auth-logo">
                <a href="#" class="auth-logo-light">
                  <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                      <img src="{{ url('admin/images/logo-light.svg') }}" alt="" class="rounded-circle" height="34">
                    </span>
                  </div>
                </a>
                <a href="#" class="auth-logo-dark">
                  <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                      <img src="{{ url('admin/images/logo.svg') }}" class="rounded-circle" height="34">
                    </span>
                  </div>
                </a>
              </div>
              <div class="p-2">
                <form method="POST" class="" id="form-login" action="{{ url('adm/authenticate') }}" novalidate>
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group auth-pass-inputgroup">
                      <input type="password" class="form-control" id="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                      <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                    </div>
                  </div>

                  {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-check">
                    <label class="form-check-label" for="remember-check">
                      Remember me
                    </label>
                  </div> --}}

                  <div class="mt-3 d-grid">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
          <div class="mt-2 text-center">
            <div>
              <p>©
                <script>
                  document.write(new Date().getFullYear())
                </script> StarProf. Crafted with <i class="mdi mdi-heart text-danger"></i> by Node Code Solution
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="{{ url('admin/js/pages/auth/login.js') }}"></script>
  <x-admin-footer></x-admin-footer>

</body>

</html>
