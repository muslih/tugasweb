<?php 
if (isset($_GET["hal"])) {
    $page = $_GET['hal']; 
    if (file_exists("./page/".$page.".php")) {
        include("./page/".$page.".php");
    }else{
        include("./page/404.php");
    }
}else{
    include './page/index.php';
}

?>
