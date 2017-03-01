<?php
class PHPJasperXMLJson extends PHPJasperXMLDatabase {
  protected function connect() {
    //echo '1';
    if (!$this->con) { //echo '2';
      if ($this->db_or_dsn_name) { //echo '3';
        $this->myconn = $this->db_or_dsn_name;
        $this->con = true;
      } else $this->con = false;
    }
    //echo '4';
    return $this->con;
  }
  
  public function transferDBtoArray($sql, $arrayfield, &$arraysqltable, $debugsql=false) {
    $m = 0;
  
    if (!$this->connect()) {
      echo "Fail to connect database";
      exit(0);
    }
    $this->debugsql();
    
    $result = $this->myconn;
    foreach ($result as $row) {
      foreach ($arrayfield as $out) {
        $arraysqltable [$m]["$out"] = $row["$out"];
      }
      $m++;
    }
      
    return $m;
  }
  
}