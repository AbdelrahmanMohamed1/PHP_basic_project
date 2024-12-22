<?php
require_once __DIR__."/includes/app.php";




// db_create('users',[]);
// db_update('users',[],5);
// db_delete(table: 'users', 3);
// db_find('users', id: 4);
// db_first('users', "where  email LIKE '%php42@php.net%'")
// db_get('users', " where email LIKE '%php0%' ");
// db_paginate("users", "",1);

// Set Data
// session('test', 'New Test Value');
// Get Session
// session('test');
// Destroy session By key
// session_forget('test');
// Destroy All Session
// session_delete_all();


// Send Mail Message
// send_mail(mails: ['abdelrhmanmohamed1010@gmail.com
// '], subject: "test message",message: "ezayed ya boody 3amel eh ? ro7t el bank enhardah ?");

// echo encrypt(123456).'</br>';
// echo decrypt(encrypt(123456));

// echo set_locale('ar');


route_init();

if(!empty($GLOBALS['query'])) {
    mysqli_free_result($GLOBALS['query']);
}

mysqli_close($connect);
//ob_end_clean();
ob_end_flush();
