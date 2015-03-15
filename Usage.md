# Usage #

To add a "Recent arXiv Eprints" widget to your profile or dashboard, click on "Edit page" and drag it from the widget gallery to your profile/dashboard.

Before it will display anything, the widget needs to be configured.  To do this, go to your profile/dashboard and click the "EDIT" link on the widget.  You will then see the configuration options.  There are four configuration options to set:

## 1. arXiv search string ##

To determine your arXiv search string, go to [this page](http://export.arxiv.org/api_help/docs/user-manual.html#query_details) and look at how the search string is formatted at the end of the URL.  You need to type everything that appears after "search\_query=" in the URL.  For example, to do the first example given on that page, you would set `au:del_maestro` as your search string.  To give another example, the search string `au:leifer_m+OR+au:leifer_matthew` pulls up all Matt Leifer's publications.  There is much more useful advice on setting up search strings given on that site.

## 2. Maximum number of results to display ##

This does exactly what it says on the tin.  Many search queries will pull a lot of results, so it is useful to set a maximum number, e.g. 10, that will be displayed.  If you enter a negative number then the widget will display all results of the query.

## 3. Maximum number of authors to display ##

In some subjects, such as high energy physics, the author list of an eprint can be very long.  To avoid displaying too many authors you can set a maximum number.  For example, if you set this to "2", then the authors will display as `Firstauthor, Secondauthor et. al.`  Setting a negative number displays the full author list.

## 4. Access ##

This is a standard Elgg configuration option that allows you to control which visitors to the site will be able to see the widget.