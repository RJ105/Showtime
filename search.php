<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php
        include 'header.php';
    ?>

    <?php
        $filter = $_GET['filter'];
    ?>
    
    
    <div class="container">
        <br>

        <!-- <nav aria-label="...">
        <ul class="pagination pagination-sm">
           
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(1)" >1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(2)" >2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(3)" >3</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(4)" >4</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(5)" >5</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(6)" >6</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(7)" >7</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(8)" >8</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(9)" >9</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadpage(10)" >10</a></li>
        </ul>
        </nav> -->

        <div class="row" id="result">
        </div>

        
    </div>


    <script type="text/javascript">
    var filter = '<?php echo $filter ?>';
       getSearchResult(filter);


    </script>

</body>
</html>
