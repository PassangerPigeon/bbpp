<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <?php echo $this->session->flashdata('success'); ?>

    <div class="section-header">
      <h1>Daftar Sapi</h1>
      <br>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">

            <div class="card-header">
              <a href="<?php echo base_url() ?>c_sapi/formTambahSapi" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Sapi</a>
            </div>

            <div class="card-body">
              <table class="table table-striped" id="table-3">

                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Sapi</th>
                    <th>Tanggal Lahir Sapi</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Berat (Kilogram)</th>
                    <th>Status Laktasi</th>
                    <th>Jumlah Laktasi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($tampil as $key) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $key['namaSapi'] ?></td>
                      <td><?php echo $key['tglLahir'] ?></td>
                      <td><?php echo $key['usia'] ?></td>
                      <td><?php echo $key['sex'] ?></td>
                      <td><?php echo $key['berat'] ?></td>
                      <td><?php echo $key['statLact'] ?></td>
                      <td><?php echo $key['jumlahLaktasi'] ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>c_sapi/detail_sapi/<?php echo $key['idSapi'] ?>" class="btn btn-success">Lihat Detail</a>
                        <a href="<?php echo base_url() ?>c_hasilperah/tampilHasilPerah/<?php echo $key['idSapi'] ?>" class="btn btn-warning">Hasil Perah</a>
                        <a href="<?php echo base_url() ?>c_inseminasi/lihatInseminasi/<?php echo $key['idSapi'] ?>" class="btn btn-primary">Inseminasi</a>
                        <a href="#modalHapus" data-toggle="modal" onclick="$('#modalHapus #formHapus').attr('action', '<?php echo base_url() ?>c_sapi/hapusSapi/<?php echo $key['idSapi'] ?>')" class="btn btn-danger">Hapus</a>
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
  <div class="modal fade" id="modalHapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apa anda yakin ingin menghapus data ini.</p>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <form id="formHapus" action="" method="post">
            <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button class="btn btn-danger" type="submit">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div> 
</div>
<?php $this->load->view('dist/_partials/footer'); ?>