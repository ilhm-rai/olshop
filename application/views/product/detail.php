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
                                <span class="card-text mr-1 text-black-50"><s>Rp. <?= number_format($price, 0, ',', '.'); ?></s></span>
                                <h6 class="d-inline"><span class="badge badge-pill badge-primary">Rp. <?= number_format($price - $price * ($product->discount / 100), 0, ',', '.'); ?></span></h6>
                            <?php else : ?>
                                <h6 class="d-inline">
                                    <span class="badge badge-pill badge-primary">
                                        Rp. <?= number_format($price, 0, ',', '.'); ?>
                                    </span>
                                </h6>
                            <?php endif; ?>
                            <div class="col-md-12 p-0 mt-4 mb-4">
                                <p class="d-inline">Tersedia <?= $product->stock; ?> Buah</p>
                            </div>
                            <a href="<?= base_url('product/edit/' . $product->slug); ?>" class="btn btn-primary"><span class="fas fa-fw fa-sm fa-pencil-alt mr-1"></span> Ubah</a>
                            <button type="button" data-toggle="modal" data-target="#deleteModal" data-id="<?= $product->id; ?>" class="btn btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'product/delete')"><span class="fa fa-sm  fa-fw fa-trash-alt"></span> Hapus </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light py-3">
                    <h6 class="m-0 font-weight-bold text-black-50">Deskripsi Produk</h6>
                </div>
                <div class="card-body">
                    <p class="card-text" style="white-space: pre-wrap;"><?= $product->product_description; ?><p>
                </div>
            </div>
        </div>
    </div>
</div>