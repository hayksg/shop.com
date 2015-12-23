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
                <h2 class="title text-center">Кабинет</h2>
                <h4 class="my-title-no-goods my-grey-color">Кабинет пользователя</h4>
                <h5 class="my-grey-color">Добро пожаловать: &nbsp;
                    <strong><em class="my-orange-color"><?= htmlentities($user['name']); ?></em></strong>
                </h5>
                <br>
                <ul class="my-ul my-cabinet-ul">
                    <li><a href="/cabinet/edit/<?= (int)$user['id']; ?>">Редактировать</a></li>
                    <li><a href="/cabinet/history/<?= (int)$user['id']; ?>">Список покупок</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>