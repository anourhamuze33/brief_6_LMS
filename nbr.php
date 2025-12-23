<?php
session_start();
$count =0;
$i=0
if($count==$i){
$session_id = session_id();
}
if(isset($_SESSION['user_id'])){
    echo $session_id;
    if($session_id !== session_id()){
        $count++;
        $i++;
    }
}
echo $count;


include "connect_pdo.php";
$sql = "SELECT 
    users.id, 
    users.name, 
    COUNT(enrollement.user_id) AS total_inscriptions
FROM users
LEFT JOIN enrollement ON users.id = enrollement.user_id
GROUP BY users.id, 
users.name
HAVING COUNT(enrollement.cour_id) = 0;";
$stmt = $db_con->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $user):
?>
  <p><?= $user['name'] ?></p>
<?php endforeach; ?>