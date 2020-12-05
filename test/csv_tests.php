<?php
require_once("../autoload.php");

echo "<pre>";
print_r(str_getcsv(CSV::getCSV(PROJECT_DIRECTORY . "CSV/citys.csv")[0]));
echo "</pre>";

?>