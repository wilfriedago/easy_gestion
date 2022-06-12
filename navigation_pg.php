<?php

if (isset($_REQUEST['pg'])) {
    switch ($_REQUEST['pg']) {
        case 'home':
            include 'pages/home.html';
            break;
        case 'members':
            include 'pages/members_list.php';
            break;
        case 'member_add':
            include 'pages/member_add.html';
            break;
        case 'member_details':
            include 'pages/member_details.php';
            break;
        case 'articles':
            include 'pages/articles_list.php';
            break;
        case 'article_add':
            include 'pages/article_add.php';
            break;
        case 'article_details':
            include 'pages/article_details.php';
            break;
        case 'addArticle':
        case 'addMember':
            include 'enregistrement.php';
            break;
        case 'del':
            include 'delete.php';
            break;
        case 'edit':
            include 'edit.php';
            break;
        case 'maj':
            include 'maj.php';
            break;
    }
} else {
    include 'pages/home.html';
}
