<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-header">
      <h1>Daftar User</h1>
      <br>


    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">

            <div class="card-header">
              <a href="<?php echo base_url() ?>c_user/formtambahuser" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>
            </div>

            <div class="card-body">
              <table class="table table-striped" id="table-3">

                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Jabatan</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($tampil as $key) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $key['namaUser'] ?></td>
                      <td><?php echo $key['username'] ?></td>
                      <td><?php echo $key['jabatan'] ?></td>
                      <td><?php echo $key['nomorTelp'] ?></td>
                      <td><?php echo $key['alamat'] ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>c_user/formEditUser/<?php echo $key['idUser'] ?>" class="btn btn-success">Edit</a>
                        <a href="#modalHapus" data-toggle="modal" onclick="$('#modalHapus #formHapus').attr('action', '<?php echo base_url() ?>c_user/hapusUser/<?php echo $key['idUser'] ?>')" class="btn btn-danger">Hapus</a>
                    </tr>
                  <?php endforeach ?>
                  </tr>
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
  <?php $this->load->view('dist/_partials/footer'); ?>