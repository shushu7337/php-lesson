<?php
    if(!isset($_COOKIE['id'])){
        echo "--無權限登入--";
        echo "<a href=login.php?>返回登入頁面</a>";
        exit();
    }
                
?>
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
        
    <div>
        <?php
        
        echo "<a href='login.php'>回登入頁面</a>";
        ?>
    </div>
        <?php
        include "dbconnect.php";
        $sql="select * from `student` where `id`='".$_COOKIE['id']."'";
        $user=$pdo->query($sql)->fetch();
        // user的資料

        echo "<h3>歡迎".$user['name']."</h3>";
        $sql="select * from `student`";
        $rows=$pdo->query($sql)->fetchAll();
        // 全部人的資料

        ?>
   
        <table>
            <tr>
                <td>ID</td>
                <td>帳號</td>
                <td>密碼</td>
                <td>姓名</td>
                <td>電話</td>
                <td>註冊時間</td>
                <td>生日</td>
                <td>email</td>
                <td collspan 2>操作</td>
              <?php


            // type 1

            //     foreach($rows as $row){

            //       echo "<tr>"."<td>".$row['id']."</td>"."<td>".$row['name']."</td>"."<td>".$row['tel']."</td>"."<td>".$row['pw']."</td>"."<td>".$row['acc']."</td>"."<td>".$row     ['create_time']."</td>"."<td>".$row['birthday']."</td>"."<td>".$row['email']."</td>"."<td>"."<button>"."編輯"."</button>"."</td>"."<td>"."<button>"."刪除"."</button>"."</td>"."<br>"."</tr>";
            //   }

            // type 2

                foreach($rows as $row){
                echo "<tr>";   
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['acc']."</td>";
                echo "<td>".$row['pw']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['tel']."</td>";
                echo "<td>".$row['create_time']."</td>";
                echo "<td>".$row['birthday']."</td>";
                echo "<td>".$row['email']."</td>";
                
                echo "<td>";
                echo "<a href='edit_user.php?user=".$row['id']."'><button>編輯</button></a>";
                echo "<a href='delete_user.php?user=".$row['id']."'><button>刪除</button></a>";
                echo "</td>";
                echo "</tr>";
                
                }
              ?>
             </tr>
        </table>
    </div>
    
</body>
</html>