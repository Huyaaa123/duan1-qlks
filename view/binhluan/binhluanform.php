<?php 
session_start();    
include "../../models/pdo.php";
include "../../models/binhluan.php";
$idpro=$_REQUEST['idpro'];

$dsbl=loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/main.css">
<style>
      .binhluan table{
width: 90%;
margin-left: 5%;
  }
  .binhluan table td:nth-child(1){
    width: 50%;
  }
  .binhluan table td:nth-child(2){
    width: 20%;
  }
  .binhluan table td:nth-child(3){
    width: 30%;
  }
</style>
</head>
<body>
    

<div class="mb">
              <div class="box_title">BÌNH LUẬN</div>
              <div class="box_content2 product_portfolio binhluan">
                <ul >
                    <table>
                    <?php
                    echo "Nội dung bình luận ở đây: ".$idpro;
                    foreach($dsbl as $bl){
                        extract($bl);
                        echo '<tr><td>'.$noidung.'</td>';
                        echo '<td>'.$iduser.'</td>';
                        echo '<td>'.$ngaybinhluan.'</td></tr>';
                    }
                    ?>
                    </table>
                </ul>
              </div>
              <div class="boxfooter binhluanform">
                <form action="<?=$_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="hidden" name="idpro" value="<?=$idpro?>">
                    
                   <input type="text" name="noidung" >
                   <input type="submit" value="Gửi bình luận" name="guibinhluan" >
                </form>
              </div>
              <?php
              if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
               $iduser=$_SESSION['user']['id'];
               $noidung=$_POST['noidung'];
               $idpro=$_POST['idpro'];
               $ngaybinhluan=date('h:i:sa d/m/Y');
                insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
                header("location: ".$_SERVER['HTTP_REFERER']);
            }
            
              ?>
           </div>
           </body>
</html>