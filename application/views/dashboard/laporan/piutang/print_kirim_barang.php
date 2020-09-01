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
    <h1 style=""><center>Jadwal Pengambilan DP</center></h1>
    <h2><center><?= $title; ?></center></h2>
    <center><hr></center>
    <!--     
        <p>Name : {{Form.Name}}</p>
        <p>Department : {{Form.Department}}</p>
        <p>Business Purpose : {{Form.Purpose}}</p>
        <p>From : {{Form.From : d}} To : {{Form.To:d}} 
        </p>
    -->
    <!--
     -->
    <h3>List Data</h3>
  <center>
    <table style="width: 1025px;">
        <tr style="background-color: cyan">
            <th>No</th>
            <th>Marketing</th>
            <th>Pelanggan</th>
            <th>Alamat</th>
            <th>No. Wa</th>
            <th>No. Kiriman</th>
            <th>Total</th>
            <th>DP</th>
            <th>No Kwitansi</th>
        </tr>
        <?php $i = 1;
            $piutang = 0;
            $angsuran =0;
        foreach($data as $sales) { 
            $piutang = $piutang + $sales['total_tagihan'];
            $angsuran = $angsuran + $sales['jumlah_angsuran'];
            ?>
        <tr>
            <td style="width: 3px;"><center><?= $i; ?></center></td>
            <td><center><?= $sales['marketing']; ?></center> </td>
            <td><center><?= $sales['member']; ?></center></td>
            <td><?= $sales['alamat_tinggal']; ?></td>
            <td><?= $sales['telepon']; ?></td>
             <td><?= $sales['no_transaksi']; ?></td>
            <td><?= 'Rp. '. number_format($sales['total_tagihan'],2); ?></td>
              <td><?= 'Rp. '. number_format($sales['jumlah_angsuran'],2); ?></td>
             <td></td>
        </tr>
    <?php 
            $i++;
    } ?>
        <tr>
            <td colspan="5"><center>Jumlah</center></td>
            <td><?= 'Rp. '. number_format($piutang, 2); ?> </td>
            <td border="0"></td>
             <td><?= 'Rp. '. number_format($angsuran, 2); ?> </td>
        </tr>

    </table>
    </center>
   <!-- 
        <h3 style="">Total: {{ Form.Total }} </h3>
        <div class="signature">
                <h4>Signature : </h4><img src="{{ Form.Signature }}">
        </div> 
    -->
    
    <script type="text/javascript">
    	window.onload = function() { window.print(); }
    </script>
</body>
</html>