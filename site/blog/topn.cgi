#!/usr/bin/env python

from feedparser import parse
from datetime import datetime
import simplejson

############ USER DEFINED ##########
num_titles = 3 #change this to get the top N articles
######## END USER DEFINED ##########

print "Content-Type: text/html"     # HTML is following
print                               # blank line, end of headers

feed = parse("http://feeds.feedburner.com/HaystackBlog")

num_entries = min(num_titles, len(feed.entries))
entries = []

for i in range(0, num_entries):
  entry = feed.entries[i]
  dateTuple = entry.updated_parsed
  date = datetime(dateTuple[0], dateTuple[1], dateTuple[2],
			dateTuple[3], dateTuple[4], dateTuple[5],
			dateTuple[6])
  entry_dict = {"type":"Blog Entry",
                "label":entry.title,
                "permalink":entry.link,
                "date":date.strftime("%Y-%m-%dT%H:%M:%S"),
                "author":entry.author}
  entries.append(entry_dict)

items = {"items":entries}
print simplejson.dumps(items)
