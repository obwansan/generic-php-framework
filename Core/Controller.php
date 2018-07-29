<?php

namespace Core;

/**
 * Base controller
 *
 * PHP version 5.4
 */

// abstract class so not going to create any objects from this class directly,
// just other classes that extend it.
abstract class Controller
{

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $route_params = [];

    /**
     * Class constructor
     *
     * @param array $route_params  Parameters from the route
     *
     * @return void
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }
}
