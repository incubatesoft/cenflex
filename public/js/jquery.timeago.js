/*
 * timeago: a jQuery plugin, version: 0.7.2 (2009-07-30)
 * @requires jQuery v1.2 or later
 *
 * Timeago is a jQuery plugin that makes it easy to support automatically
 * updating fuzzy timestamps (e.g. "4 minutes ago" or "about 1 day ago").
 *
 * For usage and examples, visit:
 * http://timeago.yarp.com/
 *
 * Licensed under the MIT:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright (c) 2008-2009, Ryan McGeary (ryanonjavascript -[at]- mcgeary [*dot*] org)
 */
 
(function($) {
	 var var_attr='title';//sandy default
	 var intval="";
	 //var date;
	$.timeago = function(timestamp) {
		if (timestamp instanceof Date) 
		{
			return inWords(timestamp);
		}
		else if (typeof timestamp == "string") 
		{	
			return inWords($.timeago.parse(timestamp));
		}
		else
		{
			return inWords($.timeago.parse($(timestamp).attr(var_attr)));
			
		}
  };
  var $t = $.timeago;

  $.extend($.timeago, {
    settings: {
      refreshMillis: 60000,
      allowFuture: true,
      strings: {
        prefixAgo: null,
        prefixFromNow: null,
        suffixAgo: "ago",
        suffixFromNow: "from now",
        ago: null, // DEPRECATED, use suffixAgo
        fromNow: null, // DEPRECATED, use suffixFromNow
        seconds: "less than a minute",
        minute: "about a minute",
        minutes: "%d minutes",
		hour: "about an hour",
        hours: "about %d hours",
        day: "yesterday",//sandy changed 'a day'
        days: "%d days",
		month: "about a month",
        months: "%d months",
        year: "about a year",
        years: "%d years"
      }
    },
    inWords: function(distanceMillis,date) {
	  var $l = this.settings.strings;
      var prefix = $l.prefixAgo;
      var suffix = $l.suffixAgo || $l.ago;
      if (this.settings.allowFuture) {
        if (distanceMillis < 0) {
          prefix = $l.prefixFromNow;
          suffix = $l.suffixFromNow || $l.fromNow;
        }
        distanceMillis = Math.abs(distanceMillis);
      }

      var seconds = distanceMillis / 1000;
	  minutes = seconds / 60;
      hours = minutes / 60;
      var days = hours / 24;
      var years = days / 365;
	  {
		   //sandy
		   //alert(date);
		  // alert((new Date()-date).getDate());
			if(new Date().getDate()-date.getDate()==1 && new Date().getFullYear()==date.getFullYear()){
				return 'Yesterday';
			}
			else if(hours>1 && hours<24){
				minutes_past=minutes- Math.floor(hours)*60;
				return $.trim([ Math.floor(hours),"hr"," ", Math.floor(minutes_past),"min"," ",'ago'].join(""));	
			}
			 
	  }
	
	  var words = seconds < 45 && substitute($l.seconds, Math.round(seconds)) ||
        seconds < 90 && substitute($l.minute, 1) ||
        minutes < 45 && substitute($l.minutes, Math.round(minutes)) ||
        minutes < 90 && substitute($l.hour, 1) ||
		hours < 24 && substitute($l.hours, Math.floor(hours)) ||
        hours < 48 && substitute($l.day, 1) ||
		days < 30 && substitute($l.days, Math.floor(days)) ||
        days < 60 && substitute($l.month, 1) ||
        days < 365 && substitute($l.months, Math.floor(days / 30)) ||
        years < 2 && substitute($l.year, 1) ||
        substitute($l.years, Math.floor(years));
	
	return $.trim([prefix, words, suffix].join(" "));
    },
    parse: function(iso8601) {
		//alert('parse');
      var s = $.trim(iso8601);
      s = s.replace(/-/,"/").replace(/-/,"/");
      s = s.replace(/T/," ").replace(/Z/," UTC");
      s = s.replace(/([\+-]\d\d)\:?(\d\d)/," $1$2"); // -04:00 -> -0400
	  return new Date(s);
    }
  });
  
//sandy  
$.fn.unbind_plugin =function (){
		//alert('unbind')
		//alert(intval);
		clearInterval(intval);
	
	}
	
	$.fn.useattr =function (temp){
		//alert('uesattr')
		var_attr=temp;
		return this;
	}
//sandy
	$.fn.dateformat =function (){
		//alert('dateformat');
		var date = $t.parse($(this).attr(var_attr));	
		//alert(date.toDateString());
		var dat = date.toDateString();
		var d = dat.split(" ");
		var str = d[2]+' '+d[1]+', '+d[3];
		$(this).text(str);//toDateString() predefined function
		return $(this);
	}
		
  $.fn.timeago = function() {
	var self = $(this);
	self.each(refresh);
	var $s = $t.settings;
    if ($s.refreshMillis > 0) {
      intval=setInterval(function() { self.each(refresh); }, $s.refreshMillis);
	}
	return self;
  };

function refresh() {
	//alert($t);
	var date = $t.parse($(this).attr(var_attr));	
	if (!isNaN(date)) {
		$(this).text(inWords(date));
	}
	return this;
}
  function inWords(date) {
	return $t.inWords(distance(date),date);
  }

  function distance(date) {
    return (new Date().getTime() - date.getTime());
  }

  function substitute(stringOrFunction, value) {
	  //alert (stringOrFunction);
    var string = $.isFunction(stringOrFunction) ? stringOrFunction(value) : stringOrFunction;
    return string.replace(/%d/i, value);
  }

  // fix for IE6 suckage
  document.createElement('abbr');
})(jQuery);
