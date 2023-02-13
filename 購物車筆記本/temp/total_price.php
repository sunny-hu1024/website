<?php
//如果出現header already sent
ob_start();

session_start();

$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'asdfgh713',       // 使用者名稱 
    'zxcvbn123',  // 密碼
    'project');  // 預設使用的資料庫名稱

?>


<!DOCTYPE HTML>

<html>
	<head>
    
		<title>購買紀錄</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="NUKIM_php_homework">
    	<meta name="author" content="weny">
    	<link rel="icon" href="/php_homework/web.login.register/images/login.png" type="image/x-icon"/>
		<link rel="stylesheet" href="assets/css/main.css" />
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
												<a href="shopping_car.php" style="text-decoration:none;color:black;" class="href">我的購物車</a>
												<a href="register.php" style="text-decoration:none;color:black;">/會員註冊</a>
                                                <a href="logout.php" style="text-decoration:none;color:black;">/會員登出</a>
											</ul>
								</header>
								<form action="" method="post" style="width: 60%; " enctype="multipart/form-data" class="record2">
									
                                    <table border="2" width="300" height="300" align=center valign=middle>
                                        <tr>
                                            <td width="50" align="center">編號</td>
                                            <td width="100" align="center">月份</td>
                                            <td width="50" align="center">花費</td>
                                            

                                            
                                        </tr>	

                                            <?php
                                                    $sql="SELECT time,price FROM record where time between '2022-06-01' and '2022-06-30'";
                                                    $SQL="SELECT SUM(price) FROM record where time between '2022-06-01' and '2022-06-30'";
                                                    $result=mysqli_query($link,$sql);
                                                    $result2=mysqli_query($link,$SQL);
                                                    $num=mysqli_num_rows($result);
                                                    $row2=mysqli_fetch_row($result2);
                                                    $sum_price=$row2[0];


                                                    for($i=1;$i<=$num;$i++)
                                                    {
                                                        $row=mysqli_fetch_row($result);
                                                        
                                                        $price=$row[1];
                                                        $time=$row[0];
                                                        echo '<tr>';
                                                        echo "<td align=center>$i</td>";
                                                        echo "<td align=center>$time</td>";
                                                        echo "<td align=center>$price</td>";


                                                    }
    
                                            ?>
                                    </table>


                                    <?php
                                            echo "總花費=$sum_price";
                                            

                                    ?>
                                    <br>
                                            <input type="button" value="回紀錄"onclick="javascript:location.href='record.php'" style="margin-left:420px; height: 35px;">
								</form>		
								</section>
                               
                                
                            </section>
                            
							</div>
						</div>
					</div>


			<!-- Footer -->

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>