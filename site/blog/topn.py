from feedparser import parse
from datetime import datetime
import simplejson
import re

############ USER DEFINED ##########
num_titles = 3 #change this to get the top N articles
feed_url = "http://groups.csail.mit.edu/haystack/blog/category/news/feed"
item_type = "News Item"
######## END USER DEFINED ##########


def feed_parse():
  feed = parse(feed_url)

  num_entries = min(num_titles, len(feed.entries))
  entries = []

  for i in range(0, num_entries):
    entry = feed.entries[i]
    dateTuple = entry.updated_parsed
    date = datetime(dateTuple[0], dateTuple[1], dateTuple[2],
                    dateTuple[3], dateTuple[4], dateTuple[5],
                    dateTuple[6])
    content = entry.content[0].value
    p = re.compile(r'<[^<]*?>')
    content_clipped = p.sub('', content)
    content_clipped = content_clipped[:content_clipped.find(".")+1] + " <a href='" + entry.link + "'>[more]</a>" 
    entry_dict = {"type":item_type,
                  "label":entry.title,
                  "permalink":entry.link,
                  "date":date.strftime("%Y-%m-%dT%H:%M:%S"),
                  "author":entry.author,
                  "content":content_clipped}
    entries.append(entry_dict)

  items = {"items":entries}
  print simplejson.dumps(items)
