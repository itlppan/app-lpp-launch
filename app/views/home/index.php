

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <!-- Ini dulunya col-lg-8 -->
    <div class="col-lg-12">
      <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card shadow-lg rounded-5">
            <div class="card-body ">
              <h5 class="card-title">Sales <span>| This Years</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6><?= $data['countsales']['jumlah_transaksi'] ?><h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card shadow-lg rounded-5">
            <div class="card-body">
              <h5 class="card-title">Revenue <span>| This Years</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">             
                    <h6><?= formatRupiahRingkas($data['sumsales']['total_penjualan'])?></</h6>                
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">
          <div class="card info-card customers-card shadow-lg rounded-5">
            <div class="card-body">
              <h5 class="card-title">Customers <span>| This Year</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">          
                  <h6><?= $data['countclient']['jumlah_client'] ?></h6>               
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Customers Card -->

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto shadow ">
            <div class="card-body">
              <h5 class="card-title">Best Selling Product <span>| This Years</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Project</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Sum</th> 
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1 ?>
                  <?php foreach($data['recentsales'] as $sales) :?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $sales['nama_item'] ?></td>
                    <td><?= $sales['jenis'] ?></td>
                    <td><?= $sales['jumlah_penjualan'] ?></td>
                    <td><span class="font-bold"><strong>
                      <?=formatRupiahRingkas($sales["total_penjualan"]) ?></strong></span></td>
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

</main><!-- End #main -->