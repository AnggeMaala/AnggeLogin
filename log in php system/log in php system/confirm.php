<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    header('Location: thank_you.php');
    exit;
} else {
    
    echo 'Invalid token.';
}
?>
