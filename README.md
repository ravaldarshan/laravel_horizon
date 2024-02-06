 -sudo apt-add-repository ppa:redislabs/redis
 -sudo apt-get update
 -sudo apt-get upgrade
 -sudo apt-get install redis-server

 -sudo service redis-server start
 -sudo service redis-server stop
 -sudo service redis-server restart


     $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mailto:ravaldarshan237200@gmail.com';                     //SMTP username
    $mail->Password   = 'iqcagqfnjxdnbooj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mailto:mail->setfrom('ravaldarshan2372@gmail.com', 'Mailer');
    $mailto:mail->addaddress('sufiyanshk304@gmail.com', 'Joe User');    