<?php

namespace GoPlugin\Service;

class Menu extends \Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";

		$output .= '*** <a href="' . $item->url . '">';

		$output .= $item->title;

		if( $item->description != '' && $depth == 0 ) {
			$output .= '<small class="description">' . $item->description . '</small>';
		}

		$output .= '</a></li>';
	}
}
