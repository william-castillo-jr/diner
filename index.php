<?php
/* Will Castillo
 * January 2024
 * https://tostrander.greenriverdev.com/328/diner/
 * This is my CONTROLLER for the Diner app
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validate.php');

// Instantiate Fat-Free framework (F3)
$f3 = Base::instance(); //static method

// Define a default route
$f3->route('GET /', function() {
    //echo "My Diner";

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define a breakfast route
$f3->route('GET /breakfast', function() {
    //echo "Breakfast";

    // Display a view page
    $view = new Template();
    echo $view->render('views/breakfast-menu.html');
});

// Define a order form 1 route
$f3->route('GET|POST /order', function($f3) {

    //initialize variables for scope in if statements
    $food = "";

    // If the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (validFood($_POST['food']))
        {
            $food = $_POST['food'];
        }
        else
        {
            $f3->set('errors["food"]', "Invalid food");
        }

        // Validate the data
        $meal = $_POST['meal'];

        //if there are no errors
        if (empty($f3->get('errors')))
        {
            // Put the data in the session array
            $f3->set('SESSION.food', $food);
            $f3->set('SESSION.meal', $meal);

            // Redirect to order2 route
            $f3->reroute('order2');
        }
    }

    //Get data from the model and add to the F3 "hive"
    $f3->set('meals', getMeals());

    $view = new Template();
    echo $view->render('views/order.html');
});

// Define a order form 2 route
$f3->route('GET|POST /order2', function($f3) {
    //echo "Order Form Part II";

    // If the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Validate the data
        if (isset($_POST['conds'])){
            $conds = implode(", ", $_POST['conds']);
        }
        else {
            $conds = "None selected";
        }

        // Put the data in the session array
        $f3->set('SESSION.conds', $conds);

        // Redirect to summary route
        $f3->reroute('summary');

    }

    $f3->set('condiments', @getCondiments());

    // Display a view page
    $view = new Template();
    echo $view->render('views/order-form-2.html');

});

// Define an order summary route
$f3->route('GET /summary', function() {
    //echo "Thank you for your order!";

    // Display a view page
    $view = new Template();
    echo $view->render('views/order-summary.html');
});

// Run Fat-Free
$f3->run(); //instance method