<?php
$month = isset($_GET['month']) ? $_GET['month'] : date('n');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$array = array(
  array(
    "22/2/2014", 
    'ACM ICL Pre elimination', 
    'https://github.com/blog/category/drinkup', 
    'blue'
  ),
  array(
    "31/3/2014", 
    'Stock Market Simulation(SMS) - finals ', 
    'https://github.com/blog/category/drinkup', 
    'blue'
  )  
);

header('Content-Type: application/json');
echo json_encode($array);
exit;
?>