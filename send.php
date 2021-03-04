<?php 
ob_start();
date_default_timezone_set('Asia/Baku');

require_once 'db.php';

$db = new DBConnection;

require_once 'crud.php';

$CRUD = new CRUD;


$CRUD->Select("clients",1);


function generateRandomString($length = 5) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



if(isset($_POST["film_send"])){
    require_once "class.phpmailer.php";
    $mail = new PHPMailer();
    $number = generateRandomString();

/* 
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "erva.veridyen.com";
    $mail->Port = 465;
    $mail->IsHTML(true);

    $mail->CharSet  = "utf-8";
    $mail->Username = "ders@ayyubhajiyev.com";
    $mail->Password = "m8464625";
    $mail->SetFrom("ders@ayyubhajiyev.com","Tarantino Film");
*/

 
//MailTrap
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.mailtrap.io";
    $mail->Port = 465;
    $mail->IsHTML(true);

    $mail->CharSet  = "utf-8";
    $mail->Username = "";
    $mail->Password = "";
    $mail->SetFrom("","Tarantino Film");




    $mail->AddAddress($_POST["email"]);
    $mail->Subject = "Tarantino Film";
    $mail->Body = '
        <table>
            <tr>
                <td>Ad Soyad</td>
                <td>Email</td>
                <td>Telefon Nömrəsi</td>
                <td>Film</td>
                <td>Tarix</td>
                <td>Bilet Nömrəsi</td>
            </tr>
            <tr>
                <td>'.$_POST["name"].'</td>
                <td>'.$_POST["email"].'</td>
                <td>'.$_POST["phone"].'</td>
                <td>'.$_POST["film"].'</td>
                <td>'. DateFunct($_POST["date"]).'</td>
                <td><b>'.$number.'</b></td>
            </tr>
        </table>
    ';
    if (!$mail->Send()) {
        echo "Email Gönderim Xətası: " . $mail->ErrorInfo;
        header("Location:index.php?status=no");
        exit;
    } else {
    $col ="
    name=:name,
    email=:email,
    number=:number,
    film=:film,
    date=:date,
    ticket_number=:ticket_number
    ";
    $arr =[
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'number'=>$_POST['phone'],
        'film'=>$_POST['film'],
        'date'=>$_POST['date'],
        'ticket_number'=>$number
    ];
    $CRUD->Insert("clients",$col,$arr) ? header("Location:index.php?status=ok") : header("Location:index.php?status=no");
}
}


function  DateFunct($date){
    $x = [
        "",
        "Yanvar",
        "Fevral",
        "Mart",
        "Aprel",
        "May",
        "İyun",
        "İyul",
        "Avqust",
        "Sentyabr",
        "Oktyabr",
        "Noyabr",
        "Dekabr"
    ];
    $date= substr($date,0,10);
    $date = explode("-",$date);
    return $date[2] . " " . $x[intval($date[1])] . " " . $date[0];
}