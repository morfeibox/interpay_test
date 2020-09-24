<?php

class ViewBook extends Book
{

    public function showSearchedAuthors($search)
    {
        $authors = $this->getSearchedAuthors($search);
        if(!is_array($authors)){
            echo 'There is no book with Author  ' . trim($search);
        }
        foreach ($authors as $author) {
            echo $author['author'] . "<br>";
            echo $author['book'] . "<br>";
            echo $author['file_path'] . "<br>";
            echo $author['file_name'] . "<br>";
        }
    }
}
