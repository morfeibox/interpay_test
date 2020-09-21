<?php
class Book extends CommDB {

    protected function getSearchedBooks() {
        $sql = "SELECT author, book FROM book where author = 'test'";
        $result = $this->connect()->query($sql);

        $num_rows = $result->rowCount();

        if($num_rows > 0){
            while ($row = $result->fetch()){
                $data[] = $row;
            }
            return $data;
        }
    }


}
