<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-header">
      <h1>Daftar Hasil Perah</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">

            <div class="card-header">
              <a href="<?php echo base_url() ?>c_sapi" class="btn btn-primary"><i class="fa fa-caret-left"></i> Kembali</a>
            </div>
            <div class="card-header">

              <form action="<?php echo base_url() ?>c_hasilperah/formTambahHasilPerah" method="POST"><input type="hidden" value="<?php echo $idSapi ?>" name="idSapi"><button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Hasil Perah</button></form>

            </div>

            <div class="card-body">
              <table class="table table-striped" id="table-3">

                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Sapi</th>
                    <th>Tanggal Perah</th>
                    <th>Hasil Perah Pagi</th>
                    <th>Hasil Perah Sore</th>
                    <th>Jumlah Hasil Perah </th>
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
                        <td><?php echo $key['tglPerah'] ?></td>
                        <td><?php echo $key['hasilPerahPagi'] ?></td>
                        <td><?php echo $key['hasilPerahSore'] ?></td>
                        <td><?php echo $key['jumlahPerah'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>c_hasilperah/formEditPerah/<?php echo $key['idPerah'] ?>" class="btn btn-success">Edit</a>
                          <a href="<?php echo base_url() ?>c_hasilperah/hapusHasilPerah/<?php echo $key['idPerah']?>/<?php echo $key['idSapi']?>" class="btn btn-danger">Hapus</a>
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