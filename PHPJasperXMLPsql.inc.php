<?php
class PHPJasperXMLPsql extends PHPJasperXMLDatabase {

  protected function connect() {
    global $pgport;
    if (!$this->con) {
      if ($pgport == "" || $pgport == 0) $pgport = 5432;
      
      $conn_string = "host=$this->db_host port=$pgport dbname=$this->db_or_dsn_name user=$this->db_user password=$this->db_pass";
      $this->myconn = pg_connect($conn_string );
    
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
  
    pg_send_query($this->myconn, $sql );
    $result = pg_get_result($this->myconn );
    while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC ) ) {
      foreach ($arrayfield as $out ) {
        $arraysqltable [$m] ["$out"] = $row ["$out"];
      }
      $m++;
    }
    
    return $m;
  }
  
}