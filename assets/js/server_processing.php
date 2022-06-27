<?php
 
// DB table to use
$table = 'jadwalkaryawan';
 
// Table's primary key
$primaryKey = 'idJK';
 
$columns = array(
    array( 'db' => 'idJK',    'dt' => 0 ),
    array( 'db' => 'id', 'dt' => 1 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'orix',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);