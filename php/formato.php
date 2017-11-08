<?php
require("conexion.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
//$connection=mysqli_connect ('localhost', $username, $password);
//if (!$connection) {
//  die('Not connected : ' . mysql_error());
//}

// Set the active MySQL database
$result_markers = "SELECT * FROM markers";
$resultado_markers = mysqli_query($connection, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row_markers['name']) . '" ';
  echo 'direccion="' . parseToXML($row_markers['direccion']) . '" ';
  echo 'lat="' . $row_markers['lat'] . '" ';
  echo 'lng="' . $row_markers['lng'] . '" ';
  echo 'tipo="' . $row_markers['tipo'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

