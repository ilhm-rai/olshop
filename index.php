<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen User</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Tanggal Daftar</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Gambar</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($users as $u) :
                        ?>
                            <tr>
                                <td class="align-middle"><?= $u->name ?></td>
                                <td class="align-middle"><?= $u->phone ?></td>
                                <td class="align-middle"><?= $u->address ?></td>
                                <td class="align-middle"><?= $u->date_created ?></td>
                                <td class="align-middle"><img src="<?= base_url('assets/img/user_picture/') . $u->picture; ?>" alt="" class="img-thumbnail" style="width: 100px;"></td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('user/' . $u->name); ?>" class="btn btn-sm btn-info mr-1" role="button">Detail</a>
                                    <a href="#" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#deleteModal" role="button" title="Hapus"><span class="fa fa-trash-alt"></span></a>
                                    <a href="#" class="btn btn-sm btn-primary" role="button" title="Ubah"><span class="fa fa-pencil-alt"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- .container-fluid -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutLabel">Konfirmasi Hapus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data ini ?</div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="<?= base_url('user/delete/' . $u->name); ?>">Ya</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

