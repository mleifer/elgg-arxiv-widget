<?php
	/**
	 * Elgg arXiv: view for arXiv widget
	 * 
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Matthew Saul Leifer
	 * @copyright Matthew Saul Leifer 2009
	 * @link http://mattleifer.info/code/elgg-arxiv
	 */

        // Elgg global configuration variable
  	global $CONFIG;

        // Step size for paging through arXiv serach results
        define("STEP_SIZE",10);
        // The Atom namespace
        define("ATOM_NS", "http://www.w3.org/2005/Atom");

        // Include the SimplePie parser in case it hasn't been included already
	if (!class_exists('SimplePie')) {
		require_once $CONFIG->pluginspath . '/arXiv/simplepie.inc';
	}

        // Retrieve widget settings
	$arxivsearchstring = $vars['entity']->arxivsearchstring;
        $num_display_eprints = (int)$vars['entity']->limit;
        $num_display_authors = (int)$vars['entity']->authors;

        // The base URL for arXiv API searches
        $arxiv_base_url = "http://export.arxiv.org/api/query?search_query=" . $arxivsearchstring . "&start=";

        // Check if a search string has been entered
	if($arxivsearchstring){
	        // Location of the SimplePie cache folder
	  	$cache_loc = $CONFIG->pluginspath . 'arXiv/cache';
		/* This section is necessary because the arXiv API does not 
                   provide results in date order, so recent eprints may appear 
                   arbitrarily far down in the feed.  Therefore we need to get 
                   all search results. */
		$j = 0;
		do {
		  $eprints[$j] = new SimplePie($arxiv_base_url . $j*(STEP_SIZE) . "&max_results=" . STEP_SIZE, $cache_loc);
		}
		while ($eprints[$j++]->get_item_quantity());
		// Calculate the total number of eprints in the search results
		$num_eprints_in_feed = $eprints[$j - 2]->get_item_quantity() + STEP_SIZE*($j - 2);
		// Merge all results into a single array.  SimplePie automatically sorts them into date order.
		$merged = SimplePie::merge_items($eprints);
		if (!$num_eprints_in_feed) {			
		        // If there are no eprints in the results then display an appropriate message.
			echo elgg_echo('arXiv:cannotfind');
		} else {
                  /* Check whether there are less eprints in the feed than the user has asked to display, 
		   or whether they want to display all results */
		  if ($num_eprints_in_feed < $num_display_eprints || $num_display_eprints < 0)
		    $num_display_eprints = $num_eprints_in_feed;
		  // Start of the list of eprints 
		  echo "<ul id=\"arXiveprintlist\">";
		  // Loop through the number of eprints to be displayed
		  for ($j = 0; $j < $num_display_eprints; $j++){
		    /* This is the article ID.  arXiv ids give the full URL and we strip the first 20 characters 
		     to get rid of http://www.arXiv.org/abs/ */
		    $temp = substr($merged[$j]->get_id(),21);
		    // Obtain the abstract and pdf links for the eprint
		    foreach ($merged[$j]->get_item_tags(ATOM_NS,'link') as $link) {
		      if ($link['attribs']['']['rel'] == 'alternate') {
			$abslink = $link['attribs']['']['href'];
		      } elseif ($link['attribs']['']['title'] == 'pdf') {
			$pdflink = $link['attribs']['']['href'];
		      }
		    }
		    // Display the article id, with link to abstract, and the pdf link.
		    ?><li><a class = "arXivabs" href="<?php echo $abslink; ?>">arXiv:<?php echo $temp;?></a><a class="arXivpdf" href = "<?php echo $pdflink; ?>">PDF</a><br /><?php
		    // Display the eprint's title												  
		    echo $merged[$j]->get_title() . "<br />";
		    // Array for storing the list of author names
		    $author_names = array();
		    // This next section stores the appropriate number of author names in the array
		    $num_display_authors_thistime = $num_display_authors;
		    // Get all the author metadata
		    $authors = $merged[$j]->get_authors();
		    // Figure out the correct number of authors to display
		    $num_eprint_authors = sizeof($authors);
		    if ($num_eprint_authors < $num_display_authors || $num_display_authors < 0)
		      $num_display_authors_thistime = $num_eprint_authors;
		    // Push the author names into the array
		    for ($k = 0; $k < $num_display_authors_thistime; $k++) {
		      array_push($author_names,$authors[$k]->get_name());
		    }
		    // Format the author list string
		    $author_string = join(', ',$author_names);
		    if ($num_eprint_authors > $num_display_authors && $num_display_authors > 0)
		      $author_string .= ", et. al.";
		    // Finally, output the author list
		    echo $author_string . "</li>";
		  }
		  echo "</ul>";
		  }
	} else {    
	  // Display appropriate message if there is no search query
	  echo elgg_echo('arXiv:notset');      
	}
?>
