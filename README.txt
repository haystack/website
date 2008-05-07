===== Generated Content =====

It is important to keep the files in site/includes/generated-content/ updated whenever you
update the .json files in site/data/ because the generated content is re-inserted within
<noscript>...</noscript> sections for search engines to process. For example, look at the bottom
of publications.html and find how rendered-publications.html is inserted.

In order to get the generated content after you have updated a .json file,
- make sure that all items on the page are shown; do this by scrolling to the bottom of the page
and clicking on the link

    Show all XX results
    
if you don't do that, then only the first 10 items are included.
- go back to the top of the page, find the scissors button, click it, and choose 

    Generated HTML of this view
    
- copy that HTML code into the appropriate site/includes/generated-content/rendered-*.html file.



