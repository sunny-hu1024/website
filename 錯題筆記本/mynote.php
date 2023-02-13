<?php
require_once 'back-end/session.cfg.php';
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/bg-style.css?t=8">
<link rel="stylesheet" href="css/notelist-style.css?t=0">
<meta charset="utf-8">
<title>我的筆記</title>
</head >
<body>
<div class="menu">
  <?php
  require_once 'back-end/sql-connect.php';

  $cuser = $_SESSION[ 'uid' ];
  $sql = "SELECT * FROM `user` WHERE uid='$cuser'";
  $note = mysqli_query( $link, $sql );

  ?>
  <ul class="drop-down-menu" align="right">
    <li><a href="about-me.php">個人頁面</a> </li>
    <li><a href="mynote.php">我的筆記</a> </li>
    <li><a href="back-end/logout.php">離開</a> </li>
  </ul>
</div>
<div class="content">
  <input type="button" class="addbtn" id="add" value="新增筆記本">
  <dialog id="add-group">
    <div class="list">
      <form action="back-end/note-info.php" method="post">
        <div>標題&nbsp;&nbsp;
          <input type="text" name="title" placeholder="請輸入筆記本標題">
        </div>
        <div><br>
        </div>
        <div class="notelist">
          <div class="1"><img src="image/note1.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=1>
            </div>
          </div>
          <div class="2"><img src="image/note2.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=2>
            </div>
          </div>
          <div class="3"><img src="image/note3.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=3>
            </div>
          </div>
          <div class="4"><img src="image/note4.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=4>
            </div>
          </div>
          <div class="5"><img src="image/note5.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=5>
            </div>
          </div>
          <div class="6"><img src="image/note6.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=6>
            </div>
          </div>
          <div class="7"><img src="image/note7.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=7>
            </div>
          </div>
          <div class="8"><img src="image/note8.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=8>
            </div>
          </div>
          <div class="9"><img src="image/note9.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=9>
            </div>
          </div>
          <div class="10"><img src="image/note10.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=10>
            </div>
          </div>
          <div class="11"><img src="image/note11.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=11>
            </div>
          </div>
          <div class="12"><img src="image/note12.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=12>
            </div>
          </div>
          <div class="13"><img src="image/note13.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=13>
            </div>
          </div>
          <div class="14"><img src="image/note14.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=14>
            </div>
          </div>
		  <div class="15"><img src="image/note15.png" width="100">&nbsp;&nbsp;
            <div>
              <input type="radio" name="note-image" value=15>
            </div>
          </div>
          <div class="subtn">
            <input type="submit" id="ok" value="確定新增">
            <input type="button" id="close" value="返回">
          </div>
        </div>
      </form>
    </div>
  </dialog>
  <style>	
		dialog{
		  border: none;
		  box-shadow: 0 2px 6px #ccc;
		  border-radius: 10px;
		}

		dialog::backdrop {
		  background-color: rgb(235,232,226);
		  opacity: 0.5;
		}
	  .notelist {
		  display: grid;
		  grid-template-columns: repeat(5, 1fr);
		  grid-gap: 50px;
		  grid-auto-rows: minmax(auto, 120px);
		}
		.subtn {
		  grid-row: 4;
		  grid-gap: 10px;
		}

	  
		#input[type="submit"] {
		  -webkit-border-radius: 5px;
		}
	</style>
  <script>	
			let btn=document.querySelector("#add");
			let infoModal=document.querySelector("#add-group");
			let close=document.querySelector("#close");
			btn.addEventListener("click", function(){
			  infoModal.showModal();
			})
			close.addEventListener("click", function(){
			  infoModal.close();
			})
		</script>
  <div class="native-bar">
    <div class="native-content">
      <?php
      require_once 'back-end/sql-connect.php';

      $cuser = $_SESSION[ 'uid' ];
      //$sql = "SELECT * FROM `classification`";
      $sql = "SELECT * FROM `catalog` WHERE uid='$cuser'";
      $note = mysqli_query( $link, $sql );
	  
	  //筆記本圖片選取
      if ( $note && mysqli_num_rows( $note ) > 0 ) {
        while ( $row = mysqli_fetch_assoc( $note ) ) {
          echo "<a class='note-info' href='qlist.php?id=$row[cid]'>";

          switch ( $row[ 'imgid' ] ) {
            case 1:
              echo "<div class='img-content'><img src='image/note1.png'></div>";
              break;
            case 2:
              echo "<div class='img-content'><img src='image/note2.png'></div>";
              break;
            case 3:
              echo "<div class='img-content'><img src='image/note3.png'></div>";
              break;
            case 4:
              echo "<div class='img-content'><img src='image/note4.png'></div>";
              break;
            case 5:
              echo "<div class='img-content'><img src='image/note5.png'></div>";
              break;
            case 6:
              echo "<div class='img-content'><img src='image/note6.png'></div>";
              break;
            case 7:
              echo "<div class='img-content'><img src='image/note7.png'></div>";
              break;
            case 8:
              echo "<div class='img-content'><img src='image/note8.png'></div>";
              break;
            case 9:
              echo "<div class='img-content'><img src='image/note9.png'></div>";
              break;
            case 10:
              echo "<div class='img-content'><img src='image/note10.png'></div>";
              break;
            case 11:
              echo "<div class='img-content'><img src='image/note11.png'></div>";
              break;
            case 12:
              echo "<div class='img-content'><img src='image/note12.png'></div>";
              break;
            case 13:
              echo "<div class='img-content'><img src='image/note13.png'></div>";
              break;
            case 14:
              echo "<div class='img-content'><img src='image/note14.png'></div>";
              break;
			case 15:
              echo "<div class='img-content'><img src='image/note15.png'></div>";
              break;
          }
			
          echo "<div class='title'>$row[title]</div>";
          echo "<div></div>";
          echo "</a>";
        }
      }
      ?>

    </div>
  </div>
</div>
</body>
</html>
