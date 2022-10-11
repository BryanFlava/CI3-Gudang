  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <div class="fa fa-calendar fa-sm"></div> Data Barang
        <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Button trigger modal -->
      <button type="button" style="margin-bottom: 10px" class="btn btn-warning" data-toggle="modal" data-target="#tambahData">
        <div class="fa fa-plus"></div> Tambah Barang
      </button>

      <?php echo $this->session->flashdata('pesan'); ?>

      <div class="box box-warning" style="margin-top: 10px">
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="example1">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th width="150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($barang as $brng):
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $brng->kode; ?></td>
                    <td><?php echo $brng->nama; ?></td>
                    <td><?php echo rupiah($brng->harga); ?></td>
                    <td><?php echo $brng->stok; ?></td>
                    <td>
                      <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editData<?php echo $brng->id ?>"><div class="fa fa-edit fa-sm"></div> Edit</a>
                      <a href="<?php echo('barang/hapus/').$brng->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data barang ini?')"><div class="fa fa-trash fa-sm"></div> Hapus</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus"></div> Tambah Barang</h4>
      </div>
      <form action="<?php echo base_url('admin/barang/tambah_barang') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode" class="form-control" placeholder="Kode Barang" required>
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" placeholder="Contoh : 10000" required>
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" placeholder="Stok" required>
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

<!-- Modal Edit Data -->
<?php foreach ($barang as $brng) : ?>

  <div class="modal fade" id="editData<?php echo $brng->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-edit"></div> Edit Barang</h4>
        </div>
        <form action="<?php echo base_url('admin/barang/edit_aksi') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Kode Barang</label>
              <input type="hidden" name="id" value="<?php echo $brng->id ?>">
              <input type="text" name="kode" class="form-control" placeholder="Kode Barang" value="<?php echo $brng->kode ?>" required>
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Barang" value="<?php echo $brng->nama ?>" required>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" name="harga" class="form-control" placeholder="Contoh : 10000" value="<?php echo $brng->harga ?>" required>
            </div>
            <div class="form-group">
              <label>Stok</label>
              <input type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo $brng->stok ?>" required>
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

<?php endforeach ?>