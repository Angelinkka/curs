<?php
if( count( $items ) > 0 ) {
    $result = '';
	//( 0=>( Вишневый сад ... )
	//( 1=> )
    foreach ($items as $key => $item) {
        $result .= include("item_small.php");
    }
    return $result;
}
else
{
   return '<h1>Репертур</h1>';
}