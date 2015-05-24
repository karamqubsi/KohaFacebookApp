# KohaFacebookApp
This script will let you post every new cataloged book in your Koha ILS to your Facebook fan page . 
#How to implement : 
* A report from your system which can be  generated every one hour contains details about your new titles in the last hour ( Title , Author , Publisher , Date of publication ... , URL etc. ) . Check the SQL Report example that was used with this script .
* The report must be public and in JSON format 
* Get a Facebook app ( Free and easy to get ) http://developers.facebook.com
* Then schedule this code to read your report in hourly basis and compile the book data and reproduce them in a readable attractive template by inserting some text in $header, $footer variables .
