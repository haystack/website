#!/usr/bin/env python

from feedparser import parse
import simplejson

############ USER DEFINED ##########
num_titles = 3 #change this to get the top N articles
######## END USER DEFINED ##########

print "Content-Type: text/html"     # HTML is following
print                               # blank line, end of headers

feed = parse("http://groups.csail.mit.edu/haystack/blog/feed/")

num = min(num_titles, len(feed.entries))

a
for i in range(0, min(num_titles, len(feed.entries))):
  print "<a href=\"" + feed.entries[i].link + "\">" + \
        feed.entries[i].title + "</a>\n"
