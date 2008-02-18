function onLoad() {
    var currentHref = document.location.href;
    if (currentHref.charAt(currentHref.length - 1) == '/') {
        currentHref = currentHref + "index.html";
    }
    
    var links = document.getElementById("navigation-panel").getElementsByTagName("a");
    for (var i = 0; i < links.length; i++) {
        var link = links[i];
        var href = link.href;
        if (currentHref.indexOf(href) == 0) {
            link.className = "section-link selected";
        }
    }
}
