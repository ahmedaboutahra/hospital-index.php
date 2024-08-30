<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Al shifa Hospital</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="JannaLTRegular.css"> 
</head>
<body>
     <div class="logo">
          <img src="logo.png" alt="">
          <h2>مستشفى العيانين</h2>
     </div>
     <div class="book">
          <p>مرحبا بك يا عيان في مستشفى العيانين,, للحجز أملأ الاستمارة أدناه</p>
          <form action="index.php" method="post">
               <input type="text" placeholder="أدخل الاسم" name="name">
               <input type="text" placeholder="أدخل البريد الإلكتروني" name="email">
               <input type="date" name="date">
               <input type="submit" value="احجز الآن" name="send">
          </form>

          <!-- الاتصال بقاعدة البيانات -->
          <?php
          $host = "localhost";
          $user = "root";
          $password = "";
          $dbname = "hospital";  // اسم قاعدة البيانات

          $connect = mysqli_connect($host, $user, $password, $dbname);

          // ارسال البيانات الى قاعدة البيانات
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $pName = $_POST['name'];
               $pEmail = $_POST['email'];
               $uDate = $_POST['date'];
               $pSend = $_POST['send'];

               if ($pSend) {
                    $query = "INSERT INTO patients(name, email, date) VALUES('$pName', '$pEmail', '$uDate')";
                    $result = mysqli_query($connect, $query);
                    if ($result) {
                         echo "<p style='color:green'>!!تم الحجز يا عيان</p>";
                    } else {
                         echo "<p style='color:red'>عفواً حدث خطأ ما .. حاول مجدداً</p>";
                    }
               }
          }
          ?>
     </div>
</body>
</html>

