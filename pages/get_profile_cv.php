<!-- <div class="col-md-12 inside">
  <h4 class="text-right">A</h4>
  <button class="btn-get-value" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPRJREFUSEtjZKAxYKSx+QyjFhAM4YENIoVpnwIYfv498KBQ8AM2pyr0vxdgYGd2eJDFtwGXV3D6AGQ4IwPjegYGhgv/f/5xRLcEZDgjO8t+BgYGg/8M/wNxWYLbAogBBxgYGPTRLUE2nIGB4eL/n38ccPkSbxxADUKxBBQUMJcTMhysllAyQLcEqt6AGMOJsgCkCM0SkBDeYEF2NEEfIFkAjlCoZqwRjy00CFqAHqFQQzAinuRkisXl4GCBRjLW1EWSD/AlRWypi+RkipTRsEYosiVkZTRwENGyqCCUP4iVJ5iKiDWIrFREqeFE52RKLBr6QQQAz8GcGYpJ9eYAAAAASUVORK5CYII="/></button>
</div><br>
<div class="col-md-12 inside">
  <h4 class="text-right" >B</h4>
  <button class="btn-get-value" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPRJREFUSEtjZKAxYKSx+QyjFhAM4YENIoVpnwIYfv498KBQ8AM2pyr0vxdgYGd2eJDFtwGXV3D6AGQ4IwPjegYGhgv/f/5xRLcEZDgjO8t+BgYGg/8M/wNxWYLbAogBBxgYGPTRLUE2nIGB4eL/n38ccPkSbxxADUKxBBQUMJcTMhysllAyQLcEqt6AGMOJsgCkCM0SkBDeYEF2NEEfIFkAjlCoZqwRjy00CFqAHqFQQzAinuRkisXl4GCBRjLW1EWSD/AlRWypi+RkipTRsEYosiVkZTRwENGyqCCUP4iVJ5iKiDWIrFREqeFE52RKLBr6QQQAz8GcGYpJ9eYAAAAASUVORK5CYII="/></button>
</div><br>
<div class="col-md-12 inside">
  <h4 class="text-right" >C</h4>
  <button class="btn-get-value" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPRJREFUSEtjZKAxYKSx+QyjFhAM4YENIoVpnwIYfv498KBQ8AM2pyr0vxdgYGd2eJDFtwGXV3D6AGQ4IwPjegYGhgv/f/5xRLcEZDgjO8t+BgYGg/8M/wNxWYLbAogBBxgYGPTRLUE2nIGB4eL/n38ccPkSbxxADUKxBBQUMJcTMhysllAyQLcEqt6AGMOJsgCkCM0SkBDeYEF2NEEfIFkAjlCoZqwRjy00CFqAHqFQQzAinuRkisXl4GCBRjLW1EWSD/AlRWypi+RkipTRsEYosiVkZTRwENGyqCCUP4iVJ5iKiDWIrFREqeFE52RKLBr6QQQAz8GcGYpJ9eYAAAAASUVORK5CYII="/></button>
</div><br>
<div class="col-md-12 inside">
  <h4 class="text-right" >D</h4>
  <button class="btn-get-value" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPRJREFUSEtjZKAxYKSx+QyjFhAM4YENIoVpnwIYfv498KBQ8AM2pyr0vxdgYGd2eJDFtwGXV3D6AGQ4IwPjegYGhgv/f/5xRLcEZDgjO8t+BgYGg/8M/wNxWYLbAogBBxgYGPTRLUE2nIGB4eL/n38ccPkSbxxADUKxBBQUMJcTMhysllAyQLcEqt6AGMOJsgCkCM0SkBDeYEF2NEEfIFkAjlCoZqwRjy00CFqAHqFQQzAinuRkisXl4GCBRjLW1EWSD/AlRWypi+RkipTRsEYosiVkZTRwENGyqCCUP4iVJ5iKiDWIrFREqeFE52RKLBr6QQQAz8GcGYpJ9eYAAAAASUVORK5CYII="/></button>
</div><br> -->

<?php
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";

    $dbname = "CVManagement";
    $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);
    $id = $_SESSION['user_id'];
    if (isset($_GET['del'])){
        
        $del = $_GET['del'];
        // echo $del;
        $sql = "DELETE FROM cv WHERE id = '$del' AND employee_id = '$id'";
        $result = mysqli_query($conn, $sql);
    }
    $sql = "SELECT * FROM cv WHERE employee_id = '$id'";
    $result = mysqli_query($conn, $sql);
    
    // $a=0;
    // while($a<=10){
    //     echo"
    //         <div class=\"col-md-12 inside\">
    //           <h4 class=\"text-right\">A</h4>
    //           <button class=\"btn-get-value\" ><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPRJREFUSEtjZKAxYKSx+QyjFhAM4YENIoVpnwIYfv498KBQ8AM2pyr0vxdgYGd2eJDFtwGXV3D6AGQ4IwPjegYGhgv/f/5xRLcEZDgjO8t+BgYGg/8M/wNxWYLbAogBBxgYGPTRLUE2nIGB4eL/n38ccPkSbxxADUKxBBQUMJcTMhysllAyQLcEqt6AGMOJsgCkCM0SkBDeYEF2NEEfIFkAjlCoZqwRjy00CFqAHqFQQzAinuRkisXl4GCBRjLW1EWSD/AlRWypi+RkipTRsEYosiVkZTRwENGyqCCUP4iVJ5iKiDWIrFREqeFE52RKLBr6QQQAz8GcGYpJ9eYAAAAASUVORK5CYII=\"/></button>
    //         </div><br>
        
    //     ";
    //     $a+=1;
    // }
    
    if (mysqli_num_rows($result) == 0){
        echo "<h4>No recorded CVs</h4>";
        exit();
    }
    while($row = mysqli_fetch_assoc($result)){
        echo"
            <div class=\"col-md-12 inside\">
              <h4 class=\"text-right\">#${row['id']}</h4>
              <button class=\"btn-get-value\" ><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPRJREFUSEtjZKAxYKSx+QyjFhAM4YENIoVpnwIYfv498KBQ8AM2pyr0vxdgYGd2eJDFtwGXV3D6AGQ4IwPjegYGhgv/f/5xRLcEZDgjO8t+BgYGg/8M/wNxWYLbAogBBxgYGPTRLUE2nIGB4eL/n38ccPkSbxxADUKxBBQUMJcTMhysllAyQLcEqt6AGMOJsgCkCM0SkBDeYEF2NEEfIFkAjlCoZqwRjy00CFqAHqFQQzAinuRkisXl4GCBRjLW1EWSD/AlRWypi+RkipTRsEYosiVkZTRwENGyqCCUP4iVJ5iKiDWIrFREqeFE52RKLBr6QQQAz8GcGYpJ9eYAAAAASUVORK5CYII=\"/></button>
            </div><br>
        
        ";
    }

?>
