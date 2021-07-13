<?php

namespace App\GuestBook;


class GuestBook
{
    public $f_name = null;
    public $l_name = null;
    public $email = null;
    public $message = null;

    public function __construct($data)
    {
       if(array_key_exists('f-name', $data)){
           $this->f_name = $data['f-name'];
       }if(array_key_exists('l-name', $data)){
           $this->l_name = $data['l-name'];
       }if(array_key_exists('email', $data)){
           $this->email = $data['email'];
       }

        if(array_key_exists('message', $data)){
            $this->message = $data['message'];
        }
    }
}