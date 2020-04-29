<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員列表</title>
</head>
<STYLE>
    table{
        border: 1px solid #000;
        border-collapse: collapse;
        box-shadow: 1px 1px 2px #888;
    }
    table td{
        border: 1px solid #000;
        text-align: center;
    }
   
</STYLE>
<body>
    <div class="container">
        <h3>會員列表</h3>
        <?php
        $dsn="mysql:host=localhost;charset=utf8;dbname=school";
        $pdo=new PDO($dsn,"root","");
        date_default_timezone_set("Asia/Taipei");

        $sql="select * from `student`";
        $rows=$pdo->query($sql)->fetchAll();

        ?>
   
        <table>
            <tr>
                <td>ID</td>
                <td>姓名</td>
                <td>電話</td>
                <td>密碼</td>
                <td>帳號</td>
                <td>註冊時間</td>
                <td>生日</td>
                <td>email</td>
                <td collspan-2>操作</td>
              <?php
                foreach($rows as $row){

                  echo "<tr>"."<td>".$row['id']."</td>"."<td>".$row['name']."</td>"."<td>".$row['tel']."</td>"."<td>".$row['pw']."</td>"."<td>".$row['acc']."</td>"."<td>".$row     ['create_time']."</td>"."<td>".$row['birthday']."</td>"."<td>".$row['email']."</td>"."<td>"."<button>"."編輯"."</button>"."</td>"."<td>"."<button>"."刪除"."</button>"."</td>"."<br>"."</tr>";
              }
                // foreach($rows as $row){
                // echo "<tr>";   
                // echo "<td>".$row['id']."</td>"
                // echo "<td>".$row['acc']."</td>"
                // echo "<td>".$row['pw']."</td>"
                // echo "<td>".$row['name']."</td>"
                // echo "<td>".$row['tel']."</td>"
                // echo "<td>".$row['create_time']."</td>"
                // echo "<td>".$row['birthday']."</td>"
                // echo "<td>".$row['email']."</td>"
                // echo     <td>;
                //
                



                // }
              ?>
             </tr>
        </table>
    </div>
</body>
</html>