<?php
include "header.php";
?>

<h2>Histori Pembelian</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th>
        <th>Tanggal Beli</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
    </thead>
    <tbody>
        <?php
        include "koneksi.php";
        $qry_histori = mysqli_query($conn, "select * from beli_produk order by id_beli_produk desc");
        $no = 0;
        while ($dt_histori = mysqli_fetch_array($qry_histori)) {
            $no++;
            //menampilkan produk yang dibeli
            $produk_dibeli = "";
            $jumlah = "";
            $harga = "";
            $total = "";
            $qry_produk = mysqli_query($conn, "select * from detail_beli_produk join produk on produk.id_produk = detail_beli_produk.id_produk where id_beli_produk = '" . $dt_histori['id_beli_produk'] . "'");
            while ($dt_produk = mysqli_fetch_array($qry_produk)) {
                $produk_dibeli .= "" . $dt_produk['nama_produk'] . "";
                $jumlah .= "" . $dt_produk['qty'] . "";
                $harga .= "" . $dt_produk['harga'] . "";
                $total .= "" . $dt_produk['subtotal'] . "";
            }
            $produk_dibeli .= "";
            $jumlah .= "";
            $harga .= "";
            $total .= "";
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $dt_histori['tanggal_beli'] ?></td>
                <td><?= $produk_dibeli ?></td>
                <td><?= $jumlah ?></td>
                <td><?= $harga ?></td>
                <td><?= $total ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
include "footer.php";
?>