<?php session_start()?>
<?php 
function authenticate_admin(){
    if($_SESSION['user']=='ace' && $_SESSION['password']=='1234'){
        return true;
    }else{
        return false;
    }
}
?>