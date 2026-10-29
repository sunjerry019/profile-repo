// Function from David Walsh: http://davidwalsh.name/css-animation-callback
function whichTransitionEvent(){
  var t,
      el = document.createElement("fakeelement");

  var transitions = {
    "transition"      : "transitionend",
    "OTransition"     : "oTransitionEnd",
    "MozTransition"   : "transitionend",
    "WebkitTransition": "webkitTransitionEnd"
  }

  for (t in transitions){
    if (el.style[t] !== undefined){
      return transitions[t];
    }
  }
}

Array.prototype.clean = function(deleteValue) {
  for (var i = 0; i < this.length; i++) {
    if (this[i] == deleteValue) {
      this.splice(i, 1);
      i--;
    }
  }
  return this;
};

var threshold_height = 510;
var top_bottom_padding = 40;
var threshold_width = 480;
var left_right_padding = 40;
function resizeHeader() {
    if (!expanded) {
        wh = $(window).height();
        ww = $(window).width();
        if (wh <= threshold_height || ww <= threshold_width) {
            scale_height = (wh - top_bottom_padding)/(threshold_height - top_bottom_padding);
            scale_width  = (ww - left_right_padding)/(threshold_width - left_right_padding);

            $("#header-wrap").css("transform", "scale(" + Math.min(scale_height, scale_width) + ")");
        }
    }
    else {
        $("#header-wrap").css("transform", "");
    }
}

var transitionEvent = whichTransitionEvent();
var expanded = false;

$(document).ready(function(){
    resizeHeader();

    $("#header .center").addClass("loaded");
    $("body").addClass("noscroll");

    if(urlget.para("expand") == true) toggleHeader(true); // so that "0" will be evaluated as false
    else if(history.state && "expanded" in history.state && history.state["expanded"]) toggleHeader(true);

    $("#linkbtn_expand").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        toggleHeader();
    });

    $("#languages a").click(function(e){
        e.preventDefault();
        e.stopPropagation();

        var lang = $(this).attr("href").substring(1);
        window.location.href = urlget.update(lang);
    });

    $("#body .bulk h2").click(function(e){
        e.stopPropagation();
        parent = $(this).parent()[0];
        window.location.href = "#" + parent.id;
    });

    
    $(window).resize(resizeHeader);
});

var urlget =
{
    para : function (parameterName)
    {
        var result = null, tmp = [];
        location.search
            .substring(1)
            .split("&")
            .forEach(function (item) {
              tmp = item.split("=");
              if (tmp[0] === parameterName)
              {
                  if(tmp.length > 1) result = decodeURIComponent(tmp[1]);
                  else result = true;
              }
            });
        return result;
    },

    update : function(newoption)
    {
        var url = window.location.origin + window.location.pathname;
        var currentGets = window.location.search.substring(1).split("&");
        var opt = newoption.split("=");
        var found = false;

        for(i = 0; i < currentGets.length; i++)
        {
            tmp = currentGets[i].split("=");
            if (tmp[0] === opt[0])
            {
                currentGets[i] = newoption;
                found = true;
                break;
            }
        }

        if (!found)
        {
            currentGets.push(newoption);
        }

        currentGets.clean("");

        if (currentGets.length && currentGets[0].length) return url + "?" + currentGets.join("&");
        else return url;
    },

    remove : function(parameterName)
    {
        var url = window.location.origin + window.location.pathname;
        var currentGets = window.location.search.substring(1).split("&");
        var found = false;

        for(i = 0; i < currentGets.length; i++)
        {
            tmp = currentGets[i].split("=");
            if (tmp[0] === parameterName)
            {
                currentGets.splice(i, 1);
                found = true;
                break;
            }
        }

        if (!found) console.log(parameterName + " : no need to remove") // exit gracefully

        currentGets.clean("");
        if (currentGets.length && currentGets[0].length) return url + "?" + currentGets.join("&");
        else return url;
    }
}

var toggling = false;
var swap_ms = 250; // half of the header's 500ms height transition; keep in sync with `.fading` in style.css

// Runs `done` once the header's height transition has finished (or after a fallback timeout)
function afterHeightTransition($el, done)
{
    var finished = false;
    var timer = setTimeout(finish, 700);

    function finish()
    {
        if (finished) return;
        finished = true;
        clearTimeout(timer);
        $el.off("transitionend.toggleHeader");
        done();
    }

    $el.on("transitionend.toggleHeader", function(e)
    {
        if (e.target === $el[0] && e.originalEvent.propertyName === "height") finish();
    });
}

// The big <-> small layouts differ in things that cannot be transitioned (display, flex-direction,
// font-size via .full). So the content cross-fades *while* the height animates: it fades out during the
// first half, the layout is switched at the midpoint while invisible, and it fades back in during the second half.
function toggleHeader(override)
{
    if (toggling) return;
    toggling = true;

    var $header = $("#header");
    var $center = $("#header .center");
    var $others = $("body, #footer");
    var collapsing = !expanded || override;
    expanded = collapsing;

    // Switch everything that differs between the two states
    function applyLayout()
    {
        if (collapsing)
        {
            $header.removeClass("full in-flow");
            $center.removeClass("big loaded").addClass("small");
            $("body").removeClass("noscroll");
            $("#footer").removeClass("full");
        }
        else
        {
            $header.addClass("full in-flow"); // stay in the page flow until the transition ends
            $center.removeClass("small").addClass("big loaded");
            $("body").addClass("noscroll");
            $("#footer").addClass("full");
        }
    }

    // Measure the final layout (including scrollbar changes), then put everything back
    var curheight = $header.height();
    var saved = $header.add($center).add($others).map(function(){ return [[$(this).attr("class"), $(this).attr("style")]]; }).get();
    $header.addClass("measuring");
    applyLayout();
    $header.removeClass("in-flow").css("height", collapsing ? "auto" : "");
    var autoHeight = $header.height();
    $header.add($center).add($others).each(function(i)
    {
        $(this).attr("class", saved[i][0]);
        if (saved[i][1] === undefined) $(this).removeAttr("style"); else $(this).attr("style", saved[i][1]);
    });
    $header.addClass("measuring"); // restored classes replaced it
    if (collapsing) $header.addClass("in-flow"); // leave the fixed full screen state without moving the body
    $header.height(curheight);
    $header[0].offsetHeight;
    $header.removeClass("measuring");

    // Start both animations together
    $center.addClass("fading swapping");
    $header.height(autoHeight);

    setTimeout(function()
    {
        $header.addClass("notransition");
        applyLayout();
        resizeHeader();
        $header[0].offsetHeight;
        $header.removeClass("notransition");
        $center.removeClass("swapping");
    }, swap_ms);

    afterHeightTransition($header, function()
    {
        $center.removeClass("fading");
        if (collapsing) $header.height("auto");
        else $header.removeClass("in-flow").height("");
        toggling = false;
    });

    if (collapsing) history.pushState({ expanded: true }, "Expand About Me", urlget.update("expand"));
    else history.pushState({ expanded: false }, "De-expand About Me", urlget.remove("expand"));
}

/*var el = $('#header'),
    curHeight = el.height(),
    autoHeight = el.css('height', 'auto').height();
el.height(curHeight).removeClass("full").animate({height: autoHeight}, 1000, function(){
    $(this).delay(10000).promise().done(function(){
        $("#header").height('auto');
    })
});*/


/*$("#header").one(transitionEvent, function(e){
    if(hchange)
    {
        console.log("transitionEnded");
        $(this).height("auto");
    }
    e.stopPropagation();
}); */

/* $('#header').height($('#header').height()).removeClass("full").animate({
    height: $('#header').get(0).scrollHeight
}, 500, function(){
    console.log("Done");

});
// $("#header").height("");*/
