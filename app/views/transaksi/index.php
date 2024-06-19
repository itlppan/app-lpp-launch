<section class="section profile">
      <div class="row">
        <div class="col-xl-12">
        <?php Flasher::flash(); ?>
          <div class="card">
            <div class="card-body pt-3">
              <!-- Tabs Start -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#<?=ALL?>">Semua</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#<?=UNPAID?>">Unpaid</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#<?=PROCCESS?>">Proccess</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#<?=PAID?>">Paid</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#<?=CANCELED?>">canceled</button>
                </li>
              </ul>
              <!-- Tabs End -->
              <div class="tab-content pt-2">
                <!-- Semua Transasksi -->
                <div class="tab-pane fade show active profile-overview table-responsive" id="all">
                  <a href="#inputdata" data-bs-toggle="modal" class="btn btn-primary">Input Data</a>
                  <table class="table table-borderless datatable table-hover ">
              <thead>
                <tr>
                <th scope="col" class="text-center">No</th>
                <th>Aksi</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Nama Project</th>
                <th scope="col">QTY</th>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Pajak</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal</th>
                <th scope="col">status_pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <?php $n = 1; ?>
              <?php foreach($data['transaksi'] as $row) : ?>
                <tr>
                  <td><strong><?= $n ?></strong></td>
                  <td><?php $id= $row["id_transaksi"];?>
                  <div class="row gap-2">
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#delete/<?= ALL; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                      Delete
                    </a>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="delete/<?= ALL; ?>/<?= $id; ?>"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="<?= BASEURL ?>/transaksi/hapus/<?=$id;?>">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Hapus End -->
                    <?php if ($row['status_pembayaran'] == 'unpaid') : ?>
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#createinvoice/<?= ALL; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                      <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                    </svg>
                      Print
                    </a>
                  <?php  endif; ?>
                    <!-- Modal Create invoice -->
                    <div class="modal fade" id="createinvoice/<?= ALL; ?>/<?= $id; ?>"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Invoice</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= BASEURL ?>/transaksi/cetakInvoice" method="POST">
                            <input type="hidden" name="sub_total" value="<?= $row["sub_total"] ?>">
                            <input type="hidden" name="pajak" value="<?= $row["pajak"] ?>">
                            <input type="hidden" name="total" value="<?= $row["total"] ?>">
                          <div class="form-group">
                            <label for="to">No Invoice:</label>
                            <input type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Masukkan nama client" value="<?= $row["no_invoice"] ?>">
                          </div>
                            <div class="form-group">
                            <label for="to">Kepada:</label>
                            <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Masukkan nama client" value="<?= $row["nama_client"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $row["alamat"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Nama Pic:</label>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="Masukkan alamat" value="<?= $row["nama_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">No Pic:</label>
                            <input type="text" class="form-control" id="no_pic" name="no_pic" placeholder="Masukkan alamat" value="<?= $row["no_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="jenis">Jenis :</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan alamat" value="<?= $row["jenis"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_name">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Masukkan nama barang" value="<?= $row["nama_item"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_quantity">Jumlah:</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan jumlah barang" value="<?= $row["qty"] ?>" >
                          </div>
                          <div class="form-group">
                            <label for="items_unit_cost">Harga Satuan:</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga satuan barang" value="<?= $row["harga"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Pajak:</label>
                            <input type="number" class="form-control" id="pajak" name="pajak" placeholder="Masukkan persentase pajak" value="<?= $row["pajak"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan persentase pajak" value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Generate Invoice</button>
                          </div>
                        </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Create Invoice -->

                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#edit/<?= ALL; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                      Edit
                    </a>
            
                    <div class="modal fade" id="edit/<?= ALL; ?>/<?= $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                    <div class="modal-body">
                    <!-- Edit Data -->
                        <form action="<?= BASEURL?>/transaksi/ubah/<?= $row['id_transaksi'];?>" method="post">
                            <input type="hidden" name="id_transaksi" value="<?= $row["id_transaksi"] ?>">
                            <input type="hidden" name="id_client" value="<?= $row["id_client"] ?>">
                            <input type="hidden" name="id_project" value="<?= $row["id_project"] ?>">
                          <div class="form-group">
                            <label for="to">Kepada:</label>
                            <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Masukkan nama client" value="<?= $row["nama_client"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Invoice Date:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal " value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $row["alamat"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Nama Pic:</label>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="Masukkan Nama PIC" value="<?= $row["nama_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">No Pic:</label>
                            <input type="text" class="form-control" id="no_pic" name="no_pic" placeholder="Masukkan No PIC" value="<?= $row["no_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="jenis">Kategori :</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Kategori Project" value="<?= $row["jenis"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="number">Nomor :</label>
                            <input <?= $_SESSION['user'] != 'admin' ? 'disabled' : '' ?> type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Masukkan nomor invoice" value="<?=$row["no_invoice"]?> ">
                          </div>
                          <div class="form-group">
                            <label for="items_name">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Masukkan Nama Barang" value="<?= $row["nama_item"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_quantity">Jumlah:</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan Jumlah Barang" value="<?= $row["qty"] ?>" >
                          </div>
                          <div class="form-group">
                            <label for="items_unit_cost">Harga Satuan:</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Satuan" value="<?= $row["harga"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Start Date:</label>
                            <input type="date" class="form-control" id="tanggal" name="	tanggal_mulai" placeholder="Masukkan Tanggal " value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">End Date:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_selesai" placeholder="Masukkan Tanggal " value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Pajak:</label>
                            <input type="number" class="form-control" id="pajak" name="pajak" placeholder="Masukkan pajak" value="<?= $row["pajak"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Total :</label>
                            <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan Harga Total" value="<?= $row["total"] ?>">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="edit" class="btn btn-primary">Save Edit</button>
                          </div>
                        </form>
                    <!-- End Edit Data -->
                    </div>
              </div>
                  </div>
                  </div>
                  </td>
                  <td><?= $row["no_invoice"]; ?></td>
                  <td><?= $row["nama_client"]; ?></td>      
                  <td><?= $row["nama_item"]; ?></td>
                  <td><?= $row["qty"]; ?></td>
                  <td><?= $row["jenis"]; ?></td>
                  <td><?= formatRupiahRingkas($row["harga"]); ?></td>
                  <td><?= formatRupiahRingkas($row["pajak"]); ?></td>
                  <td><?= formatRupiahRingkas($row["total"]); ?></td>
                  <td><?= $row["tanggal"]; ?></td>                    
                  <td> <a  data-bs-toggle="modal" href="#editstatus/<?= ALL; ?>/<?= $id; ?>" class="badge rounded-pill <?= ($row['status_pembayaran'] == 'paid') ? 'text-bg-success' : (($row['status_pembayaran'] == 'unpaid') ? 'text-bg-danger' : (($row['status_pembayaran'] == 'process') ? 'text-bg-warning' : 'text-bg-primary')) ?>"><?= $row["status_pembayaran"]; ?></a>
                          <!-- Modal edit status_pembayaran -->
                    <div class="modal fade" id="editstatus/<?= ALL; ?>/<?= $id; ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Status Pembayaran</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form method="POST" class="form-floating" action="<?= BASEURL ?>/transaksi/status/<?= $id ?>">
                                        <input type="hidden" name="id_transaksi" value="<?=$id?>">
                                          <div class="form-group">
                                              <label for="to">Pilih Status Pembayaran :</label>
                                              <select class="form-select" name="status_pembayaran" aria-label="Default select example">
                                                  <option selected disabled><?= $row['status_pembayaran'] ?></option>
                                                  <option value="unpaid">Unpaid</option>
                                                  <option value="process">Process</option>
                                                  <option value="paid">Paid</option>
                                                  <option value="canceled">Canceled</option>
                                              </select>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" name="newinput" class="btn btn-primary">Generate Invoice</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Modal edit status_pembayaran end -->
                </td>                    
                </tr>
                </tr>
                <?php $n++; ?>
              <?php endforeach; ?>
            </tbody>
                  </table>
                  </div>
                <!--  Semua Transaksi End -->
                <!-- Unpaid Status -->
                <div class="tab-pane fade profile-edit pt-3 table-responsive" id="unpaid">
                      <a href="#inputdata" data-bs-toggle="modal" class="btn btn-primary">Input Data</a>
                  <table class="table table-borderless datatable table-hover ">
                    <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th>Aksi</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Nama Project</th>
                <th scope="col">QTY</th>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Pajak</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal</th>
                <th scope="col">status_pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <?php $n = 1; ?>
              <?php foreach($data['unpaid'] as $row) : ?>
                <tr>
                  <td><strong><?= $n ?></strong></td>
                  <td><?php $id= $row["id_transaksi"];?>
                  <div class="row gap-2">
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#delete/<?= UNPAID; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                      Delete
                    </a>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="delete/<?= UNPAID; ?>/<?= $id; ?>"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="<?= BASEURL ?>/transaksi/hapus/<?=$id;?>">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Hapus End -->
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#createinvoice/<?= UNPAID; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                      <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                    </svg>
                      Print
                    </a>
                    <!-- Modal Create invoice -->
                    <div class="modal fade" id="createinvoice/<?= UNPAID; ?>/<?= $id; ?>"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Invoice</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="<?= BASEURL ?>/transaksi/cetakInvoice" method="POST">
                            <input type="hidden" name="sub_total" value="<?= $row["sub_total"] ?>">
                            <input type="hidden" name="pajak" value="<?= $row["pajak"] ?>">
                            <input type="hidden" name="total" value="<?= $row["total"] ?>">
                          <div class="form-group">
                            <label for="to">No Invoice:</label>
                            <input type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Masukkan nama client" value="<?= $row["no_invoice"] ?>">
                          </div>
                            <div class="form-group">
                            <label for="to">Kepada:</label>
                            <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Masukkan nama client" value="<?= $row["nama_client"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $row["alamat"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Nama Pic:</label>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="Masukkan alamat" value="<?= $row["nama_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">No Pic:</label>
                            <input type="text" class="form-control" id="no_pic" name="no_pic" placeholder="Masukkan alamat" value="<?= $row["no_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="jenis">Jenis :</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan alamat" value="<?= $row["jenis"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_name">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Masukkan nama barang" value="<?= $row["nama_item"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_quantity">Jumlah:</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan jumlah barang" value="<?= $row["qty"] ?>" >
                          </div>
                          <div class="form-group">
                            <label for="items_unit_cost">Harga Satuan:</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga satuan barang" value="<?= $row["harga"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Pajak:</label>
                            <input type="number" class="form-control" id="pajak" name="pajak" placeholder="Masukkan persentase pajak" value="<?= $row["pajak"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan persentase pajak" value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Generate Invoice</button>
                          </div>
                        </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Create Invoice -->

                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#edit/<?= UNPAID; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                      Edit
                    </a>
            
                    <div class="modal fade" id="edit/<?= UNPAID; ?>/<?= $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit Data -->
                        <form action="<?= BASEURL?>/transaksi/ubah/<?= $row['id_transaksi'];?>" method="post">
                            <input type="hidden" name="id_transaksi" value="<?= $row["id_transaksi"] ?>">
                            <input type="hidden" name="id_client" value="<?= $row["id_client"] ?>">
                            <input type="hidden" name="id_project" value="<?= $row["id_project"] ?>">
                          <div class="form-group">
                            <label for="to">Kepada:</label>
                            <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Masukkan nama client" value="<?= $row["nama_client"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal " value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $row["alamat"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Nama Pic:</label>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="Masukkan Nama PIC" value="<?= $row["nama_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">No Pic:</label>
                            <input type="text" class="form-control" id="no_pic" name="no_pic" placeholder="Masukkan No PIC" value="<?= $row["no_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="jenis">Kategori :</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Kategori Project" value="<?= $row["jenis"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="number">Nomor :</label>
                            <input <?= $_SESSION['user'] != 'admin' ? 'disabled' : '' ?> type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Masukkan nomor invoice" value="<?=$row["no_invoice"]?> ">
                          </div>
                          <div class="form-group">
                            <label for="items_name">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Masukkan Nama Barang" value="<?= $row["nama_item"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_quantity">Jumlah:</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan Jumlah Barang" value="<?= $row["qty"] ?>" >
                          </div>
                          <div class="form-group">
                            <label for="items_unit_cost">Harga Satuan:</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Satuan" value="<?= $row["harga"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Pajak:</label>
                            <input type="number" class="form-control" id="pajak" name="pajak" placeholder="Masukkan pajak" value="<?= $row["pajak"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Total :</label>
                            <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan Harga Total" value="<?= $row["total"] ?>">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="edit" class="btn btn-primary">Save Edit</button>
                          </div>
                </form>
                <!-- End Edit Data -->
            </div>
        </div>
    </div>
</div>
                  </td>
                  
                  <td><?= $row["no_invoice"]; ?></td>
                  <td><?= $row["nama_client"]; ?></td>      
                  <td><?= $row["nama_item"]; ?></td>
                  <td><?= $row["qty"]; ?></td>
                  <td><?= $row["jenis"]; ?></td>
                  <td><?= formatRupiahRingkas($row["harga"]); ?></td>
                  <td><?= formatRupiahRingkas($row["pajak"]); ?></td>
                  <td><?= formatRupiahRingkas($row["total"]); ?></td>
                  <td><?= $row["tanggal"]; ?></td>                    
                  <td> <a  data-bs-toggle="modal" href="#editstatus/<?= UNPAID; ?>/<?= $id; ?>" class="badge rounded-pill <?= ($row['status_pembayaran'] == 'paid') ? 'text-bg-success' : (($row['status_pembayaran'] == 'unpaid') ? 'text-bg-danger' : (($row['status_pembayaran'] == 'process') ? 'text-bg-warning' : 'text-bg-primary')) ?>"><?= $row["status_pembayaran"]; ?></a>
                          <!-- Modal edit status_pembayaran -->
                    <div class="modal fade" id="editstatus/<?= UNPAID; ?>/<?= $id; ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Status Pembayaran</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form method="POST" class="form-floating" action="<?= BASEURL ?>/transaksi/status/<?= $id ?>">
                                        <input type="hidden" name="id_transaksi" value="<?=$id?>">
                                          <div class="form-group">
                                              <label for="to">Pilih Status Pembayaran :</label>
                                              <select class="form-select" name="status_pembayaran" aria-label="Default select example">
                                                  <option selected disabled><?= $row['status_pembayaran'] ?></option>
                                                  <option value="unpaid">Unpaid</option>
                                                  <option value="process">Process</option>
                                                  <option value="paid">Paid</option>
                                                  <option value="canceled">Canceled</option>
                                              </select>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" name="newinput" class="btn btn-primary">Generate Invoice</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Modal edit status_pembayaran end -->
                </td> 
                </tr>
                <?php $n++; ?>
              <?php endforeach; ?>
            </tbody>
                  </table>
                  </div>
                <!-- Unpaid Status End -->
                <!-- Proccess Status -->
                <div class="tab-pane fade pt-3 table-responsive" id="proccess">
                  <a href="#inputdata" data-bs-toggle="modal" class="btn btn-primary">Input Data</a>
                  <table class="table table-borderless datatable table-hover ">
                    <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th>Aksi</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Nama Project</th>
                <th scope="col">QTY</th>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Pajak</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal</th>
                <th scope="col">status_pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <?php $n = 1; ?>
              <?php foreach($data['proccess'] as $row) : ?>
                <tr>
                  <td><strong><?= $n ?></strong></td>
                  <td><?php $id= $row["id_transaksi"];?>
                  <div class="row gap-2">
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#delete/<?= PROCCESS; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                      Delete
                    </a>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="delete/<?= PROCCESS; ?>/<?= $id; ?>"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="<?= BASEURL ?>/transaksi/hapus/<?=$id;?>">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Hapus End -->
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#edit/<?= PROCCESS; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                      Edit
                    </a>
            
                    <div class="modal fade" id="edit/<?= PROCCESS; ?>/<?= $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit Data -->
                        <form action="<?= BASEURL?>/transaksi/ubah/<?= $row['id_transaksi'];?>" method="post">
                            <input type="hidden" name="id_transaksi" value="<?= $row["id_transaksi"] ?>">
                            <input type="hidden" name="id_client" value="<?= $row["id_client"] ?>">
                            <input type="hidden" name="id_project" value="<?= $row["id_project"] ?>">
                          <div class="form-group">
                            <label for="to">Kepada:</label>
                            <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Masukkan nama client" value="<?= $row["nama_client"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal " value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $row["alamat"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Nama Pic:</label>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="Masukkan Nama PIC" value="<?= $row["nama_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">No Pic:</label>
                            <input type="text" class="form-control" id="no_pic" name="no_pic" placeholder="Masukkan No PIC" value="<?= $row["no_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="jenis">Kategori :</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Kategori Project" value="<?= $row["jenis"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="number">Nomor :</label>
                            <input <?= $_SESSION['user'] != 'admin' ? 'disabled' : '' ?> type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Masukkan nomor invoice" value="<?=$row["no_invoice"]?> ">
                          </div>
                          <div class="form-group">
                            <label for="items_name">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Masukkan Nama Barang" value="<?= $row["nama_item"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_quantity">Jumlah:</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan Jumlah Barang" value="<?= $row["qty"] ?>" >
                          </div>
                          <div class="form-group">
                            <label for="items_unit_cost">Harga Satuan:</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Satuan" value="<?= $row["harga"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Pajak:</label>
                            <input type="number" class="form-control" id="pajak" name="pajak" placeholder="Masukkan pajak" value="<?= $row["pajak"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Total :</label>
                            <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan Harga Total" value="<?= $row["total"] ?>">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="edit" class="btn btn-primary">Save Edit</button>
                          </div>
                </form>
                <!-- End Edit Data -->
            </div>
        </div>
    </div>
</div>
                  </td>
                  
                  <td><?= $row["no_invoice"]; ?></td>
                  <td><?= $row["nama_client"]; ?></td>      
                  <td><?= $row["nama_item"]; ?></td>
                  <td><?= $row["qty"]; ?></td>
                  <td><?= $row["jenis"]; ?></td>
                  <td><?= formatRupiahRingkas($row["harga"]); ?></td>
                  <td><?= formatRupiahRingkas($row["pajak"]); ?></td>
                  <td><?= formatRupiahRingkas($row["total"]); ?></td>
                  <td><?= $row["tanggal"]; ?></td>
                  <td> <a  data-bs-toggle="modal" href="#editstatus/<?= PROCCESS; ?>/<?= $id; ?>" class="badge rounded-pill <?= ($row['status_pembayaran'] == 'paid') ? 'text-bg-success' : (($row['status_pembayaran'] == 'unpaid') ? 'text-bg-danger' : (($row['status_pembayaran'] == 'process') ? 'text-bg-warning' : 'text-bg-primary')) ?>"><?= $row["status_pembayaran"]; ?></a>
                          <!-- Modal edit status_pembayaran -->
                    <div class="modal fade" id="editstatus/<?= PROCCESS; ?>/<?= $id; ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Status Pembayaran</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form method="POST" class="form-floating" action="<?= BASEURL ?>/transaksi/status/<?= $id ?>">
                                        <input type="hidden" name="id_transaksi" value="<?=$id?>">
                                          <div class="form-group">
                                              <label for="to">Pilih Status Pembayaran :</label>
                                              <select class="form-select" name="status_pembayaran" aria-label="Default select example">
                                                  <option selected disabled><?= $row['status_pembayaran'] ?></option>
                                                  <option value="unpaid">Unpaid</option>
                                                  <option value="process">Process</option>
                                                  <option value="paid">Paid</option>
                                                  <option value="canceled">Canceled</option>
                                              </select>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" name="newinput" class="btn btn-primary">Generate Invoice</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Modal edit status_pembayaran end -->
                </td>                   
                </tr>
                <?php $n++; ?>
              <?php endforeach; ?>
            </tbody>
                  </table>
                  </div>
                <!-- Proccess Status End -->
                <!-- Paid Start -->
                <div class="tab-pane fade pt-3 table-responsive" id="paid">
                  <a href="#inputdata" data-bs-toggle="modal" class="btn btn-primary">Input Data</a>
                  <table class="table table-borderless datatable table-hover ">
                    <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th>Aksi</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Nama Project</th>
                <th scope="col">QTY</th>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Pajak</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal</th>
                <th scope="col">status_pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <?php $n = 1; ?>
              <?php foreach($data['paid'] as $row) : ?>
                <tr>
                  <td><strong><?= $n ?></strong></td>
                  <td><?php $id= $row["id_transaksi"];?>
                  <div class="row gap-2">
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#delete/<?= PAID; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                      Delete
                    </a>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="delete/<?= PAID; ?>/<?= $id; ?>"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="<?= BASEURL ?>/transaksi/hapus/<?=$id;?>">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Hapus End -->
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#edit/<?= PAID; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                      Edit
                    </a>
            
                    <div class="modal fade" id="edit/<?= PAID; ?>/<?= $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit Data -->
                        <form action="<?= BASEURL?>/transaksi/ubah/<?= $row['id_transaksi'];?>" method="post">
                            <input type="hidden" name="id_transaksi" value="<?= $row["id_transaksi"] ?>">
                            <input type="hidden" name="id_client" value="<?= $row["id_client"] ?>">
                            <input type="hidden" name="id_project" value="<?= $row["id_project"] ?>">
                          <div class="form-group">
                            <label for="to">Kepada:</label>
                            <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Masukkan nama client" value="<?= $row["nama_client"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal " value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $row["alamat"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Nama Pic:</label>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="Masukkan Nama PIC" value="<?= $row["nama_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">No Pic:</label>
                            <input type="text" class="form-control" id="no_pic" name="no_pic" placeholder="Masukkan No PIC" value="<?= $row["no_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="jenis">Kategori :</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Kategori Project" value="<?= $row["jenis"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="number">Nomor :</label>
                            <input <?= $_SESSION['user'] != 'admin' ? 'disabled' : '' ?> type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Masukkan nomor invoice" value="<?=$row["no_invoice"]?> ">
                          </div>
                          <div class="form-group">
                            <label for="items_name">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Masukkan Nama Barang" value="<?= $row["nama_item"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_quantity">Jumlah:</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan Jumlah Barang" value="<?= $row["qty"] ?>" >
                          </div>
                          <div class="form-group">
                            <label for="items_unit_cost">Harga Satuan:</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Satuan" value="<?= $row["harga"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Pajak:</label>
                            <input type="number" class="form-control" id="pajak" name="pajak" placeholder="Masukkan pajak" value="<?= $row["pajak"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Total :</label>
                            <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan Harga Total" value="<?= $row["total"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Status Pembayaran :</label>
                            <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan Harga Total" value="<?= $row["total"] ?>">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="edit" class="btn btn-primary">Save Edit</button>
                          </div>
                </form>
                <!-- End Edit Data -->
            </div>
        </div>
    </div>
</div>
                  </td>
                  
                  <td><?= $row["no_invoice"]; ?></td>
                  <td><?= $row["nama_client"]; ?></td>      
                  <td><?= $row["nama_item"]; ?></td>
                  <td><?= $row["qty"]; ?></td>
                  <td><?= $row["jenis"]; ?></td>
                  <td><?= formatRupiahRingkas($row["harga"]); ?></td>
                  <td><?= formatRupiahRingkas($row["pajak"]); ?></td>
                  <td><?= formatRupiahRingkas($row["total"]); ?></td>
                  <td><?= $row["tanggal"]; ?></td>                    
                  <td> <a  data-bs-toggle="modal" href="#editstatus/<?= PAID; ?>/<?= $id; ?>" class="badge rounded-pill <?= ($row['status_pembayaran'] == 'paid') ? 'text-bg-success' : (($row['status_pembayaran'] == 'unpaid') ? 'text-bg-danger' : (($row['status_pembayaran'] == 'process') ? 'text-bg-warning' : 'text-bg-primary')) ?>"><?= $row["status_pembayaran"]; ?></a>
                          <!-- Modal edit status_pembayaran -->
                    <div class="modal fade" id="editstatus/<?= PAID; ?>/<?= $id; ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Status Pembayaran</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form method="POST" class="form-floating" action="<?= BASEURL ?>/transaksi/status/<?= $id ?>">
                                        <input type="hidden" name="id_transaksi" value="<?=$id?>">
                                          <div class="form-group">
                                              <label for="to">Pilih Status Pembayaran :</label>
                                              <select class="form-select" name="status_pembayaran" aria-label="Default select example">
                                                  <option selected disabled><?= $row['status_pembayaran'] ?></option>
                                                  <option value="unpaid">Unpaid</option>
                                                  <option value="process">Process</option>
                                                  <option value="paid">Paid</option>
                                                  <option value="canceled">Canceled</option>
                                              </select>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" name="newinput" class="btn btn-primary">Generate Invoice</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Modal edit status_pembayaran end -->
                </td> 
                </tr>
                <?php $n++; ?>
              <?php endforeach; ?>
            </tbody>
                  </table>
                  </div>
                <!-- Paid End -->
                <!-- Canceled Start -->
                <div class="tab-pane fade pt-3 table-responsive" id="canceled">
                  <a href="#inputdata" data-bs-toggle="modal" class="btn btn-primary">Input Data</a>
                  <table class="table table-borderless datatable table-hover ">
                    <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th>Aksi</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Nama Project</th>
                <th scope="col">QTY</th>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Pajak</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal</th>
                <th scope="col">status_pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <?php $n = 1; ?>
              <?php foreach($data['canceled'] as $row) : ?>
                <tr>
                  <td><strong><?= $n ?></strong></td>
                  <td><?php $id= $row["id_transaksi"];?>
                  <div class="row gap-2">
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#delete/<?= CANCELED; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                      Delete
                    </a>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="delete/<?= CANCELED; ?>/<?= $id; ?>"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="<?= BASEURL ?>/transaksi/hapus/<?=$id;?>">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Hapus End -->
                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal" href="#edit/<?= CANCELED; ?>/<?= $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                      Edit
                    </a>
            
                    <div class="modal fade" id="edit/<?= CANCELED; ?>/<?= $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit Data -->
                        <form action="<?= BASEURL?>/transaksi/ubah/<?= $row['id_transaksi'];?>" method="post">
                            <input type="hidden" name="id_transaksi" value="<?= $row["id_transaksi"] ?>">
                            <input type="hidden" name="id_client" value="<?= $row["id_client"] ?>">
                            <input type="hidden" name="id_project" value="<?= $row["id_project"] ?>">
                          <div class="form-group">
                            <label for="to">Kepada:</label>
                            <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Masukkan nama client" value="<?= $row["nama_client"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal " value="<?= $row["tanggal"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $row["alamat"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">Nama Pic:</label>
                            <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="Masukkan Nama PIC" value="<?= $row["nama_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="to">No Pic:</label>
                            <input type="text" class="form-control" id="no_pic" name="no_pic" placeholder="Masukkan No PIC" value="<?= $row["no_pic"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="jenis">Kategori :</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Kategori Project" value="<?= $row["jenis"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="number">Nomor :</label>
                            <input <?= $_SESSION['user'] != 'admin' ? 'disabled' : '' ?> type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Masukkan nomor invoice" value="<?=$row["no_invoice"]?> ">
                          </div>
                          <div class="form-group">
                            <label for="items_name">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Masukkan Nama Barang" value="<?= $row["nama_item"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="items_quantity">Jumlah:</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan Jumlah Barang" value="<?= $row["qty"] ?>" >
                          </div>
                          <div class="form-group">
                            <label for="items_unit_cost">Harga Satuan:</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Satuan" value="<?= $row["harga"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Pajak:</label>
                            <input type="number" class="form-control" id="pajak" name="pajak" placeholder="Masukkan pajak" value="<?= $row["pajak"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="tax">Total :</label>
                            <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan Harga Total" value="<?= $row["total"] ?>">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="edit" class="btn btn-primary">Save Edit</button>
                          </div>
                </form>
                <!-- End Edit Data -->
            </div>
        </div>
    </div>
</div>
                  </td>
                  
                  <td><?= $row["no_invoice"]; ?></td>
                  <td><?= $row["nama_client"]; ?></td>      
                  <td><?= $row["nama_item"]; ?></td>
                  <td><?= $row["qty"]; ?></td>
                  <td><?= $row["jenis"]; ?></td>
                  <td><?= formatRupiahRingkas($row["harga"]); ?></td>
                  <td><?= formatRupiahRingkas($row["pajak"]); ?></td>
                  <td><?= formatRupiahRingkas($row["total"]); ?></td>
                  <td><?= $row["tanggal"]; ?></td>                    
                  <td> <a  data-bs-toggle="modal" href="#editstatus/<?= CANCELED; ?>/<?= $id; ?>" class="badge rounded-pill <?= ($row['status_pembayaran'] == 'paid') ? 'text-bg-success' : (($row['status_pembayaran'] == 'unpaid') ? 'text-bg-danger' : (($row['status_pembayaran'] == 'process') ? 'text-bg-warning' : 'text-bg-primary')) ?>"><?= $row["status_pembayaran"]; ?></a>
                          <!-- Modal edit status_pembayaran -->
                    <div class="modal fade" id="editstatus/<?= CANCELED; ?>/<?= $id; ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Status Pembayaran</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form method="POST" class="form-floating" action="<?= BASEURL ?>/transaksi/status/<?= $id ?>">
                                        <input type="hidden" name="id_transaksi" value="<?=$id?>">
                                          <div class="form-group">
                                              <label for="to">Pilih Status Pembayaran :</label>
                                              <select class="form-select" name="status_pembayaran" aria-label="Default select example">
                                                  <option selected disabled><?= $row['status_pembayaran'] ?></option>
                                                  <option value="unpaid">Unpaid</option>
                                                  <option value="process">Process</option>
                                                  <option value="paid">Paid</option>
                                                  <option value="canceled">Canceled</option>
                                              </select>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" name="newinput" class="btn btn-primary">Save Edit</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Modal edit status_pembayaran end -->
                </td> 
                </tr>
                <?php $n++; ?>
              <?php endforeach; ?>
            </tbody>
                  </table>
                  </div>
                <!-- Canceled End -->
              </div><!-- End Bordered Tabs -->
          </div>
        </div>
      </div>
          <!-- Modal Input Data -->
            <div class="modal fade" id="inputdata" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="form-floating" action="<?= BASEURL ?>/transaksi/tambah"> <!-- Ganti "process.php" dengan nama berkas PHP yang menangani input data -->
                                <div class="form-group">
                                    <label for="to">Nama Client :</label>
                                    <select class="form-select" name="id_client" aria-label="Default select example">
                                        <option selected disabled>Pilih Client</option>
                                        <?php foreach($data['client'] as $row) : ?>
                                            <option value="<?= $row["id_client"]; ?>"><?= $row["nama_client"]; ?><strong> (<?=$row['kategori_project']?>) </strong></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="to">Nama Project :</label>
                                    <select class="form-select" name="id_project" aria-label="Default select example">
                                        <option selected disabled>Pilih Project</option>
                                        <?php foreach($data['project'] as $row) : ?>
                                            <option value="<?= $row["id_project"]; ?>"><?= $row["nama_item"]; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-floating my-3 ">
                                  <input type="number" name="qty" class="form-control" id="floatingInput" placeholder="Jumlah Peserta">
                                  <label for="floatingInput">Jumlah Peserta</label>
                                </div>
                                <div class="form-floating my-3">
                                  <input type="date" name="tanggal" class="form-control" id="floatingInput" placeholder="Tanggal Project">
                                  <label for="floatingInput">Tanggal Project</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="newinput" class="btn btn-primary">Save Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          <!-- Modal Input Data End -->
    </section>
    </main><!-- End #main -->