<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap.css -->
    <link rel ="stylesheet" href="bootstrap (2).css"> 
    <!-- Bootstrap Font Icon css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Bootstrap JavaScript (Popper.js и Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document2</title>
</head>
<body>

<?php
$conn = new PDO("mysql:host=localhost;dbname=j19458505_univ", "j19458505_univ", "23112004");

// Удаление записи
if (isset($_GET["delete"])) {
    $sql = "DELETE FROM mydb WHERE id = ?";
    $query = $conn->prepare($sql);
    $query->execute([$_GET["delete"]]);
}

// Добавление записи
if (isset($_POST["ageavit"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $salary = $_POST["salary"];

    $sql = "INSERT INTO mydb (name, age, salary) VALUES (?, ?, ?)";
    $query = $conn->prepare($sql);

    if ($query->execute([$name, $age, $salary])) {
        echo "Запись успешно добавлена.";
    } else {
        echo "Ошибка при добавлении записи: " . print_r($query->errorInfo(), true);
    }
}

// Выборка данных
$sql = "SELECT * FROM mydb";
$result = $conn->query($sql);

echo '<table class="table">
        <thead class="thead-dark">
            <tr><th>id</th><th>name</th><th>age</th><th>salary</th><th>Actions</th></tr>
        </thead>
        <tbody>';

while ($row = $result->fetch()) {
    echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["age"] . "</td>
            <td>" . $row["salary"] . "</td>
            <td>
                <form action='index.php' method='get'>
                    <input type='hidden' name='delete' value=" . $row["id"] . ">
                    <button type='submit' class='btn btn-danger'>
                        <i class='bi bi-trash'></i>
                    </button>
                </form>
            </td>
        </tr>";
}

echo "</tbody></table>";
?>

<!-- Кнопка для открытия модального окна -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRecordModal">
  Добавить запись
</button>

<!-- Модальное окно для добавления записи -->
<div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить запись</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Форма для добавления записи -->
        <form action="index.php" method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Возраст, лет:</label>
            <input type="date" class="form-control" id="age" name="age" required>
          </div>
          <div class="mb-3">
            <label for="salary" class="form-label">Зарплата:</label>
            <input type="text" class="form-control" id="salary" name="salary" required>
          </div>
          <button type="submit" class="btn btn-primary" name="ageavit">Добавить</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>