<?php

$mw_logged_in = function () {
    if (!session_exist('user')) {
        session_flash('errors', ['Anda harus login terlebih dahulu!']);
        redirect('/login');
    }
};

$mw_not_logged_in = function () {
    if (session_exist('user')) {
        session_flash('errors', ['Anda harus login terlebih dahulu!']);
        redirect('/');
    }
};