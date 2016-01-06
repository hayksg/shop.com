<?php include(ROOT . '/views/layouts/admin_header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 my-grey-color">
                <ul class="breadcrumb">
                    <li><a href="/admin">Административная часть</a></li>
                    <li class="active">Управление товарами</li>
                </ul>
                <br>
                <div>
                    <a href="/admin/product/create" class="btn btn-default btn-success">
                        <i class="fa fa-plus"></i> &nbsp;Добавить товар
                    </a>
                </div>
                <br>
                <h4>Список товаров</h4><br>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped my-table-products">
                        <tr>
                            <th>ID товара</th>
                            <th>Артикуль</th>
                            <th>Название</th>
                            <th>Цена US $</th>
                            <th>Изображение</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                        <?php foreach ($allProducts as $product) : ?>
                        <tr>
                            <td><?= (int)$product['id']; ?></td>
                            <td><?= (int)$product['code']; ?></td>
                            <td><?= htmlentities($product['name']); ?></td>
                            <td><?= (float)$product['price']; ?></td>
                            <td>
                                <img src="/template<?= htmlentities($product['image']); ?>" width="60" height="50">
                            </td>
                            <td>
                                <a href="/admin/product/update/<?= (int)$product['id']; ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="/admin/product/delete/<?= (int)$product['id']; ?>">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>