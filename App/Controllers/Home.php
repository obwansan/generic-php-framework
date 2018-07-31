<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
      // Can access render method with scope resolution operator because
      // render is a static function.
      // Passing a $view and $args =[] to View->render method.  
      View::render('Home/index.php', [
          'name'    => 'Dave',
          'colours' => ['red', 'green', 'blue']
      ]);
    }
}
