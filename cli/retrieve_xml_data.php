<?php
include '../includes/CommDB.php';
include '../includes/Book.php';

$book = new Book();
$dir = new RecursiveDirectoryIterator('../docs/', RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($dir);

foreach ($files as $file) {

    $path = $file->getPath();
    $filename = $file->getFileName();

    $string = file_get_contents($file->getPath() . '/' . $file->getFileName());
    $xml = simplexml_load_string($string);

    foreach ($xml->book as $item) {
        $book->insertUpdateRecords((string) $item->author, (string) $item->name, $path, $filename);
    }
}

?>
