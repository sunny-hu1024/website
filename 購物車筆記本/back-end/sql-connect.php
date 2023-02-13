<?php
     
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            'sunny09781024',  // 密碼
            'shop-car');  // 預設使用的資料庫名稱
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