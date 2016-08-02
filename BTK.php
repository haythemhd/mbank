<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'Hello From www.BTKnet.com';
require('simple_html_dom.php');
$html = file_get_html('http://www.btknet.com/site/fr/convertisseur.php?id_article=33');
$table = $html->find('table',23);
$rowData = array();
foreach($table->find('tr') as $nb => $row) {
    // initialize array to store the cell data from each row
    $flight = array();
    foreach($row->find('td') as $nb =>$cell) {
        // push the cell's text to the array
            if(!($nb<2)) {
             $flight[] = $cell->plaintext;}
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
</body>
</html>

