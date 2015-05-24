# KohaFacebookApp
This script will let you post every new cataloged book in your Koha ILS to your Facebook fan page . 
#How to implement : 
* A report from your system which can be  generated every one hour contains details about your new titles in the last hour ( Title , Author , Publisher , Date of publication ... , URL etc. ) . Check the SQL Report example (report-sample.sql) attached in this git repository .
* The report must be public and in JSON format (Follow the instructions inside comments within the post.php script )
* Get a Facebook app ( Free and easy to get ) http://developers.facebook.com
* After you follow and configure you (post.php) file as discriped in the commints insid it, then schedule it to be run in hourly basis to read your report in and to compile the book data and reproduce them in a readable attractive template by inserting some text in $header, $footer variables .

I hope you will enjoy it and you'll get its benifits . 
Copywrite by
