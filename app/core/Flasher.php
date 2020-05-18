<?php

class Flasher
{

    public static function setFlash($message, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];

        return $_SESSION['flash'];
        exit();
    }
}
