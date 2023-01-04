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

        var lang = $(this).attr("href").substr(1);
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
        var currentGets = window.location.search.substr(1).split("&");
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

function toggleHeader(override)
{
    if(!expanded || override)
    {
        curheight = $("#header").height();
        // console.log(curheight);
        $("#header .center").removeClass("big");
        $("#header .center").addClass("small");
        autoHeight = $("#header").removeClass("full").css('height', 'auto').height();
        $("#header .center").removeClass("small");
        $("#header .center").addClass("big");

        // console.log(autoHeight);

        $("#header .center").removeClass("loaded");
        $("#footer").removeClass("full");
        $("#header").height(curheight).height(autoHeight).delay(600).promise().done(function(e)
        {
            // console.log("height changed");
            $("#header").height("auto");
            $("#header .center").removeClass("big");
            $("#header .center").addClass("small");
            $("body").removeClass("noscroll");
        });
        expanded = true;
        // console.log("big to small");
        history.pushState({ expanded: true }, "Expand About Me", urlget.update("expand"));
    }
    else
    {
        curheight = $("#header").height();
        // console.log(curheight);
        $("#header .center").removeClass("small");
        $("#header .center").addClass("big");
        autoHeight = $("#header").addClass("full").height("").height();
        $("#header").removeClass("full");
        $("#header .center").removeClass("big");
        $("#header .center").addClass("small");

        // console.log(autoHeight);

        $("#header .center").removeClass("small");
        $("body").addClass("noscroll");
        $("#footer").addClass("full");
        $("#header").height(curheight).height(autoHeight).delay(600).promise().done(function(e)
        {
            // console.log("height changed");
            $("#header").addClass("full").height("");
            $("#header .center").addClass("loaded");
            $("#header .center").addClass("big");
        });
        expanded = false;
        // console.log("small to big");
        history.pushState({ expanded: false }, "De-expand About Me", urlget.remove("expand"));
    }
    resizeHeader();
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
