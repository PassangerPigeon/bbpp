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
                        <a href="<?php echo base_url() ?>C_user/hapusUser/<?php echo $key['idUser'] ?>" class='btn btn-danger'>Hapus</a>
                      </td>
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
</div>
<?php $this->load->view('dist/_partials/footer'); ?>