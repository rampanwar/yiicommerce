<?php

function pr($var=""){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
};

function prd($var=""){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
	exit;
};

?>