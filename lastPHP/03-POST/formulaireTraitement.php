<?php
print_r($_POST);
echo '<hr>';
 if (!empty($_POST)) {
     echo 'email :' . $_POST['email'] . '<br>';
 }
?>