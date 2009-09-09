<?php

	/**
	 * Elgg arXiv: Widget Edit
	 * 
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
         * @author Matthew Saul Leifer
         * @copyright Matthew Saul Leifer 2009
         * @link http://mattleifer.info/code/elgg-arxiv
         **/

?>

<!-- The arXiv search query -->
<p>
<?php echo elgg_echo('arXiv:searchstring'); ?> <a href="http://export.arxiv.org/api_help/docs/user-manual.html#query_details"><?php echo elgg_echo('arXiv:thislink'); ?></a>.<br />
	<input type="text" onclick="this.select();" name="params[arxivsearchstring]" value="<?php echo htmlentities($vars['entity']->arxivsearchstring); ?>" /></p>

<!-- Number of eprints to display -->
<p>
    <?php echo elgg_echo('arXiv:displaynum'); ?><br />
    	<input type="text" onclick="this.select();" name="params[limit]" value="<?php echo htmlentities($vars['entity']->limit); ?>" />
</p>

<!-- Max. number of authors in each author list -->
<p>
    <?php echo elgg_echo('arXiv:authors'); ?><br />
    	<input type="text" onclick="this.select();" name="params[authors]" value="<?php echo htmlentities($vars['entity']->authors); ?>" />
</p>
</p>