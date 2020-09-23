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


    // We need to clarify if there two authors with the same name can exist in one document &
    // if there can be two authors with the sam name at different documents <
    public function insertUpdateRecords($author, $name, $path, $filename)
    {
        $now = date('Y-m-d H:i:s');
        $sql = $this->connect()
            ->prepare(
                "SELECT * FROM book WHERE file_path = '{$path}' AND file_name = '{$filename}' AND author = '{$author}'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if (!$fetch) {
            $sql = $this->connect()
                ->prepare("INSERT INTO book (author, book, file_path, file_name, created_on) VALUES ('{$author}', '{$name}', '{$path}', '{$filename}', '{$now}')");
            $sql->execute();
        }

        $sql = $this->connect()
            ->prepare("SELECT * FROM book WHERE file_path = '{$path}' AND file_name = '{$filename}' AND author = '{$author}' AND book != '{$name}' ");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);

        if ($fetch) {
            //update
            $sql = $this->connect()
                ->prepare("UPDATE book SET  book = '{$name}', updated_on = '{$now}'  WHERE file_path = '{$path}' AND file_name = '{$filename}' AND author = '{$author}'");
            $sql->execute();
        }
    }

}
