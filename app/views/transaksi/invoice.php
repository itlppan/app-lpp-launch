<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: white;
        }
        footer{
            background-color: black;
            text-decoration: dashed;
            font-style: italic #26a69a;
            font-size: 25px;
            color: #ddf2f0;
            text-align: center;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            border-color: aqua;
            
        }
        .invoice-table, .invoice-table th, .invoice-table td {
            border: 1px solid #ddf2f0;
            border-radius:25px
        }
        .invoice-table th, .invoice-table td {
            padding: 8px;
            text-align: left;
        }
        .header {
            text-align: right;
        }
        .left-align {
            text-align: left;
        }
        .right-align {
            text-align: right;
        }
        .center-align {
            text-align: center;
        }
        .no-border {
            border: none;
        }
    </style>
</head>
<body>
<table class='no-border' style='width: 100%;'>
        <tr>
            <td class='left-align'><img src='img/unnamed.png' style='width: 100px; height:100px;'></td>
            <td class='header'>
                <h1 style='margin: 0; font-size: 40px;'>INVOICE</h1>
                Tanggal: <?= $data['tanggal']?><br>No: <?= $data['no_invoice']?>
            </td>
        </tr>
    </table>
    <hr>
    <table class='no-border' style='width: 100%; margin-bottom:25px; margin-top:25px;'>
        <tr>
            <td><strong><?=$data['nama_perusahaan_lpp']?></strong></td>
            <td class='right-align'><strong><?=$data['nama_client']?></strong></td>
        </tr>
        <tr >
            <td><?= $data['alamat_lpp']?></td>
            <td class='right-align'><?= $data['alamat']?></td>
        </tr>
        <tr>
            <td><?= $data['no_telp_lpp']?></td>
            <td class='right-align'><?= $data['no_pic'] ?></td>
        </tr>
        <tr>
            <td><?= $data['npwplpp'] ?></td>
            <td class='right-align'><?= $data['nama_pic']?></td>
        </tr>
        <tr>
            <td><?= $data['email_lpp'] ?></td>
            <td class='right-align'></td>
        </tr>
    </table>
    <br>
    <table class='invoice-table'>
        <thead>
            <tr style='background-color: #cccccc; '>
                <th>No</th>
                <th>Items</th>
                <th>Qty</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><?= $data['nama_item'] ?></td>
                <td><?= $data['qty']?></td>
                <td><?= $data['jenis'] ?></td>
                <td><?= formatCurrency($data['harga']) ?></td>
                <td><?= formatCurrency($data['subTotal'])?></td>
            </tr>
          <?php if($data['pajak'] >0) :?>
            <tr>
                <td colspan='4' style="border-bottom: 2px solid #FFFFFF;"></td>
                <td class='right-align' style='background-color: #cccccc; font-weight: bold; text-align:right;'>Pajak</td>
                <td style='background-color: #cccccc; font-weight: bold;'><?= formatCurrency($data['pajak']) ?></td>
            </tr>
        <?php endif ?>
            <tr>
                <td colspan='4'><strong>Terbilang:</strong><br><?= $data['amountInWords']?></td>
                <td style='background-color: #cccccc ; font-weight: bold; text-align:right;'>Total</td>
                <td style='background-color: #cccccc; font-weight: bold;'><?= formatCurrency($data['total']) ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class='no-border' style='width: 100%; margin-top:50px;'>
        <tr>
            <td style='font-weight: bold;'>Informasi Pembayaran:</td>
            <td class='center-align'><?= $data['city']?>, <?= $data['formattedDate']?></td>
        </tr>
        <tr>
            <td>Pembayaran Dilakukan Pada Rekening</td>
        </tr>
        <tr>
            <td>Bank: <?=$data['paymentBank']?></td>
        </tr>
        <tr>
            <td>Nama: <?=$data['paymentAccountName']?></td>
        </tr>
        <tr>
            <td>No.Rek: <?=$data['paymentAccountNumber']?></td>
        </tr>
        <tr class='right-align'>
            <td></td>
            <td class='center-align'><?= $data['bomName'] ?><br><?= $data['namajabatan'] ?></td>
        </tr>
    </table>
    <!-- <footer id="footer" class="footer">
  <div class="copyright">
    <span><img src="<?= BASEURL ?>/img/Instagram_icon.png.webp" style="width: 25px; display:flex; align-item:center;" alt=""> @Lpplearning</span> <span>lpp.co.id</span>
  </div> -->
</footer><!-- End Footer -->

</body>
</html>