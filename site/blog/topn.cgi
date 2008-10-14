#!/usr/bin/env python

from feedparser import parse
import simplejson

############ USER DEFINED ##########
num_titles = 3 #change this to get the top N articles
######## END USER DEFINED ##########

print "Content-Type: text/html"     # HTML is following
print                               # blank line, end of headers

feed = parse("http://groups.csail.mit.edu/haystack/blog/feed/")

num_entries = min(num_titles, len(feed.entries))
entries = []

for i in range(0, num_entries):
  entry = feed.entries[i]
  entry_dict = {"type":"News",
                "label":entry.title,
                "permalink":entry.link,
                "date":entry.date,
                "author":entry.author}
  entries.append(entry_dict)

print simplejson.dumps(entries)
