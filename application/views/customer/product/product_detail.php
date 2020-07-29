<?php $price = $product->unit_price ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Semua Produk</a></li>
            <li class="breadcrumb-item"><a href="#"><?= $product->category_name; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $product->product_name; ?></li>
        </ol>
    </nav>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow-sm mb-3 d-relative">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="position-relative">
                            <img src="<?= base_url('/assets/img/products/' . $product->picture); ?>" class="card-img p-2" alt="...">
                            <?php if ($product->discount > 0) : ?>
                                <p class="badge badge-danger position-absolute p-2" style="bottom: 5px; left: 20px;"><span class="fa fa-fire-alt"></span> Diskon <?= $product->discount; ?>%</p>
                            <?php endif; ?>
                        </div>
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
                            <div class="col-md-12 p-0">
                                <label class="sr-only" for="quantity">Quantity</label>
                                <div class="input-group w-auto d-inline-flex mt-3 mb-4">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center" id="quantity" value="1" style="max-width: 60px;">
                                    <div class="input-group-append">
                                        <button class="input-group-text">+</button>
                                    </div>
                                </div>
                                <p class="d-inline small ml-2">Tersedia <?= $product->stock; ?> buah</p>
                            </div>
                            <a href="#" class="btn btn-primary"><span class="fa fa-cart-plus mr-1"></span> Masukan Keranjang</a>
                            <a href="#" class="btn btn-success"> Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-gradient-main py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Deskripsi Produk</h6>
                </div>
                <div class="card-body">
                    <p class="card-text" style="white-space: pre-wrap;"><?= $product->product_description; ?><p>
                </div>
            </div>
        </div>
    </div>
</div>