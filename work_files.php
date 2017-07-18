<?php

function rightTxt($filePath){

    if(is_dir($filePath)){
        $folderDir = scandir($filePath);
        //$fileInfo = new SplFileInfo($folderDir);
    }else{
        return "This way not a DIR!!!";
    }
    $i=0;
    $arrInfoFile = array ();
    foreach($folderDir as $key=>$value) {
        if (is_file($filePath . "\\" . $value)) {
            //$fileInfo = new SplFileInfo($filePath."\\".$value);
            $arrInfoFile[$i] = $filePath . "\\" . $value;
            $i++;
        }
    }
    foreach($arrInfoFile as $value){
        $size = filesize($value);// Размер
        $type = filetype($value);// Тип файла
        //$infoForWriteFile = $size.' kb | '.$type."| \n";
        if(is_file($value)) {
            $fileWright = $filePath . '\scan_result.txt';//путь к файлу в который записываем данные
            $infoForWriteFile = file_get_contents($fileWright);
            $infoForWriteFile .= "$size kb | $type | \n";
            file_put_contents($fileWright,$infoForWriteFile);

            //$writeToFileInfo = fopen($fileWright, 'a');//открывает файл для записи
            //fwrite($writeToFileInfo, "Тестовая запись 2\n");//write to file
            //fclose($writeToFileInfo);//close file
        }else{
            echo 'Some problems!';
        }
        //$readFile = file_get_contents($fileWright);
        //$readFile .= $size.'kb |'.$type."|"."\n";
        //$readyContent = file_put_contents($fileWright,$readFile);


        //fwrite($fileWright,$size.'|'.$type."|"."\n");
        //fclose($fileWright);//break;
    }

return $fileWright;
//var_dump($arrInfoFile,$i,$folderDir);

}
//$way = 'D:\OpenServer\OpenServer\domains\localhost\app';

//echo rightTxt($way);

//2)рекурсия
function foldersAndFiles ($dir, $do, $newdir = null){
    if (is_dir($dir)){
        $scanFolder = scandir($dir);
        $cleanArray = array_diff($scanFolder,array('.','..'));
    }else{
        return "This way not a DIR!!!";
    }
    if($do == 'delete'){
        $f=0;
        $fl=0;
        foreach ($cleanArray as $value){
            $myFolderAndFiles = $dir.'\\'.$value;
            //echo substr(sprintf('%o', fileperms($myFolderAndFiles)), -4);
            //echo '<br>';
            //chmod($myFolderAndFiles, 0777);

            if(is_file($myFolderAndFiles)){
               //$notEmpty = $dir.'\\'.$value;
              unlink($dir.'\\'.$value);
                $f++;
            }
            if(is_dir($myFolderAndFiles)){
                rmdir($dir.'\\'.$value);
                $fl++;
            }
        }
        return 'All files DELETE!Files Delete - '.$f.'. Folders Delete - '.$fl;
    }
    if ($do == 'remove'){
        foreach($cleanArray as $removeFilesFoldelrs){
            $inside = $dir.'\\'.$removeFilesFoldelrs;
            if (is_dir($inside)){
                rename($inside,$newdir.$removeFilesFoldelrs);
            }else if (is_file($inside)) {
                rename($inside, $newdir . $removeFilesFoldelrs);
            }
        }
        return 'All files and folders were put to folder with name REMOVE.';
    }

}
$d = 'delete';
$r = 'remove';
$removeDir = 'D:\OpenServer\OpenServer\domains\localhost\app\REMOVE\\';
$nDir = 'D:\OpenServer\OpenServer\domains\localhost\app\img';
echo foldersAndFiles ($nDir,$r,$removeDir);
//var_dump(foldersAndFiles ($newDir,$i));

//3)Картинка
function image($link){
    $fileLink = file_get_contents($link);
    $typeFile = substr($link,-4);
    $file = substr($link,0,-4);
    $imgName = explode('/',$file);
    $countName = count($imgName)-1;


    if($typeFile == '.png'){
        file_put_contents('D:\OpenServer\OpenServer\domains\localhost\app\img\\'.$imgName[$countName].'.png',$fileLink);

    }elseif($typeFile == '.jpg'){
        file_put_contents('D:\OpenServer\OpenServer\domains\localhost\app\img\\'.$imgName[$countName].'.jpg',$fileLink);
    }else{
        echo 'Данный формат фала не поддерживается.';
    }
}
$image = 'https://i.ytimg.com/vi/XzKw20xOUVU/maxresdefault.jpg';
//echo '<pre>';
//image($image) ;
//echo $img;

//4) Сайт
$site = "https://tlgrm.ru/stickers";
function getSite($url){
    $siteWork = file_get_contents($url);

    if(is_string($siteWork)){
        $siteWork = htmlentities($siteWork);
        $newArray = count(explode("/h1",$siteWork));//кол-во тегов /h1
    }    else{
        echo "Some wrong!";
    }
    $titleTegs = explode("title",$siteWork);
    $titleTegs1 =trim($titleTegs[1],"/ &gt; &lt");//текст заключенный в title

    $countAll = file_get_contents($url);
    $countAll1 = strlen(htmlentities($countAll));
    $countClear = strlen(strip_tags($countAll));
    $htmlTegsCount = $countAll1 - $countClear;//Кол-во тегов HTML

    $writeResult = fopen('D:\OpenServer\OpenServer\domains\localhost\app\scan_result.txt','a');
    fwrite($writeResult, " Тегов Н1 в тексте ".$newArray." | Текст заключенный в title ".$titleTegs1." | Кол-во тегов HTML ".$htmlTegsCount."|\n");
    fclose($writeResult);
    return  $htmlTegsCount;
}
//echo getSite($site) ;
?>

<hr>
<hr>
<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" action="__URL__" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
<hr>
