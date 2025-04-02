<html>
<head>
    <link rel="stylesheet" href="/../public/style/header.css">
    <link rel="stylesheet" href="/../public/style/showListTask.css">

</head>
<body>

    <?php require __DIR__ . "/header.php"; ?>

    <form id="form" data-taskID="<?= $_GET['id'] ?>">

        <div id="task">
            <h1 id="nameTask"></h1>
            <h2 id="descriptionTask"></h2>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" placeholder="Enter your description:" id="description" name="description">
        </div>

        <button type="submit">Submit</button>
    </form>

    <div id="containerList">

    </div>

    <script type="module" src="/../public/script/show.js"></script>
</body>
</html>