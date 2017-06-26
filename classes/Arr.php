<?php

/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/25/17
 * Time: 4:23 PM
 *
 * Lincence: [MIT license]
 */
class Arr
{
    /* Add value to Arr
    *
    * Returns the whole array
    */
    // public function __construct()
    // {
    //   $this->_arr = array();
    // }

    public function push($arr, $value)
    {
        try{
            if (array_push($arr, $value)) {
                return $arr;
            }
            throw new Exception('Method push Expects array!');
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    // Delete an array element
    public function delete($arr, $key)
    {
      try {
        if (is_array($arr)) {
          if (array_key_exists($key, $arr)) {
            $arr[$key] = null;
          }
        }
      } catch (Exception $e) {

      }
    }

    public function has($value='')
    {
      # code...
    }

    public function empty()
    {

    }

    /**
     * @param mixed $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
