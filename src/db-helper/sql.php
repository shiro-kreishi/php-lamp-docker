<?php
function run_sql ($s, $l) {
	$r = mysqli_query($l, $s);
	if (!$r) {
		return mysqli_error($l);
	} else {
		$v= '';
		if ($r === true) {
			$v .= 'Запрос успешно выполнился!';
			return $v;
		}
		else {
			$v .= '<table border="1"><tr>';
			$columns = array();
			$num_fields = mysqli_num_fields($r);
			for ($i = 0; $i < $num_fields; $i++) {
				$field_info = mysqli_fetch_field_direct($r, $i);
				$columns[] = $field_info->name;
			}
			foreach ($columns as $column) {
				$v .= '<th>'.$column .'</th>';
			}
			$v .= '</tr>';
			
			//$result = mysqli_fetch_accos($result);
			//echo "good";
			while ( $row = mysqli_fetch_assoc($r)) {
				//var_dump($row);
				//echo "good1";
				$i = 0;
				$v.= '<tr>';
				foreach ($row as $a) {
					$v .= '<td>'.$a.'</td>';
				}
				$v .= '</tr>';
			}
			$v .= '</table>';
			//echo "good2";
			//var_dump($vyvod);
			return $v;
		}
	}
}

//$link = mysqli_connect('localhost', 'root', '', 'lab2_1');
$timeS = microtime(TRUE);
$enter_to_page = run_sql($_POST['sql'], mysqli_connect('mariadb', 'root', 'password', 'test'));
$time = microtime(TRUE) - $timeS;
echo 'Время выполнения команды: '.$time.'<br>'.$enter_to_page;
?>

