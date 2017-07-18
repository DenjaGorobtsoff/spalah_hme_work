<?php
//1)
$newYear2017 =  strtotime("31 december 2017");
$tooday = time();
$howMuch = ($newYear2017-$tooday)/60;
echo ceil($howMuch).' - Новый год через<br>';/// New Year 2018


$lastDaySummer = strtotime("last day of August 2017")-time();
echo $lastDaySummer.' - До конца лета (секунд) '.'<br>';

$nextMonday = ceil((strtotime("next Monday")-time())/60/60);
echo $nextMonday.' - Часов до следующего понедельника <br>';
//2)

/*$date1 = time();
$date1 = new DateTime('2010-02-25');
$date2 = new DateTime("2014-02-22");
$howMuchPr = date_diff($date2,$date1);*/

$date = strtotime('2014-02-22');
$date1 = strtotime('2010-02-25');
$date2 = $date - $date1;
echo '<p>2) Столько секунд у власти был Янукович '.$date2.'</p>';

//3)
function monday21june($year){
    //$yearFist = new DateTime("$year") ;
    $counYear = $year;
    $n=0;
    for($i=10;$i>=1;$i--){

        $yearFist = getdate(strtotime("21 june $counYear"));
            if($yearFist['weekday'] == "Monday"){
                $n++;
            }

        $counYear--;


    }
    ///$yearFist = strtotime("21 june $year");
    return '<p>C '.$year.' и по '.$counYear.' было понедельников '.$n.'</p>';


}
$y = '2017';
echo monday21june($y);
// 4)

function myHaBi($year){
    $myHappyBirthday = getdate(strtotime("6 August $year"));
    return '<p>My Birthday will be on - '.$myHappyBirthday['weekday'].'</p>';

}
$z = '2017';
echo myHaBi($z);

//5)
function upYear($bigYear){
    $count = $bigYear;
    $q=0;
    for ($myDay=1986;$count>$myDay;$myDay++){
        $upYear = getdate(strtotime("29 February $myDay"));
        if ($upYear['mday']== 29 && $upYear['month']=="February"){
            $q++;

        }
    }


    return '<p>Высокостный год, с момента моего рождения, был '.$q.' раз(а)</p>';

}

echo upYear($z);
