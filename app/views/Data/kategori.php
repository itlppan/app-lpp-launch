
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
            <h5 class="card-title">Data Kategori Project</h5>
        <a class="btn btn-primary mr-3"  data-bs-toggle="modal" data-bs-target="#input">
                      New Input
                    </a>
              <!-- Modal Input -->
              <div class="modal fade" id="input"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Input New Data Project</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form method="post" action="<?= BASEURL ?>/data/inputproject">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_kategori" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
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
                <th class="text-center" scope="col">Nama Kategori</th>
              </tr>
            </thead>
            <tbody>
              <?php $n = 1; ?>
              <?php foreach($data['kategori'] as $row) : ?>
                <tr>
                  <td class="text-center"><strong><?= $n ?></strong></td>
                  <td><?php $id= $row["id"]; 
                  // echo $id;?>
                  <div class="row gap-2">
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"  data-bs-toggle="modal" data-bs-target="#delete<?= $id ?>">
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
                            <a class="btn btn-primary" href="<?= BASEURL ?>/data/deleteProject/<?=$id;?>">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Hapus End -->
                    <a type="button" class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" data-bs-target="#edit?id_project=<?= $id;?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>Update
                    </a>
                    <div class="modal fade" id="edit?id_project=<?= $id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form method="post" action="<?= BASEURL ?>/data/editproject/<?= $row['id'] ?>">
                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>" required>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Project</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_item" class="form-control" value="<?= $row['nama_kategori'] ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="input" class="btn btn-primary">Save As New</button>
                          </div>
                  </div>
                </div>
              </form>
                <!-- End General Form Elements -->
            </div>
            
        </div>
    </div>
</div>
                  </td>
                  <td class="text-center"><?= $row["nama_kategori"]; ?></td>                  
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