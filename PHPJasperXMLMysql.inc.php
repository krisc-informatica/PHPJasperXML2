<?php
class PHPJasperXMLMysql extends PHPJasperXMLDatabase {
    
  protected function connect() {
    if (!$this->con) {
      $this->myconn = @mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_or_dsn_name);
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
    
    @mysqli_query($this->myconn, "set names 'utf8'" );
    $result = @mysqli_query($this->myconn, $this->sql); // query from db
  
    while($row = mysqli_fetch_assoc($result) ) {
      foreach ($arrayfield as $out ) {
        $arraysqltable [$m] ["$out"] = $row ["$out"];
      }
      $m++;
    }
    
    return $m;
  }
}