<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Num2Words</title>
</head>
<body>
    <?php
        //include('functions.php');
        if(isset($_POST['input'])){
            $input = $_POST['input'];

            if($input != ''){
                //$output = numStr2phrase(preg_replace('|[^0-9]|', '', $input));
                $output = $input . '_lalala';
                
            }
        }

    ?>
    <form action="#" method="post">
        <p>Введите число для конвертации в текст</p>
        <input type="text" name="input" width="500px" value="<?php if(isset($input)) echo($input);?>">
        <input type="submit" value="Конвертировать">
    </form>
    <?php
        if(isset($output)){
            print_r ($output);
        }
    ?>
</body>
</html>
