<!DOCTYPE HTML>

<html>
<head>
<title>購買紀錄</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<meta name="description" content="NUKIM_php_homework">
<meta name="author" content="weny">
<link rel="icon" href="/php_homework/web.login.register/images/login.png" type="image/x-icon"/>

<?php
require 'style.php'
?>
</head>
<body class="homepage is-preload">
<div id="page-wrapper"> 
  
  <!-- Header -->
  <section id="header">
    <div class="container"> 
      
      <!-- Nav --> 
      
    </div>
  </section>
  <section id="home">
  <div class="container">
    <div class="row aln-center">
      <div class="col-6 col-8-medium col-12-small"> 
        
        <!-- Feature -->
        <header>
          <ul>
            <a href="shopping_car.php" style="text-decoration:none;color:black;" class="href">我的購物車</a> <a href="logout.php" style="text-decoration:none;color:black;">/會員登出</a>
          </ul>
        </header>
        <form action="" method="post" style="width: 60%;" enctype="multipart/form-data" class="record">
          <table border="2" width="600" height="600" >
            <tr>
              <td width="50" align="center">編號</td>
              <td width="80" align="center">商品名稱</td>
              <td width="50" align="center">價錢</td>
              <td width="100" align="center">購買時間</td>
            </tr>
            <?php
            
			//如果出現header already sent
            ob_start();
            session_start();

            require_once 'sql-connect.php';

            $sql = "SELECT * FROM record order by time";
            $result = mysqli_query( $link, $sql );
            $num = mysqli_num_rows( $result );

            for ( $i = 1; $i <= $num; $i++ ) {
              $row = mysqli_fetch_row( $result );

              $name = $row[ 0 ];
              $price = $row[ 1 ];
              $time = $row[ 2 ];
              echo '<tr>';
              echo "<td align=center>$i</td>";
              echo "<td align=center>$name</td>";
              echo "<td align=center>$price</td>";
              echo "<td align=center>$time</td>";
            }

            ?>
          </table>
          <br>
          <input type="button" value="4月總花費"onclick="javascript:location.href='total_price3.php'" style="margin-right:180px; height: 35px;">
          <input type="button" value="5月總花費"onclick="javascript:location.href='total_price2.php'" style="margin-right:180px; height: 35px;">
          <input type="button" value="6月總花費"onclick="javascript:location.href='total_price.php'" style=" height: 35px;">
        </form>
        </section>
        </section>
      </div>
    </div>
  </div>
</div>
</body>
</html>