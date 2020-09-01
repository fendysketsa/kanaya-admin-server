<html>

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid slategray;
            margin: 5px;
        }

        .signature {
            display: inline;
            width: 30%
        }
    </style>
</head>

<body>
    <h1 style=""><center>DATA STOK PRODUK</center></h1>
    <h2><center><?= $title; ?></center></h2>
    <center><hr></center>
<!--     <p>Name: {{Form.Name}}</p>
    <p>Department: {{Form.Department}}</p>
    <p>Business Purpose: {{Form.Purpose}}</p>
    <p>From: {{Form.From:d}} To: {{Form.To:d}} </p> -->
    <h3>List Data</h3>
    <table style="margin: 3px;">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode SKU</th>
            <th>Kategori </th>
            <th>Stok Awal </th>
            <th>Stok Saat Ini </th>
        </tr>
        <?php 
        $i = 1;
    if($kategori == 'all') {
        foreach ($data as $produk) {
         ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $produk['nama_barang']; ?></td>
            <td><?= $produk['sku']; ?></td>
            <th><?= $produk['kategori']; ?> </th>
            <th><?= $produk['stok_awal']; ?> </th>
            <td><?= $produk['stok_akhir']; ?></td>
        </tr>
        <?php 
            $i++;
        }
     } elseif($kategori == 'ready') { 
            foreach ($data as $produk) {
                if($produk['stok_akhir'] > 0) {
         ?>
         <tr>
            <td><?= $i; ?></td>
            <td><?= $produk['nama_barang']; ?></td>
            <td><?= $produk['sku']; ?></td>
            <th><?= $produk['kategori']; ?> </th>
            <th><?= $produk['stok_awal']; ?> </th>
            <td><?= $produk['stok_akhir']; ?></td>
        </tr>
        <?php 
            $i++;
        }
            
            }
     }else{ 
            foreach ($data as $produk) {
         ?>
         <tr>
            <td><?= $i; ?></td>
            <td><?= $produk['nama_barang']; ?></td>
            <td><?= $produk['sku']; ?></td>
            <th><?= $produk['kategori']; ?> </th>
            <th><?= $produk['stok_awal']; ?> </th>
            <td><?= $produk['stok_akhir']; ?></td>
        </tr>
    <?php
        $i++;
     } }?>

    </table>
   <!--  <h3 style="">Total: {{Form.Total}}</h3>
    <div class="signature">
        <h4>Signature:</h4> <img src="{{Form.Signature}}">
    </div> -->
    <script type="text/javascript">
    	window.onload = function() { window.print(); }
    </script>
</body>
</html>