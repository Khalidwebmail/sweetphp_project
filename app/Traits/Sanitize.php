<?php

trait Sanitize
{
    public function filter($data)
    {
        $data = htmlentities($data);
        $data = addslashes($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}