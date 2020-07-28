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
                <div class="card-header bg-gradient-main py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Kategori</h6>
                </div>
                <div class="card-body">
                    <img src="" alt="" class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <?php foreach ($products as $p) : ?>
            <?php $price = $p->unit_price; ?>
            <div class="col-6 col-lg-3">
                <a class="text-decoration-none" href="<?= base_url() . $p->slug; ?>">
                    <div class="card shadow-sm card-product-h">
                        <div class="card-header bg-white p-0 align-items-center position-relative">
                            <img src="<?= base_url('/assets/img/products/' . $p->picture); ?>" class="card-img p-2" alt="<?= strtolower($p->product_name); ?>">
                            <p class="badge badge-danger position-absolute p-2" style="bottom: 5px; left: 20px;"><span class="fa fa-fire-alt"></span> Diskon <?= $p->discount; ?>%</p>
                        </div>
                        <div class="card-body">
                            <?php $product = $p->product_name; ?>
                            <p class="card-title d-block text-dark mb-1"><?= strlen($product) > 40 ? substr($product, 0, 30) . "..." : $product;  ?></p>
                            <span class="card-text text-black-50 small mr-1">
                                <s>Rp. <?= number_format($price, 0, ',', '.'); ?></s>
                            </span>
                            <span class="badge badge-pill badge-primary">Rp. <?= number_format($price - $price * $p->discount / 100, 0, ',', '.'); ?></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>