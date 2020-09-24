<?php
include '../includes/CommDB.php';
include '../includes/Book.php';

$book = new Book();
$dir = new RecursiveDirectoryIterator('../xmldocs/', RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($dir);
echo "Start \n";

foreach ($files as $file) {
    if ($file->getExtension() == "xml") {

        $path = $file->getPath();
        $filename = $file->getFileName();

        // Simple Validation with XMLReader <
        $xml = new XMLReader();
        $xml->open($file->getPath() . '/' . $file->getFileName());
        $xml->setParserProperty(XMLReader::VALIDATE, true);

        if ($xml->isValid()) {
            $string = file_get_contents($file->getPath() . '/' . $file->getFileName());
            $doc = simplexml_load_string($string) or die("Error: Cannot create object");
            foreach ($doc->book as $item) {
                $book->insertUpdateRecords((string) $item->author, (string) $item->name, $path, $filename);
            }
        } else {
            echo "Invalid document : " . $file->getPath() . '/' . $file->getFileName();
        }

    }
}
echo "Finish importing files \n";
?>
