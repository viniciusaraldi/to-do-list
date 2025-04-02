
<html>
<head>
    <link rel="stylesheet" href="/../public/style/header.css">
    <link rel="stylesheet" href="/../public/style/index.css">
</head>
<body>

    <?php require __DIR__ . "/header.php"; ?>

    <div>
        <h1>To-do list:</h1>
        <?php 
        $listToDo = json_decode($_SESSION['list'], true);
        foreach ($listToDo['data']['task'] as $value) {
            echo "
            <ul>
            <li>Name: {$value['name']}</li>
            <li>Resume: {$value['description']}</li>
            <li><input type='button' value='Create/View Topics' class='createTopicsBtn' data-id={$value['id']}></li>
            <li><input type='button' value='Delete' class='deleteTask' id='deleteTask' data-idTask={$value['id']}></li>
            </ul>
            ";
        }
        ?>
    </div>

    <div class="containerModalDelete" data-id="">
        <form action="http://localhost:3030/delete" data-id="" id="formDeleteTask">
            <label for="delete">You sure delete this Task?</label>
            <input type="button" value="NO" id="delete-no">
            <input type="submit" value="YES" id="delete-yes">
        </form>
    </div>

    <script type="module" src="/../public/script/index.js"></script>
</body>
</html>