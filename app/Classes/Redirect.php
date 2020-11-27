<?php

final class Redirect
{
    public static function to($page)
    {
        return header('location: ' .URLROOT. '/' . $page);
    }

    public static function back()
    {
       return header('Location: '.$_SERVER['PHP_SELF']);
    }
}