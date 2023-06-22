<?php
echo "<div class='container'>";
echo "<div class='card'>";
echo var_dump($_SESSION);
$session = [
    'number_army' => profile('army_id'),
];
$this->session->set_userdata($session);
//$list = [...]; // กำหนดค่า $list ให้เป็นอาร์เรย์ของข้อมูลที่ต้องการแสดงผล
foreach ($list as $l) {
    if ($l->a_armyid == $_SESSION['number_army']) {
        echo '<div class="card-body"><div class="text-body"> นี้ใช่คุณหรือไม่ <div class="text-danger">'.$l->r_fname.' '.$l->a_fname.' '.$l->a_lname.'</div></div></div>';
    }
}
echo "</div>";
echo "</div>";
?>