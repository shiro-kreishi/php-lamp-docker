<?php
$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "test";
$port = "3306";
$connect = mysqli_connect(
    $hostname, $username,
    $password, $database, $port
);
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<br>';
$query = 'SELECT * from users';
$result = mysqli_query($connect, $query) or die('Invalid query: ' . mysql_error());

$str = '<table border="1">';
$str .= '<tr>';
for($i=0;$i< mysqli_num_fields($result); $i++) {
    $field_info = mysqli_fetch_field_direct($result, $i);
    $str .= '<th>'. $field_info->name . '</th>';
}
$str .= '</tr>';
while( $row = mysqli_fetch_assoc($result)) {
       $str .= '<tr>';
       foreach ($row as $el) {
           $str .= '<td>'. $el. '</td>';
    }
        $str .= '</tr>';
}
$str .= '</table>';
echo $str;
mysqli_close($connect);
