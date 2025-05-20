<?php
require_once("dbConnection.php");
?>
<html>
<head>
    <title>Tahrirlash natijasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
<?php
if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $age = mysqli_real_escape_string($mysqli, $_POST['age']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);    
    
    if (empty($name) || empty($age) || empty($email)) {
        echo '<div class="alert alert-danger" role="alert">';
        if (empty($name)) {
            echo '<p>Ism bo\'sh.</p>';
        }
        if (empty($age)) {
            echo '<p>Yosh bo\'sh.</p>';
        }
        if (empty($email)) {
            echo '<p>Email bo\'sh.</p>';
        }
        echo '</div>';
        echo '<a href="edit.php?id=' . htmlspecialchars($id) . '" class="btn btn-secondary mt-3">Ortga</a>';
    } else {
        $stmt = $mysqli->prepare("UPDATE users SET name = ?, age = ?, email = ? WHERE id = ?");
        $stmt->bind_param("sisi", $name, $age, $email, $id);
        $stmt->execute();
        $stmt->close();
        
        echo '<div class="alert alert-success" role="alert">';
        echo '<h4 class="alert-heading">✅ Ma\'lumotlar muvaffaqiyatli tahrirlandi!</h4>';
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