<?php
require_once("dbConnection.php");


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
  
    mysqli_begin_transaction($mysqli);

    try {
       
        $stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        $query = "
            CREATE TEMPORARY TABLE temp_users
            SELECT @row := @row + 1 AS new_id, name, age, email
            FROM users, (SELECT @row := 0) r
            ORDER BY id
        ";
        mysqli_query($mysqli, $query);

      
        mysqli_query($mysqli, "TRUNCATE TABLE users");

     
        $query = "
            INSERT INTO users (id, name, age, email)
            SELECT new_id, name, age, email
            FROM temp_users
        ";
        mysqli_query($mysqli, $query);

        mysqli_query($mysqli, "DROP TEMPORARY TABLE temp_users");

      
        $result = mysqli_query($mysqli, "SELECT MAX(id) + 1 AS next_id FROM users");
        $row = mysqli_fetch_assoc($result);
        $next_id = $row['next_id'] ?: 1; // If table is empty, set to 1
        mysqli_query($mysqli, "ALTER TABLE users AUTO_INCREMENT = $next_id");

   
        mysqli_commit($mysqli);
    } catch (Exception $e) {
       
        mysqli_rollback($mysqli);
        echo '<div class="container mt-5">';
        echo '<div class="alert alert-danger" role="alert">';
        echo '<p>Xatolik yuz berdi: ' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '</div>';
        echo '<a href="index.php" class="btn btn-secondary">Bosh sahifaga qaytish</a>';
        echo '</div>';
        exit;
    }
}


header("Location: index.php");
exit;
?>