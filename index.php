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
</head>
<body>
<?php
$books = new ViewBook();
$books->showSearchedBooks();
?>
<script type="text/javascript"></script>
</body>
</html>
