<!-- Begin Page Content -->
<div id="carouselAdsIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $num = 0; ?>
        <?php foreach ($ads as $a) : ?>
            <?php $num++ ?>
            <li data-target="#carouselAdsIndicators" data-slide-to="<?= $num; ?>" class="active"></li>
        <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
        <?php $count = count($ads) + 1; ?>
        <?php foreach ($ads as $a) : ?>
            <?php $num++; ?>
            <div class="carousel-item <?= ($num == $count) ? 'active' : ''; ?>">
                <img src=" <?= base_url('assets/img/ads/') . $a->picture ?>" class="d-block w-100" alt="...">
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselAdsIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselAdsIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Kategori</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($categories as $c) : ?>
                            <div class="col-3 col-lg-1 border text-center rounded mr-2 p-0">
                                <a href="<?= base_url('product/c/' . $c->category_name); ?>" class="text-black-50 text-decoration-none">
                                    <img src="<?= base_url('assets/img/products/categories/' . $c->picture); ?>" alt="<?= $c->category_description; ?>" class="w-100 rounded-top">
                                    <p class="mt-2"><?= $c->category_name; ?></p>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <?php foreach ($products as $p) : ?>
            <?php $price = $p->unit_price; ?>
            <div class="col-4 col-lg-3">
                <a class="text-decoration-none" href="<?= base_url() . $p->slug; ?>">
                    <div class="card shadow-sm card-product">
                        <div class="position-relative">
                            <div class="card-img-frame">
                                <img src="<?= base_url('/assets/img/products/' . $p->picture); ?>" class="card-img-top" alt="<?= strtolower($p->product_name); ?>">
                                <?php if ($p->discount_available) : ?>
                                    <h6 class="position-absolute" style="left: 10px; bottom: 3px;">
                                        <div class="badge badge-danger p-2"><span class="fa fa-fire-alt fa-fw mr-1"></span>DISKON <?= $p->discount; ?>%</div>
                                    </h6>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $product = $p->product_name; ?>
                            <p class="card-title d-block text-dark mb-1"><?= strlen($product) > 40 ? substr($product, 0, 30) . "..." : $product;  ?></p>
                        </div>
                        <div class="card-footer">
                            <?php if ($p->discount_available) : ?>
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
    </div>
</div>