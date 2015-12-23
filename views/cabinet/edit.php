<?php include(ROOT . '/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3
                        col-md-6 col-md-offset-3
                        col-sm-8 col-sm-offset-2
                ">
                    <?php if ($result) : ?>
                        <h4 class="my-red-color text-center">Данные редактированы!</h4>
                    <?php else : ?>
                    <div class="signup-form">
                        <h2>Редактирование данных</h2>
                        <?php if (!empty($errors)) : ?>
                            <ul class="my-ul">
                                <?php foreach ($errors as $error) : ?>
                                    <li class="my-red-color"><?= htmlentities($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <form action="" method="post" class="my-form">
                            <input type="text" name="name" value="<?= htmlentities($name); ?>" placeholder="/Имя">
                            <input type="password" name="password" value="<?= htmlentities($password); ?>" placeholder="/Пароль">
                            <button name="submit" class="btn btn-default my-btn">Редактировать</button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>