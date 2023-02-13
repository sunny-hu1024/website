<?php
     
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'A1083354',       // 使用者名稱 
            'A1083354',  // 密碼
            'A1083354');  // 預設使用的資料庫名稱
if($link){
    mysqli_query($link,'SET NAMES utf8');
    //echo "正確連接資料庫";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}

#關閉連線
#mysqli_close($link);

?>