<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'Hello From http://www.bna.com.tn/';
require('simple_html_dom.php');
$html = file_get_html('http://www.bna.tn/site/fr/devise.php?id_article=188');
$table = $html->find('table',0);
$rowData = array();
foreach($table->find('tr') as $row) {
    // initialize array to store the cell data from each row
    $flight = array();
    foreach($row->find('td') as $cell) {
        // push the cell's text to the array
 
             $flight[] = $cell->plaintext;
    }
        $cmp=0;
    $rowData[] = $flight;
    }
echo '<table border="1">';
foreach ($rowData as $row => $tr) {
    if( $row % 2 == 1){
    echo '<tr>'; 
    foreach ($tr as $key=>$td)
    	if (($key!=0)&&($key!=1))
    		echo '<td>' .$td.'</td>';
    echo '</tr>';
    }
}
echo '</table>';

?>
</body>
</html>