<section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Company Info</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Payment Info</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-board">Board Info</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Update Password</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Perusahaan</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['company_name'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['alamat_comp'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['email_comp'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telepon</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['no_telp_comp'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NPWP</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['npwp_comp'] ?></div>
                  </div>
                  <h5 class="card-title">Payment Info</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Rekening</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['nama_rekening'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama Bank</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['nama_bank'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Rekening</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['no_rekening'] ?></div>
                  </div>
                  <h5 class="card-title">Board Info</h5>
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Board</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['ttd'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama Jabatan</div>
                    <div class="col-lg-9 col-md-8"><?= $data['appsetting']['nama_jabatan'] ?></div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form method="post" action="<?= BASEURL ?>/master/editcompany">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Header Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/unnamed.png" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Perusahaan</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $data['appsetting']['company_name']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Alamat Perusahaan</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="about" class="form-control" id="about" style="height: 100px" value="<?= $data['appsetting']['alamat_comp']?>"></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">No Telp Perusahaan</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?=  $data['appsetting']['no_telp_comp']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">NPWP</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?=  $data['appsetting']['npwp_comp']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?=  $data['appsetting']['email_comp']; ?>" required>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>
                <div class="tab-pane fade pt-3" id="profile-settings">
                  <!-- payment Info Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Rekening</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama_rekening" type="text" class="form-control" id="nama_rekening" value="<?= $data['appsetting']['nama_rekening']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Nomor Rekening</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_rekening" class="form-control" id="no_rekening"value="<?= $data['appsetting']['no_rekening']?>"></input>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Nama Bank</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama_bank" type="text" class="form-control" id="nama_bank" value="<?=  $data['appsetting']['nama_bank']; ?>" required>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                  <!-- End Payment Info Form -->
                </div>
                <div class="tab-pane fade pt-3" id="profile-board">
                  <!-- Change Board Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="nama_jabatan" class="col-md-4 col-lg-3 col-form-label">Bom Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama_jabatan" type="text" class="form-control" id="nama_jabatan" value="<?= $data['appsetting']['ttd'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nama_jabatan" class="col-md-4 col-lg-3 col-form-label">Nama Jabatan</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama_jabatan" type="text" class="form-control" id="nama_jabatan" value="<?= $data['appsetting']['nama_jabatan'] ?>">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                  </form><!-- End Change Board Form -->
                </div>
                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
              <form action="<?= BASEURL; ?>/auth/changePassword" method="post">
                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="old_password" type="password" class="form-control" id="currentPassword" required>
                      </div>
              </div>
              <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                      <input name="new_password" type="password" class="form-control" id="newPassword" required>
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                      <input name="confirm_password" type="password" class="form-control" id="renewPassword" required>
                  </div>
              </div>
              <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
              </div>
              </form><!-- End Change Password Form -->

              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
    </main><!-- End #main -->