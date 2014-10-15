<?php
$out="<select>";
foreach ($list as $key => $value) {
    $out.='<option value="'.$key.'">'.$value.'</option>';
}
$out .="</select>";
echo $out;