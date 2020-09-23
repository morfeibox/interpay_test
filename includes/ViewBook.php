<?php

class ViewBook extends Book
{

    public function showSearchedBooks()
    {
        $authors = $this->getSearchedBooks();
        foreach ($authors as $author) {
            echo $author['author'] . "<br>";
            echo $author['book'] . "<br>";
        }
    }
}
