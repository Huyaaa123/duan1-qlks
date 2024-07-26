<?php
function all_orders() {
    $sql = 'SELECT booking.*, status.ten_status 
            FROM booking
            INNER JOIN status ON booking.status = status.id_status';
    $list_orders = pdo_query($sql);
    return $list_orders;
}


function del_orders($id_customer)
{
    $sql = 'DELETE FROM orders WHERE id_customer =' . $id_customer;
    pdo_execute($sql);
}
function insert_orders(
    $name,
    $email,
    $sdt,
    $selectBox,
    $nhanphong,
    $traphong,
    $thanhtien,
    $status
) {
    $sql = "INSERT INTO  booking (id_customer,customer_name,customer_email,customer_phone,ngayDatPhong,ngayBatDauThue,thanhtien,status,tenPhong) 
    values(null,'$name','$email','$sdt','$nhanphong','$traphong','$thanhtien','$status','$selectBox')";
    pdo_execute($sql);
}



function update_orders(
    $id_customer,
    $customer_name,
    $customer_email,
    $customer_address,
    $customer_phone
) {
    $sql =
        "UPDATE booking SET id_customer='" .
        $id_customer .
        "' customer_name='" .
        $customer_name .
        "',customer_email='" .
        $customer_email .
        "', customer_address='" .
        $customer_address .
        "', customer_phone='" .
        $customer_phone .
        "' WHERE id_customer=" .
        $id_customer;

    pdo_execute($sql);
}
