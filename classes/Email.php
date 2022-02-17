<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $mensaje;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '35036dbb71799f';
        $mail->Password = '297178d5b74466';

        $mail->setFrom('uptask@uptask.com');
        $mail->addAddress('uptask@uptask.com', 'uptask.com');

        $mail->Subject = 'Confirmar tu cuenta en Uptask';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre .'</strong>. Has creado tu cuenta en UpTask, solo debes confirmarla presionando en el siguiente enlace:</p>';
        $contenido .= '<a href="http://localhost:3000/confirmar?token=' . $this->token . '">Confirmar cuenta</a>';
        $contenido .= '<p>Si no creaste esta cuenta puedes ignorar este mensaje.</p>';
        $contenido .='</html>';

        $mail->Body = $contenido;

        $mail->send();
    }

    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '35036dbb71799f';
        $mail->Password = '297178d5b74466';

        $mail->setFrom('uptask@uptask.com');
        $mail->addAddress('uptask@uptask.com', 'uptask.com');

        $mail->Subject = 'Reestablece tu password de UpTask';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre .'</strong>. Parece que has olvidado tu password, sigue el siguiente enlace para recuperarlo:</p>';
        $contenido .= '<a href="http://localhost:3000/reestablecer?token=' . $this->token . '">Reestablecer password</a>';
        $contenido .= '<p>Si no creaste esta cuenta puedes ignorar este mensaje.</p>';
        $contenido .='</html>';

        $mail->Body = $contenido;

        $mail->send();
    }
}