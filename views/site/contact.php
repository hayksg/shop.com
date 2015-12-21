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
                    <h2 class="title text-center">Контакты</h2>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <?php if ($result) : ?>
                            <h4 class="my-red-color text-center">Сообщение отправлено!</h4>
                            <?php else : ?>
                            <div class="signup-form">
                                <h2>Форма обратной связи</h2>
                                <?php if (!empty($errors)) : ?>
                                <ul class="my-ul">
                                    <?php foreach ($errors as $error) : ?>
                                        <li class="my-red-color"><?= htmlentities($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                                <form action="#" method="post" class="my-form">
                                    <input type="email" name="email" placeholder="/Email">
                                    <input type="text" name="subject" placeholder="/Тема">
                                    <textarea name="message" placeholder="/Сообщение" required></textarea>
                                    <button name="submit" class="btn btn-default my-btn">Отправить</button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>