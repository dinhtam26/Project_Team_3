<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once './library/PHPMailer.php';
require_once './library/SMTP.php';
function sendMail($email, $title, $content)
{

    $mail = new PHPMailer();

    // Gọi đến lớp SMTP
    $mail->isSMTP();

    $mail->SMTPDebug = 1;   // Hiển thị thông báo trong quá trình kết nôi SMTP
    // 1 = Hiển thị mess + error
    // 2 = Hiển thị mess
    $mail->SMTPAuth = true;
    $mail->Host     = "smtp.gmail.com";
    $mail->Username   = 'tamndph41864@fpt.edu.vn';                     //SMTP username
    $mail->Password   = 'fonj ujph wwtn lvqa';
    $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
    $mail->Port       = 465;


    // Thiết lập charset
    $mail->CharSet = 'utf-8';
    // Thiết lập thông tin người gửi và email người gửi
    $mail->setFrom("tamndph41864@fpt.edu.vn", "Tam");

    // Thiết lập thông tin người nhận và email người nhận
    $mail->addAddress($email);


    // Gửi file cho người nhận'
    // $mail->addAttachment('cmt_truoc.zip');


    $mail->isHTML(true); // Thiết lập email theo HTML
    // Thiết lập tiêu đề 
    $mail->Subject = $title;

    // Thiết lập nội dung 
    $mail->Body = $content;

    if ($mail->Send() == false) {
        echo "Error: " . $mail->ErrorInfo;
    } else {
        echo "Success";
    }
}
