# The website for my home media server

## Built with Symfony
* Populate ignored .env.local with database login url per Symfony docs
* Page to link to a collection of mp4s
* Page with NFL playoff schedule with links to Spectrum TV and Peacock streams

## MP4 collection database table
* 'title' of mp4 content
* 'whenrec', mp4 files named after date modified in YYYYMMDD##
  * Final 2 digits distinguish mp4s modified on same date
  * This is the primary key
* 'cc', boolean (TINYINT) of whether the recording has caption data
* 'tags', make up your own categories (used for future Select menu)
 

