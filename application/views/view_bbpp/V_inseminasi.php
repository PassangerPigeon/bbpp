<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-header">
      <h1>Daftar Inseminasi</h1>
      <br>


    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">

            <div class="card-header">
              <a href="<?php echo base_url() ?>c_sapi" class="btn btn-primary"><i class="fa fa-caret-left"></i> Kembali</a>
            </div>
            <div class="card-header">

              <form action="<?php echo base_url() ?>c_inseminasi/formTambahInseminasi" method="POST"><input type="hidden" value="<?php echo $idSapi ?>" name="idSapi"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Inseminasi</button></form>
            
            </div>

            <div class="card-body">
              <table class="table table-striped" id="table-3">

                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Sapi</th>
                    <th>Asal Sperma</th>
                    <th>Tanggal Inseminasi</th>
                    <th>Status Inseminasi</th>
                    <th>Tanggal Positif</th>
                    <th>Tanggal Beranak</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($tampil as $key) : ?>
                    <?php if ($key['idSapi'] == $idSapi) : ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $key['namaSapi'] ?></td>
                        <td><?php echo $key['asalSperma'] ?></td>
                        <td><?php echo $key['tglInseminasi'] ?></td>
                        <td><?php echo $key['statInseminasi'] ?></td>
                        <td><?php echo $key['tglPositif'] ?></td>
                        <td><?php echo $key['tglBeranakInseminasi'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>C_inseminasi/formEditInseminasi/<?php echo $key['idInseminasi'] ?>" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url() ?>C_inseminasi/hapusInseminasi/<?php echo $key['idInseminasi'] ?>/<?php echo $key['idSapi'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                      </tr>
                    <?php endif ?>
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