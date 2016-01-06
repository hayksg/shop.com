<?php include(ROOT . '/views/layouts/admin_header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 my-grey-color">
                <ul class="breadcrumb">
                    <li><a href="/admin">Административная часть</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактирование товара</li>
                </ul>
                <br>
                <h4>Форма для редактирования товара</h4>
                <div><?php if (isset($message)) { echo "<br><i class='my-red-color'>$message</i><br>"; } ?></div>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-9">
                        <form action="#" method="post" enctype="multipart/form-data" class="my-form">
                            <div class="form-group">
                                <p>Название товара:</p>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="<?= htmlentities($product['name']); ?>"
                                >
                            </div>
                            <div class="form-group">
                                <p>Артикул:</p>
                                <input type="text"
                                       name="code"
                                       class="form-control"
                                       value="<?= (int)$product['code']; ?>"
                                >
                            </div>
                            <div class="form-group">
                                <p>Цена:</p>
                                <input type="text"
                                       name="price"
                                       class="form-control"
                                       value="<?= (float)$product['price']; ?>"
                                >
                            </div>
                            <div class="form-group">
                                <p>Производитель:</p>
                                <input type="text"
                                       name="brand"
                                       class="form-control"
                                       value="<?= htmlentities($product['brand']); ?>"
                                >
                            </div>
                            <div class="form-group">
                                <p>Название категории:</p>
                                <select name="category_id" class="form-control">
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?= (int)$category['id']; ?>"
                                                <?php if($category['id'] == $product['category_id']) { echo 'selected="selected"'; }?>

                                        >
                                            <?= htmlentities($category['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Наличие на складе:</p>
                                <select name="availability" class="form-control">
                                    <option value="1" <?php if ($product['availability'] == 1) { echo "selected='selected'"; } ?> >
                                        Да
                                    </option>
                                    <option value="0" <?php if ($product['availability'] == 0) { echo "selected='selected'"; } ?> >
                                        Нет
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Новинка:</p>
                                <select name="is_new" class="form-control">
                                    <option value="1" <?php if ($product['is_new'] == 1) { echo "selected='selected'"; } ?> >
                                        Да
                                    </option>
                                    <option value="0" <?php if ($product['is_new'] == 0) { echo "selected='selected'"; } ?> >
                                        Нет
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Рекомендуемые:</p>
                                <select name="is_recommended" class="form-control">
                                    <option value="1" <?php if ($product['is_recommended'] == 1) { echo "selected='selected'"; } ?> >
                                        Да
                                    </option>
                                    <option value="0" <?php if ($product['is_recommended'] == 0) { echo "selected='selected'"; } ?> >
                                        Нет
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Статус:</p>
                                <select name="status" class="form-control">
                                    <option value="1" <?php if ($product['status'] == 1) { echo "selected='selected'"; } ?> >
                                        Отображается
                                    </option>
                                    <option value="0" <?php if ($product['status'] == 0) { echo "selected='selected'"; } ?> >
                                        Скрыт
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Описание:</p>
                                <textarea name="description" class="form-control"><?= htmlentities($product['description']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <p>Изображение товара:</p>
                                <br>
                                <img src="/template<?= $product['image']; ?>"
                                     width="268"
                                     height="249"
                                     class="my-image"
                                     alt="image"
                                >
                                <br>
                                <br>
                                <input type="file" name="image" class="jfilestyle" data-inputSize="400px">
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-info">
                                &nbsp;&nbsp;&nbsp;Редактировать&nbsp;&nbsp;&nbsp;
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>