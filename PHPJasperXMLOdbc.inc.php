<?php
class PHPJasperXMLOdbc extends PHPJasperXMLDatabase {
  
  protected function connect() {
    if (!$this->con) {
      $this->myconn = odbc_connect($this->db_or_dsn_name, $this->db_user, $this->db_pass );
    
      if ($this->myconn) $this->con = true;
      else $this->con = false;
    }
    return $this->con;
  }
  
  public function transferDBtoArray($sql, $arrayfield, &$arraysqltable, $debugsql=false) {
    $m = 0;
  
    if (!$this->connect()) {
      echo "Fail to connect database";
      exit(0);
    }
    $this->debugsql();
  
    $result = odbc_exec($this->myconn, $sql);
    while($row = odbc_fetch_array($result)) {
      foreach ($arrayfield as $out ) {
        $arraysqltable [$m] ["$out"] = $row ["$out"];
      }
      $m++;
    }
    
    return $m;
  }
  
}