<?php

require_once "include.php";

abstract class Controller
{
    use Sanitize, LoadModel, LoadView;
}