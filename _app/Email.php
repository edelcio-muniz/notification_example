<?php

namespace Notification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    private $mail = \StdClass::class;

    public function  __construct()
    {
        $this->mail = new PHPMailer(true);
        //Server settings
        $this->mail->SMTPDebug = 2;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'mail.seu-dominio.com.br';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'seuemail@seu-dominio.com.br';                     //SMTP username
        $this->mail->Password   = 'sua-senha';                               //SMTP password
        $this->mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $this->mail->Port       = 587;              //Insert Port
        $this->mail->CharSet = 'utf-8';             //Insert Charset
        $this->mail->setLanguage('br');             //Insert Language
        $this->mail->isHTML(true);                  //True or False
        //Recipients
        $this->mail->setFrom('seuemail1@seu-dominio.com.br', 'Name');   //Insert Email and Name Recipient
    }

    public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName){
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressEmail);

        try {
            $this->mail->send();
        } catch (\Exception $e) {
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }

        echo "E-mail enviado!";
    }
}