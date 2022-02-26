<?php
if ($result_rows = mysqli_query($conn,$sql_rows)){
    // Return the number of rows in result set
    $total_rows = mysqli_num_rows($result_rows);
    
    // Free result set
    mysqli_free_result($result_rows);
}

$total_pages = ceil($total_rows/$rows_per_page);

echo '
    <nav aria-label="Page navigation example">
        <ul class="pagination"> 
    ';

for($i=1; $i<=$total_pages; $i++){
    echo '<li class="page-item"><a class="page-link" href="admin.php?page=' . $i . '">' . $i . '</a></li>';
}
echo '</ul></nav>';



?>