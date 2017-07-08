#!/usr/bin/env python
import cgitb
cgitb.enable()

import topn

print "Content-Type: text/html"     # HTML is following
print                               # blank line, end of headers
topn.feed_parse()
