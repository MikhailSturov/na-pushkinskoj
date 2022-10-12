<?php

$siteName = "Центра развития творчества";

$recepient = "Mike9362@yandex.ru";
$recepient_1 = "Mike9362@yandex.ru";
$recepient_2 = "Mike9362@yandex.ru";
$recepient_3 = "Mike9362@yandex.ru";
$recepient_4 = "Mike9362@yandex.ru";
$recepient_5 = "Mike9362@yandex.ru";
$recepient_6 = "Mike9362@yandex.ru";

$education_1 = "Художественное";
$education_2 = "Техническое";
$education_3 = "Физкультурно - спортивное";
$education_4 = "Социально - гуманитарное";
$education_5 = "Туристско - краеведческое";
$education_6 = "Естественно - научное";

$name = trim($_POST["name"]);
$surname = trim($_POST["surname"]);
$middleName = trim($_POST['middle-name']);
$age = trim($_POST["age"]);
$phone = trim($_POST["phone"]);
$mail = trim($_POST["mail"]);
$course_education = trim($_POST["course"]);
    $course_arr = explode(",", $course_education); 
    $education = $course_arr[1];
    $course = $course_arr[0];
$text = trim($_POST["text"]);
$message = "Фамилия: $surname \nИмя: $name \nОтчество: $middleName \nТелефон: $phone \nЭл.почта: $mail \nВозраст ребенка: $age лет \nОбразовательное направление: $course \nТекст письма: $text";

$pagetitle = "Заявка с сайта \"$siteName\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");

if ($education_1 == "$education") {
    mail($recepient_1, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
    mail($recepient_2, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
} elseif ($education_2 == "$education") {
    mail($recepient_2, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
} elseif ($education_3 == "$education") {
    mail($recepient_3, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
} elseif ($education_4 == "$education") {
    mail($recepient_4, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
} elseif ($education_5 == "$education") {
    mail($recepient_5, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
} elseif ($education_6 == "$education") {
    mail($recepient_6, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
} 
?>
