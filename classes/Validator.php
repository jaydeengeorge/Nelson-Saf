<?php

/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/7/17
 * Time: 6:58 AM
 *
 * Lincence: [MIT license]
 */
 /*
 |--------------------------------------------------------------------------
 | Class Validator
 |--------------------------------------------------------------------------
 |
 | This class handles validation of form data. Provide and returns
 | customizable error messages
 |
 */
  namespace classes;

  class Validator
  {
    private $validated;
    private $data;
    private $errors = array();

    public function make($data, $keyrule = array())
    {
      $this->data = $data;
      $this->validate($keyrule);
    }

    public function validate($keyrule = array())
    {
      function removeFoundNeedle($rules, $needle)
      {
          $rules = explode($needle, $rules);
          foreach ($rules as $key=> $item){
              $rules[$key] = ltrim($item,$needle);
          }
          return $rules;
      }

      foreach ($keyrule as $key => $rules){
        // print($input." => ".$rules."\n");
        if(strchr($rules,'|')){

          $rules = removeFoundNeedle($rules, '|');
          foreach ($rules as $rule){
            if(strchr($rule,':')) {
              $rule = removeFoundNeedle($rule, ':');
              $r = $rule[0];
              $this->$r($key, $rule[0], $rule[1]);
            }
            else{
                $this->$rule($key);
            }
          }
        }
        elseif(strchr($rules,':')) {
          $rules = removeFoundNeedle($rules, ':');

          $this->$rules[0]($key, $rules[0], $rules[1]);
        }
        else{
            $this->$rules($key, $rules);
        }
      }
    }

    // Ensure any required fields isn't empty
    public function required($key)
    {
      if(empty($this->data[$key])){
          $error = "The field {$key} is required.";
          $this->errors = Arr::push($this->errors, $error);
          return false;
      }
      return true;
    }

    // Ensure Emails fields are valid
    public function  email($key)
    {
      // regex will work better
      if(!strchr($this->data[$key], '@')){
          $error = "The field {$key} must be a valid email.";
          $this->errors = Arr::push($this->errors, $error);
          return false;
      }
      return true;
    }

    // Ensure field's maximum character rule
    public function max($key, $num)
    {
      if(strlen($this->data[$key]) > $num){
          $error = "The field {$key} may not be greater than {$num}.";
          $this->errors = Arr::push($this->errors, $error);
          return false;
      }
      return true;
    }

    // Ensure field's minimum character rule
    public function min($key, $num)
    {
      if(strlen($this->data[$key]) < $num){
        $error = "The field {$key} must be at least {$num}.";
        $this->errors = Arr::push($this->errors, $error);
        return false;
      }
      return true;
    }

    public function unique($key)
    {
        // TODO: Value passes is unique in Specific table
    }

    public function url($key)
    {
        // TODO: Verify valid url
    }

    public function image($key)
    {
        // TODO: verify file passes is valid image not pdf
    }

    // Check if all the rules passes @make none is violated
    public function fails()
    {
        if($this->errors){
            return true;
        }
        return false;
    }

    // Retrieve all error messages thrown
    public function errors()
    {
      return $this->errors;
    }


    // Call function executed when rule doesn't exists
    public function __call($fun,$parameters)
    {
        $this->errors = Arr::push($this->errors, "Method ".$fun." isn't implemented yet!");
    }
  }
