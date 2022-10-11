  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <div class="fa fa-file fa-sm"></div> Barang Keluar
        <small>Barang Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Barang Keluar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Button Tambah Barang Keluar Modal -->
      <button type="button" style="margin-bottom: 10px" class="btn btn-warning" data-toggle="modal" data-target="#tambahData">
        <div class="fa fa-plus"></div> Tambah Barang Keluar
      </button>

      <!-- Button Tambah Barang Keluar Modal -->
      <button type="button" style="margin-bottom: 10px" class="btn btn-info" data-toggle="modal" data-target="#cetakBarang">
        <div class="fa fa-print"></div> Cetak Barang Keluar
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
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                  <th width="150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($keluar as $klr):
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#detailBarang<?php echo $klr->kode ?>"><?php echo $klr->kode; ?></a>
                    </td>
                    <td><?php echo tgl_indo($klr->tanggal); ?></td>
                    <td><?php echo $klr->jumlah; ?></td>
                    <td>
                      <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editKeluar<?php echo $klr->id ?>"><div class="fa fa-edit fa-sm"></div> Edit</a>
                      <a href="<?php echo base_url('admin/keluar/hapus/').$klr->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><div class="fa fa-trash fa-sm"></div> Hapus</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Tanggal</th>
                  <th>jumlah</th>
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
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-file"></div> Tambah Barang Keluar</h4>
      </div>
      <form action="<?php echo base_url('admin/keluar/tambah_barang') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Barang</label>
            <select class="form-control" name="kode" required>
              <option value=""> -- Pilih Kode Barang -- </option>
              <?php foreach ($barang as $brng): ?>
                <option value="<?php echo $brng->kode ?>"><?php echo $brng->kode." - ".$brng->nama; ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
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

<!-- Modal Detail Data Barang -->
<?php foreach ($barang as $brng): ?>
<div class="modal fade" id="detailBarang<?php echo $brng->kode ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-calendar"></div> Detail Barang</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Kode Barang</label>
          <input type="text" class="form-control" value="<?php echo $brng->kode ?>" disabled>
        </div>
        <div class="form-group">
          <label>Nama Barang</label>
          <input type="text" class="form-control" value="<?php echo $brng->nama ?>" disabled>
        </div>
        <div class="form-group">
          <label>Harga</label>
          <input type="text" class="form-control" value="<?php echo rupiah($brng->harga) ?>" disabled>
        </div>
        <div class="form-group">
          <label>Stok</label>
          <input type="text" class="form-control" value="<?php echo $brng->stok ?>" disabled>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><div class="fa fa-close"></div> Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<!-- Modal Edit Data Masuk -->
<?php foreach ($keluar as $klr): ?>
<div class="modal fade" id="editKeluar<?php echo $klr->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-calendar"></div> Edit Barang Masuk</h4>
      </div>
      <form action="<?php echo base_url('admin/keluar/edit') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="hidden" name="id" value="<?php echo $klr->id ?>">
            <input type="hidden" value="<?php echo $klr->kode ?>" name="kode">
            <input type="date" name="tanggal" class="form-control" value="<?php echo $klr->tanggal ?>" placeholder="Tanggal"  required>
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="text" name="jumlah" class="form-control" value="<?php echo $klr->jumlah ?>"  placeholder="Jumlah"  required>
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

<!-- Modal Cetak -->
<div class="modal fade" id="cetakBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-print"></div> Cetak Barang Keluar</h4>
      </div>
      <form action="<?php echo base_url('admin/keluar/cetak') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Bulan</label>
            <input type="hidden" name="jenis" value="Keluar">
            <select class="form-control" name="bulan" required>
              <option value=""> -- Pilih Bulan -- </option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
          <button type="submit" class="btn btn-warning"><div class="fa fa-print"></div> Print</button>
        </div>
      </form>
    </div>
  </div>
</div>