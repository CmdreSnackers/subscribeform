<?php

function connectToDB()
{
    return new PDO(
        'mysql:host=devkinsta_db;dbname=subscribe_form', // instruction: change the host to devkinsta_db and insert your own database name
        'root',
        'WSC2rkMYbGqpj0v7' // instruction: change this to your database password
    );
}