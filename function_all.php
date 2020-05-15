<?php
    include "base.php";


    // test include is working on
    // print_r(all('invoice'));


    /**
     * 尋找資料
     * 
     * "select * from $table ";
     * "select * from $table where ???='xxx'";
     * "select * from $table where ???='xxx' && ???='xxx' ...";
     * "select * from $table where ???='xxx' || ???='xxx' ...";
     * "select * from $table where ???='xxx' && ???='xxx' ... order by ??";
     * "select * from $table order by ???";
     * "select * from $table limit ???";
     * "select * from $table where ??? limit";
     * "select * from $table ,(sub query) where ??? limit";
     * 
     * all($table,...$arg)
     * $table =>資料表名
     * $arg[0]=>where 條件句
     * $arg[1]=>order by ,limit ,group by 條件句
     * $arg[2]=>FETCH 類別
     * ......
     */
    
    

    // 因sql語法眾多，無法一一詳細舉例，所以在自定義函式的時候，可自行設定彈性變數來做各式的查詢結果
    // 變數名稱都可自定義，無須與範例相同，範例只是使用較常用變數名稱

    // function all($table,...$arg){
    //     global $pdo;
    //     // 切記 sql 語法都要有空格，否則會有錯誤
    //     $sql="select * from $table ";
    //     // 範例一
    //     if(isset($arg[0])){
    //         // 將上方原有的sql語法使用 . 串入帶入的新語法 $arg[0]的用法
    //         $sql = $sql . $arg[0];
    //     }
        
    // }

    /* all 用法


   */


    function all($table,...$arg){
        global $pdo;
        $sql="select * from $table ";
        // 範例二

        // 判斷...$arg是否為字串 且 是否為陣列 並重組為sql語句
        if(isset($arg[0]) && is_array($arg[0])){
            // 改用sprinf此處也要改用陣列而非字串，否則會有錯誤。
            $tmp=[];
            foreach($arg[0] as $key => $value){
                // %s 為字串, %f 為浮點數
                // $tmp[]要改用陣列存放sprintf後的內容，如果只用變數$tmp那麼結果只會有最後的字串，前面的都會被取代掉。
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where " . implode(" && ",$tmp);
            
        }
        // 判斷第三個參數
        if(isset($arg[1])){
            $sql=$sql . $arg[1];
        }
        echo $sql;
        echo "<hr>";
        return $pdo->query($sql)->fetchAll();
    }
    


    echo "<hr>";

    // !!!! 雖然function all 裡面有兩個變數，而此處只有帶入 invoice 也能正常撈出資料。 !!!!!
    // print_r(all("invoice"));
    
    
    // 範例一
    $rows=all('invoice');
    foreach($rows as $row){
        echo $row['id'] . "-";
        echo $row['code'] . "-";
        echo $row['number'] . "-";
        echo $row['period'] . "-";
        echo $row['expend']  ;
        echo "<hr>";
    }
    
    echo "<p>有帶參數</p>";
    echo "<hr>";
    // 將where period='1'此處變成陣列
    // $rows=all('invoice',"where period='1'");
    // 此處可以自定義要找尋的資料內容，自行增減
    $rows=all('invoice',["year"=>"2020","period"=>"1","code"=>"fg"]);
    foreach($rows as $row){
        echo $row['id'] . "-";
        echo $row['code'] . "-";
        echo $row['number'] . "-";
        echo $row['period'] . "-";
        echo $row['expend']  ;
        echo "<hr>";
    }
    echo "<p>有帶3個參數</p>";
    echo "<hr>";
    // 此處可以自定義要找尋的資料內容，自行增減
    $rows=all('invoice',["year"=>"2020","period"=>"1","code"=>"fg"]," order by id desc");
    foreach($rows as $row){
        echo $row['id'] . "-";
        echo $row['code'] . "-";
        echo $row['number'] . "-";
        echo $row['period'] . "-";
        echo $row['expend']  ;
        echo "<hr>";
    }
    echo "<p>不帶條件參數</p>";
    echo "<hr>";
    // 可帶 [](陣列) 與 ""(空值)
    // 補充說明：若要帶入[]的話，需另加判斷式來濾掉陣列
    $rows=all('invoice',""," order by id desc");
    foreach($rows as $row){
        echo $row['id'] . "-";
        echo $row['code'] . "-";
        echo $row['number'] . "-";
        echo $row['period'] . "-";
        echo $row['expend']  ;
        echo "<hr>";
    }
    

?>