<h1>List Harga Motor</h1>
<br>
<h3>Tabel List Harga</h3>
<table class="table">
  <thead>
    <th>No</th>
    <th>Tipe</th>
    <th>Harga</th>
  </thead>
  <tbody>

    <?php $i=1;
    foreach($motor as $key){ ?>
          <tr>
            <td><?= $i  ?></td>
            <td><?= $key->tipe_motor  ?></td>
            <td><?= $key->harga_motor  ?></td>
          </tr>
    <?php $i++;} ?>
  </tbody>
</table>
<br><br>
<h3>Ketentuan Pembayaran</h3>
<?php
$i=1;
foreach($cicilan as $key){ ?>
  <p>
    <?= $i ?>. Pembayaran dengan Tenor <?= $key->tenor ?> bulan dan  dengan bunga <?= $key->bunga ?> persen.
  </p>
<?php $i++; } ?>
<div class="container">

<p>
  Uang muka yang disediakan antara lain
  <?php
  foreach($dp as $key){ ?>
    Rp.<?= $key->uang_muka ?>
  <?php } ?>
</p>
<p>
<b>Hubungi :</b> <?= $sales->nama_sales ?> (<?= $sales->nim_sales  ?>)
</p>
</div>
<a href="<?= base_url('C_Motor/Penjualan') ?>"><button class="btn btn-primary" type="button" name="button">Cicil!!!</button></a>

<br><br><br>
