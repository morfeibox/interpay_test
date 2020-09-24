<?php
include 'includes/CommDB.php';
include 'includes/Book.php';
include 'includes/ViewBook.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Interpay_test</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Demo Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css"></style>
    <style>
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .section-form {
            width: 100%;
            margin-bottom: 30px;
        }

        .section-table {
            width: 100%;
        }

        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            background: #49a09d;
            font-family: sans-serif;
            font-weight: 100;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        th {
            text-align: left;
        }

        thead, th {
            background-color: #55608f;
        }

        input[type=text], select {
            width: 30%;
            display: inline;
            padding: 12px 20px;
            margin: 10px 0 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 20%;
            display: inline;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            width: 50%;
            margin-left: 10px;
            padding: 12px 0 12px 15px;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-weight: 100;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="section-form">
        <form action="" method="GET">
            <input type="text" name="query"/>
            <button type="submit" name="submit">Search</button>
        </form>
    </div>
    <div class="section-table">
        <?php
        $books = new ViewBook();
        if (isset($_GET['submit'])) {
            if (empty($_GET['query'])) {
                echo "<div class=\"message\">Enter a search term</div>";
            }
            $query = $_GET['query'];

        }
        if ($query) {
            echo $books->showSearchedAuthors($query);
        }
        ?>
    </div>
</div>
</body>
</html>

