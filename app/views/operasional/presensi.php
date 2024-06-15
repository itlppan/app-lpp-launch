<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <!-- Ini dulunya col-lg-8 -->
    <div class="col-12">
      <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Realisasi Pelatihan</h5>
                <a href="<?= BASEURL ?>/daftar_realisasi">Import Data</a>
              <table class="table table-borderless datatable table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Entitas</th>
                    <th scope="col">Nama Pelatihan AgroNow</th>
                    <th scope="col">Nama Pelatihan AgroWallet</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal Mulai Agro Wallet</th>
                    <th scope="col">Tanggal Selesai AgroWallet</th>
                    <th scope="col">Nik Karyawan</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">JPL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1 ?>
                  <?php foreach($data['realisasi'] as $row) :?>
                  <tr>
                      <td><?= $i; ?></td> 
                      <td><?= $row["Entitas"]; ?></td>
                      <td><?= $row["Nama_Pelatihan_AgroNow"]; ?></td>
                      <td><?= $row["Nama_Pelatihan_AgroWallet"]; ?></td>
                      <td><?= $row["Lokasi"]; ?></td>
                      <td><?= $row["Tanggal_Mulai_AgroWallet"]; ?></td>
                      <td><?= $row["Tanggal_Selesai_AgroWallet"]; ?></td>
                      <td><?= $row["NIK_Karyawan"]; ?></td>
                      <td><?= $row["Nama_Karyawan"]; ?></td>
                      <td><?= $row["Nominal"]; ?></td> 
                      <td><?= $row["JPL"]; ?></td> 
                  </tr>
                  <?php $i++ ?>
                  <?php  endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- End Recent Sales -->
      </div>
    </div><!-- End Left side columns -->
  </div>
</section>