<?php include(ROOT . '/views/layouts/admin_header.php'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-grey-color">
                    <ul class="breadcrumb">
                        <li><a href="/admin">Административная часть</a></li>
                        <li><a href="/admin/product">Управление товарами</a></li>
                        <li class="active">Удаление товара</li>
                    </ul>
                    <br>
                    <h4 class="my-grey-color">Вы действительно хотитие удалить этот товар?</h4>
                    <br>
                    <div>
                        <img src="/template<?= $product['image']; ?>">
                    </div>
                    <br>
                    <br>
                    <form action="" method="post" class="my-form-delete">
                        <button name="submit" class="btn btn-default btn-danger">
                            <i class="fa fa-trash-o fa-lg"></i> &nbsp;Удалить
                        </button>
                    </form>
                    <a href="/admin/product" class="btn btn-default btn-info">Не удалять</a>
                    <br>


                </div>
            </div>
        </div>
    </section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>