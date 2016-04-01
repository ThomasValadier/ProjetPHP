<?php 
    $this->load->helper("html");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

 <?php   
    echo link_tag('Assets/styles/vendor/font-awesome.min.css');
    echo link_tag('Assets/styles/vendor/bootstrap.min.css');
    echo link_tag('Assets/styles/vendor/toastr.min.css');
        if(isset($css))
            queue_css($css);    
        echo link_tag('Assets/styles/Base.css'); 
    ?>
    
   <title>✪ Super Voisin ✪</title>
</head>
<body>