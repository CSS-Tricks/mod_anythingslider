<?php
/**
 * AnythingSlider Helper Classes
 *
 * @package    Joomla 2.5.0
 * @subpackage Modules
 * @Copyright  Copyright (c)2010 Dnote Software
 * @license    GNU/GPL, see http://www.gnu.org/copyleft/gpl.html
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

 defined('_JEXEC') or die('Direct Access to this location is not allowed.');

class ModSlideShow
{
		/**
		 * Returns a list of articles
		*/
		function getSlideshow(&$params, &$access)
	{

		$db   =& JFactory::getDBO();
		$user   =& JFactory::getUser();
		$aid  = $user->get('aid', 0);

		$catid  = (int) $params->get('catid', 0);
		$items  = (int) $params->get('items', 0);

		$contentConfig  = &JComponentHelper::getParams( 'com_content' );
		$groups		= implode(',', $user->getAuthorisedViewLevels());
		$date =& JFactory::getDate();
		$now = $date->toSQL(); // was toMySQL, which was deprecated in Joomla! 2.5 and removed in 3.0

		$nullDate = $db->getNullDate();

		// Ordering
		switch ($params->get( 'ordering' ))
		{
			case 'o_asc':
				$ordering   = 'a.ordering';
				break;
			case 'o_dsc':
				$ordering   = 'a.ordering DESC';
				break;
			case 'm_dsc':
				$ordering   = 'a.modified DESC, a.created DESC';
				break;
			case 'c_dsc':
			default:
				$ordering   = 'a.created DESC';
				break;
		}

		// query to determine article count
		$query  = $db->getQuery(true);
		$query->clear();
		$query->select('a.*'); // all fields
		// Copied from mod_related_items/helper.php which did the same as the previous code here
	    $case_when = ' CASE WHEN ';
	    $case_when .= $query->charLength('a.alias');
	    $case_when .= ' THEN ';
	    $a_id = $query->castAsChar('a.id');
	    $case_when .= $query->concatenate(array($a_id, 'a.alias'), ':');
	    $case_when .= ' ELSE ';
	    $case_when .= $a_id.' END as slug';
		$query->select($case_when);
		// Copied from mod_related_items/helper.php which did the same as the previous code here
        $case_when = ' CASE WHEN ';
        $case_when .= $query->charLength('cc.alias');
        $case_when .= ' THEN ';
        $c_id = $query->castAsChar('cc.id');
        $case_when .= $query->concatenate(array($c_id, 'cc.alias'), ':');
        $case_when .= ' ELSE ';
        $case_when .= $c_id.' END as catslug';
        $query->select($case_when);
		// from all the articles in content
		$query->from('#__content AS a');
		// get the category data for those categories that we have articles for
		$query->innerJoin('#__categories AS cc ON cc.id = a.catid');
		// where the article is published, the user has access, we are between the start and end dates for publication
		$query->where('a.state = 1');
		$query->where('a.access IN (' . $groups . ')');
		$query->where('(a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).')');
		$query->where('(a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).')');
		// if the category has been published
		$query->where('(cc.published = 1)');
		// limit to those which are in the selected category
		$query->where('(cc.id = '.(int) $catid.')');
		// Order as requested
		$query->order($ordering);
		$db->setQuery($query);
		$rows = $db->loadObjectList();

		return $rows;
	}

}
?>
