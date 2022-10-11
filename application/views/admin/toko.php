  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelola Toko
        <small>Toko</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kelola Toko</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <a href="" class="btn btn-warning" style="margin-bottom: 10px;" data-toggle="modal" data-target="#editData"><div class="fa fa-edit"></div> Edit Toko</a>
      <?php echo $this->session->flashdata('pesan'); ?>
      <div class="box box-warning">
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <?php foreach ($toko as $tk): ?>
                <tr>
                  <td>Pemilik</td>
                  <td width="1px">:</td>
                  <td><?php echo $tk->pemilik; ?></td>
                </tr>
                <tr>
                  <td>Nama Toko</td>
                  <td>:</td>
                  <td><?php echo $tk->nama; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><?php echo $tk->alamat; ?></td>
                </tr>
                <tr>
                  <td>No. HP</td>
                  <td>:</td>
                  <td><?php echo $tk->telp; ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><?php echo $tk->email; ?></td>
                </tr>
                <tr>
                  <td>Instagram</td>
                  <td>:</td>
                  <td><?php echo $tk->instagram; ?></td>
                </tr>
              <?php endforeach ?>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<!-- Modal Edit Toko -->
<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-edit"></div> Edit Toko</h4>
      </div>
      <form action="<?php echo base_url('admin/toko/edit') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Pemilik</label>
            <input type="hidden" name="id" value="<?php echo $tk->id ?>">
            <input type="text" name="pemilik" class="form-control" placeholder="Nama Pemilik" value="<?php echo $tk->pemilik ?>" required>
          </div>
          <div class="form-group">
            <label>Nama Toko</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Toko" value="<?php echo $tk->nama ?>" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $tk->alamat ?>" required>
          </div>
          <div class="form-group">
            <label>No. HP</label>
            <input type="number" name="telp" class="form-control" placeholder="No. HP" value="<?php echo $tk->telp ?>" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $tk->email ?>" required>
          </div>
          <div class="form-group">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $tk->instagram ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
          <button type="submit" class="btn btn-warning"><div class="fa fa-save"></div> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>