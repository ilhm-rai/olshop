<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Kategori Produk</h1>
        <a href="<?= base_url('category/create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sw text-white"></i> Tambah Baru </a>
    </div>

    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Data Kategori Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($categories as $c) :
                        ?>
                            <tr>
                                <td class="align-middle"><?= $c->category_name; ?></td>
                                <td class="align-middle"><?= $c->category_description; ?></td>
                                <td class="align-middle"><img src="<?= base_url('assets/img/products/categories/') . $c->picture; ?>" alt="<?= $c->category_description; ?>" class="<?= ($c->category_description) ? 'img-thumbnail' : ''; ?>" style="width: 100px;"></td>
                                <td class="align-middle text-center">
                                    <?= form_open('category/delete', 'class="d-inline"') ?>
                                    <?= form_hidden('id', $c->id); ?>
                                    <button type="submit" class="btn btn-sm btn-danger mr-1" title="Hapus"><span class="fa fa-sm  fa-fw fa-trash-alt"></span> Hapus </button>
                                    <?= form_close(); ?>
                                    <a href="<?= base_url('category/edit/' . $c->id); ?>" class="btn btn-sm btn-primary" role="button" title="Ubah"><span class="fa fa-sm fa-fw fa-pencil-alt"></span> Ubah </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->