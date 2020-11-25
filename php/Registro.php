<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


/**
 * Class registro
 * handles the user registro
 */
class Registro
{
    /**
     * @var object $conexion_bd The database connection
     */
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registro = new registro();"
     */
    public function __construct()
    {
        if (isset($_POST["enviar-correo"])) {

            $this->registerNewUser();
        }
    }

    /**
     * handles the entire registro process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function registerNewUser()
    {
        if (empty($_POST['input-nombre'])) {
            $this->errors[] = "Empty Username";
            // var_dump("nombre vacio");
        } elseif (empty($_POST['input-mail'])) {
            $this->errors[] = "Email cannot be empty";
            // var_dump("mail vacio");
            // } elseif (empty($_POST['input-texto'])) {
            //     $this->errors[] = "Email cannot be empty";
            // var_dump("texto vacio");
        } elseif (!filter_var($_POST['input-mail'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
            // var_dump("validacio err");
        } elseif (
            !empty($_POST['input-nombre'])
            && !empty($_POST['input-mail'])
            && filter_var($_POST['input-mail'], FILTER_VALIDATE_EMAIL)
            // && !empty($_POST['input-texto'])
        ) {
            // var_dump("entro");
            $nombre = $_POST['input-nombre'];
            $correo = $_POST['input-mail'];
            // $texto = $_POST['input-texto'];
            $a = uniqid('bases_datos_1_');
            $_SESSION['codigo'] = $a;
            var_dump($a);
            // change character set to utf8 and check it

            $body = '<html>
                    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <title>TERPEL</title>
                        <style>p {padding:0; margin:0;}</style>
                    </head>
                
                <body style="padding:0; margin:0; font-family:Helvetica;">	
                        <p style="text-align:left; margin:0px 0px 0; font-size:15px; color:#000;">
                        Hola;
                        <br />
                        Aquí están los detalles de ingreso:
                        <br />
                        <ul style="list-style: none;font-size:15px; color:#000";>
                            <li><b>Nombre:</b> ' . $nombre . '</li>
                            <li><b>Correo Electrónico:</b> ' . $correo . '</li>
                            <li><b>Código:</b> ' . $a . '</li>
                        </ul>
                        <br />
                        <span style="font-size:24px; color:#797979;"></span>
                        <br />
                        </p>
                        <!-- Esto asegura que Gmail no recorte el correo -->
                        <span style="opacity: 0">' . bin2hex(random_bytes(5)) . '</span>
                    </body>
                    </html>';
            $asunto = 'Nueva Registro';
            $this->enviarCorreo($asunto, $correo, $body);
        }
    }



    private function enviarCorreo($asunto, $correo, $message)
    {
        require './php/PHPMailer/src/Exception.php';
        require './php/PHPMailer/src/PHPMailer.php';
        require './php/PHPMailer/src/SMTP.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
            $mail->CharSet = "UTF-8";
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'ssl://smtp.zoho.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'mail_test_mecca@zohomail.com';                     // SMTP username
            $mail->Password   = 'fK%C47^dd5NHEPT$YR^J';                                // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;
            $mail->SMTPDebug = 0;
            $emisor = 'mail_test_mecca@zohomail.com';
            $receptor = $correo;                         // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($emisor, '');
            $mail->addAddress($receptor, '');     // Add a recipient
            // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            $this->messages[] = 'Message has been sent';
            // var_dump($this->messages);
        } catch (Exception $e) {
            $this->errors[] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}


function debugToConsole($msg)
{
    echo "<script>console.log(" . json_encode($msg) . ")</script>";
}
