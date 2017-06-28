<?php
/**
 * User: reaper45
 * Date: 6/28/17
 * Time: 02:03 AM
 *
 * Lincence: [MIT license]
 */

 class Complain_Model implements Model
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

   // Find Complain by primary key
   public static function find($id){}

   // Get Complain matching input data
   public static function where(array $where){}
 }
