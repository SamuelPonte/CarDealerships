<?php

/* home page and list Carros*/
$router->get('', function () {
    require 'controllers/home.php';
});
$router->post('carsDelete/(\d+)', function ($id) {
    require 'controllers/carros.delete.php';
});
$router->post('filtrar', function () {
    require 'controllers/filter.php';
});

/* show livro with id */
$router->get('cars/(\d+)', function ($id) {
    require 'controllers/carros.show.php';
});

/* Login */
$router->get('login', function () {
    require 'controllers/login.php';
});
$router->post('login', function () {
    require 'controllers/login.post.php';
});

/* Logout */
$router->get('logout', function () {
    require 'controllers/logout.php';
});

/* Criar conta */
$router->get('NewAccount', function () {
    require 'controllers/register.php';
});
$router->post('NewAccount', function () {
    require 'controllers/register.post.php';
});


/* Favoritos */
if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 1) {
    $router->get('Favorites', function () {
        require 'controllers/favoritos.php';
    });
    $router->post('Favorites/store', function () {
        require 'controllers/favoritos.store.php';
    });
    $router->post('Favorites/delete', function () {
        require 'controllers/favoritos.delete.php';
    });
}

/* Anunciar Carro */
if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 1) {
    $router->get('SellCars', function () {
        require 'controllers/anunciar.php';
    });
    $router->post('SellCars', function () {
        require 'controllers/anunciar.store.php';
    });
}


/* User Adverts */
if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 2) {
    $router->get('UserAdverts', function () {
        require 'controllers/userAdverts.php';
    });
    $router->patch('UserAdvertsUpdate/(\d+)', function ($id) {
        require 'controllers/userAdverts.update.php';
    });
    $router->post('UserAdvertsDelete/(\d+)', function ($id) {
        require 'controllers/userAdverts.delete.php';
    });
}

/* My adverts */
if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 1) {
    $router->get('MyAdverts', function () {
        require 'controllers/myAdverts.show.php';
    });
}

/* Personal Data */
if (isset($_SESSION["userid"])) {
    $router->get('PersonalData/(\d+)', function ($id) {
        require 'controllers/personalData.php';
    });
    $router->patch('PersonalDataUpdate/(\d+)', function ($id) {
        require 'controllers/personalData.update.php';
    });
}

/* Nav search */
$router->post('livesearch', function () {
    require 'controllers/livesearch.php';
});

/* Enviar mail */
$router->post('cars/(\d+)/share', function ($id) {
    require 'controllers/shareEmail.php';
});



