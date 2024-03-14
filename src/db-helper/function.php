<?php
function enter_to_db_helper($f) {
	return '<form action="'.$f.'" method="post">
				Логин: <input type="text" name="login" />
				Пароль: <input type="password" name="password" />
				<input type="submit" value="Войти" name="log_in" />
			</form>';
}
function exit_db_helper($f) {
	return '<form action="'.$f.'" method="post">
				<input type="submit" value="Выйти" name="vyhod" />
			</form><br>';
}
function option($f, $stolb, $str, $raz) {
	$r = '<input type="submit" value="Сохранить" name="saveopt" onclick="s()"><br>
          <input type="submit" value="Загрузить" name="loadopt" onclick="l()">';
	if(isset($_SESSION['savestolb'])) {
		$r .= '<select id="select">';
		$keys = array_keys($_SESSION['savestolb']);
		foreach ($keys as $k) {
			$r .= '<option value="'.$k.'">'.$k.'</option>';
		}
		$r .= '</select>';
	}
	$r .= '<br>Столбцов: <input value="'.$stolb.'" id="stolb"><br>
            Строк: <input value="'.$str.'" id="str"><br>
            Размер шрифта: <input value="'.$raz.'" id="raz"><hr>
            <input type="submit" value="Старт!" name="startopt" onclick="r()">';
	return $r;
}

function area($stolb, $str) {
	return '<form id="ajax_form" action="" method="post">
				<textarea cols="'.$stolb.'" rows="'.$str.'" id="text"># Поле для SQL-запроса</textarea><br>
				<input type="submit" value="Старт!" name="startarea" onclick="getResult()"/>
			</form>';
}
?>

