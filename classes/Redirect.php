<?php
/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/7/17
 * Time: 6:57 AM
 *
 * Lincence: [MIT license]
 */
class Redirect
{
    private static $_instance;
    private $rootUrl, $previous, $next;

    public function __construct($next = null)
    {
        $this->rootUrl = $_SERVER['PATH_INFO'];
        $this->getPrevious();

        if (isset($next))
            $this->next = $next;
    }

    public static function getInstance()
    {
        if(!isset(self::$_instance)){
            self::$_instance = new Redirect();
        }
        return self::$_instance;
    }

    public static function to($where)
    {
        if (is_numeric($where)) {
            switch ($where) {
                case 404:
                    header('HTTP/1.0 404 Not Found'); // To be replaced with route

                    break;
            }
        }
        header('Location: '.SITE_URL.$where); // To be replaced with route
        exit();
    }

    public static function back()
    {
      if (Session::has('previousUrl')) {
        $previous = Session::get('previousUrl');
      }
      header('Location: '.$previous); // To be replaced with route
    }

    public function intended($where = null)
    {
        if($this->previous) {
            self::to($this->previous);
//            exit();
        }
        elseif ($where){
            self::to($where);
        }
        self::to($this->next);
    }

    public function getPrevious()
    {
      if (Session::has('previousUrl')) {
        $this->previous = Session::get('previousUrl');
      }
      return $this->previous;
    }

}
