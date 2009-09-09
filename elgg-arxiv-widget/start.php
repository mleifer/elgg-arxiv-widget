<?php
 
    /**
     * Elgg arXiv: Recent eprints widget plugin
     * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
     * @author Matthew Saul Leifer
     * @copyright Matthew Saul Leifer 2009
     * @link http://mattleifer.info/code/elgg-arxiv
     **/
 
   function arxiv_init() {

	// Add arXiv widget
		add_widget_type('arxiv',elgg_echo('arXiv:recenteprints'),elgg_echo('arXiv:widgetinfo'));
	
	// Add new CSS
		extend_view('css','arxiv/css');
	}

	// Register event handler for plugin
		register_elgg_event_handler('init','system','arxiv_init');
?>
