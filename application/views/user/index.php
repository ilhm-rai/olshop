<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen User</h1>
        <a href="<?= base_url('user/create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sw text-white"></i> Tambah Baru </a>
    </div>

    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">List User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($users as $u) :
                        ?>
                            <tr>
                                <td class="align-middle w-25"><?= $u->name; ?></td>
                                <td class="align-middle"><?= $u->email; ?></td>
                                <td class="align-middle text-capitalize"><?= $u->role; ?></td>
                                <td class="align-middle text-center"><img src="<?= base_url('assets/img/user_picture/') . $u->picture; ?>" alt="" class="rounded-circle" style="width: 48px;"></td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('user/edit/' . $u->id); ?>" class="btn btn-sm btn-info" role="button" title="Detail"><span class="fa fa-fw fa-sm fa-eye"></span> Lihat </a>
                                    <?= form_open('user/delete', 'class="d-inline"'); ?>
                                    <?= form_hidden('id', $u->id); ?>
                                    <button type="submit" class="btn btn-sm btn-danger mr-1" title="Hapus"><span class="fa fa-fw fa-sm fa-trash-alt"></span></button>
                                    <?= form_close(); ?>
                                    <a href="<?= base_url('user/edit/' . $u->id); ?>" class="btn btn-sm btn-primary" role="button" title="Ubah"><span class="fa fa-fw fa-sm fa-pencil-alt"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>