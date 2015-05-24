# KohaFacebookApp
* This script will publish every new book in your Koha to your Facebook fan page . 
* You must use this script with Koha 3.16.0 or older  . 

# How to implement
* A report from your system which can be  generated every one hour contains details about your new titles in the last hour ( Title , Author , Publisher , Date of publication, URL etc. ) . Check the SQL Report example (report-sample.sql) in this git repository .
* The report must be public and in JSON format (Follow the instructions inside comments within the post.php script )
* Get a Facebook app ( Free and easy to get ) http://developers.facebook.com
* After you follow the instructions inside the post.php file  and after you finished configuration it, then schedule it to be run in hourly basis to read your report and to compile the books data and reproduce them in a readable attractive template that you can make by inserting some text in $header, $footer variables .

I hope you will enjoy it and you'll get its benifits . 
# Copyright
By Karam Qubsi , 2015.

Any suggestions or contributions are very welcome :) . 

Email : <karamqubsi@gmail.com> 

GNU GENERAL PUBLIC LICENSE Version 2
