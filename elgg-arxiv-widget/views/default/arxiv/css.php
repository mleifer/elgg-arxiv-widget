<?php

	/**
	 * Elgg arXiv: css for widget eprint listing
	 * 
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Matthew Saul Leifer
	 * @copyright Matthew Saul Leifer 2009
	 * @link http://mattleifer.info/code/elgg-arxiv
	 */

?>

/* Settings to make the list more compact in the widget */

ul#arXiveprintlist {
	margin: 0;
	padding: 2px 0 2px 0;
	line-height: 100%;
}
ul#arXiveprintlist li {
	margin-left: 5px;
	margin-bottom: 4px;
}

/* Fudges that allow the PDF link to be displayed on the right */

a.arXivabs {
  float: left;
}
a.arXivpdf {
  float: right;
}