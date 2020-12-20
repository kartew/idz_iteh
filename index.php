<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
if ($_FILES && $_FILES['filename']['error'] == UPLOAD_ERR_OK) {
    $upload_path = "books/{$_FILES['filename']['name']}";
    move_uploaded_file($_FILES['filename']['tmp_name'], $upload_path . uniqid('_') . '.' . 'txt');
    echo "<p><b style=\"color: red\">Файл загружен успешно!</b></p>";;
}
?>

<h2>Задание</h2>
<p><b>Учебный портал (библиотека), PHP.</b>
    Возможность добавления файлов на ресурс, отображение списка уже загруженных файлов и их открытие. </p>
<p><b>ВАЖНО!</b> Работает с файлами, у которых расширение "TXT" (plain text).</p>


<h2>Загрузка файла</h2>
<form method="post" enctype='multipart/form-data'>
    Выберите файл:
    <input type='file' name='filename' size='10'/><br/><br/>
    <input type='submit' value='Загрузить'/>
</form>
<br>
<h2>Все загуженные файлы</h2>
<a href="main.php">Посмотреть</a>
</body>
</html>