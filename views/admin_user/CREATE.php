<?php include(ROOT . '/views/layouts/admin_header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 my-grey-color">
                <ul class="breadcrumb">
                    <li><a href="/admin">Административная часть</a></li>
                    <li><a href="/admin/user">Управление админами</a></li>
                    <li class="active">Создание админа</li>
                </ul>
                <br>
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-7">
                        <div class="signup-form">
                            <h2>Регистрировать админа</h2>
                            <?php if (isset($message)) {echo "<p class='my-red-color'>" . $message . "</p>";} ?>
                            <?php if (!empty($errors)) : ?>
                                <ul class="my-ul">
                                    <?php foreach ($errors as $error) : ?>
                                        <li class="my-red-color"><?= htmlentities($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <form action="" method="post" class="my-form">
                                <input type="text" name="name" value="" placeholder="/Имя">
                                <input type="email" name="email" value="" placeholder="/Email">
                                <input type="password" name="password" value="" placeholder="/Пароль">
                                <button name="submit" class="btn btn-default my-btn">Зарегистрировать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>