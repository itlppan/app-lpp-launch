  <section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <!-- Ini dulunya col-lg-8 -->
    <div class="col-12">
    <?php Flasher::flash(); ?>
      <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
            <h5 class="card-title">Data Entitas</h5>
              <a class="btn btn-primary mr-3"  data-bs-toggle="modal" data-bs-target="#input">Input Data</a>
                                  <!-- Modal Input -->
                                  <div class="modal fade" id="input"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data Entitas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= BASEURL ?>/data/inputClient" method="post">
                <div class="form-group">
                    <label for="nama_client" >Nama Entitas</label>
                    <input type="text" name="nama_client" id="nama_client" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kategori_project">Kategori Project</label>
                    <select class="form-select" name="kategori_project" aria-label="Default select example">
                      <option selected disabled>Pilih Kategori</option>
                      <?php  foreach ($data['kategori'] as $kategori) : ?>
                        <option value="<?= $kategori['nama_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="inputNumber">Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputNumber">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputNumber">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputNumber">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputNumber">Nama PIC</label>
                    <input type="text" name="nama_pic" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputNumber">No PIC</label>
                    <input type="number" name="no_pic" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputNumber">NPWP</label>
                    <input type="number" name="npwp" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputNumber">Alamat NPWP</label>
                    <input type="text" name="alamat_npwp" class="form-control">
                </div>

                <div class="form-group">
                  <label></label>
                  <div class="col-sm-10">
                    
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="input" class="btn btn-primary">Save As New</button>
                    </div>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!-- Modal Input End -->
              <table class="table table-borderless datatable table-hover">
              <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th>Aksi</th>
                <th scope="col">Nama Entitas</th>
                <th scope="col">Kategori Project</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nama(PIC)</th>
                <th scope="col">No.Hp(PIC)</th>
                <th scope="col">NPWP</th>
                <th scope="col">Alamat NPWP</th>
              </tr>
            </thead>
            <tbody>
              <?php $n = 1; ?>
              <?php foreach($data['client'] as $row) : ?>
                <tr>
                  <td><strong><?= $n ?></strong></td>
                  <td><?php $id= $row["id_client"]; 
                  // echo $id;?>
                  <div class="row gap-2">
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"  data-bs-toggle="modal" data-bs-target="#delete<?= $id ;?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>Delete
                    </a>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="delete<?= $id ?>"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah Anda yakin Ingin Hapus Data ?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Data Ini Akan Dihapus Secara Permanen
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn btn-primary" href="<?= BASEURL ?>/data/deleteclient/<?=$id;?>" >Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Hapus End -->
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" type="button" data-bs-toggle="modal" data-bs-target="#edit?id_client=<?= $id;?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>Update
                    </a>
                    <div class="modal fade" id="edit?id_client=<?= $id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form method="post" action="<?= BASEURL ?>/data/editclient/<?= $row["id_client"]?>">
                        <input type="hidden" name="id_client" value="<?= $row["id_client"] ?>">
                    <div class="form-group">
                        <label for="inputText">Nama Entitas</label>
                        <input type="text" name="nama_client" class="form-control" value="<?= $row["nama_client"] ?>">
                    <div class="form-group">
                        <label for="inputEmail">Kateori Project</label>
                            <input type="text" name="kategori_project" class="form-control" value="<?= $row["kategori_project"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNumber">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?= $row["alamat"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNumber">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" value="<?= $row['kecamatan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNumber">Kabupaten</label>
                        <input type="text" name="kabupaten" class="form-control" value="<?= $row['kabupaten'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNumber">Provinsi</label>
                        <input type="text" name="provinsi" class="form-control" value="<?= $row['provinsi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNumber">Nama PIC</label>
                        <input type="text" name="nama_pic" class="form-control" value="<?= $row["nama_pic"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNumber">No PIC</label>
                        <input type="text" name="no_pic" class="form-control" value="<?= $row["no_pic"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNumber">NPWP</label>
                        <input type="text" name="npwp" class="form-control" value="<?= $row["npwp"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat_npwp">Alamat NPWP</label>
                        <input type="text" name="alamat_npwp" class="form-control" value="<?= $row["alamat_npwp"] ?>">
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save Edit</button>
            </div>
                </form>
                <!-- End General Form Elements -->
            </div>
            
        </div>
    </div>
</div>

                  </td>
                  <td ><?= clean_data($row["nama_client"]) ?></td>
                  <td><?= $row["kategori_project"]; ?></td> 
                  <td><?= $row["alamat"]; ?></td>
                  <td><?= $row["nama_pic"]; ?></td>
                  <td><?= $row["no_pic"]; ?></td>
                  <td><?= $row["npwp"]; ?></td>
                  <td><?= $row["alamat_npwp"]; ?></td>
                </tr>
                <?php $n++; ?>
              <?php endforeach; ?>
            </tbody>
              </table>
            </div>
          </div>
        </div><!-- End Recent Sales -->
      </div>
    </div><!-- End Left side columns -->
  </div>
</section>
</main><!-- End #main -->