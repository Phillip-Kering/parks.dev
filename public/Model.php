<?php

abstract class Model
{
    /** @var PDO|null Connection to the database */
    protected static $connection = null;

    /** @var array Database values for a single record. Array keys should be column names in the DB */
    protected $attributes = array();

    /**
     * Constructor
     *
     * An instance of a class derived from Model represents a single record in the database.
     *
     * $param array $attributes Optional array of database values to initialize the model record with
     */

    public function __construct(array $attributes = array())
    {
        self::dbConnect();

        // @TODO: Initialize the $attributes property with the passed value

    }

    /**
     * Connect to the DB
     *
     * This method should be called at the beginning of any function that needs to communicate with the database
     */
    protected static function dbConnect()
    {
        // if there isnt already a connection, Make one. 

        if (!self::$connection) {
            // @TODO: Connect to database
            require 'db_connection.php';
            self::$connection = $connection;
        } 
    }

    /**
     * Get a value from attributes based on its name
     *
     * @param string $name key for attributes array
     *
     * @return mixed|null value from the attributes array or null if it is undefined
     */
    public function __get($name)
    {
        // @TODO: Return the value from attributes for $name if it exists, else return null
        if(isset($this->attributes[$name]{
            return $this->attribute[$name];
        } else {
            return NULL;
        }
    }

    /**
     * Set a new value for a key in attributes
     *
     * @param string $name  key for attributes array
     * @param mixed  $value value to be saved in attributes array
     */
    public function __set($name, $value)
    {
        // @TODO: Store name/value pair in attributes array
        $nameValue [] = $name => 
    }

    /** Store the object in the database */
    public function save()
    {
        // @TODO: Ensure there are values in the attributes array before attempting to save

        // @TODO: Call the proper database method: if the `id` is set this is an update, else it is a insert
    }

    /**
     * Insert new entry into database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function insert();

    /**
     * Update existing entry in database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function update();
}
