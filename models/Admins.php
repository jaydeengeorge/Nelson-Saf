<?php

/**
 * Author < jomwashighadi@gmail.com >
 * Lincence: [MIT license]
 */
  namespace models;

  use classes\Arr;
  use classes\DB;
  use classes\Hash;
  use classes\Input;
  use classes\Session;

  class Admins implements Model
  {
  public static $table = 'admins';
  public static $primary_key = 'id';
  public static $errors = array();

  public $id;
  public $id_no;
  public $name;
  public $email;
  public $phone;
  public $username;
  public $password;

  // // Create New admin
  // public function save()
  // {
  //   // Check if admin exists
  //   $admin_exists = self::where(['id_no', $this->id_no]);
  //   if(!$admin_exists){
  //     $db = DB::getInstance();
  //     // Create a new admin
  //     if($db->table(self::$table)->insert($this)){
  //       return $db->_results;
  //     }
  //     Session::put('errors', Arr::push('db_errors', $db->_errors));
  //     return false;
  //   }
  //   // Return the admin if already exists
  //   return $admin_exists;
  // }

  // Update admin
  // public function update(){}

  // Find admin by id (primary_key)
  public static function find($id)
  {
    return self::where([self::$primary_key, $id]);
  }

  // Get admin where match query
  public static function where(array $where)
  {
    $db = DB::getInstance();

    // Run a select query
    $db->table(self::$table)->select()->where($where)->first();
    if ($db->_results) {
      return $db->_results;
    }
    return false;
  }

  // Fetch all admins
  public static function all()
  {
    $db = DB::getInstance();

    return $db->table(self::$table)->select()->get();
  }
}
