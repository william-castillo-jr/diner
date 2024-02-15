<?php

/*
 * 328/diner/model/validate.php
 * Validate data for the diner app
 */

// Return true if food is valid
class Validate
{
    static function validFood($food)
    {
        if (trim($food == ""))
        {
            return false;
        }
        return true;
    }

// with curly braces when defining methods/functions,
// they need to align
    static function validMeal($meal)
    {
        return in_array($meal, DataLayer::getMeals());
//    $validMeals = array("breakfast", "lunch", "dinner");
//    $validMeals = getMeals();


        // a different way to put it,
        // but top one is more simplified
//    if (in_array($meal, $validMeals))
//    {
//        return true;
//    }
//    else {
//        return false;
//    }
    }
}
