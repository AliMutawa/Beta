<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // التحقق من وجود البريد الإلكتروني في قاعدة البيانات
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);

    if ($stmt->fetch()) {
        // مقارنة كلمة المرور
        if (password_verify($password, $hashed_password)) {
            // إذا كانت كلمة المرور صحيحة
            session_start();
            $_SESSION['user_id'] = $id;
            echo "تم تسجيل الدخول بنجاح!";
        } else {
            echo "كلمة المرور غير صحيحة!";
        }
    } else {
        echo "البريد الإلكتروني غير موجود!";
    }

    $stmt->close();
    $conn->close();
}
?>
