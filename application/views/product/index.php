<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Produk</h1>
        <a href="<?= base_url('product/create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sw text-white"></i> Tambah Baru </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
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
                                <td class="align-middle"><?= strlen($product) > 40 ? substr($product, 0, 30) . "..." : $product;  ?></td>
                                <td class="align-middle"><?= $p->category_name; ?></td>
                                <td class="align-middle"><?= $p->stock; ?></td>
                                <td class="align-middle"> Rp. <?= number_format($p->unit_price, 0, ',', '.'); ?></td>
                                <td class="align-middle"><img src="<?= base_url('assets/img/products/') . $p->picture; ?>" alt="" class="img-thumbnail" style="width: 100px;"></td>
                                <td class="align-middle"><a href="#" class="btn btn-sm btn-primary mr-1" role="button">Ubah</a><a href="#" class="btn btn-sm btn-danger" role="button">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->