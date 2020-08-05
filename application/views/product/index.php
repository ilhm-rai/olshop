<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Produk</h1>
        <a href="<?= base_url('product/create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sw text-white"></i> Tambah Baru </a>
    </div>

    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Daftar Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($products as $p) :
                            $product = $p->product_name;
                        ?>
                            <tr>
                                <td class="align-middle w-25"><?= strlen($product) > 50 ? substr($product, 0, 50) . "..." : $product;  ?></td>
                                <td class="align-middle"><?= $p->category_name; ?></td>
                                <td class="align-middle"><?= $p->stock; ?></td>
                                <td class="align-middle"> Rp. <?= number_format($p->unit_price, 0, ',', '.'); ?></td>
                                <td class="align-middle"><?= $p->discount . '%'; ?></td>
                                <td class="align-middle"><img src="<?= base_url('assets/img/products/') . $p->picture; ?>" alt="" class="img-thumbnail" style="width: 100px;"></td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('product/' . $p->slug); ?>" class="btn btn-sm btn-info mr-1" role="button"><span class="fa fa-sm fa-fw fa-eye"></span> Lihat</a>
                                    <?= form_open('product/delete', 'class="d-inline"'); ?>
                                    <?= form_hidden('id', $p->id); ?>
                                    <button type="submit" class="btn btn-sm btn-danger mr-1" role="button" title="Hapus"><span class="fa fa-sm fa-fw fa-trash-alt"></span></button>
                                    <?= form_close(); ?>
                                    <a href="<?= base_url('product/edit/' . $p->slug); ?>" class="btn btn-sm btn-primary" role="button" title="Ubah"><span class="fa fa-sm fa-fw fa-pencil-alt"></span></a>
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