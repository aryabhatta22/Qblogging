<?php
if(isset($_SESSION['user_id'])){
    if(isset($_GET['logout'])){
        if($_GET['logout']==1){
            session_destroy();  
        }
        
    }  
}
?>