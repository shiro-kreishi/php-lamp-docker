<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>SQL-помощник</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <?php
    include 'function.php';
    $file = 'action.php';
    if (!isset($_SESSION['actualstolb'])) {
        $_SESSION['actualstolb'] = 40;
        $_SESSION['actualstr'] = 5;
        $_SESSION['actualraz'] = 12;
    }
    ?>
    <style>
        textarea {
            resize: none;
            font-size: <?php echo $_SESSION['actualraz'];?>px;
        <!--font-family: monospace;-->
        }
    </style>
</head>
<body>
<?php
if (!isset($_SESSION['user'])) {
    echo enter_to_db_helper($file);
}
else {
    echo exit_db_helper($file);
    echo option($file, $_SESSION['actualstolb'], $_SESSION['actualstr'], $_SESSION['actualraz']);
    echo area($_SESSION['actualstolb'], $_SESSION['actualstr']);
    ?>
    <div id="SqlResult"></div>
    <?php
    //echo $_SESSION['actualstolb'];
}
?>
<script>
    function getResult(){
        $('#ajax_form').submit((event) => {
            event.preventDefault();
        });
        let text = $('#text').val();
        //let text = document.getElementById('text');
        $.ajax({
            type: "post",
            dataType: "html",
            url: "sql.php",
            //data: jQuery("#ajax_form").serialize(),
            data:{'sql': document.getElementById('text').value},
            //data:{'sql': text.value.substr(text.selectionStart, text.selectionEnd)},
            success: function(response) {
                //$("#SqlResult").html( result );

                //result = jQuery.parseJSON(response);
                //document.getElementById('SqlResult').value = response;//result.vyvod;
                $('#SqlResult').html(response);
                //alert(response)
                console.log( response);
            }
        })
        console.log( document.getElementById('text').value);
    }
    console.log( text);
    function s(){
        var name = prompt('Введите имя сохранения',1);
        //let stolb = $('#stolb').val();
        //let str = $('#str').val();
        //let raz = $('#raz').val();
        if (name !== null) {
            //alert(name);
            $.ajax({
                type: "post",
                dataType: "html",
                url: "action.php",
                //data: jQuery("#ajax_form").serialize(),
                data:{'save': name, 'stolb': document.getElementById('stolb').value , 'str': document.getElementById('str').value, 'raz': document.getElementById('raz').value},
                //data:{'sql': text.value.substr(text.selectionStart, text.selectionEnd)},
                success: function(response) {
                    location.reload ();
                }
            })
        }
    }
    function l(){
        let sel = document.getElementById('select');
        $.ajax({
            //alert(sel);
            type: "post",
            dataType: "html",
            url: "action.php",
            //data: jQuery("#ajax_form").serialize(),
            data:{'load': sel.value},
            success: function(response) {
                location.reload ();
            }
            //data:{'sql': text.value.substr(text.selectionStart, text.selectionEnd)},
        })
    }
    function r() {
        $.ajax({
            type: "post",
            dataType: "html",
            url: "action.php",
            //data: jQuery("#ajax_form").serialize(),
            data:{'startopt': 1, 'stolb': document.getElementById('stolb').value, 'str': document.getElementById('str').value, 'raz': document.getElementById('raz').value},
            //data:{'sql': text.value.substr(text.selectionStart, text.selectionEnd)},
            success: function(response) {
                location.reload ();
            }
        })
    }
</script>
</body>
</html>
