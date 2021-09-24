<?php
/*
  Plugin Name: mes shortcodes
  Description: Plugin fournissant des shortcodes
  Author: Elliott
  Version: 1.0.0
 */

function shortcode_bienvenue(){
    return "<h2>Bienvenue chez karac !</h2>";
}
add_shortcode('bienvenue', 'shortcode_bienvenue');


function shortcode_agence($atts){
    extract(shortcode_atts(
        array(
    	    'langue' => 'EN'
    ), $atts));

    if($langue== "EN"){
        $text = "karac, your digital communication agency ";
    }
    else{
    	$text = "karac, votre agence de communication digitale";
    }
    return '<h2>' . $text . '</h2>';
}
add_shortcode('agence', 'shortcode_agence');