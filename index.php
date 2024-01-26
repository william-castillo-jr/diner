<?php
/**
 * William Castillo
 * January 2024
 * https://williamcastillojr.greenriverdev.com/328/diner/
 * This is my CONTROLLER for the Diner app
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');

// Instantiate Fat-Free framework (F3)
//:: is how you instantiate a static method
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

//define a breakfast route
$f3->route('GET /breakfast', function() {
   // echo "Breakfast";
    $view = new Template();
    echo $view->render('views/breakfast-menu.html');
});

//define a order route
$f3->route('GET|POST /order', function($f3) {
    $view = new Template();
    echo $view->render('views/order.html');

    //if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // validate the data
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        //put the data in the session array
        $f3->set('SESSION.food', $food);
        $f3->set('SESSION.meal', $meal);

        //redirect to order2 route
        $f3->reroute('summary');
    }
});

//define a order route
$f3->route('GET /summary', function() {
    $view = new Template();
    echo $view->render('views/order-summary.html');
});


//Run Fat-Free
$f3-> run(); //instance method
