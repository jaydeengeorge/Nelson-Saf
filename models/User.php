<?php

/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/7/17
 * Time: 6:32 AM
 *
 * Lincence: [MIT license]
 */
  namespace models;

  use classes\Arr;
  use classes\DB;
  use classes\Hash;
  use classes\Input;
  use classes\Session;

  class User implements Model
  {
  public static $table = 'users';
  public static $primary_key = 'id';
  public static $errors = array();

  public $id;
  public $id_no;
  public $name;
  public $email = null;
  public $phone;

  public $secret;
  public $val;

  // Create New user
  public function save()
  {
    // Check if user exists
    $user_exists = self::where(['id_no', $this->id_no]);
    if(!$user_exists){
      $db = DB::getInstance();
      // Create a new user
      if($db->table(self::$table)->insert($this)){
        return $db->_results;
      }
      Session::put('errors', Arr::push('db_errors', $db->_errors));
      return false;
    }
    // Return the user if already exists
    return $user_exists;
  }

  // Update User
  public function update(){}

  // Find user by id (primary_key)
  public static function find($id)
  {
    return self::where([self::$primary_key, $id]);
  }

  // Get user where match query
  public static function where(array $where)
  {
    $db = DB::getInstance();

    // Run a select query
    $db->table(self::$table)->select()->where($where)->get();
    if ($db->_results) {
      return $db->_results;
    }
    return false;
  }

  // Send secret to user
  public function sendSecret()
  {
    # code...
  }

  // Filters properties. Only defined will be set
  // public function __set()
  // {
  //   # code...
  // }
  }
