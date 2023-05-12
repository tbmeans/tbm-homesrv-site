# The website for my home server

## Built on the LAMP stack
* Drop the contents of this repo into /var/www/html
* Create a virtual hosts config for your home server's IP on port 80.
* Choose to keep or remove index's link to a WordPress instance
  * If keep, make a root for WordPress /var/www/html/blog
  * Use the WP instance as a personal blog or WP dev env.
* Page scripts expect a database with tables of 
  * titles of movies recorded from TV
  * chess moves
  * Bing wallpaper images
* Populate the php scripts with login information for the database
* Movie search result previews powered by video.js

## Database table fields
### Movie table 'tvrecs'
* 'title'
* 'whenrec', date recorded in YYYYMMDD##
  * Final 2 digits distinguish recordings made on same date
  * This is the primary key
* 'fromchannel', name of channel recorded from
* 'cc', SQL boolean of whether the recording has caption data
* 'rating', make up your own categories
  * Also use categories to fill the Select options in movies.html 
### Bing Image table
* Image of the Day date YYYYMMDD##
  * Multiple images if Bing Wallpaper app differed from bing.com
  * Final digits to distinguish multiple images 
  * This is the primary key
* Image title
* Photo copyright credit
* URL of full-size image