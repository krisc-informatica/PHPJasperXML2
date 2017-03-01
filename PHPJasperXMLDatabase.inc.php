<?php
abstract class PHPJasperXMLDatabase {
  public abstract function connect($db_host=null, $db_user=null, $db_pass=null, $db_or_dsn_name=null);
  public abstract function transferDBtoArray($host, $user, $password, $db_or_dsn_name);
}