<?php
$host = "localhost";  // اسم السيرفر
$user = "root";       // اسم المستخدم
$pass = "";           // كلمة السر (تأكد من أنها صحيحة)
$dbname = "shopDB";   // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($host, $user, $pass, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
