<?php
require_once("dbConnection.php");
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>
<html>
<head>    
    <title>Bosh sahifa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Bosh sahifa</h2>
        <p>
            <a href="add.php" class="btn btn-primary">Yangi ma'lumot qo'shish</a>
        </p>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
					<th>Id</th>
                    <th>Ism</th>
                    <th>Yosh</th>
                    <th>Email</th>
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($res = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $res['id'] . "</td>";
                    echo "<td>" . $res['name'] . "</td>";
                    echo "<td>" . $res['age'] . "</td>";
                    echo "<td>" . $res['email'] . "</td>";    
                    echo "<td>
                        <a href=\"edit.php?id=$res[id]\"  class=\"btn btn-success btn-sm\">Tahrirlash</a>
                        <a href=\"delete.php?id=$res[id]\" class=\"btn btn-danger btn-sm\" onClick=\"return confirm('Ma\'lumotni o\'chirasizmi?')\">O'chirish</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS (for confirm dialog functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>