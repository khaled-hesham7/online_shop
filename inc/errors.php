

<?php

// require_once '../App.php'  ;  
if ($session->get("errors")) { ?>
    
<div class="alert alert-dangerous" > <?php echo $session->get("errors") ?></div>

<?php }   


$session->remove("errors") ;