<?php

/**
 * Router
 *
 * PHP version 5.4
 */
class Router
{
    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     *
     * @param string $route  The route URL
     * @param array  $params Parameters (controller, action, etc.)
     *
     * @return void
     */
    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found.
     *
     * @param string $url The route URL
     *
     * @return boolean  true if a match found, false otherwise
     */
    public function match($url)
    {
        /*
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }
        */

        // Match to the fixed URL format /controller/action
        // controller and action become the keys and the URL query
        // string segments become the values in assoc array
        $reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

        // $reg_exp - the pattern to search for, as a string
        // $url - the input string. Searched for a match to $reg_exp
        // $matches - array filled with results of the search

        // if preg_match returns 1 (i.e. there's a match)
        if (preg_match($reg_exp, $url, $matches)) {

          echo '<pre>';
          var_dump($matches);
          echo '</pre>';
            // Get named capture group values
            $params = [];

            foreach ($matches as $key => $match) {
                if (is_string($key)) {
                    $params[$key] = $match;
                }
            }
            // So, if $url is localhost:8888/turnips/add, $matches is
            // array(5) {
              // [0]=>
              // string(11) "turnips/add"
              // ["controller"]=>
              // string(7) "turnips"
              // [1]=>
              // string(7) "turnips"
              // ["action"]=>
              // string(3) "add"
              // [2]=>
              // string(3) "add"
            // }
            // and params is
            // array(2) {
            //   ["controller"]=>
            //   string(7) "turnips"
            //   ["action"]=>
            //   string(3) "add"
            // }

            $this->params = $params;
            return true;
        }

        return false;
    }

    /**
     * Get the currently matched parameters
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}
