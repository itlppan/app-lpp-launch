
<main style="background-image: url('https://4kwallpapers.com/images/wallpapers/dark-background-abstract-background-network-3d-background-3840x2160-8324.png'); background-repeat: no-repeat;background-size: cover;">
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-start shadow-lg ">
            <div class="col-lg-4 col-md-6  d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">

                <div class="card-body bg-dark text-light">
                <div class="d-flex justify-content-center py-4">
                 <img src="https://lpp.co.id/wp-content/uploads/2023/11/logo-LPP-putih-300x146.png" alt="" style='width: 150px;'>
                  <br>
              </div><!-- End Logo -->
                  <div class="pt-2 pb-4">
                    <h5 class="card-title text-center pb-0 fs-4 text-light ">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  <?php if(!empty($data['error'])): ?>
                    <p style="color:red; font-style:italic;"><?= $data['error'] ?></p>
                  <?php endif ?>
                  <form class="row g-3 needs-validation" novalidate method="post">
                    <div class="input-group mb-3">
                      <div class="form-floating has-validation">
                        <input type="text" name="username" class="form-control " id="floatingInputGroup1" placeholder="Username"  required>
                        <label class="text-dark" for="floatingInputGroup1">Username</label>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <div class="form-floating has-validation">
                        <input type="password" name="password" class="form-control" id="floatingInputGroup1" placeholder="Password"  required>
                        <label class="text-dark" for="floatingInputGroup1">Password</label>
                        <div class="invalid-feedback">Please enter your password.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary  w-100" type="submit" name="login">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="<?= BASEURL ?>/auth/register">Please Contact IT Staff</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  