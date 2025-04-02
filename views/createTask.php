<html>
<head>
    <link rel="stylesheet" href="/../public/style/header.css">
    <link rel="stylesheet" href="/../public/style/createTask.css">
</head>
<body>

    <?php require __DIR__ . "/header.php"; ?>
    
    <form id="form">
        <div>
            <label for="name">Name:</label>
            <input type="text" placeholder="Enter the name of your task:" id="name" name="name">
        </div>

        <div>
            <label for="name">Description of the Task To-do:</label>
            <input type="text" placeholder="Enter your description:" id="description" name="description">
        </div>

        <button type="submit">Submit</button>
    </form>

    <script type="module" src="/../public/script/create.js"></script>
</body>
</html>