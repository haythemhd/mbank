<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'Hello From www.bte.com.tn';
require('simple_html_dom.php');
$html = file_get_html('http://www.bte.com.tn/?idart=8&lang=fr');
$table = $html->find('table',9);
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
    foreach ($tr as $key=>$td)
    		echo '<td>' .$td.'</td>';
    echo '</tr>';
    }
echo '</table>';

?>
</body>
</html>

