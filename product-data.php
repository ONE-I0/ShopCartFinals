<?php
    require('open-connection.php');
    $strsql = "SELECT * FROM products_table";
    function viewRS($con, $strsql){
        $rs = [];
        $i = 0;
        if($stmt = mysqli_query($con, $strsql)){
            // specific
            if(mysqli_num_rows($stmt) == 1){
                $record = mysqli_fetch_array($stmt);
                foreach($record as $key => $value){
                    $rs[$key] = $value;
                }
            }
            elseif(mysqli_num_rows($stmt) > 1){
                while($record = mysqli_fetch_array($stmt)){
                    foreach($record as $key => $value){
                        $rs[$i][$key] = $value;
                    }
                    $i++;
                }
            }
            mysqli_free_result($stmt);
        }
        return $rs;
    }
    
    $arrProducts = viewRS($con,$strsql);

    require('close-connection.php');
?>