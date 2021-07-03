<?php
    include "init.php";
    
?>
<table class="admin-table">
    <th>الرقم</th>
    <th>اسم المريض</th>
    <th>البريد الالكتروني</th>
    <th>تاريخ الحجز</th>

<?php
    $pations = DB::getInstance()->getAllFrom('pations'); // Select all row from database
    foreach($pations->results() as $pation){
        echo "<tr>";
            echo "<td>". $pation->id ."</td>";
            echo "<td>". $pation->name ."</td>";
            echo "<td>". $pation->email ."</td>";
            echo "<td>". $pation->date."</td>";
        
        echo "</tr>";
    }
?>
</table>

