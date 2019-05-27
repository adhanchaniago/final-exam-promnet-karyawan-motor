<div class="table-wrapper">
  <div class="table-title">
    <div class="row">
      <div class="col-sm-6">
        <h2>Data <b>Penjualan</b></h2>
      </div>
      <div class="col-sm-6">
        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"> <span>Tambah Penjualan</span></a>
      </div>
    </div>
  </div>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>
          No.
        </th>
        <th>
          Tipe
        </th>
        <th>Harga</th>
        <th>Tenor</th>
        <th>DP</th>
        <th>Pokok</th>
        <th>Bunga</th>
        <th>Total</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        $i=1;
        foreach ($penjualan as $key) {
          ?>
          <td>
            <?php echo $i; ?>
          </td>
          <td>
            <?php echo $key->tipe_motor ?>
          </td>
          <td><?php echo $key->harga_motor; ?></td>
          <td><?php echo $key->tenor; ?></td>
          <td><?php echo $key->uang_muka; ?></td>
          <td><?php echo $key->cicilan_pokok; ?></td>
          <td><?php echo $key->cicilan_bunga; ?></td>
          <td><?php echo $key->cicilan_total; ?></td>
          <td>
            <a href="#deleteEmployeeModal<?php echo $key->id_penjualan;?>" class="delete" data-toggle="modal">Delete</a>|<a href="#editEmployeeModal<?php echo $key->id_penjualan;?>" class="update" data-toggle="modal">Update</a>
          </td>
        </tr>
        <?php
        $i++;

      }
      ?>
    </tbody>
  </table>

</div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
<div class="modal-dialog">
  <div class="modal-content">
    <form action="<?php echo site_url('C_Motor/add'); ?>" method="post">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Penjualan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tipe</label>
          <select name="id_motor" class="form-control">
            <?php foreach($motor as $key ) {

            ?>
            <option value="<?= $key->id_motor  ?>"><?= $key->tipe_motor ?></option>

          <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Tenor</label>
          <select name="id_cicil" class="form-control">
            <?php foreach($cicilan as $key ) {

            ?>
            <option value="<?= $key->id_cicil  ?>"><?= $key->tenor ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Uang Muka</label>
          <select name="id_uang_muka" class="form-control">
            <?php foreach($dp as $key ) {

            ?>
            <option value="<?= $key->id_uang_muka  ?>"><?= $key->uang_muka ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Cicilan Pokok</label>
          <input value="" type="text" name="cicilan_pokok" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Cicilan Bunga</label>
          <input value="" type="text" name="cicilan_bunga" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Cicilan Total</label>
          <input value="" type="text" name="cicilan_total" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input id="tombol" type="submit" class="btn btn-success" value="Add">
      </div>
    </form>
  </div>
</div>
</div>


<!-- Edit Modal HTML -->
<?php foreach ($penjualan as $kunci) {
  ?>
<div id="editEmployeeModal<?= $kunci->id_penjualan  ?>" class="modal fade">
<div class="modal-dialog">
  <div class="modal-content">
    <form action="<?php echo site_url('C_Motor/update/'.$kunci->id_penjualan); ?>" method="post">
      <div class="modal-header">
        <h4 class="modal-title">Edit Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tipe</label>
          <select name="id_motor" class="form-control">
            <?php foreach($motor as $key ) {

            ?>
            <option value="<?= $key->id_motor  ?>"><?= $key->tipe_motor ?></option>

          <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Tenor</label>
          <select name="id_cicil" class="form-control">
            <?php foreach($cicilan as $key ) {

            ?>
            <option value="<?= $key->id_cicil  ?>"><?= $key->tenor ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Uang Muka</label>
          <select name="id_uang_muka" class="form-control">
            <?php foreach($dp as $key ) {

            ?>
            <option value="<?= $key->id_uang_muka  ?>"><?= $key->uang_muka ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Cicilan Pokok</label>
          <input value="<?= $kunci->cicilan_pokok  ?>" type="text" name="cicilan_pokok" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Cicilan Bunga</label>
          <input value="<?= $kunci->cicilan_bunga  ?>" type="text" name="cicilan_bunga" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Cicilan Total</label>
          <input value="<?= $kunci->cicilan_total  ?>" type="text" name="cicilan_total" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input id="tombol" type="submit" class="btn btn-success" value="Edit">
      </div>
    </form>
  </div>
</div>
</div>

<?php } ?>




<!-- Delete Modal HTML -->
<?php
foreach($penjualan as $key){

?>
<div id="deleteEmployeeModal<?php echo $key->id_penjualan;?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo site_url('C_Motor/delete/'.$key->id_penjualan); ?>" method="POST">
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>

<script type="text/javascript">
$(document).ready(function(){
// Activate tooltip
$('[data-toggle="tooltip"]').tooltip();

// Select/Deselect checkboxes
var checkbox = $('table tbody input[type="checkbox"]');
$("#selectAll").click(function(){
  if(this.checked){
    checkbox.each(function(){
      this.checked = true;
    });
  } else{
    checkbox.each(function(){
      this.checked = false;
    });
  }
});
checkbox.click(function(){
  if(!this.checked){
    $("#selectAll").prop("checked", false);
  }
});
});
</script>
