<?php
class requette{

static function  bonjour(){
 $log = $_SESSION['session']['login'];
if (test::autorise()) {
    echo "<div class=\"bonjour \">" . $_SESSION['session']['login'] . " Shop</div>";
} else
    header('location:index.php');
}
}


