SELECT b.biblionumber,b.author AS author ,b.title,b.unititle, bi.publishercode, b.copyrightdate,b.timestamp ,b.datecreated,b.abstract,b.notes,b.serial,b.seriestitle ,b.abstract , CONCAT("http://YOUR-OPAC/bib/",b.biblionumber) AS url
FROM biblio b
 LEFT JOIN biblioitems bi ON (b.biblionumber=bi.biblionumber) 
WHERE b.timestamp > DATE_ADD( NOW(), INTERVAL -60 MINUTE) 

ORDER BY datecreated desc
