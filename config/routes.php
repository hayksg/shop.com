<?php

return array(
    'product/([0-9]+)' => 'product/view/$1', // actionView in ProductController
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory in CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory in CatalogController
    'catalog/page-([0-9]+)' => 'catalog/index/$1', // actionIndex in CatalogController
    'catalog' => 'catalog/index', // actionIndex in CatalogController
    'contacts' => 'site/contact', // actionContact in SiteController
    'user/register' => 'user/register', // actionRegister in UserController
    'user/login' => 'user/login', // actionLogin in UserController
    'user/logout' => 'user/logout', // actionLogout in UserController
    'cabinet/edit/([0-9]+)' => 'cabinet/edit/$1', // actionEdit in CabinetController
    'cabinet' => 'cabinet/index', // actionIndex in CabinetController
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd in CartController
    'cart/countProduct/([0-9]+)' => 'cart/countProduct/$1', // actionCountProduct in CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete in CartController
    'cart/order' => 'cart/order', // actionOrder in CartController
    'cart' => 'cart/index', // actionIndex in CartController
    /* Управление админами */
    'admin/user/create' => 'adminUser/create', // actionCreate in AdminUserController
    'admin/user/delete/([0-9])' => 'adminUser/delete/$1', // actionDelete in AdminUserController
    'admin/user' => 'adminUser/index', // actionIndex in AdminUserController
    /* Управление категориями */

    /* Управление товарами */
    'admin/product/create' => 'adminProduct/create', // actionCreate in AdminProductController
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1', // actionUpdate in AdminProductController
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1', // actionDelete in AdminProductController
    'admin/product' => 'adminProduct/index', // actionIndex in AdminProductController
    /* Административная часть */
    'admin' => 'admin/index', // actionIndex in AdminController
    /* Главная страница */
    '' => 'site/index', // actionIndex in SiteController
);