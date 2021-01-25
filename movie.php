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

        <nav aria-label="...">
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
        </nav>

        <div class="row" id="movielist">
        </div>

        
    </div>


    <script type="text/javascript">
        var page = 1;
        var filter = '<?php echo $filter ?>';
        getMoviesByType(filter, 1);

        function loadpage(page_no){
            if(page!=page_no)
            {
                page = page_no;
                getMoviesByType(filter, page);
            }
        }


    </script>

</body>
</html>
