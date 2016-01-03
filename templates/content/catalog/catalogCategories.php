<?php
if( count( $items ) > 0 ) {
    $result = '';
    foreach ($items as $key => $item) {
        $result .= include("catalogCategory.php");
    }
    return $result;
}
else
{
    return '<h1>Репертур</h1>';
}