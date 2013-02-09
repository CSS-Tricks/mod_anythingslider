<?php
/**
 * AnythingSlider Html Template Renderer
 *
 * @version    1.3.1
 * @package    Joomla 2.5.0
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

defined('_JEXEC') or die('Restricted access'); // no direct access
?>
<script type="text/javascript">
var $asj = jQuery.noConflict();
$asj(function () {
	function formatText(index, panel) {
		<?php
		if ($navigation == 1)
		echo "return index + \"\";";
		else if ($navigation == 2)
		{
			echo "var titles = new Array();";
			for ($i=0, $n=$number_items; $i < $n; $i++) {
				$item = &$slideShow[$i];
				echo "titles[$i+1]=\"" . $item->title . "\";";
			}
			echo "return titles[index];";
		}
		else echo "return \"\";";
		?>
	}
	$asj('.anythingSlider').anythingSlider({
		theme				: "<?php echo $slidertheme ?>",
		mode				: "<?php echo $slidermode ?>",
		expand              : <?php echo $sliderexpand ? "true" : "false" ?>,     
		resizeContents      : <?php echo $resizecontents ? "true" : "false" ?>,      
		vertical            : <?php echo $slidervertical ? "true" : "false" ?>,     
		<?php if ($showmultiple != "") echo 'showMultiple : '.$showmultiple,','."\n"; ?>
		easing              : <?php if ($easing != "") echo '"'.$easing.'"'; else echo '"swing"'; ?>,   
		toggleArrows        : <?php echo $togglearrows ? "true" : "false" ?>,     
		toggleControls      : <?php echo $togglecontrols ? "true" : "false" ?>,     
		<?php
		if ($starttext != "") echo '	startText : "'.$starttext.'",'."\n";
		if ($stoptext != "") echo '	stopText : "'.$stoptext.'",'."\n";
		if ($forwardtext != "") echo '	forwardText : "'.$forwardtext.'",'."\n";
		if ($backtext != "") echo '	backText : "'.$backtext.'",'."\n";
		if ($tooltipclass != "") echo '	tooltipClass : "'.$tooltipclass.'",'."\n";
		?>
		enableArrows        : <?php echo $enablearrows ? "true" : "false" ?>,      
		enableNavigation    : <?php echo $enablenavigation ? "true" : "false" ?>,      
		enableStartStop     : <?php echo $enablestartstop ? "true" : "false" ?>,      
		enableKeyboard      : <?php echo $enablekeyboard ? "true" : "false" ?>,      
		startPanel          : "<?php echo $startpanel ?>",         
		changeBy            : "<?php echo $changeby ?>",
		hashTags            : <?php echo $hashtags ? "true" : "false" ?>,      
		infiniteSlides      : <?php echo $infiniteslides ? "true" : "false" ?>,      
		autoPlay            : <?php echo $autoplay ? "true" : "false" ?>,     
		autoPlayLocked      : <?php echo $autoplaylocked ? "true" : "false" ?>,     
		autoPlayDelayed     : <?php echo $autoplaydelayed ? "true" : "false" ?>,     
		pauseOnHover        : <?php echo $pauseonhover ? "true" : "false" ?>,      
		stopAtEnd           : <?php echo $stopatend ? "true" : "false" ?>,     
		playRtl             : <?php echo $playrtl ? "true" : "false" ?>,     
		<?php
		if ($delay != "") echo '	delay: '.$delay.','."\n";      
		if ($resumedelay != "") echo '	resumeDelay: '.$resumedelay.','."\n";      
		if ($animationtime != "") echo '	animationTime: '.$animationtime.','."\n";      
		if ($delaybeforeanimate != "") echo '	delayBeforeAnimate: '.$delaybeforeanimate.','."\n";
		?>		
		navigationFormatter: formatText
	});
});
</script>
<?php
	JPluginHelper::importPlugin('content');
	echo '<div id="aswrapper" class="'.$aswrapper.'">';
    echo '<ul class="anythingSlider" id="slider'.$uniqueID.'">';
?>
	<?php
	if ($number_items == 0) echo "<li id='slide0'>No data in category</li>";
	for ($i=0, $n=$number_items; $i < $n; $i++) {
		$item = &$slideShow[$i];
		echo "<li id='slide$i'>";
		$aparams =& $item->parameters;
		$params->merge($aparams);
		$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		$dispatcher =& JDispatcher::getInstance();
		$item->text = JHtml::_('content.prepare', $item->introtext);
		if ($params->get('show_page_title'))
		  echo "<h2>$item->title</h2>";
		echo $item->text;
		echo "</li>";
	}
	?>
</ul>
</div>