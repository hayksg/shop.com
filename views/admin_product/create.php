<?php include(ROOT . '/views/layouts/admin_header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 my-grey-color">
                <ul class="breadcrumb">
                    <li><a href="/admin">Административная часть</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Добавление товара</li>
                </ul>
                <br>
                <h4>Форма для добавления товара</h4>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-9">
                        <form action="#" method="post" enctype="multipart/form-data" class="my-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Название товара">
                            </div>
                            <div class="form-group">
                                <input type="text" name="code" class="form-control" placeholder="Артикул">
                            </div>
                            <div class="form-group">
                                <input type="text" name="price" class="form-control" placeholder="Цена">
                            </div>
                            <div class="form-group">
                                <input type="text" name="brand" class="form-control" placeholder="Производитель">
                            </div>
                            <div class="form-group">
                                <select name="category_id" class="form-control">
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?= (int)$category['id']; ?>">
                                            <?= htmlentities($category['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Наличие на складе:</p>
                                <select name="availability" class="form-control">
                                    <option value="1" selected="selected">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Новинка:</p>
                                <select name="is_new" class="form-control">
                                    <option value="1" selected="selected">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Рекомендуемые:</p>
                                <select name="is_recommended" class="form-control">
                                    <option value="1" selected="selected">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Статус:</p>
                                <select name="status" class="form-control">
                                    <option value="1" selected="selected">Отображается</option>
                                    <option value="0">Скрыт</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Описание"></textarea>
                            </div>
                            <div class="form-group">
                                <p>Загрузить изображение:</p>
                                <input type="file" name="image" class="jfilestyle" data-inputSize="400px">
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-info">
                                &nbsp;&nbsp;&nbsp;Добавить&nbsp;&nbsp;&nbsp;
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>