<?php

namespace Core;

/**
 * View
 *
 * PHP version 5.4
 */
class View
{
    /**
     * Render a view file
     *
     * @param string $view  The view file
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        // The extract() function converts array keys into variable names
        // and array values into variable values.

        // At this point the args are [
        //  'name'    => 'Dave',
        //  'colours' => ['red', 'green', 'blue']
        //  Passed in from Home->indexAction
        extract($args, EXTR_SKIP);

        // At this point $view is Home/index.php
        $file = "../App/Views/$view";  // relative to Core directory

        // Home/index.php is required into the View class
        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }
    }
}
