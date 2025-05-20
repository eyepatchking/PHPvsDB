<?php
require_once("dbConnection.php");
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8" />
    <title>Ma'lumot qo'shish natijasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">

<?php
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    
    if (empty($name) || empty($age) || empty($email)) {
        echo '<div class="alert alert-danger" role="alert">';
        if (empty($name)) {
            echo '<p>Ism mavjud emas.</p>';
        }
        if (empty($age)) {
            echo '<p>Yosh mavjud emas.</p>';
        }
        if (empty($email)) {
            echo '<p>Email mavjud emas.</p>';
        }
        echo '</div>';
        echo '<a href="add.php" class="btn btn-secondary mt-3">Ortga</a>';
    } else {
        // Prepared statement ishlatamiz
        $stmt = $mysqli->prepare("INSERT INTO users (name, age, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $name, $age, $email);
        $stmt->execute();
        $stmt->close();

        echo '<div class="alert alert-success" role="alert">';
        echo '<h4 class="alert-heading">✅ Ma\'lumotlar muvaffaqiyatli saqlandi!</h4>';
        echo '</div>';
        echo '<a href="index.php" class="btn btn-primary mt-3">Natijani ko\'rish</a>';
    }
}
?>

        </div>
    </div>
</div>

</body>
</html>
