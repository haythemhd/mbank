<?php
require('simple_html_dom.php');
$cookie = tempnam ("/tmp", "CURLCOOKIE");

$ch = curl_init();
curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
curl_setopt($ch, CURLOPT_URL, "http://www.biat.tn/biat/Fr/cours-de-change_66_127" ); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 ); 
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
$results=curl_exec($ch); 

$html = str_get_html($results);
$table = $html->find('table',1);
$rowData = array();
foreach($table->find('tr') as $row) {
    // initialize array to store the cell data from each row
    $flight = array();
    foreach($row->find('td') as $cell) {
        // push the cell's text to the array

             $flight[] = $cell->plaintext;
    }
    $rowData[] = $flight;
    }
echo '<table border="1">';
foreach ($rowData as $row => $tr) {  
    if(!($row==0)) {
    foreach ($tr as $key=>$td)
    		echo '<td>' .$td.'</td>';
    echo '</tr>';
    }
    }
echo '</table>';
?>