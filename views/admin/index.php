<?php include(ROOT . '/views/layouts/admin_header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 my-grey-color">
                <h4>Административная часть</h4>
                <p>Вам доступны следующие возможности:</p>
                <ul class="my-ul my-cabinet-ul">
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li><a href="/admin/user">Управление админами</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>