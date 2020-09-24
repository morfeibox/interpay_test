<?php

class ViewBook extends Book
{

    public function showSearchedAuthors($search)
    {
        $authors = $this->getSearchedAuthors($search);
        if(!is_array($authors)){
            echo "<div class=\"message\"> There is no book with author  <b>\"" . trim($search) . "\"</b></div>";
        } else {
            echo "<table>
                        <thead>
                            <tr>
                                <th>Author</th>
                                <th>Book</th>
                                <th>Location</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                   <tbody>";
            foreach ($authors as $author) {
                echo "<tr>";
                echo "<td>" . $author['author'] . "</td>";
                echo "<td>" . $author['book'] . "</td>";
                echo "<td>" . $author['file_path'] . '/' . $author['file_name'] . "</td>";
                echo "<td>" . $author['created_on'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }

    }
}
