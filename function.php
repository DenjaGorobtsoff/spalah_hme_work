<?php

function hello($a){
    return 'Hi! '.$a;
}
$i = 'World=)';
//echo hello($i);

/*1. Необходимо вывести на экран строку с количеством товаров следующего вида: "N товаров", где N - количество товаров. Нужно написать функцию, которая будет формировать строку с выводом в правильном склонении в зависимости от числа.

Аргументом у такой функции будет число и в зависимости от этого числа должно определяться правильное склонение слова "товар". Например, в функцию передаём число 3, результатом должен быть вывод "3 товара". Передаём число 31, результатом будет "31 товар".

2. Необходимо написать функцию, которая будет в аргументе принимать строку и переворачивать её (делать зеркальной) и возвращать полученный результат. При этом нельзя использовать стандартную функцию PHP strrev .

3. Необходимо написать функцию, которая будет работать аналогично функции PHP array_unique

4. Необходимо написать функцию, которая будет работать аналогично функции PHP array_chunk

5. Необходимо написать функцию, которая будет работать аналогично функции PHP array_diff

6. Необходимо написать функцию, которая будет преобразовывать строку Фамилия Имя Отчество в краткую запись Фамилия И.О.

Например, передаём в функцию строку "Иванов Иван Иванович", а функция возвращает строку "Иванов И. И."

7. Необходимо написать функцию, которая будет определять мобильного оператора, исходя из полученного номера телефона

Формат мобильного телефона: +380ХХ9999999
Операторы: 097 - Киевстар, 099 - Vodafone, 093 - Lifecell

Например, передаём в функцию строку +380991111111, функция возвращает "Vodafone"*/

//1 Кол-во товаров
function countGoods($goodsName){

    if(is_int($goodsName)){
        $w = strlen($goodsName)-1;
        $e = substr($goodsName,$w);

        if($goodsName<=20&&$goodsName%10==true)
            $goodsName = 'товаров';
            echo 'hi+++++ ';
        if (strrchr($e,'1') == true)
            $goodsName = 'товар';
            echo 'hi1 ';

        if (strrchr($e,'2')||strrchr($e,'3')||strrchr($e,'4'))
            $goodsName = 'товара';
            echo 'hi234 ';
        var_dump($w,$e);

    }else {

    echo 'Only numbers';

}


    return $goodsName;
}
$i = 40;
echo $i.' '.countGoods($i);

//2 перевертыш

function stringMirror($str){
    $e='';
    $a = mb_strlen($str)-1;
    for($i=$a;$i>=0;$i--) {

        $e .= mb_substr($str, $i, 1);
    }
    return $e;
}
$str = 'привет человеки';
//echo stringMirror($str);



//3) array_unique


function arrayUnique($arrFlip){
    $findArray = array();
    foreach($arrFlip as $key=>$value){
        if(isset($findArray[$value])){
            continue;
        }else{
            $findArray[$value]=$key;
        }
    }
    $findArray = array_flip($findArray);
    return $findArray;
}
$arr = array('good','bad','read','see','book','see','good');

//var_dump(arrayUnique($arr));

//4) array_chunk - Делит массив на заданное количество частей

function arrayChunk($array,$pats){
    $n=0;
    $i=0;
    $chunkArray = array ();
    $pats = ceil(count($array)/$pats);

    foreach($array as $value){
        if($i<$pats){
            $chunkArray[$n][$i] = $value;
            $i++;
        }else{
            $n++;
            $i=0;
            $chunkArray[$n][$i] = $value;
            $i++;

        }

    }
   return $chunkArray;

}
$array = array ('good','bad','read','all','book','see','yes');
//echo arrayChunk($array,3);

//var_dump(arrayChunk($arr,3));



function myArrDiff($array, $array1){
    $newArray = array();
    foreach($array as $key => $value){
        if(!in_array($value, $array1)){
            $newArray[$key] = $value;
        }
    }
    return $newArray;
}
$array = array ('good','bad','read','all','book','see','yes');
$array1 = array('good','book','yes');
var_dump(myArrDiff($array, $array1));

//6) Фамилия И.О.

$name = 'Горобцов Денис Михайлович';
function changeFirstName($firstName){
    if(is_string($firstName)){
        $fistDo = ltrim($firstName);
        $arrayPieceseName = explode(' ',$fistDo);
        $name = $arrayPieceseName['1'];
        $soName = $arrayPieceseName['2'];
        $firstName = $arrayPieceseName['0'].' '.mb_substr($name,0,1).'. '.mb_substr($soName,0,1).'.';
    }
    return $firstName;
}
//echo changeFirstName($name);

//7) Telefone

function telefoneOperator($call){
    $clearNumber = ltrim($call);//Сделать через массив! if(isset(key)) array([key]=>'OPERATOR')
    $operator = array ('097'=>'Kievstar','067'=>'Kievstar','098'=>'Kievstar','050'=>'Vodafone','095'=>'Vodafone','066'=>'Vodafone','099'=>'Vodafone','093'=>'Lifecell','063'=>'Lifecell','068'=>'Lifecell');
    $phoneOpert = substr($clearNumber,3,3);
    if(isset($phoneOpert,$operator[$phoneOpert])){
        return 'You choose - '.$operator[$phoneOpert];
    }else{
        return 'Please check if your phone number was filled in properly!';
    }

    /*if ($phoneOpert == '099'|| $phoneOpert == "095" || $phoneOpert == '066' || $phoneOpert == '050') {
        return 'You choose - Vodafone =)';
    }
    if ($phoneOpert == '097'|| $phoneOpert == "067" || $phoneOpert == '098'){
        return 'You choose - Kievstar =)';
    }
    if ($phoneOpert != true);{
        return 'Please check if your phone number was filled in properly!';
    }*/

 }
$call = '+380914498220';
//echo '<br>'.telefoneOperator($call);
