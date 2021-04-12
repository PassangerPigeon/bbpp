<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-header">
      <h1>Detail Sapi</h1>
      <br>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">

            <div class="row">
              <div class="card-header col-9">
                <a href="<?php echo base_url() ?>c_sapi" class="btn btn-primary"><i class="fa fa-caret_left"></i> Kembali</a>
              </div>
              <?php foreach ($tampil as $key) : ?>
                <div class="card-header col-3">
                  <a href="<?php echo base_url() ?>c_sapi/formEditSapi/<?php echo $key['idSapi'] ?>" class="btn btn-success float-right"><i class="fa fa-edit"></i> Edit</a>
                  <a href="<?php echo base_url() ?>c_sapi" class="btn btn-warning float-right"><i class="fa fa-edit"></i> Jual</a>
                  <a href="<?php echo base_url() ?>C_sapi/hapusSapi/<?php echo $key['idSapi'] ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <div class="">
            </div>

            <div class="card-body">

              <div class="row">
                <div class="col-6 col-md-6 col-lg-6">

                  <img src="<?php echo base_url() ?>upload/<?php echo $key['fotoSapi'] ?>" height="350" width="350" class="card-img-top">
                </div>

                <div class="col-6 col-md-6 col-lg-6">
                  <table class="table">

                    <tr>
                      <td>Nama Sapi</td>
                      <td>:</td>
                      <td><?php echo $key['namaSapi'] ?></td>
                    </tr>

                    <tr>
                      <td>Tanggal Lahir</td>
                      <td>:</td>
                      <td><?php echo $key['tglLahir'] ?></td>
                    </tr>

                    <tr>
                      <td>Usia</td>
                      <td>:</td>
                      <td><?php echo $key['usia'] ?> tahun</td>
                    </tr>

                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td><?php echo $key['sex'] ?></td>
                    </tr>

                    <?php foreach ($tampil as $sex) : ?>
                    <?php if ($sex['sex'] == "Betina") : ?>
                      <tr>
                        <td>Status Laktasi</td>
                        <td>:</td>
                        <td><?php echo $key['statLact'] ?> </td>
                      </tr>
                      <tr>
                        <td>Jumlah Laktasi</td>
                        <td>:</td>
                        <td><?php echo $key['jumlahLaktasi'] ?> </td>
                      </tr>
                      <tr>
                        <td>Status Bunting</td>
                        <td>:</td>
                        <td><?php echo $key['statPositif'] ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Beranak terakhir</td>
                        <td>:</td>
                        <td><?php echo $key['tglBeranakTerakhir'] ?></td>
                      </tr>
                      <tr>
                        <td>IB Pertama</td>
                        <td>:</td>
                        <td><?php echo $key['firstIB'] ?></td>
                      </tr>
                      <tr>
                        <td>IB Terakhir</td>
                        <td>:</td>
                        <td><?php echo $key['lastIB'] ?></td>
                      </tr>
                      <tr>
                        <td>Total IB</td>
                        <td>:</td>
                        <td><?php echo $key['jumlahIB'] ?></td>
                      </tr>
                    <?php endif; ?>
                    <?php endforeach ?>
                  <?php endforeach ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>