<?php 
    session_start();

    if(isset($_SESSION)) {
        if(isset($_SESSION['is_user_login']) && $_SESSION['is_user_login']==1 )
        {
            $_SESSION['user_id']="";
            $_SESSION['user_name']="";
            $_SESSION['is_user_login'] = 0;

            header('location:index.php');
        }
        else
        {
            $_SESSION['user_id']="";
            $_SESSION['user_name']="";
            header('location:index.php');
        }
    }
    else{
        session_destroy();
        header('location:index.php');
    }
?>