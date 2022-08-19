<?php 

function debug_to_console($var, $label = 'debug_to_console'){
	return '<script>console.log("'.$label.': ", '. json_encode($var) .');</script>';
}