<?php

/*Пути к файлам*/
$pathFile = opendir('all');
$file = readdir($pathFile);

/* Для замены в файлах с определенным названием($find)
*строки ($mainString) и замены ее на необходиму($changeString) */
$find = 'diagnostics';
$mainString = '';
$changeString = '';


while (($file = readdir($pathFile)) !== false) {
    if (strpos($file, $find) === false) {
        $way = 'all/' . $file;
         unlink($way);        
        }
        $way = 'all/' .$file;   
         $content = file_get_contents($way);

         if (strpos( $content, $mainString) !== false) {

             str_replace($mainString,$changeString, $content);

             file_put_contents( $way , str_replace($mainString,$changeString, $content));
         }
}

closedir($pathFile);
?>