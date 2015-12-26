<?php include(ROOT . '/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">
                            <?php foreach ($categories as $category) : ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?= (int)$category['id']; ?>"
                                               class="my-category-link"
                                            >
                                                <?= htmlentities($category['name']); ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    <h2 class="title text-center">Корзина</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="my-cart-table-box">
                                <?php if (empty($products)) : ?>
                                    <h4 class="my-grey-color my-title-h4">
                                        <?php echo ($message) ? $message : 'Корзина пуста'; ?>
                                    </h4>
                                <?php else : ?>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered">
                                        <tr>
                                            <th>Код товара</th>
                                            <th>Название</th>
                                            <th>Цена US $</th>
                                            <th>Количество шт.</th>
                                            <th>Удалить</th>
                                        </tr>
                                        <?php foreach ($products as $product) : ?>
                                            <tr>
                                                <td><?= (int)$product['code']; ?></td>
                                                <td><?= htmlentities($product['name']); ?></td>
                                                <td><?= (float)$product['price']; ?></td>
                                                <td><?= (int)$sessionProducts[$product['id']]; ?></td>
                                                <td>
                                                    <a href="/cart/delete/<?= (int)$product['id']; ?>">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                                <p>Общая сумма: US $
                                    <strong class="my-orange-color">
                                        <?= (float)$totalPrice; ?>
                                    </strong>
                                </p>
                                <br>
                                <p>
                                    <a href="/cart/order" class="btn btn-fefault cart my-btn">Оформить заказ</a>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>