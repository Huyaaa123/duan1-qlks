<?php

function all_dichvu(){
    $sql = "SELECT * FROM dichvu ";
    $list_dv = pdo_query($sql);
    return $list_dv;
}
function del_dichvu($id){
    $sql = "DELETE FROM dichvu WHERE id =" .$id;
    pdo_execute($sql);
}
function insert_dichvu($id,$name,$mota,$image,$price,$time){
    $sql="insert into  dichvu (id,name,mota,image,price,time) values('$id','$name','$mota','$image','$price','$time')";
    pdo_execute($sql);
}
function update_dichvu($id,$name,$mota,$image,$price,$time){
    if($image!="")
    $sql="update dichvu set  id='".$id."',name='".$name."',image='".$image."',mota='".$mota."',price='".$price."',time='".$time."' where id=".$id;
else
$sql="update dichvu set  id='".$id."',name='".$name."',mota='".$mota."',price='".$price."',time='".$time."' where id=".$id;
    pdo_execute($sql);
}