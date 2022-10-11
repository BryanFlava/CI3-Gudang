  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
        <small>Profil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <a href="" class="btn btn-warning" style="margin-bottom: 10px;" data-toggle="modal" data-target="#editData"><div class="fa fa-edit"></div> Edit Profil</a>
      <a href="" class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#gantiPassword"><div class="fa fa-lock"></div> Ganti Password</a>
      <a href="" class="btn btn-success" style="margin-bottom: 10px;" data-toggle="modal" data-target="#gantiFoto"><div class="fa fa-image"></div> Ganti Foto</a>
      <?php echo $this->session->flashdata('pesan'); ?>
      <div class="row">
        <div class="col-md-3">
          <div class="box box-warning">
            <div class="box-body">
              <?php
                if ($this->session->userdata('foto') == '') {
              ?>
              <img src="<?php echo base_url('assets/image/avatar.png') ?>" class="img-responsive">
              <?php
                } else {
              ?>
              <img src="<?php echo base_url('assets/image/profil/').$this->session->userdata('foto') ?>" class="img-responsive">
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="box box-warning">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tr>
                    <td>ID Profil</td>
                    <td width="1px">:</td>
                    <td><?php echo $this->session->userdata('id'); ?></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td width="1px">:</td>
                    <td><?php echo $this->session->userdata('username'); ?></td>
                  </tr>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td width="1px">:</td>
                    <td><?php echo $this->session->userdata('nama'); ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<!-- Modal Edit Profil -->
<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-edit"></div> Edit Profil</h4>
      </div>
      <form action="<?php echo base_url('admin/profil/edit') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Username</label>
            <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>">
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $this->session->userdata('username') ?>" required>
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $this->session->userdata('nama') ?>" required>
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

<!-- Modal Ganti Password -->
<div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-lock"></div> Ganti Password</h4>
      </div>
      <form action="<?php echo base_url('admin/profil/password') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>New Password</label>
            <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>">
            <input type="password" class="form-control" name="password1" placeholder="New Password" required>
          </div>
          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" class="form-control" name="password2" placeholder="Ulangi Password" required>
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

<!-- Modal Ganti Foto -->
<div class="modal fade" id="gantiFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-image"></div> Ganti Foto</h4>
      </div>
      <form action="<?php echo base_url('admin/profil/foto') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>New Foto</label>
            <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>">
            <input type="file" class="form-control-file" name="foto" placeholder="New Foto" required>
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