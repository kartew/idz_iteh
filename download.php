<?php
$filename = $_POST['books'];
$file_extension = strtolower(substr(strrchr($filename, "."), 1));

if ($filename == "") {
    echo "ОШИБКА: УКАЖИТЕ ИМЯ ФАЙЛА.";
    exit;
} elseif (!file_exists($filename)) // проверяем файл на существование
{
    echo "ОШИБКА: данного файла не существует.";
    exit;
};

$ctype = "application/force-download";

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
header("Content-Transfer-Encoding: binary");
// нужно сделать подсчет размера файла его пути
header("Content-Length: " . filesize($filename));
readfile("$filename");
//exit();
?>