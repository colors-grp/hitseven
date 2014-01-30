<?
if(isset($_POST['image_name'])){ ?>
<script type="text/javascript" src="spejquery.js"></script> 
<script type="text/javascript" src="jquery.jqpuzzle.full.js"></script> 
<link rel="stylesheet" type="text/css" href="jquery.jqpuzzle.css" />
    <img src="../images/cat_face.jpg" alt="Animals crossing" class="jqp-de-r5-c7-SAE"  />

<script type="text/javascript"> 
    $(document).ready(function() { 
        $('img').jqPuzzle({shuffle:true}); // apply to all images 
    }); 
</script> 
    
<? } else {?>

<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>

<p>Directory access is forbidden.</p>

</body>
</html>
<? } ?>

