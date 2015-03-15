# Desired New Features #

  1. Current implementation fetches all the results of a search query and sorts them by date before displaying the most recent ones.  This is inefficient but was required by the old arXiv API.  The arXiv API has recently been updated so that it will now return date sorted results.  Change the implementation to reflect this.
  1. arXiv now supports unique identifiers for authors who have requested them.  Add the ability to specify an author by identifier rather than search query.
  1. The current search query interface is quite user unfriendly, since that you have to enter the last part of the API URL.  Add a parser to format more human readable URLs, like on the arXiv search interface itself.
  1. Add more user control of how the eprint records appear, e.g. options on whether to display affiliations, journal records, doi's, etc.
  1. Add some AJAX magic to allow abstracts to be browsed.