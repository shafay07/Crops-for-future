<?php
require_once('../conn.php');
$output = '';
//collect
if (isset($_POST['query'])) {
    $searchq = $_POST['query'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
    $query ="SELECT name_var_lndrce FROM crop_taxonomy WHERE name_var_lndrce LIKE '%$searchq%' LIMIT 10";
    $result = $mysqli->query($query);

    $output = '<ul class="list-unstyled">';
    
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        $output .= '<li>Crop Not Found</li>';
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $searchname = $row['name_var_lndrce'];
            $output .= '<li>' . $searchname . '</li>';
        }
    }
}
$output .= '</ul>';
echo($output);
?>