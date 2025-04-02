<html>
<head>
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="/../public/style/404.css">
</head>
<body>

    <div class="container">
        <h1>404 - Page Not Found</h1>
        <p>Oops! The page <span id="error-route">"<?= $_SESSION['error404'] ?>"</span> does not exist.</p>
        <button onclick="goHome()">Return to Home</button>
    </div>

    <script>
        function goHome() {
            window.location.href = 'http://localhost:3030/';
        }
    </script>

</body>
</html>