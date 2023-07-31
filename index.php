<?php

require __DIR__ . '/lib_ext/autoload.php';

use Notification\Email;

//var_dump($email);

$novoEmail = new Email;
$novoEmail->sendMail("Assunto de Teste", "<p>Esse é um e-mail de <b>teste</b>!</p>", "contato@edelcio.muniz.nom.br", "EMWSD", "financeiro@edelcio.muniz.nom.br", "Edelcio.Muniz");

var_dump($novoEmail);
