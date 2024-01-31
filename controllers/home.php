<?php

$c_halaman_utama = fn () => view('home', [
    'user' => session_get('user'),
    'messages' => session_get('messages')
]);
