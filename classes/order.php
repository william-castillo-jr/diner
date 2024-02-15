<?php

/**
 * The Order class represents a food order for the GRC Diner
 * @author Will Castillo
 * @copyright 2024
 */
class Order
{
    private $_food;
    private $_meal;
    private $_condiments;

    /**
     * Default constructor instantiates an Order object
     * new Order()
     * new Order("tacos")
     * new Order("tacos", "lunch")
     * new Order("tacos", "lunch", "salsa", "guacamole")
     * @param string $food
     * @param string $meal
     * @param string $condiments
     */
    public function __construct($food="", $meal="", $condiments="")
    {
        $this->_food = $food;
        $this->_meal = $meal;
        $this->_condiments = $condiments;
    }

    /**
     * Return the food that was ordered
     * @return string
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * Set food
     * @param string $food
     */
    public function setFood($food): void
    {
        $this->_food = $food;
    }

    /**
     * Get the meal
     * @return string
     */
    public function getMeal()
    {
        return $this->_meal;
    }

    /**
     * Set the meal
     * @param string $meal
     */
    public function setMeal($meal): void
    {
        $this->_meal = $meal;
    }

    /**
     * Get the condiments
     * @return string
     */
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /**
     * Set the condiments
     * @param string $condiments
     */
    public function setCondiments($condiments): void
    {
        $this->_condiments = $condiments;
    }


}