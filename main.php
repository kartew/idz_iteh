<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Все файлы</title>
</head>
<body>

<h2>Все файлы на сервере: </h2>

<?php
$upload_path = 'books/';

$files = scandir($upload_path);
if (count($files) < 3) {
    echo "Нет файлов!";
}

echo '<ol>';
for ($file = 2; $file < count($files); $file++) {
    $file_name = $files[$file];
    $row = sub_file_name($file_name);
    $all_path = "{$upload_path}{$file_name}";
    $line = "<a href=\"$all_path\">$row</a>";
    echo "<li> {$line} </li>";
}
echo '</ol>';


function sub_file_name($file)
{
    $pos = strpos($file, "_");
    return substr($file, 0, $pos);
}

?>

<form action="download.php" method="post">
    <select name="books">
        <?php
        array_splice($files, 0, 2);

        for ($file = 0; $file < count($files); $file++) {
            $human_readable_file_name = sub_file_name($files[$file]);
            echo "<option value=\"{$upload_path}{$files[$file]}\">{$human_readable_file_name}</option>";
        }
        ?>
    </select>
    <input type="submit" name="send" value="Скачать!"/>
</form>


<p><a href="index.php">Вернуться на главную!</a></p>


</body>
</html>