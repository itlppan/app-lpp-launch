
<!-- Form Input Data Start -->
<div style="padding: 10px 20px;">
    <h3 style="margin-top: 5px;">Form Import Data</h3>
    <hr style="margin-top: 5px;margin-bottom: 15px;">

    <form method="post" enctype="multipart/form-data">
        <a href="<?= BASEURL ?>/daftar_realisasi.xlsx">Download Format</a> &nbsp;|&nbsp;
        <a href="<?= BASEURL ?>/Operasional">Kembali</a>
        <br><br>

        <div class="clearfix">
            <div class="float-left" style="margin-right: 5px;">
                <input type="file" name="file" class="form-control">
            </div>
            <button type="submit" name="preview" class="btn btn-primary mt-2">PREVIEW</button>
        </div>
    </form>
    <hr>

    <?php
    $filename = isset($_GET['file']) ? $_GET['file'] : '';
    if($filename) $filepath = 'public/tmp' . $filename;
    // Jika user telah mengklik tombol Preview
    if (isset($_POST['preview'])) {
        $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
        $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

        // Cek apakah terdapat file data.xlsx pada folder tmp
        if (is_file('tmp/' . $nama_file_baru)) // Jika file tersebut ada
            unlink('tmp/' . $nama_file_baru); // Hapus file tersebut

        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
        $tmp_file = $_FILES['file']['tmp_name'];

        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if ($ext == "xlsx") {
            // Upload file yang dipilih ke folder tmp
            // dan rename file tersebut menjadi data{tglsekarang}.xlsx
            // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
            // Contoh nama file setelah di rename : data20210814192500.xlsx
            move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);
            require 'vendor/autoload.php'; // 
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
            $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // Buat sebuah tag form untuk proses import data ke database
            echo "<form method='post' action='import.php'>";

            // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
            // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
            echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";

            // Buat sebuah div untuk alert validasi kosong
            echo "<div id='kosong' class='alert alert-danger' style='display:none;'>
                Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
            </div>";

            echo "<div class='table-responsive'>
                <table class='table table-bordered'>
                    <tr>
                        <th colspan='14' class='text-left'>Preview Data</th>
                    </tr>
                    <tr>
                    <th scope='col'>No</th>
                    <th scope='col'>Entitas</th>
                    <th scope='col'>Nama Pelatihan AgroNow</th>
                    <th scope='col'>Nama Pelatihan AgroWallet</th>
                    <th scope='col'>Lokasi</th>
                    <th scope='col'>Tanggal Mulai AgroWallet</th>
                    <th scope='col'>Tanggal Selesai AgroWallet</th>
                    <th scope='col'>NIK Karyawan</th>
                    <th scope='col'>Nama Karyawan</th>
                    <th scope='col'>Nominal</th>
                    <th scope='col'>JPL</th>
                    </tr>";

                    $numrow = 1;
                    $kosong = 0;
                    foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
                          // Ambil data pada excel sesuai Kolom
                        $no = $row['A']; 
                        $entitas = $row['B']; 
                        $nama_pelatihan_AgroNow = $row['C']; 
                        $nama_pelatihan_AgroWallet = $row['D'];
                        $lokasi = $row['E']; 
                        $tgl_mulai = $row['F']; 
                        $tgl_selesai = $row['G']; 
                        $nik_karyawan = $row['H']; 
                        $nama_karyawan = $row['I']; 
                        $nominal = $row['J']; 
                        $jpl = $row['K']; 
                        // Cek jika semua data tidak diisi
                        if ($no == "" && $entitas == "" && $nama_pelatihan_AgroNow == "" && $nama_pelatihan_AgroWallet="" && $lokasi == "" && $tgl_mulai == "" && $tgl_selesai =="" && $nik_karyawan =="" && $nama_karyawan =="" && $nominal =="" && $jpl =="" )
                            continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                        // Cek $numrow apakah lebih dari 1
                        // Artinya karena baris pertama adalah nama-nama kolom
                        // Jadi dilewat saja, tidak usah diimport
                        if ($numrow > 1) {
                            // Validasi apakah semua data telah diisi
                            $no_td = (!empty($no)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                            $entitas_td = (!empty($entitas)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                            $nama_pelatihan_AgroNow_td = (!empty($nama_pelatihan_AgroNow)) ? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                            $nama_pelatihan_AgroWallet_td = (!empty($nama_pelatihan_AgroWallet)) ? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                            $lokasi_td = (!empty($lokasi)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                            $tgl_mulai_td = (!empty($tgl_mulai)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                            $tgl_selesai_td = (!empty($tgl_selesai)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                            $nik_karyawan_td = (!empty($nik_karyawan)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                            $nama_karyawan_td = (!empty($nama_karyawan)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                            $nominal_td = (!empty($nominal)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                            $jpl_td = (!empty($jpl)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                            // Jika salah satu data ada yang kosong
                            if ($no == "" && $entitas == "" && $nama_pelatihan_AgroNow == "" && $nama_pelatihan_AgroWallet="" && $lokasi == "" && $tgl_mulai == "" && $tgl_selesai =="" && $nik_karyawan =="" && $nama_karyawan =="" && $nominal =="" && $jpl =="") {
                                $kosong++; // Tambah 1 variabel $kosong
                            }
                            echo "<tr>";
                            echo "<td" . $no_td . ">" . $no . "</td>";
                            echo "<td" . $entitas_td . ">" . $entitas . "</td>";
                            echo "<td" . $nama_pelatihan_AgroNow_td . ">" . $nama_pelatihan_AgroNow . "</td>";
                            echo "<td" . $nama_pelatihan_AgroWallet_td . ">" . $nama_pelatihan_AgroWallet . "</td>";
                            echo "<td" . $lokasi_td . ">" . $lokasi . "</td>";
                            echo "<td" . $tgl_mulai_td . ">" . $tgl_mulai . "</td>";
                            echo "<td" . $tgl_selesai_td . ">" . $tgl_selesai . "</td>";
                            echo "<td" . $nik_karyawan_td . ">" . $nik_karyawan . "</td>";
                            echo "<td" . $nama_karyawan_td . ">" . $nama_karyawan . "</td>";
                            echo "<td" . $nominal_td . ">" . $nominal . "</td>";
                            echo "<td" . $jpl_td . ">" . $jpl . "</td>";
                            echo "</tr>";
                        }

                        $numrow++; // Tambah 1 setiap kali looping
                    }

            echo "</table></div>";

            // Cek apakah variabel kosong lebih dari 0
            // Jika lebih dari 0, berarti ada data yang masih kosong
            if ($kosong > 0) {
    ?>
          <script>
            document.getElementById("kosong").style.display = "block";
            document.getElementById("jumlah_kosong").innerText = "<?php echo $kosong; ?>";
        </script>
    <?php
            } else { // Jika semua data sudah diisi
                echo "<hr style='margin-top: 0;'>";

                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button type='submit' name='import' class='btn btn-success'>IMPORT</button>";
            }

            echo "</form>";
        } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
            // Munculkan pesan validasi
            echo "<div class='alert alert-danger'>
                Hanya File Excel 2007 (.xlsx) yang diperbolehkan
            </div>";
        }
    }
    ?>
</div>
<!-- Form Input Data End -->

</main><!-- End #main -->
