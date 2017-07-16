<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 20:29 PM
 *
 */

 namespace models;

 Interface Model
 {
   // Save new model
   public function save();

   // Update new model
  //  public function update();

   // Find record by primary key
   public static function find($id);

   // Get record matching input data
   public static function where(array $where);

   // Fetch all records
   public static function all();
 }

 /*
 * The interface is so not complete: save, update, delete etc
 * Well, came to realise complains cant be update (Just doesn't make sence)
 */
