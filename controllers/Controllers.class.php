<?php
abstract class Controllers
{
    abstract protected function render($view, $data);

    protected function verifyInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}