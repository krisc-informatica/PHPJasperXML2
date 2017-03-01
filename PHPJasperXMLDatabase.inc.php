<?php
abstract class PHPJasperXMLDatabase {
  protected $con = null;
  protected $myconn = null;
  
  protected $db_host = null;
  protected $db_user = null;
  protected $db_pass = null;
  protected $db_or_dsn_name = null;
  
  private $debugsql = false;
  
  public function __construct($db_host=null, $db_user=null, $db_pass=null, $db_or_dsn_name=null) {
    $this->db_host = $db_host;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
    $this->db_or_dsn_name = $db_or_dsn_name;
  }
  
  protected abstract function connect();
  public abstract function transferDBtoArray($sql, $arrayfield, &$arraysqltable, $debugsql=false);
  
  protected function debugsql() {
    if ($this->debugsql) {
      echo "<textarea cols='100' rows='40'>$this->sql</textarea>";
      die();
    }
  }
}