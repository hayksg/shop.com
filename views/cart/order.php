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
                    <h2 class="title text-center">Оформление заказа</h2>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2
                                    col-md-10 col-md-offset-1
                                    col-sm-12"
                        >
                            <div class="my-cart-table-box">
                                <?php if ($result) : ?>
                                    <h4 class="my-grey-color my-title-h4">Заказ оформлен</h4>
                                <?php else : ?>
                                    <div class="signup-form">
                                        <div>
                                            <div>Всего товаров: <strong class="my-orange-color"><?= (int)$totalCount; ?></strong> шт.</div>
                                            <div>На сумму: <strong class="my-orange-color"><?= (float)$totalPrice; ?></strong> US $</div>
                                        </div>
                                        <h2 class="my-form-h2">Для оформления заказа заполните пожалуйста форму</h2>
                                        <?php if (!empty($errors)) : ?>
                                            <ul class="my-ul">
                                                <?php foreach ($errors as $error) : ?>
                                                    <li class="my-red-color"><?= htmlentities($error); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <form action="#" method="post" class="my-form">
                                            <input type="text" name="name" value="<?= htmlentities($userName); ?>" placeholder="/Имя">
                                            <input type="text" name="phone" placeholder="/Телефон">
                                            <textarea name="message" placeholder="/Комментарий к заказу" required></textarea>
                                            <button name="submit" class="btn btn-default my-btn">Заказать</button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>