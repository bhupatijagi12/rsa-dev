<?php

namespace App\Libraries;

class Mailer
{
    public static function send(
        $to,
        $subject,
        $template,
        $data = [],
        $cc = []
    )
    {
        $email = \Config\Services::email();

        $email->setFrom(
            'noreply@globalaidassurance.com',
            'Global Aid Assurance'
        );

        $email->setTo($to);

        if(!empty($cc)){
            $email->setCC($cc);
        }

        $email->setSubject($subject);

        $email->setMailType('html');

        $email->setMessage(
            view($template, $data)
        );

        return $email->send();
    }
}