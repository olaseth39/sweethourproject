<?php
include('config.php')
?>
<div class="col-md-4">
    <h2 style="text-align:center";>Product Categories</h2>
        <ul>
            <?php
                $sql    = "SELECT * FROM productcategory 
                            WHERE productcategoryId = productCategoryName ORDER BY productcategoryId ";
                
                $result = mysqli_query($con, $sql);
                var_dump($result);                
                if(mysqli_num_row($result) > 0){
                    while($row = mysqli_fetch_all($result)){
                    $productcategoryId = $row['productcategoryId']
            ?>
                <li><a href="productcategorypage.php?id=<?php echo $productcategoryId ?>">
                    <?php echo $row['productCategoryName'] ?></a></li>
            <?php
                    
                    }
                }
            ?> 
        </ul>
</div>