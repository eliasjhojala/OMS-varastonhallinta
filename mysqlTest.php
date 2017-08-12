<?php include 'mysql.php'; ?>

<?php

$sql = <<<SQL
    SELECT *
    FROM `users`
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
mysqli_close($db);


while($row = $result->fetch_assoc()){
    echo $row['first_name'] . '<br />';
}


newUser("Meikäläisen", "Matti", "meikalainenmatti", rand(1235));



?>
