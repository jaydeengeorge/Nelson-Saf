<?php

/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/7/17
 * Time: 6:32 AM
 *
 * Lincence: [MIT license]
 */
 // use Contracts\Model;

class User_Model implements Model
{
  public static $table = 'users';
  public static $primary_key = 'id';

  public $id;
  public $id_no;
  public $name;
  public $email = null;
  public $phone = '0700000000';

  public $errors;

  // Create New user
  public function save()
  {
    // Check if user exists
    $user_exists = self::where(['email', $this->email]);
    if(!$user_exists){
      $db = DB::getInstance();
      // Create a new user
      if($db->table(self::$table)->insert($this)){
        return $db->_results;
      }
      $this->errors = $db->_errors;
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


  // Login a user
  public static function login($user)
  {
    $password = Hash::password(Input::post('password'));
    // var_dump($password."\n".$user->password);exit();
    if ($user->password == $password) {
      return Redirect::to('/');
    }
    $errors = ['error' => 'Invalid Email Password Combination!'];
    Session::put('errors', $errors);
    return Redirect::back();
  }
}
