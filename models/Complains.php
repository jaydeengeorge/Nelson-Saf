<?php
/**
* User: reaper45
* Date: 6/28/17
* Time: 02:03 AM
*
* Lincence: [MIT license]
*/
namespace models;

use classes\Arr;
use classes\DB;
use classes\Hash;
use classes\Input;
use classes\Session;

class Complains implements Model
{
  public static $table = 'complains';
  public static $primary_key = 'id';
  public static $errors = array();

  // Complain id(key)
  public $id;

  // User Complaining
  public $user_id;

  // Complain description
  public $description;

  // Agent assigned to (Default NONE)
  public $assigned_to = null;

  public $created_at = "00:00:0000";

  // Save new Complain
  public function save()
  {
    $db = DB::getInstance();

    if($db->table(self::$table)->insert($this)){
      return $db->_results;
    }
    self::$errors = Arr::push(self::$errors, $db->_errors);
    return $this;
  }

  // Get all complain made by user
  public static function all($user_id = null)
  {
    $db = DB::getInstance();
    if ($user_id) {
      // Get complains only made by this user (id)
      $db->table(self::$table)->select()->where(['user_id',$user_id])->get();
    }else {
      $db->table(self::$table)->select()->get();
    }
    return $db->results();
  }

  // Find Complain by primary key
  public static function find($id)
  {
    //  var_dump($id); exit();

    return self::where([self::$primary_key, $id]);
  }

  // Get Complain matching input data
  public static function where(array $where)
  {
    // var_dump($where); exit();
    $db = DB::getInstance();
    // Run a select query
    $db->table(self::$table)->select()->where($where)->get();
    if ($db->_results) {
      return $db->_results;
    }
    return false;
  }

  // Delete single record
  public function delete()
  {
    $db = DB::getInstance();

    return $db->table(self::$table)->delete()->where($where)->get();
  }

}
