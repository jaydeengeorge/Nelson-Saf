<?php

/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/7/17
 * Time: 6:43 AM
 *
 * Lincence: [MIT license]
 */
  namespace classes;

  use PDO;
  use PDOException;

  class DB
  {
    // Class instance
    private static $_db;

    //PDO handler
    private $_pdo;

    // all errors in db execution
    public $_errors;

    // Returned results
    public $_results;

    // Fetching mode
    public $fetch_mode;

    public $_table;

    // Model name
    public $model;

    public $_sth;
    // public $_where;
    public $_queryString;


  public function __construct()
  {
    $dbname = DB_NAME;
    $user   = DB_USER;
    $pass   = DB_PASS;
    $host   = DB_HOST;

    try {
      $this->_pdo = new PDO("mysql:host={$host}; dbname={$dbname}", $user, $pass);
      $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $e) {
      return $this->_errors = $e->getMessage();
    }
  }

  public static function getInstance()
  {
    if (!self::$_db) {
      self::$_db = new DB;
    }
    return self::$_db;
  }

  public function prepare($action, $data)
  {
      $columns=""; $values=""; $placeholders="";
      foreach ($data as $column => $value) {
          $columns .=  $column.',';
          $values .= $value.',';
          $placeholders .= ':'.$column.',';
      }
      // Remove the last extra coma
      $values = rtrim($values, ",");
      $columns = rtrim($columns, ",");
      $placeholders = rtrim($placeholders, ",");

      // Formulate the SQl satatement
      $this->_sth = $this->_pdo->prepare("{$action} ({$columns}) values({$placeholders})");

      // Bind parmaters
      foreach ($data as $key => $value) {
          $this->_sth->bindParam(':'.$key, $value);
      }
      return true;
  }

  public function table($table)
  {
    $this->_table = $table;
    return $this;
  }

  // Insert values into table
  public function insert($data)
  {
      try {
          $ation = "INSERT INTO {$this->_table}";
          $this->prepare($ation, $data);

          // Execute query (lastInsertId())
          return $this->_results = $this->_sth->execute((array)$data);
      }
      catch (PDOException $e) {
          $this->_errors = $e->getMessage();
      }
      return false;
  }

  // Update table column
  public function update($table, $data)
  {
    # code...
  }

  // Select data form the db
  public function select($columns = null)
  {
      // var_dump($this->_table);
      if (!$columns) {
          // Create sql statement
          $this->_queryString = "SELECT * FROM {$this->_table}";
      }
      else {
          // Create sql statement
          $this->_queryString = "SELECT {$columns} FROM {$this->_table}";
      }

      return $this;
  }

  // Delete data from the db
  public function delete()
  {
    return $this;
  }

  // Where claause
  public function where(array $where)
  {
      // $operators["=", "<", ">", ""];
      $operator = "=";
      // If only two params use (=)
      if (count($where) == 2) {
          $column = $where[0];
          $value  = $this->_pdo->quote($where[1]);
      }
      elseif (count($where) == 3) {
          $column   = $where[0];
          $operator = $where[1];
          $value    = $this->_pdo->quote($where[2]);
      }

      // Add the where clause
      $this->_queryString .= " WHERE {$column} {$operator} {$value}";

      return $this;
  }

  // Run query
  public function get()
  {
    // $this->_queryString = $this->_pdo->quote($this->_queryString);
    $this->_sth = $this->_pdo->query($this->_queryString);

    // Setting fetch mode
    //  if ($this->fetch_mode) {
    //    $this->_sth->setFetchMode($this->fetch_mode);
    //  }else {
    //    $this->_sth->setFetchMode(PDO::FETCH_ASSOC);
    //  }
    $this->_sth->setFetchMode(PDO::FETCH_OBJ);

    try {
        if (!$this->_results = $this->_sth->fetch()) {
            throw new PDOException("Record not found!", 1);
        }
    } catch (PDOException $e) {
        $this->_errors = $e->getMessage();
    }
    // var_dump($this);
    return $this;
  }

  // Setting fetch mode
  // public function setFetchMode($mode = null, $model = null)
  // {
  //   if ($mode) {
  //     $this->fetch_mode = $mode;
  //     $this->model = $model;
  //   }
  //
  //   return $this;
  // }

  public function errors()
  {
      return $this->_errors;
  }

  public function results()
  {
      return $this->_results;
  }
  }
