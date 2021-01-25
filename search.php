<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php
        include 'partials/header.php';
    ?>

    <?php
        $filter = $_GET['filter'];
    ?>
    
    
    <div class="container">
        <br>


        <div class="row" id="result">
        </div>



    </div>


    <script type="text/javascript">
    var filter = '<?php echo $filter ?>';
       getSearchResult(filter);


    </script>

</body>
</html>
