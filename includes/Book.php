<?php

class Book extends CommDB
{

    protected function getSearchedBooks()
    {
        $sql = "SELECT * FROM book";
        $result = $this->connect()->query($sql);
        $num_rows = $result->rowCount();

        if ($num_rows > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function insertUpdateRecords($author, $name, $path, $filename)
    {
        $now = date('Y-m-d H:i:s');
        $sql = $this->connect()
            ->prepare(
                "SELECT * FROM book WHERE file_path = '{$path}' AND file_name = '{$filename}' AND author = '{$author}' AND book = '{$name}' AND is_processed = true");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        var_dump($fetch['id']);
        if (!is_array($fetch)) {
            $sql = $this->connect()
                ->prepare("INSERT INTO book (author, book, file_path, file_name, created_on, is_processed) VALUES ('{$author}', '{$name}', '{$path}', '{$filename}', '{$now}', true)");
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            $sql = $this->connect()
                ->prepare("UPDATE book SET author = '{$author}', book = '{$name}', created_on = '{$now}', updated_on= '{$now}' WHERE id = '{$fetch['id']}'");
            $sql->execute();
        }

    }

}
