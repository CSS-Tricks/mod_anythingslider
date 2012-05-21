<?php
/**
 * AnythingSlider Module Entry Point
 *
 * @version    1.2.2
 * @package    Joomla 1.5.0
 * @subpackage Modules
 * @Copyright  Copyright (c)2010 Dnote Software, Joomla 2.5 updates (c)2012 Akadamia
 * @license    GNU/GPL, see the gpl-3.0.txt file included in this package
 * Modified by Akadamia http://www.akadamia.co.uk to work with Joomla 2.5.2
 *
 * mod_anythingslider is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * Parts of this software are based on AnythingSlider By Chris Coyier: http://css-tricks.com
 **/

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// include the helper file
require_once(dirname(__FILE__).DS.'helper.php');

$params->set('intro_only', 1);
$params->set('hide_author', 1);
$params->set('hide_createdate', 0);
$params->set('hide_modifydate', 1);

// Disable edit ability icon
$access = new stdClass();
$access->canEdit  = 0;
$access->canEditOwn = 0;
$access->canPublish = 0;

//params
$sliderwidth=$params->get( 'width' );
$sliderheight=$params->get( 'height' );
$loadjquery = $params->get( 'loadjquery' );
$loadfx = $params->get( 'loadfx' );
$loadvideo = $params->get( 'loadvideo' );
$number_items = $params->get( 'items' );

$slidertheme=$params->get( 'theme' );
$aswrapper=$params->get( 'wrapper' );
$sliderexpand=$params->get( 'expand' );
$resizecontents=$params->get( 'resizecontents' );
$slidervertical=$params->get( 'vertical' );
$showmultiple=$params->get( 'showmultiple' );
$togglearrows=$params->get( 'togglearrows' );
$togglecontrols=$params->get( 'togglecontrols' );
$starttext=$params->get( 'starttext' );
$stoptext=$params->get( 'stoptext' );
$forwardtext=$params->get( 'forwardtext' );
$backtext=$params->get( 'backtext' );
$tooltipclass=$params->get( 'tooltipclass' );
$enablearrows=$params->get( 'enablearrows' );
$enablenavigation=$params->get( 'enablenavigation' );
$enablestartstop=$params->get( 'enablestartstop' );
$enablekeyboard=$params->get( 'enablekeyboard' );
$startpanel=$params->get( 'startpanel' );
$changeby=$params->get( 'changeby' );
$hashtags=$params->get( 'hashtags' );
$infiniteslides=$params->get( 'infiniteslides' );
$navigation = $params->get( 'navigation' );
$autoplay = $params->get( 'autoplay' );
$autoplaylocked = $params->get( 'autoplaylocked' );
$autoplaydelayed = $params->get( 'autoplaydelayed' );
$pauseonhover = $params->get( 'pauseonhover' );
$stopatend = $params->get( 'stopatend' );
$playrtl = $params->get( 'playrtl' );
$delay = $params->get( 'delay' );
$resumedelay = $params->get( 'resumedelay' );
$animationtime = $params->get( 'animationtime' );
$delaybeforeanimate = $params->get( 'delaybeforeanimate' );

//append javascript AND css files 
$document =& JFactory::getDocument();
if ($loadjquery) $document->addscript('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
$document->addscript(JURI::root().'/modules/mod_anythingslider/js/jquery.easing.1.2.js');
$document->addscript(JURI::root().'/modules/mod_anythingslider/js/jquery.anythingslider.min.js');
if ($loadvideo) $document->addscript(JURI::root().'/modules/mod_anythingslider/js/jquery.anythingslider.video.min.js');
if ($loadfx) $document->addscript(JURI::root().'/modules/mod_anythingslider/js/jquery.anythingslider.fx.min.js');
if ($slidertheme != "default") {
	$document->addStyleSheet(JURI::root().'/modules/mod_anythingslider/css/theme-'.$slidertheme.'.css');
} else {
	$document->addStyleSheet(JURI::root().'/modules/mod_anythingslider/css/anythingslider.css');
}
$document->addStyleSheet(JURI::root().'/modules/mod_anythingslider/css/wrapper-'.$aswrapper.'.css');
$doc =& JFactory::getDocument();
$style = '#slider {'
	. 'width:'.$sliderwidth.'px;'
	. 'height:'.$sliderheight.'px;'
	. 'list-style: none;'
	. 'overflow-y: auto;'
	. 'overflow-x: hidden;'
	. '}'; 
$doc->addStyleDeclaration( $style );
// get the items to display from the helper
$slideShow = ModSlideShow::getSlideshow($params, $access);
if ($number_items=="")  $number_items = count($slideShow);
// include the template for display
require(JModuleHelper::getLayoutPath('mod_anythingslider'));

?>