<?php
/*
1) Необходимо посчитать кол-во жанров
Для этого мы можем создать отдельный массив с жанрами и посчитать количество элементов в таком массиве. Используйте цикл foreach для перебора массива $discorgaphy, чтобы создать новый массив нужного вам вида.
2) Необходимо посчитать кол-во исполнителей
Для этого мы можем создать отдельный массив с исполнителями и посчитать количество элементов в таком массиве
Используйте цикл foreach для перебора массива $discorgaphy, чтобы создать новый массив нужного вам вида.
3) Необходимо удалить все альбомы, датированные 2000-ым годом
4) Необходимо посчитать количество всех альбомов в жанре trip-hop
Для этого нам нужно сделать массив следующей иерархии:
---> Жанр (ключ)
-------------> Название альбома (ключ) ---> подмассив остальных данных (значение)
Для того чтобы получить такой массив нам нужно через foreach пройтись по массиву $discogrpahy и в рамках выполнения итераций цикла сформировать новый массив вида, как указано выше.
Далее в сформированном массиве нужно через ключ ['trip_hop'] получить подмассив всех альбомов в этом жанре, и посчитать кол-во элементов данного массива.
5) Необходимо посчитать количество всех исполнителей, которые выпускали альбомы в 1994 году
Для этого нам нужно сделать массив следующей иерархии:
--> Год выпуска (ключ)
-------------------------> Исполнитель (ключ) ------> подмассив остальных данных
6) Необходимо определить альбом с наибольшим и наименьшим количеством композиций и вывести эти две цифры
7) Необходимо преобразить массив, сгруппировав данные в определенной иерархии
--> Год выпуска (ключ)
-------------------------> Жанр (ключ)
--------------------------------------> Исполнитель+Название альбома (ключ) -----> Кол-во композиций (значение)
Итого, у нас должен получиться массив с глубиной в три индекса: [год выпуска][жанр][исполнитель+название альбома].
*/
$discography = array(
    array('id' => '12','year' => '1994','band' => 'Pink Floyd','genre' => 'rock','name' => 'Division Bell','count_songs' => '10'),
    array('id' => '13','year' => '1989','band' => 'Nirvana','genre' => 'grunge','name' => 'Bleach','count_songs' => '11'),
    array('id' => '14','year' => '1991','band' => 'Nirvana','genre' => 'grunge','name' => 'Nevermind','count_songs' => '13'),
    array('id' => '15','year' => '1993','band' => 'Nirvana','genre' => 'grunge','name' => 'In Utero','count_songs' => '12'),
    array('id' => '16','year' => '1991','band' => 'Pearl Jam','genre' => 'grunge','name' => 'Ten','count_songs' => '12'),
    array('id' => '17','year' => '1993','band' => 'Pearl Jam','genre' => 'grunge','name' => 'Vs.','count_songs' => '10'),
    array('id' => '18','year' => '1994','band' => 'Pearl Jam','genre' => 'grunge','name' => 'Vitalogy','count_songs' => '12'),
    array('id' => '19','year' => '1996','band' => 'Pearl Jam','genre' => 'grunge','name' => 'No Code','count_songs' => '9'),
    array('id' => '20','year' => '1993','band' => 'Radiohead','genre' => 'rock','name' => 'Pablo Honey','count_songs' => '12'),
    array('id' => '21','year' => '1995','band' => 'Radiohead','genre' => 'rock','name' => 'The Bends','count_songs' => '12'),
    array('id' => '22','year' => '1997','band' => 'Radiohead','genre' => 'rock','name' => 'OK Computer','count_songs' => '1997'),
    array('id' => '23','year' => '2000','band' => 'Radiohead','genre' => 'rock','name' => 'Kid A ','count_songs' => '14'),
    array('id' => '24','year' => '1994','band' => 'Portishead','genre' => 'trip-hop','name' => 'Dummy','count_songs' => '8'),
    array('id' => '25','year' => '1997','band' => 'Portishead','genre' => 'trip-hop','name' => 'Portishead','count_songs' => '9'),
    array('id' => '26','year' => '1991','band' => 'Massive Attack','genre' => 'trip-hop','name' => 'Blue Lines','count_songs' => '12'),
    array('id' => '27','year' => '1994','band' => 'Massive Attack','genre' => 'trip-hop','name' => 'Protection','count_songs' => '15'),
    array('id' => '28','year' => '1998','band' => 'Massive Attack','genre' => 'trip-hop','name' => 'Mezzanine','count_songs' => '9'),
    array('id' => '29','year' => '1995','band' => 'Tricky','genre' => 'trip-hop','name' => 'Maxinquaye','count_songs' => '11'),
    array('id' => '30','year' => '1998','band' => 'Tricky','genre' => 'trip-hop','name' => 'Angels with Dirty Faces','count_songs' => '10'),
    array('id' => '31','year' => '1993','band' => 'The Roots','genre' => 'hip-hop','name' => 'Organix!','count_songs' => '11'),
    array('id' => '32','year' => '1995','band' => 'The Roots','genre' => 'hip-hop','name' => 'From the Ground Up','count_songs' => '13'),
    array('id' => '33','year' => '1996','band' => 'The Roots','genre' => 'hip-hop','name' => 'Illadelph Halflife','count_songs' => '15'),
    array('id' => '34','year' => '1999','band' => 'The Roots','genre' => 'hip-hop','name' => 'Things Fall Apart','count_songs' => '14'),
    array('id' => '35','year' => '1999','band' => 'The Roots','genre' => 'hip-hop','name' => 'The Legendary','count_songs' => '7'),
    array('id' => '36','year' => '1994','band' => 'Oasis','genre' => 'rock','name' => 'Definitely Maybe','count_songs' => '12'),
    array('id' => '37','year' => '1995','band' => 'Oasis','genre' => 'rock','name' => '(What\'s the Story) Morning Glory?','count_songs' => '11'),
    array('id' => '38','year' => '1997','band' => 'Oasis','genre' => 'rock','name' => 'Be Here Now','count_songs' => '10'),
    array('id' => '39','year' => '2000','band' => 'Oasis','genre' => 'rock','name' => 'Standing on the Shoulder of Giants','count_songs' => '13')
);
//1
foreach ($discography as $album){
    $genre[] = $album['genre'];
    //можно было сделать внутри цкла $genre[$album['genre']] = $album['genre']; и после сделать count().
}
echo '<p>1) Количество музыкальных стилей - '. count(array_unique($genre)).'</p>';

//2
foreach ($discography as $album){
    $singer[] = $album['band'];
}
echo '<p>3) Кол-во исполнителей - '. count(array_unique($singer)).'</p>';

//3) Необходимо удалить все альбомы, датированные 2000-м годом
$no2000Year = array();
foreach ($discography as $vinil=>$album){
    $albumYear = $album['year'];
//В условие надо делать проверку наличия данного ключа if ($album['year']=='2000'&& isset($discography[$vinil]))
    if ($albumYear == '2000'){

        unset($vinil); //Слетает значение которое оказывает количество trip-hop... почему?


    }

    $no2000Year[$vinil] = $album;

}
echo '<p> 3) Удаление массивов с годом 2000</p><pre>';
//var_dump($no2000Year);


/*4) Необходимо посчитать количество всех альбомов в жанре trip-hop
Для этого нам нужно сделать массив следующей иерархии:
---> Жанр (ключ)
-------------> Название альбома (ключ) ---> подмассив остальных данных (значение)
Для того чтобы получить такой массив нам нужно через foreach пройтись по массиву $discogrpahy и в рамках выполнения итераций цикла сформировать новый массив вида, как указано выше.
Далее в сформированном массиве нужно через ключ ['trip_hop'] получить подмассив всех альбомов в этом жанре, и посчитать кол-во элементов данного массива.*/


$arrayForCountTripHop = array();

foreach ($discography as $album) {
    $nameGenre = $album['genre'];//rock
    $nameAlbum = $album['name'];//all song rock

    $arrayForCountTripHop[$nameGenre][$nameAlbum] = $album;
/*можно было сделать через if($album['genre']== 'trip-hop'){
                                $i++(вне цикла надо было создать переменную - $i=0;)
                           }*/
}
$countTripHop = count($arrayForCountTripHop['trip-hop']);
//echo '<pre>';
//var_dump($arrayForCountTripHop);
//echo '<pre>';
//var_dump($countTripHop);
echo '<p>4) Кол-во элементов в подмассиве trip_hop - '.$countTripHop.'</p>';
/*5) Необходимо посчитать количество всех исполнителей, которые выпускали альбомы в 1994 году
Для этого нам нужно сделать массив следующей иерархии:
--> Год выпуска (ключ)
-------------------------> Исполнитель (ключ) ------> подмассив остальных данных*/
$albumFrom1994 = array();
foreach($discography as $album){
    $yearToRelease = $album['year'];
    $albumName = $album['band'];

    $albumFrom1994[$yearToRelease][$albumName] = $album;

}
$countYeare = count($albumFrom1994['1994']);
echo '<p>5) Кол-во элементов в подмассиве c годом 1994 - '.$countYeare.'</p>';

/*6) Необходимо определить альбом с наибольшим и наименьшим количеством композиций и вывести эти две цифры*/
$maxMin = array();
foreach ($discography as $album=>$value){

    $maxMin[$album] = $value['count_songs'];


}
$intMax = max($maxMin);
$intMin = min($maxMin);

echo '<p>Минимум композиций - '.$intMin.'</p>';
echo '<p>Максимум композиций - '.$intMax.'</p>';

/*7) Необходимо преобразить массив, сгруппировав данные в определенной иерархии
--> Год выпуска (ключ)
-------------------------> Жанр (ключ)
--------------------------------------> Исполнитель+Название альбома (ключ) -----> Кол-во композиций (значение)
Итого, у нас должен получиться массив с глубиной в три индекса: [год выпуска][жанр][исполнитель+название альбома].*/

$newArrayExs7 = array();

foreach($discography as $album){
    $arrayGenre = $album['genre'];
    $arrayBandAndName = $album['band'].' + '.$album['name'];
    $arrayContSong = $album['count_songs'];

    $newArrayExs7[$arrayGenre][$arrayBandAndName] = $arrayContSong;
}
echo '<pre>';
var_dump($newArrayExs7);
