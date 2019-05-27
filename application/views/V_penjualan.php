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
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Harga</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Tenor</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Uang Muka</label>
          <textarea class="form-control" name="address" required></textarea>
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
<?php foreach ($penjualan as $key) {
  ?>
<div id="editEmployeeModal<?= $key->id_penjualan  ?>" class="modal fade">
<div class="modal-dialog">
  <div class="modal-content">
    <form action="<?php echo site_url('C_Motor/update/'.$key->id_penjualan); ?>" method="post">
      <div class="modal-header">
        <h4 class="modal-title">Edit Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tipe</label>
          <input value="<?= $key->tipe_motor ?>" type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Harga</label>
          <input value="<?= $key->harga_motor ?>" type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Tenor</label>
          <textarea value="" class="form-control" name="address" required><?= $key->tenor ?></textarea>
        </div>
        <div class="form-group">
          <label>Uang Muka</label>
          <input value="<?= $key->uang_muka ?>" type="text" name="phone" class="form-control" required>
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
