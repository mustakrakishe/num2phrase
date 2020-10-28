<?php
    $token = '1129760319:AAHggO0wzgA4_Rl8qkbYq3nUdYSDrR0fT5g';
    include ('functions.php');

    function bot($method, $datas=[]){
        global $token;
        $url = "https://api.telegram.org/bot" . $token . "/" . $method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            var_damp(curl_error($ch));
        }
        else{
            return json_decode($res);
        }
    }

    //Methods

    $update = json_decode(file_get_contents('php://input'));
    $message = $update->message;
    $text = $message->text;
    $fid = $message->from->id;
    $cid = $message->chat->id;
    $nom = $message->from->first_name;
    
    $answer = '';
    switch($text){
        case '/start':
            $answer =  
                'Привет. Я повторяю введёное тобой число словами. Попробуй ввести любое целое число.'
                . "\n" . '(P.s.: для справки - введи /help)';
            break;

        case '/help':
            $answer =  'Введите любое целое число, нарпимер, "123"'
                    . "\n" . 'Бот ответит фразой "Сто двадцать три".'
                    . "\n" . 'Допускается произвольное количество цифр и любой разделитель разрядов.'
                    . "\n" . 'Максимальный класс чисел бот знает "миллиард". Всё, что больше, бот будет называть "чего-то". Попробуйте ввести 1 000 000 000 000.';
            break;

        default:
            $answer = numStr2phrase(preg_replace('|[^0-9]|', '', $text));
    }
    
    bot(
        'sendmessage',
        [
            'chat_id'=>$cid,
            'text' => $answer
        ]
    );
?>
