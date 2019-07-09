<?php
//Including Database configuration file.
include "db.php";
header('Content-Type: application/json');

if( (isset($_POST['search_text']) && !empty($_POST['search_text'])) && (isset($_POST['search_language']) && !empty($_POST['search_language'])) ){
        $search_text = $_POST['search_text'];
        $search_language = $_POST['search_language'];
        $Query = "SELECT * FROM data WHERE `Description of Risk` LIKE '%$search_text%' AND `Language` = '$search_language'";
}else if((isset($_POST['search_text']) && !empty($_POST['search_text']))){

        $search = $_POST['search_text'];
        $Query = "SELECT * FROM data WHERE `Description of Risk` LIKE '%$search%'";
}else if((isset($_POST['search_language']) && !empty($_POST['search_language']))){
        $search = $_POST['search_language'];
        $Query = "SELECT * FROM data WHERE `Language` = '$search'";
}else{
  $Query = "SELECT * FROM data";
}

   $ExecQuery = MySQLi_query($con, $Query);
 
   $data = array();
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
    $data[$Result['id']]['Description'] = htmlentities($Result['Description of Risk']);
    $data[$Result['id']]['Language'] = $Result['Language'];
    $data[$Result['id']]['Lines_Business']['Liability'] = $Result['Liability'];
    $data[$Result['id']]['Lines_Business']['Property'] = $Result['Property'];
    $data[$Result['id']]['Lines_Business']['EO'] = $Result['E&O'];
    $data[$Result['id']]['Lines_Business']['Excess'] = $Result['Excess'];
    $data[$Result['id']]['Lines_Business']['Umbrella'] = $Result['Umbrella'];
  }

    echo json_encode($data);

?>
