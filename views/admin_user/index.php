<?php include(ROOT . '/views/layouts/admin_header.php'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-grey-color">
                    <ul class="breadcrumb">
                        <li><a href="/admin">Административная часть</a></li>
                        <li class="active">Управление админами</li>
                    </ul>
                    <br>
                    <div>
                        <a href="/admin/user/create" class="btn btn-default btn-success">
                            <i class="fa fa-plus"></i> &nbsp;Добавить админа
                        </a>
                    </div>
                    <br>
                    <?php if (empty($admins)) : ?>
                    <h4>Пока зарегистрированных админов нет. Вы можете добавить их.</h4>
                    <?php else : ?>
                    <h4>Список админов</h4><br>
                    <?php if (isset($message)) {echo "<p class='my-red-color'>" . $message . "</p>";} ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped my-table-admins">
                                    <tr>
                                        <th>Имя админа</th>
                                        <th>Удалить</th>
                                    </tr>
                                    <?php foreach ($admins as $admin) : ?>
                                        <tr>
                                            <td><?= htmlentities($admin['name']); ?></td>
                                            <td>
                                                <a href="/admin/user/delete/<?= (int)$admin['id']; ?>"
                                                   onclick="return confirm('Вы уверены что хотитие удалить админа?');"
                                                >
                                                    &nbsp;<i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>