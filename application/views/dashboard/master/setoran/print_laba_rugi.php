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
    <h1 style=""><center>Laporan Laba Rugi Kanaya Member</center></h1>
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
 <!--  //  <h3>List Data</h3> -->
   <!--  <?= 'Rp. '. number_format($sales['piutang'],2); ?> -->

    <?php 
        $pendapatan = $data['cicilan']['adm']+$data['lunas']['adm'] + $data['lunas']['penjualan_cash'] + $data['cicilan']['penjualan_cicil'];
        $laba = $pendapatan - $data['cicilan']['hutang'];
        $hpp = $data['cicilan']['hpp']+$data['lunas']['hpp'];
    ?>
  <center>
    <table style="width: 720px;">
        <tr style="">
            <th colspan="4">Pendapatan</th>
        </tr>
        <tr>
            <td colspan="3">Penjualan Cash</td>
            <td><?= 'Rp. '. number_format($data['lunas']['penjualan_cash'],2); ?></td>
        </tr>
         <tr>
            <td colspan="3">Penjualan Kredit</td>
            <td><?= 'Rp. '. number_format($data['cicilan']['penjualan_cicil'],2); ?></td>
        </tr>
         <tr>
            <td colspan="3">Administrasi Member Baru</td>
            <td><?= 'Rp. '. number_format($data['cicilan']['adm']+$data['lunas']['adm'],2); ?></td>
        </tr>
         <tr>
            <td colspan="3">Total Pendapatan</td>
            <td><?= 'Rp. '. number_format($pendapatan,2); ?></td>
        </tr>
        <tr style="">
            <th colspan="4">Harga Pokok Penjualan</th>
        </tr>
        <tr>
            <td colspan="3">HPP</td>
            <td><?= 'Rp. '. number_format($hpp,2); ?></td>
        </tr>
        <tr style="">
            <th colspan="4">Piutang</th>
        </tr>
        <tr>
            <td colspan="3">    Total Piutang</td>
            <td><?= 'Rp. '. number_format($data['cicilan']['hutang'],2); ?></td>

        </tr>
         <tr style="">
            <th colspan="4">Total Laba/Rugi</th>
        </tr>
         <tr>
            <td colspan="3">Laba/Rugi</td>
            <td><?= 'Rp. '. number_format($laba - $hpp ,2); ?></td>
        </tr>
         
    </table>
    </center>
   
  <!--       <h3 style="">Total: {{ Form.Total }} </h3>
        <div class="signature">
                <h4>Signature : </h4><img src="{{ Form.Signature }}">
        </div> 
    -->
    
    <script type="text/javascript">
    	window.onload = function() { window.print(); }
    </script>
</body>
</html>