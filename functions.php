<?php
    //Преобразует строку числа типа '1234'
    //в строковую фразу типа 'Одна тысяча двести дридцать четыре'
    function numStr2phrase($input){
        $output = 'Зашёл в numStr2phrase';
        $classes = num2classes($input);
        $classCount = count($classes);

        if($classCount == 1 && $classes[0] == 0){
            $output = 'ноль';
        }
//         else{
            
//             $output = 'Введён не 0';
//             foreach($classes as $key => $class){
//                 if($class != 0){
//                     $output = 'класс != 0';
// //                     $output .= ' ' . classNum2words($class);
// //                     $classId = $classCount - $key - 1;
// //                     $output .= getClassEnding($classId, $class);
//                 }
//             }
//         }
// //         $output = trim($output);
// //         $firstChar = mb_substr($output, 0, 1);
// //         return $output = mb_strtoupper($firstChar) . mb_substr($output, 1);
        
        return $output;
    }

    //Преобразует строку числа типа '1234'
    //в массив классов чисел типа [1, 234]
    function num2classes($num){
        $strLen = strlen($num);
        $firstGroupLen = strlen($num) % 3;
        if($firstGroupLen == 0){
            $firstGroupLen = 3;
        }
        $groups[0] = intval(substr($num, 0, $firstGroupLen));

        if($strLen != $firstGroupLen){
            for($i = $firstGroupLen; $i < $strLen; $i=$i+3){
                array_push($groups, intval(substr($num, $i, 3)));
            }
        }
        return $groups;
    }

//     //преобразует строку класса числа типа '123'
//     //в текстовое выражение типа ['сто', 'двадцать', 'три']
//     function classNum2words($classNum){
//         $classPhrase = [];
//         $numWords = [
//             [
//                 'од',
//                 'дв',
//                 'три',
//                 'четыре',
//                 'пять',
//                 'шесть',
//                 'семь',
//                 'восемь',
//                 'девять'
//             ],[
//                 'двадцать',
//                 'тридцать',
//                 'сорок',
//                 'пятьдесят',
//                 'шестьдесят',
//                 'семьдесят',
//                 'восемьдесят',
//                 'девяносто'
//             ],[
//                 'сто',
//                 'двести',
//                 'триста',
//                 'четыреста',
//                 'пятьсот',
//                 'шестьсот',
//                 'семьсот',
//                 'восемьсот',
//                 'девятьсот',
//             ],[
//                 'десять',
//                 'одинадцать',
//                 'двенадцать',
//                 'тринадцать',
//                 'четырнадцать',
//                 'пятнадцать',
//                 'шестнадцать',
//                 'семнадцать',
//                 'восемнадцать',
//                 'девятнадцать'
//             ]
//         ];

//         if($classNum >= 100){
//             $hundredsVal = intdiv($classNum, 100);
//             array_push($classPhrase, $numWords[2][$hundredsVal-1]);
//             $classNum = $classNum % 100;
//         }

//         if($classNum >= 20){
//             $tensVal = intdiv($classNum, 10);
//             array_push($classPhrase, $numWords[1][$tensVal-2]);
//             $classNum = $classNum % 10;
//         }
//         elseif($classNum >= 10){
//             array_push($classPhrase, $numWords[3][$classNum % 10]);
//             $classNum = 0;
//         }

//         if($classNum > 0){
//             array_push($classPhrase, $numWords[0][$classNum-1]);
//         }

//         return implode(' ', $classPhrase);
//     }

//     //Возвращает окончание назавние класса (например, для числа 1 234)
//     //типа ['a', 'тысяч', 'а']
//     function getClassEnding($classId, $class){
//         $digitVal = $class % 10;
//         $twoDigitVals = $class % 100;
//         if($twoDigitVals < 10 || $twoDigitVals > 20){
//             $numWordEnding = getUnitEnding([$classId, $digitVal], 0);
//         }
//         else{
//             $numWordEnding = '';
//         }
//         $className = getUnitEnding([$classId], 1);
//         $classNameEnding = getUnitEnding([$classId, $digitVal], 2);
        
//         return $numWordEnding . ' ' . $className . $classNameEnding;
//     }

//     //Возвращает окончание для элемента указанного типа в $unitType:
//     //0 - окончание чисельника;
//     //1 - название класса чисел;
//     //2 - окончание названия класса чисел.
//     //$values - указанные параметры типа [$classId, $lastNumDigit], или [$classId],
//     //в зависимости от $unitType и соответствующего правила.
//     function getUnitEnding($values, $unitType){
//         //Правила определения названия класса вида [classId, digitVal, numWordEnding].
//         //'' для classId и digitVal означает любое значение, не включеное в предыдущие правила.
//         //[min, max] для classId и digitVal означает диамазон.
//         $numWordEndingRules = [
//             [1, 1, 'на'],
//             ['', 1, 'ин'],
//             [1, 2, 'е'],
//             ['', 2, 'а'],
//             ['', '', '']
//         ];

//         //Правила определения названия класса вида [classId, className].
//         //'' для classId означает любое значение, не включеное в предыдущие правила.
//         //[min, max] для classId означает диамазон.
//         $classNameRules = [
//             [0, ''],
//             [1, 'тысяч'],
//             [2, 'миллион'],
//             [3, 'миллиард'],
//             ['', 'чего-то']
//         ];

//         //Правила определения названия класса вида [classId, digitVal, ending].
//         //'' для classId и digitVal означает любое значение, не включеное в предыдущие правила.
//         //[min, max] для classId и digitVal означает диамазон.
//         $classNameEndingRuls = [
//             [0, '', ''],
//             [1, 1, 'а'],
//             [1, [2, 4], 'и'],
//             [1, '', ''],
//             [2, 1, ''],
//             [2, [2, 4], 'a'],
//             [2, '', 'ов'],
//             [3, 1, ''],
//             [3, [2, 4], 'a'],
//             [3, '', 'ов'],
//             ['', '', ''],
//         ];

//         $rules = [$numWordEndingRules, $classNameRules, $classNameEndingRuls][$unitType];
//         $maxValueId = count($values) - 1;

//         foreach($rules as $rule){

//             foreach($values as $valueId => $value){
//                 $ruleVal = $rule[$valueId];
                
//                 if(!compPar($ruleVal, $value)){
//                     break;
//                 }
//                 elseif($valueId == $maxValueId){
//                     $unitEnding = $rule[$maxValueId + 1];
//                 }
//             }

//             if(isset($unitEnding)){
//                 break;
//             }
//         }

//         return $unitEnding;
//     }
    
//     //проверяет, удовлетворяет ли фактическое значение $factVal зачению из правила $ruleVal
//     function compPar($ruleVal, $factVal){
//         if(gettype($ruleVal) != 'array'){
//             $isParMatch = ($ruleVal == $factVal || $ruleVal === '');
//         }
//         else{
//             $isParMatch = ($factVal >= $ruleVal[0] && $factVal <= $ruleVal[1]);
//         }
//         return $isParMatch;
//     }
?>
