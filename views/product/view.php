<?php include(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products"><!--category-productsr-->
                        <?php foreach ($categories as $category) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?= (int)$category['id']; ?>"
                                           class="my-category-link <?php if ($category['id'] == $product['category_id']) {echo "active";} ?>"
                                        >
                                            <?= htmlentities($category['name']); ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!--/category-products-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <?php if (!empty($product)) : ?>
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="/template<?= htmlentities($product['image']); ?>" class=" img-responsive" alt="image">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <?php if ($product['is_new']) : ?>
                                <img src="/template/images/product-details/new.jpg" class="newarrival" alt="image">
                                <?php endif; ?>
                                <h2 class="my-grey-color"><?= htmlentities($product['name']); ?></h2>
                                <p><b>Код товара:</b> <?= (int)$product['code']; ?></p>
                                <p><b>Цена:</b> <i class="my-product-price">US $</i><i><?= (float)$product['price']; ?></i></p>
                                <span>
                                    <label>Количество:</label>
                                    <input type="text" class="my-product-quantity" value="3" />
                                </span>
                                <br>
                                <br>
                                <p><b>Общая сумма:</b> <i class="my-product-amount">US $</i><i>0</i></p>
                                <p><b>Наличие:</b> На складе</p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b> <?= htmlentities($product['brand']); ?></p>
                                <br>
                                <button type="button" class="btn btn-fefault cart my-btn">
                                    <i class="fa fa-shopping-cart"></i>
                                    В корзину
                                </button>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <p><?= htmlentities($product['description']); ?></p>
                        </div>
                    </div>
                </div><!--/product-details-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>