<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-header">
      <h1>Laporan Kesehatan Sapi</h1>
      <br>


    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">

            <div class="card-body">
              <table class="table table-striped" id="table-3">

                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Sapi</th>
                    <th>Tanggal Pengecekan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($tampil as $key) : ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo  $key['namaSapi'] ?></td>
                        <td><?php echo  $key['tglCek'] ?></td>
                        <td><?php echo  $key['statusCek'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>c_kesehatan/detailKesehatan/<?php echo $key['idCek']?>" class="btn btn-success">Lihat Detail</a>
                        </td>
                      </tr>
                  <?php endforeach ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>