<?php $price = $product->unit_price ?>
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Produk</h1>
        <a href="<?= base_url('product'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="card mb-3 d-relative">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('/assets/img/products/' . $product->picture); ?>" class="card-img p-2" alt="...">
                        <?php if ($product->discount > 0) : ?>
                            <p class="badge badge-danger position-absolute p-2" style="bottom: 5px; left: 20px;"><span class="fa fa-fire-alt"></span> Diskon <?= $product->discount; ?>%</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?= $product->product_name; ?></h5>
                            <?php if ($product->discount > 0) : ?>
                                <span class="card-text small mr-1 text-black-50"><s>Rp. <?= number_format($price, 0, ',', '.'); ?></s></span>
                                <span class="badge badge-pill badge-primary">Rp. <?= number_format($price - $price * ($product->discount / 100), 0, ',', '.'); ?></span>
                            <?php else : ?>
                                <span class="badge badge-pill badge-primary">
                                    Rp. <?= number_format($price, 0, ',', '.'); ?>
                                </span>
                            <?php endif; ?>
                            <div class="col-md-12 p-0 mt-4 mb-4">
                                <p class="d-inline small">Tersedia <?= $product->stock; ?> Buah</p>
                            </div>
                            <form action="/comics/<?= $product->id; ?>" method="POST" class="d-inline">
                                <a href="#" class="btn btn-primary"><span class="fas fa-fw fa-pencil-alt mr-1"></span> Ubah</a>
                                <a href="#" class="btn btn-danger"><span class="fas fa-fw fa-trash-alt mr-1"></span> Hapus</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white">Deskripsi Produk</h6>
                </div>
                <div class="card-body">
                    <p class="card-text" style="white-space: pre-wrap;"><?= $product->product_description; ?><p>
                </div>
            </div>
        </div>
    </div>
</div>