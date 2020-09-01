<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .line {
            border-bottom: 3px solid #000;
            width: 100%;
        }

        .line-light {
            width: 100%;
            border-bottom: 1px solid #949597;
        }

        .line-end {
            width: 100%;
            border-bottom: 3px solid #f0c29e;
        }

        .data {
            background-color: #dcdddf;
            padding-left: 45px;
        }

        .data .data-box {
            margin-top: 60px;
        }

        .data .data-box .data-separator {
            border-top: 1px solid #949597;
            width: 10%;
        }

        .content {
            background-color: #f1f1f1;
            padding-right: 45px;
        }

        .without-margin {
            margin: 0 !important;
        }

        /* To break in pages, please use this class */
        /* https://github.com/barryvdh/laravel-snappy/issues/2 */
        .page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    <div id="app" class="container invoice" style="background-color: #dcdddf;">
        <div class="row" style="background-color: #dcdddf;">
            <!-- data -->
            <div class="col-4 data py-4">
                <div class="line mt-4 mb-4"></div>
                <h2>NOTA PEMESANAN</h2>

                <div class="data-box">
                    <div class="data-separator d-block my-2"></div>
                    <h4 class="text-muted font-weight-light">No TRANSAKSI.</h4>
                    <h4 class="font-weight-bold"><?= $transaksi['no_transaksi']; ?></h4>
                </div>
                <div class="data-box">
                    <div class="data-separator d-block my-2"></div>
                    <h4 class="text-muted font-weight-light">TANGGAL</h4>
                    <h4 class="font-weight-bold"><?php
					$date=date_create($transaksi['tanggal']);
					echo date_format($date,"Y/m/d");
					?></h4>
                </div>
                <div class="data-box">
                    <div class="data-separator d-block my-2"></div>
                    <h4 class="text-muted font-weight-light">CARA BAYAR</h4>
                    <h4 class="font-weight-bold"><?= strtoupper($transaksi['cara_bayar']); ?></h4>
                </div>
               <!--  <div class="data-box">
                    <h5 class="font-weight-bold">TERMS</h5>
                    <p>Mollit elit reprehenderit consectetur cupidatat anim qui deserunt duis. Veniam laboris id veniam in eu.</p>
                </div> -->
                <div class="data-box">
                   <!--  <h5 class="font-weight-bold">PAYMENT METHODS</h5>
                    <h6 class="font-weight-light">PAYPAL</h6>
                    <p>paypal@example.com</p>
                    <h6 class="font-weight-light">ACCOUNTING NUMBER</h6>
                    <p>1234567890988</p>
                    <h6 class="font-weight-light">QR CODE</h6> -->
                    <img src="https://i.ibb.co/6n7vJZ9/KANAYA-LOGO-NEW-2.png" alt="" class="img-fluid">
                </div>
            <!--     <div class="data-box align-text-bottom">
                    <h1 class="font-weight-bold text-center">KANAYA</h1>
                </div> -->
            </div>
            <!-- end data -->

            <!-- content -->
            <div class="col-8 content py-4">
                <div class="line mt-4 mb-4"></div>
                <!-- header -->
                <div class="header">
                    <div class="row">
                        <div class="col-12 from">
                            <span class="d-block font-weight-light"><b>Member:</b></span>
                            <h4><?= $transaksi['member']; ?></h4>
                            <span class="d-block font-weight-light"><b>Telephone </b> : <?= $transaksi['telepon']; ?> </span>
                            <span class="d-block font-weight-light"><b>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>:</b> </span>
                            <span class="d-block font-weight-light"><?= $transaksi['alamat_tinggal'].' Kec.'.$transaksi['kecamatan'], ' KAB'.$transaksi['kota'].' '. $transaksi['provinsi'] .', ID, '. $transaksi['kode_pos']; ?></span>
                        </div>
                        <div class="col-12">
                            <span class="d-block font-weight-light"><b>Marketing:</b></span>
                            <h4><?= $transaksi['pegawai']; ?></h4>
                            <span class="d-block font-weight-light"><b>Telephone<b> : <?= $transaksi['pegawai_telepon']; ?></span>
                            <span class="d-block font-weight-light"><b>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>:</b> </span>
                             <span class="d-block font-weight-light"><?= $transaksi['alamat_pegawai']; ?></span>
                        </div>
                    </div>
                   
                </div>
                <!-- end header -->

                <!-- note -->
               <!--  <div class="row my-4">
                    <div class="col-12">
                        <p class="text-justify">Quis sunt mollit nostrud aliqua consectetur voluptate eiusmod proident aute laboris non reprehenderit magna qui. Esse occaecat laboris laborum dolore excepteur enim laboris.</p>
                    </div>
                </div> -->
                <!-- end note -->

                <!-- items-header -->
                <div class="items-header">
                    <div class="row mt-4 items-header font-weight-bold">
                        <div class="col-12 my-2">
                            <div class="line"></div>
                        </div>
                        <div class="col-1"> No</div>
                        <div class="col-5"> Nama Produk</div>
                        <div class="col-2 text-center">Harga (Rp)</div>
                        <div class="col-2 text-center">Kuantitas</div>
                        <div class="col-2 text-right">Total</div>
                        <div class="col-12 my-2">
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
                <!-- end items-header -->

                <!-- items -->
                <div class="items">
                	<?php $i = 1; 
                	 foreach ($detail as $data) { ?>
                    <div class="row mt-2 list-content">
                    	<div class="col-1"><?= $i; ?></div>
                        <div class="col-5">
                            <p class="without-margin"><?= $data['nama']; ?></p>
                          <!--   <p class="without-margin text-muted">
                                <small>Date: 2018-02-14</small>
                            </p> -->
                        </div>
                        <div class="col-2 text-center"><?= number_format($data['harga_produk'],2,",","."); ?></div>
                        <div class="col-2 text-center"><?= $data['jumlah']; ?></div>
                        <div class="col-2 text-right"><?= number_format(($data['jumlah'] * $data['harga_produk']),2,",","."); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-12 my-2">
                            <div class="line-light"></div>
                        </div>
                    </div>
                    <?php $i++; } ?>
                
                </div>
                <!-- end items -->

                <!-- values -->
                <div class="values">
                    <div class="row">
                        <div class="col-12 my-2">
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="row mt-2 list-content">
                        <div class="col-10 font-weight-bold">
                            TOTAL
                        </div>
                        <div class="col-2 text-right font-weight-bold"><?= 'Rp.'. number_format($transaksi['total_biaya'],2,",","."); ?></div>
                    </div>
                   <!--  <div class="row mt-2 list-content">
                        <div class="col-10">
                            Discount 10%
                        </div>
                        <div class="col-2 text-right">-($ 2.400)</div>
                    </div> -->
                  <!--   <div class="row mt-2 list-content">
                        <div class="col-10">
                            Taxes 19%
                        </div>
                        <div class="col-2 text-right">$ 4.104</div>
                        <div class="col-12 my-2">
                            <div class="line-end"></div>
                        </div>
                    </div> -->
                    <div class="row mt-2 list-content">
                        <div class="col-8">
                            <h3 class="font-weight-bold">DP / PEMBAYARAN AWAL</h3>
                        </div>
                        <div class="col-4 text-right">
                        	<?php
                        		if($transaksi['cara_bayar'] == 'cicilan') {
                        			$nominal = $angsuran[0]['jumlah_angsuran']; 
                        		} else {
                        			$nominal = $transaksi['total_biaya'];
                        		}
                        	?>
                            <h3 class="font-weight-bold"><?= 'Rp.'. number_format($nominal,2,",","."); ?></h3>
                        </div>
                    </div>
                </div>
                <!-- end values -->

                <!-- signature -->
                <div class="signature my-4">
                    <div class="row">
                        <div class="col-4 offset-8 text-right">
                            <img src="/images/hj.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-12 text-right">
                            <h4 class="font-weight-bold"><?= $admin; ?></h4>
                         <!--    <span class="d-block font-weight-light">ADMIN</span> -->
                        </div>
                    </div>
                </div>
                <!-- end signature -->

                <!-- gratitude -->
                <div class="gratitude text-center my-4">
                    <p class="text-muted">Jika Anda Memiliki Pertanyaan berkaitan dengan pesanan / nota ini , silakan kontak ke email support@kanayamember.id, atau hubungi 0852-2741-3044.</p>
                    <h2>Terima Kasih</h2>
                </div>
                <!-- end gratitude -->

                <!-- pagination -->
               <!--  <div class="invoice-pagination text-right">
                    <p class="text-muted text-right">Page 1 of 1</p>
                </div> -->
                <!-- end pagination -->
            </div>
            <!-- end content -->
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     <script type="text/javascript">   
    $(document).ready(function () {
    window.print();
});

</script>
</body>
</html>