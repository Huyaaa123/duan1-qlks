<?php
    function loadall_taikhoan(){
        $sql = "select * from signup order by UserID desc"; 
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }
    function insert_taikhoan($email,$user,$password){
        $sql = "insert into signup(Email,Username,Password) values('$email','$user','$password')";
        pdo_execute($sql);
    }
    function checkuser($email,$pass){
        $sql = "select * from signup where Email='".$email."' AND Password='".$pass."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function emp_login($email,$pass){
        $sql = "select * from emp_login where Emp_Email='".$email."' AND Emp_Password='".$pass."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function nhanvien_login($email,$pass){
        $sql = "select * from nhanvien where Email='".$email."' AND Password='".$pass."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function checkemail($email){
        $sql = "select * from signup where Email='".$email."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }
    // function update_taikhoan($id,$user,$pass,$email,$address,$tel){      
    //     $sql = "update taikhoan set signup='".$user."', pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' where id=".$id;
    //     pdo_execute($sql);
    // }
?>