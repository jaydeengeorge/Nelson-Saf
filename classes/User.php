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

class User implements Model
{
  public static $table = 'users';
  public static $primary_key = 'id';

  public $id;
  public $f_name;
  public $l_name;
  public $email;
  public $phone = '0700000000';

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
    Session::put('errors', $db->_errors);
    return false;
  }

  // Create New user
  public static function create(User $user)
  {
    if(!self::where(['email', $user->email])){
      $db = DB::getInstance();

      if($db->table(self::$table)->insert($user)){
        return self::login($user);
      }
      Session::put('errors', $db->_errors);
      return Redirect::back();
    }
    $errors = ['error' => 'Email already taken!'];
    Session::put('errors', $errors);
    return Redirect::back();
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

  public static function update()
  {

  }


  /**
   * @return mixed
   */
  public function id()
  {
      return $this->id;
  }

  /**
   * @return mixed
   */
  public function name()
  {
      return $this->name;
  }

}
