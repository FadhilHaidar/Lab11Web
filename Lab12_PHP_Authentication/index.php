<?php
session_start();

require_once "config/Database.php";
require_once "classes/User.php";
require_once "helpers/auth.php";
require_once "classes/Article.php";

$page = $_GET['page'] ?? 'login';

// Logout
if ($page === 'logout') {
    logout();
}

include "layout/header.php";

// Routing
switch ($page) {
    case 'login':
        include "module/auth/login.php";
        break;

    case 'profile':
        checkLogin();
        include "module/user/profile.php";
        break;

    case 'articles':
        checkLogin();
        include "module/article/index.php";
        break;

    case 'article_detail':
        checkLogin();
        include "module/article/detail.php";
        break;

    case 'article_create':
        checkLogin();
        include "module/article/create.php";
        break;

    default:
        echo "<div class='container mt-5 alert alert-danger'>Halaman tidak ditemukan</div>";
}

include "layout/footer.php";
