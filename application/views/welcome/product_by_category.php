<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $category->category_name; ?></li>
        </ol>
    </nav>
    <div class="row mt-4 mb-4">
        <?php if (count($products) > 0) : ?>
            <?php foreach ($products as $p) : ?>
                <?php $price = $p->unit_price; ?>
                <div class="col-6 col-lg-3">
                    <a class="text-decoration-none" href="<?= base_url() . $p->slug; ?>">
                        <div class="card shadow-sm card-product">
                            <div class="position-relative">
                                <img src="<?= base_url('/assets/img/products/' . $p->picture); ?>" class="card-img-top" alt="<?= strtolower($p->product_name); ?>">
                                <?php if ($p->discount > 0) : ?>
                                    <h6 class="position-absolute" style="left: 10px; bottom: 3px;">
                                        <div class="badge badge-danger p-2"><span class="fa fa-fire-alt fa-fw mr-1"></span>DISKON <?= $p->discount; ?>%</div>
                                    </h6>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <?php $product = $p->product_name; ?>
                                <p class="card-title d-block text-dark mb-1"><?= strlen($product) > 40 ? substr($product, 0, 30) . "..." : $product;  ?></p>
                            </div>
                            <div class="card-footer">
                                <?php if ($p->discount > 0) : ?>
                                    <span class="card-text small mr-1 text-black-50"><s>Rp. <?= number_format($price, 0, ',', '.'); ?></s></span>
                                    <h6 class="d-inline"><span class="badge badge-pill badge-primary">Rp. <?= number_format($price - $price * ($p->discount / 100), 0, ',', '.'); ?></span></h6>
                                <?php else : ?>
                                    <h6 class="d-inline">
                                        <span class="badge badge-pill badge-primary">
                                            Rp. <?= number_format($price, 0, ',', '.'); ?>
                                        </span>
                                    </h6>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col text-center text-black-50">
                <p>Produk dengan kategori <b><?= $category->category_name; ?></b> sedang kosong, kembali ke home.</p>
            </div>
        <?php endif; ?>
    </div>
</div>