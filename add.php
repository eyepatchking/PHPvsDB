<html>
<head>    
    <title>Yangi ma'lumot qo'shish</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Yangi ma'lumot qo'shish</h2>
        <p>
            <a href="index.php" class="btn btn-secondary">Bosh sahifa</a>
        </p>
        <form name="add" method="post" action="addAction.php" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Ism</label>
                <input type="text" class="form-control" name="name" id="name" required>
                <div class="invalid-feedback">Iltimos, ismni kiriting.</div>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Yosh</label>
                <input type="number" class="form-control" name="age" id="age" required>
                <div class="invalid-feedback">Iltimos, yoshni kiriting.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback">Iltimos, to'g'ri email kiriting.</div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Saqlash</button>
        </form>
    </div>
    <!-- Bootstrap JS for form validation -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap form validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
