<?php 
namespace mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $full_theme_hiki.'/vendor/phpmailer/phpmailer/src/Exception.php';
require $full_theme_hiki.'/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require $full_theme_hiki.'/vendor/phpmailer/phpmailer/src/SMTP.php';
 
require $full_theme_hiki."./config.php";

class mail extends PHPMailer{
        
        public function __construct($exceptions)
        {


                parent::__construct($exceptions);
    
    $this->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $this->isSMTP();                                            //Send using SMTP
    $this->Host       = host;                     //Set the SMTP server to send through
    $this->SMTPAuth   = true;                                   //Enable SMTP authentication
    $this->Username   = username;                     //SMTP username
    $this->Password   = password;                              //SMTP password
          
    $this->Port   = 26;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

}

 function sendmail($email,$suject,$name_send){

  $this->setFrom(mail, 'Mailer');
     $this->addAddress($email, $name_send); 
    $this->isHTML(true);                                  //Set email format to HTML
    $this->Subject =  $suject;
    $this->Body    = 'This is the HTML message body <b>in bold!</b>';
    $this->AltBody = 'This is the body in plain text for non-HTML mail clients';

   $this->send();

 }

  }


?>