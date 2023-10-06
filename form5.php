<?php
echo $_FILES['filename']['type'] . '<br>';

if(move_uploaded_file($_FILES['filename']['tmp_name'],
                'my_files/' . $_FILES['filename']['name'])){
    echo "Документ под названием" . $_FILES['filename']['name']
                        . ' загружен на сервер';
                }
    else{
        echo "Загрузка докумета не удалась. Обратитесь к администратору сети.";
}
?>