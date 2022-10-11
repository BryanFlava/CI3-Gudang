  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $jumlahBarang; ?></h3>

              <p>Data Barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="<?php echo base_url('admin/barang') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $barangMasuk; ?></h3>

              <p>Barang Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-cart-plus"></i>
            </div>
            <a href="<?php echo base_url('admin/masuk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $barangKeluar; ?></h3>

              <p>Barang Keluar</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="<?php echo base_url('admin/keluar') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="box box-blue">
            <div class="box-header">
              <h3 class="box-title">Barang masuk bulan ini</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                </tr>
                <?php
                  $no = 1;
                  foreach ($masuk as $msk):
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $msk->kode; ?></td>
                    <td><?php echo tgl_indo($msk->tanggal); ?></td>
                    <td><?php echo $msk->jumlah; ?></td>
                  </tr>
                <?php endforeach ?>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Barang keluar bulan ini</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                </tr>
                <?php
                  $no = 1;
                  foreach ($keluar as $klr):
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $klr->kode; ?></td>
                    <td><?php echo tgl_indo($klr->tanggal); ?></td>
                    <td><?php echo $klr->jumlah; ?></td>
                  </tr>
                <?php endforeach ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>