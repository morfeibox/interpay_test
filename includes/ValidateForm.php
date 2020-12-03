<?php

class ValidateForm
{
    public function validateUserInput($tainted_query)
    {

        // Assume this is the right tailored length of book title
        if (strlen($tainted_query) > 200) {
            return false;
        }

        // Check if sting contains binary data if no go with regex check <
        if (ctype_print($tainted_query)) {
            // Assume that book name should be alphanumeric and can only contain whitespace, hyphen and apostrophes
            $pattern = "^[a-zA-Z0-9\-\s\'\"]*$";
            if (preg_match($pattern, $tainted_query) != 0) {
                return $tainted_query;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
