<?php
//This is my CONTROLLER

//turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//require the autoload file
require_once ('vendor/autoload.php');
require ('model/data-layer.php');

//create instance of Base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function($f3) {
    //echo "<h1>Hello World!</h1>";

    //save data to the "hive"
    $f3->set('username', 'jshmo');
    $f3->set('password', sha1('Password01'));
    $f3->set('title', 'Working with Templates');
    $f3->set('color', 'green');
    $f3->set('radius', '10');
    $f3->set('fruits', array('apple', 'orange', 'banana'));
    $f3->set('desserts', getDesserts());

    //display radio buttons containing colors
    //define a function in model that returns an array of colors
    //add the data to your  hive
    //display the data in the view page
    $f3->set('colors', getColors());



    $view = new Template();
    echo $view->render('views/info.html');

});

//run fat-free
$f3->run();
