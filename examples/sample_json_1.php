<?php
/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/
include_once('../lib/tcpdf/tcpdf.php');
include_once("../PHPJasperXML.inc.php");
include_once ('setting.php');

/*
 * Instantiate the report data as an json string and parse
 */
$data = json_decode(file_get_contents("./data.json"), true);
$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("parameter1"=>1);
$PHPJasperXML->load_xml_file("sample1.jrxml");

$PHPJasperXML->transferDBtoArray(null, null, null, $data, 'json');
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

?>