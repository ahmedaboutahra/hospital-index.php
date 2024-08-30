<?php
     include "header.php";
?>
<table>
    <th>الرقم</th>
    <th>اسم المريض</th>
    <th>البريد الإلكتروني</th>
    <th>التاريخ</th>
<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "hospital";  // اسم قاعدة البيانات

$connect = mysqli_connect($host, $user, $password, $dbname);

// إستيراد معلومات المرضى من قاعدة البيانات
$query = "SELECT * FROM patients";
$result = mysqli_query($connect, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['date'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "حدث خطأ أثناء جلب البيانات";
}
?>
</table>
