/*
 *
 * Copyright (c) 2004-2005 by Zapatec, Inc.
 * http://www.zapatec.com
 * 1700 MLK Way, Berkeley, California,
 * 94709, U.S.A.
 * All rights reserved.
 *
 *
 */

if(typeof Zapatec=='undefined'){Zapatec=function(){};}
Zapatec.version='07-01';if(typeof Zapatec.zapatecPath=='undefined'){Zapatec.zapatecPath=function(){if(document.documentElement){var aTokens=document.documentElement.innerHTML.match(/<script[^>]+src="([^"]*zapatec(-core|-src)?.js[^"]*)"/i);if(aTokens&&aTokens.length>=2){aTokens=aTokens[1].split('?');aTokens=aTokens[0].split('/');if(Array.prototype.pop){aTokens.pop();}else{aTokens.length-=1;}
return aTokens.length?aTokens.join('/')+'/':'';}}
return'';}();}
if(typeof Zapatec=='undefined'){Zapatec=function(){};}
Zapatec.Utils={};Zapatec.Utils.getAbsolutePos=function(el,scrollOff){var SL=0,ST=0;if(!scrollOff){var is_div=/^div$/i.test(el.tagName);if(is_div&&el.scrollLeft)
SL=el.scrollLeft;if(is_div&&el.scrollTop)
ST=el.scrollTop;}
var r={x:el.offsetLeft-SL,y:el.offsetTop-ST};if(el.offsetParent){var tmp=this.getAbsolutePos(el.offsetParent);r.x+=tmp.x;r.y+=tmp.y;}
return r;};Zapatec.Utils.getElementOffset=function(oEl){var iLeft=iTop=iWidth=iHeight=0;var sTag;if(oEl.getBoundingClientRect){var oRect=oEl.getBoundingClientRect();iLeft=oRect.left;iTop=oRect.top;iWidth=oRect.right-iLeft;iHeight=oRect.bottom-iTop;iLeft+=Zapatec.Utils.getPageScrollX()-2;iTop+=Zapatec.Utils.getPageScrollY()-2;}else{iWidth=oEl.offsetWidth;iHeight=oEl.offsetHeight;var sPos=Zapatec.Utils.getStyleProperty(oEl,'position');if(sPos=='fixed'){iLeft=oEl.offsetLeft+Zapatec.Utils.getPageScrollX();iTop=oEl.offsetTop+Zapatec.Utils.getPageScrollY();}else if(sPos=='absolute'){while(oEl){sTag=oEl.tagName;if(sTag){sTag=sTag.toLowerCase();if(sTag!='body'&&sTag!='html'){iLeft+=parseInt(oEl.offsetLeft,10)||0;iTop+=parseInt(oEl.offsetTop,10)||0;}}
oEl=oEl.offsetParent;sTag=oEl?oEl.tagName:null;if(sTag){sTag=sTag.toLowerCase();if(sTag!='body'&&sTag!='html'){iLeft-=oEl.scrollLeft;iTop-=oEl.scrollTop;}}}}else{var bMoz=(Zapatec.is_gecko&&!Zapatec.is_khtml);var fStyle=Zapatec.Utils.getStyleProperty;var oP=oEl;while(oP){if(bMoz){sTag=oP.tagName;if(sTag){sTag=sTag.toLowerCase();if(sTag=='body'&&!(fStyle(oP,'-moz-box-sizing')=='border-box')){iLeft+=parseInt(fStyle(oP,'border-left-width'));iTop+=parseInt(fStyle(oP,'border-top-width'));}}}
iLeft+=parseInt(oP.offsetLeft,10)||0;iTop+=parseInt(oP.offsetTop,10)||0;oP=oP.offsetParent;}
oP=oEl;while(oP.parentNode){oP=oP.parentNode;sTag=oP.tagName;if(sTag){sTag=sTag.toLowerCase();if(sTag!='body'&&sTag!='html'&&sTag!='tr'){iLeft-=oP.scrollLeft;iTop-=oP.scrollTop;}}}}}
return{left:iLeft,top:iTop,x:iLeft,y:iTop,width:iWidth,height:iHeight};};Zapatec.Utils.getElementOffsetScrollable=function(oEl){var oPos=Zapatec.Utils.getElementOffset(oEl);if(oEl.scrollLeft){oPos.left-=oEl.scrollLeft;oPos.x=oPos.left;}
if(oEl.scrollTop){oPos.top-=oEl.scrollTop;oPos.y=oPos.top;}
return oPos;};Zapatec.Utils.fixBoxPosition=function(box,leave){var screenX=Zapatec.Utils.getPageScrollX();var screenY=Zapatec.Utils.getPageScrollY();var sizes=Zapatec.Utils.getWindowSize();leave=parseInt(leave,10)||0;if(box.x<screenX){box.x=screenX+leave;}
if(box.y<screenY){box.y=screenY+leave;}
if(box.x+box.width>screenX+sizes.width){box.x=screenX+sizes.width-box.width-leave;}
if(box.y+box.height>screenY+sizes.height){box.y=screenY+sizes.height-box.height-leave;}};Zapatec.Utils.isRelated=function(el,evt){evt||(evt=window.event);var related=evt.relatedTarget;if(!related){var type=evt.type;if(type=="mouseover"){related=evt.fromElement;}else if(type=="mouseout"){related=evt.toElement;}}
try{while(related){if(related==el){return true;}
related=related.parentNode;}}catch(e){};return false;};Zapatec.Utils.removeClass=function(el,className){if(!(el&&el.className)){return;}
var cls=el.className.split(" ");var ar=[];for(var i=cls.length;i>0;){if(cls[--i]!=className){ar[ar.length]=cls[i];}}
el.className=ar.join(" ");};Zapatec.Utils.addClass=function(el,className){Zapatec.Utils.removeClass(el,className);el.className+=" "+className;};Zapatec.Utils.replaceClass=function(el,className,withClassName){if(!Zapatec.isHtmlElement(el)||!className){return false;}
el.className.replace(className,withClassName);};Zapatec.Utils.getElement=function(ev){if(Zapatec.is_ie){return window.event.srcElement;}else{return ev.currentTarget;}};Zapatec.Utils.getTargetElement=function(ev){if(Zapatec.is_ie){return window.event.srcElement;}else{return ev.target;}};Zapatec.Utils.getMousePos=function(oEv){oEv||(oEv=window.event);var oPos={pageX:0,pageY:0,clientX:0,clientY:0};if(oEv){var bIsPageX=(typeof oEv.pageX!='undefined');var bIsClientX=(typeof oEv.clientX!='undefined');if(bIsPageX||bIsClientX){if(bIsPageX){oPos.pageX=oEv.pageX;oPos.pageY=oEv.pageY;}else{oPos.pageX=oEv.clientX+Zapatec.Utils.getPageScrollX();oPos.pageY=oEv.clientY+Zapatec.Utils.getPageScrollY();}
if(bIsClientX){oPos.clientX=oEv.clientX;oPos.clientY=oEv.clientY;}else{oPos.clientX=oEv.pageX-Zapatec.Utils.getPageScrollX();oPos.clientY=oEv.pageY-Zapatec.Utils.getPageScrollY();}}}
return oPos;};Zapatec.Utils.stopEvent=function(ev){ev||(ev=window.event);if(ev){if(Zapatec.is_ie){ev.cancelBubble=true;ev.returnValue=false;}else{ev.preventDefault();ev.stopPropagation();}}
return false;};Zapatec.Utils.removeOnUnload=[];Zapatec.Utils.addEvent=function(oElement,sEvent,fListener,bUseCapture){if(oElement.addEventListener){if(!bUseCapture){bUseCapture=false;}
oElement.addEventListener(sEvent,fListener,bUseCapture);}else if(oElement.attachEvent){oElement.detachEvent('on'+sEvent,fListener);oElement.attachEvent('on'+sEvent,fListener);if(bUseCapture){oElement.setCapture(false);}}
Zapatec.Utils.removeOnUnload.push({'element':oElement,'event':sEvent,'listener':fListener,'capture':bUseCapture});};Zapatec.Utils.removeEvent=function(oElement,sEvent,fListener,bUseCapture){if(oElement.removeEventListener){oElement.removeEventListener(sEvent,fListener,bUseCapture);}else if(oElement.detachEvent){oElement.detachEvent('on'+sEvent,fListener);}
for(var iLis=Zapatec.Utils.removeOnUnload.length-1;iLis>=0;iLis--){var oParams=Zapatec.Utils.removeOnUnload[iLis];if(!oParams){continue;}
if(oElement==oParams['element']&&sEvent==oParams['event']&&fListener==oParams['listener']&&bUseCapture==oParams['capture']){Zapatec.Utils.removeOnUnload[iLis]=null;Zapatec.Utils.removeEvent(oParams['element'],oParams['event'],oParams['listener'],oParams['capture']);}}};Zapatec.Utils.createElement=function(type,parent,selectable){var el=null;if(document.createElementNS)
el=document.createElementNS("http://www.w3.org/1999/xhtml",type);else
el=document.createElement(type);if(typeof parent!="undefined"&&parent!=null)
parent.appendChild(el);if(!selectable){if(Zapatec.is_ie)
el.setAttribute("unselectable",true);if(Zapatec.is_gecko)
el.style.setProperty("-moz-user-select","none","");}
return el;};Zapatec.Utils.writeCookie=function(name,value,domain,path,exp_days){value=escape(value);var ck=name+"="+value,exp;if(domain)
ck+=";domain="+domain;if(path)
ck+=";path="+path;if(exp_days){exp=new Date();exp.setTime(exp_days*86400000+exp.getTime());ck+=";expires="+exp.toGMTString();}
document.cookie=ck;};Zapatec.Utils.getCookie=function(name){var pattern=name+"=";var tokenPos=0;while(tokenPos<document.cookie.length){var valuePos=tokenPos+pattern.length;if(document.cookie.substring(tokenPos,valuePos)==pattern){var endValuePos=document.cookie.indexOf(";",valuePos);if(endValuePos==-1){endValuePos=document.cookie.length;}
return unescape(document.cookie.substring(valuePos,endValuePos));}
tokenPos=document.cookie.indexOf(" ",tokenPos)+1;if(tokenPos==0){break;}}
return null;};Zapatec.Utils.makePref=function(obj){function stringify(val){if(typeof val=="object"&&!val)
return"null";else if(typeof val=="number"||typeof val=="boolean")
return val;else if(typeof val=="string")
return'"'+val.replace(/\x22/,"\\22")+'"';else return null;};var txt="",i;for(i in obj)
txt+=(txt?",'":"'")+i+"':"+stringify(obj[i]);return txt;};Zapatec.Utils.loadPref=function(txt){var obj=null;try{eval("obj={"+txt+"}");}catch(e){}
return obj;};Zapatec.Utils.mergeObjects=function(dest,src){for(var i in src)
dest[i]=src[i];};Zapatec.Utils.__wch_id=0;Zapatec.Utils.createWCH=function(oEl){if(!Zapatec.is_ie||Zapatec.is_ie5||Zapatec.is_ie7){return null;}
var sId='WCH'+(++Zapatec.Utils.__wch_id);var sIframe=['<iframe id="',sId,'" scrolling="no" frameborder="0" style="z-index:0;position:absolute;visibility:hidden;filter:progid:DXImageTransform.Microsoft.alpha(style=0,opacity=0);border:0;top:0;left:0;width:0;height:0" src="javascript:false"></iframe>'].join('')
if(!oEl){oEl=document.body;}
if(Zapatec.windowLoaded){oEl.insertAdjacentHTML('beforeEnd',sIframe);}else{Zapatec.Utils.addEvent(window,'load',function(){oEl.insertAdjacentHTML('beforeEnd',sIframe);oEl=null;});}
return document.getElementById(sId);};Zapatec.Utils.setupWCH_el=function(f,el,el2){if(f){var pos=Zapatec.Utils.getAbsolutePos(el),X1=pos.x,Y1=pos.y,X2=X1+el.offsetWidth,Y2=Y1+el.offsetHeight;if(el2){var p2=Zapatec.Utils.getAbsolutePos(el2),XX1=p2.x,YY1=p2.y,XX2=XX1+el2.offsetWidth,YY2=YY1+el2.offsetHeight;if(X1>XX1)
X1=XX1;if(Y1>YY1)
Y1=YY1;if(X2<XX2)
X2=XX2;if(Y2<YY2)
Y2=YY2;}
Zapatec.Utils.setupWCH(f,X1,Y1,X2-X1,Y2-Y1);}};Zapatec.Utils.setupWCH=function(f,x,y,w,h){if(f){var s=f.style;(typeof x!="undefined")&&(s.left=x+"px");(typeof y!="undefined")&&(s.top=y+"px");(typeof w!="undefined")&&(s.width=w+"px");(typeof h!="undefined")&&(s.height=h+"px");s.visibility="inherit";}};Zapatec.Utils.hideWCH=function(f){if(f)
f.style.visibility="hidden";};Zapatec.Utils.getPageScrollY=function(){if(window.pageYOffset){return window.pageYOffset;}else if(document.body&&document.body.scrollTop){return document.body.scrollTop;}else if(document.documentElement&&document.documentElement.scrollTop){return document.documentElement.scrollTop;}
return 0;};Zapatec.Utils.getPageScrollX=function(){if(window.pageXOffset){return window.pageXOffset;}else if(document.body&&document.body.scrollLeft){return document.body.scrollLeft;}else if(document.documentElement&&document.documentElement.scrollLeft){return document.documentElement.scrollLeft;}
return 0;};Zapatec.ScrollWithWindow={};Zapatec.ScrollWithWindow.list=[];Zapatec.ScrollWithWindow.stickiness=0.25;Zapatec.ScrollWithWindow.register=function(oElement){var iTop=oElement.offsetTop||0;var iLeft=oElement.offsetLeft||0;Zapatec.ScrollWithWindow.list.push({node:oElement,origTop:iTop,origLeft:iLeft});if(!Zapatec.ScrollWithWindow.interval){Zapatec.ScrollWithWindow.on();}};Zapatec.ScrollWithWindow.unregister=function(oElement){for(var iItem=0;iItem<Zapatec.ScrollWithWindow.list.length;iItem++){var oItem=Zapatec.ScrollWithWindow.list[iItem];if(oElement==oItem.node){Zapatec.ScrollWithWindow.list.splice(iItem,1);if(!Zapatec.ScrollWithWindow.list.length){Zapatec.ScrollWithWindow.off();}
return;}}};Zapatec.ScrollWithWindow.moveTop=function(iTop){Zapatec.ScrollWithWindow.top+=(iTop-Zapatec.ScrollWithWindow.top)*Zapatec.ScrollWithWindow.stickiness;if(Math.abs(Zapatec.ScrollWithWindow.top-iTop)<=1){Zapatec.ScrollWithWindow.top=iTop;}
for(var iItem=0;iItem<Zapatec.ScrollWithWindow.list.length;iItem++){var oItem=Zapatec.ScrollWithWindow.list[iItem];var oElement=oItem.node;oElement.style.position='absolute';if(!oItem.origTop&&oItem.origTop!==0){oItem.origTop=parseInt(oElement.style.top)||0;}
oElement.style.top=oItem.origTop+
parseInt(Zapatec.ScrollWithWindow.top)+'px';}};Zapatec.ScrollWithWindow.moveLeft=function(iLeft){Zapatec.ScrollWithWindow.left+=(iLeft-Zapatec.ScrollWithWindow.left)*Zapatec.ScrollWithWindow.stickiness;if(Math.abs(Zapatec.ScrollWithWindow.left-iLeft)<=1){Zapatec.ScrollWithWindow.left=iLeft;}
for(var iItem=0;iItem<Zapatec.ScrollWithWindow.list.length;iItem++){var oItem=Zapatec.ScrollWithWindow.list[iItem];var oElement=oItem.node;oElement.style.position='absolute';if(!oItem.origLeft&&oItem.origLeft!==0){oItem.origLeft=parseInt(oElement.style.left)||0;}
oElement.style.left=oItem.origLeft+
parseInt(Zapatec.ScrollWithWindow.left)+'px';}};Zapatec.ScrollWithWindow.cycle=function(){var iTop=Zapatec.Utils.getPageScrollY();var iLeft=Zapatec.Utils.getPageScrollX();if(iTop!=Zapatec.ScrollWithWindow.top){Zapatec.ScrollWithWindow.moveTop(iTop);}
if(iLeft!=Zapatec.ScrollWithWindow.left){Zapatec.ScrollWithWindow.moveLeft(iLeft);}};Zapatec.ScrollWithWindow.on=function(){if(Zapatec.ScrollWithWindow.interval){return;}
Zapatec.ScrollWithWindow.top=Zapatec.Utils.getPageScrollY();Zapatec.ScrollWithWindow.left=Zapatec.Utils.getPageScrollX();Zapatec.ScrollWithWindow.interval=setInterval(Zapatec.ScrollWithWindow.cycle,50);};Zapatec.ScrollWithWindow.off=function(){if(!Zapatec.ScrollWithWindow.interval){return;}
clearInterval(Zapatec.ScrollWithWindow.interval);Zapatec.ScrollWithWindow.interval=null;};Zapatec.FixateOnScreen={};Zapatec.FixateOnScreen.getExpression=function(coord,direction){return"Zapatec.Utils.getPageScroll"+direction.toUpperCase()+"() + "+coord;};Zapatec.FixateOnScreen.parseCoordinates=function(element){if(!this.isRegistered(element)){return false;}
var x=0;var y=0;var style=element.style;if(Zapatec.is_ie&&!Zapatec.is_ie7){x=style.getExpression("left").split(" ");x=parseInt(x[x.length-1],10);y=style.getExpression("top").split(" ");y=parseInt(y[y.length-1],10);}else{x=parseInt(style.left,10);y=parseInt(style.top,10);}
x+=Zapatec.Utils.getPageScrollX();y+=Zapatec.Utils.getPageScrollY();return{x:x,y:y};};Zapatec.FixateOnScreen.correctCoordinates=function(x,y){position={x:x,y:y};if(position.x||position.x===0){position.x-=Zapatec.Utils.getPageScrollX();if(Zapatec.is_ie&&!Zapatec.is_ie7){position.x=this.getExpression(position.x,"X");;}else{position.x+="px";}}
if(position.y||position.y===0){position.y-=Zapatec.Utils.getPageScrollY();if(Zapatec.is_ie&&!Zapatec.is_ie7){position.y=this.getExpression(position.y,"Y");;}else{position.y+="px";}}
return position;};Zapatec.FixateOnScreen.register=function(element){if(!Zapatec.isHtmlElement(element)){return false;}
if(this.isRegistered(element)){return true;}
var pos=Zapatec.Utils.getElementOffset(element);pos={x:parseInt(element.style.left,10)||pos.x,y:parseInt(element.style.top,10)||pos.y}
pos=this.correctCoordinates(pos.x,pos.y);if(!Zapatec.is_ie||Zapatec.is_ie7){var restorer=element.restorer;if(!restorer||!restorer.getObject||restorer.getObject()!=element){restorer=element.restorer=new Zapatec.SRProp(element);}
restorer.saveProp("style.position");element.style.position="fixed";element.style.left=pos.x;element.style.top=pos.y;}else{element.style.setExpression("left",pos.x);element.style.setExpression("top",pos.y);}
element.zpFixed=true;return true;};Zapatec.FixateOnScreen.unregister=function(element){if(!Zapatec.isHtmlElement(element)){return false;}
var pos=this.parseCoordinates(element);if(pos===false){return true;}
if(Zapatec.is_ie&&!Zapatec.is_ie7){element.style.removeExpression("left");element.style.removeExpression("top");}
element.style.left=pos.x+"px";element.style.top=pos.y+"px";if(!Zapatec.is_ie||Zapatec.is_ie7){element.restorer.restoreProp("style.position",true);}
element.zpFixed=false;return true;};Zapatec.FixateOnScreen.isRegistered=function(element){if(element.zpFixed){return true;}
return false;};Zapatec.Utils.destroy=function(el){if(el&&el.parentNode)
el.parentNode.removeChild(el);};Zapatec.Utils.newCenteredWindow=function(url,windowName,width,height,scrollbars){var leftPosition=0;var topPosition=0;if(screen.width)
leftPosition=(screen.width-width)/2;if(screen.height)
topPosition=(screen.height-height)/2;var winArgs='height='+height+',width='+width+',top='+topPosition+',left='+leftPosition+',scrollbars='+scrollbars+',resizable';var win=window.open(url,windowName,winArgs);return win;};Zapatec.Utils.getWindowSize=function(){var iWidth=0;var iHeight=0;if(Zapatec.is_opera){iWidth=document.body.clientWidth||0;iHeight=document.body.clientHeight||0;}else if(Zapatec.is_khtml){iWidth=window.innerWidth||0;iHeight=window.innerHeight||0;}else if(document.compatMode&&document.compatMode=='CSS1Compat'){iWidth=document.documentElement.clientWidth||0;iHeight=document.documentElement.clientHeight||0;}else{iWidth=document.body.clientWidth||0;iHeight=document.body.clientHeight||0;}
return{width:iWidth,height:iHeight};};Zapatec.Utils.selectOption=function(sel,val,call_default){var a=sel.options,i,o;for(i=a.length;--i>=0;){o=a[i];o.selected=(o.value==val);}
sel.value=val;if(call_default){if(typeof sel.onchange=="function")
sel.onchange();else if(typeof sel.onchange=="string")
eval(sel.onchange);}};Zapatec.Utils.getNextSibling=function(el,tag,alternateTag){el=el.nextSibling;if(!tag){return el;}
tag=tag.toLowerCase();if(alternateTag)alternateTag=alternateTag.toLowerCase();while(el){if(el.nodeType==1&&(el.tagName.toLowerCase()==tag||(alternateTag&&el.tagName.toLowerCase()==alternateTag))){return el;}
el=el.nextSibling;}
return el;};Zapatec.Utils.getPreviousSibling=function(el,tag,alternateTag){el=el.previousSibling;if(!tag){return el;}
tag=tag.toLowerCase();if(alternateTag)alternateTag=alternateTag.toLowerCase();while(el){if(el.nodeType==1&&(el.tagName.toLowerCase()==tag||(alternateTag&&el.tagName.toLowerCase()==alternateTag))){return el;}
el=el.previousSibling;}
return el;};Zapatec.Utils.getFirstChild=function(el,tag,alternateTag){if(!el){return null;}
el=el.firstChild;if(!el){return null;}
if(!tag){return el;}
tag=tag.toLowerCase();if(el.nodeType==1){if(el.tagName.toLowerCase()==tag){return el;}else if(alternateTag){alternateTag=alternateTag.toLowerCase();if(el.tagName.toLowerCase()==alternateTag){return el;}}}
return Zapatec.Utils.getNextSibling(el,tag,alternateTag);};Zapatec.Utils.getLastChild=function(el,tag,alternateTag){if(!el){return null;}
el=el.lastChild;if(!el){return null;}
if(!tag){return el;}
tag=tag.toLowerCase();if(el.nodeType==1){if(el.tagName.toLowerCase()==tag){return el;}else if(alternateTag){alternateTag=alternateTag.toLowerCase();if(el.tagName.toLowerCase()==alternateTag){return el;}}}
return Zapatec.Utils.getPreviousSibling(el,tag,alternateTag);};Zapatec.Utils.getChildText=function(objNode){if(objNode==null){return'';}
var arrText=[];var objChild=objNode.firstChild;while(objChild!=null){if(objChild.nodeType==3){arrText.push(objChild.data);}
objChild=objChild.nextSibling;}
return arrText.join(' ');};Zapatec.Utils.insertAfter=function(oldNode,newNode){if(oldNode.nextSibling){oldNode.parentNode.insertBefore(newNode,oldNode.nextSibling);}else{oldNode.parentNode.appendChild(newNode);}}
Zapatec.Utils._ids={};Zapatec.Utils.generateID=function(code,id){if(typeof id=="undefined"){if(typeof this._ids[code]=="undefined")
this._ids[code]=0;id=++this._ids[code];}
return"zapatec-"+code+"-"+id;};Zapatec.Utils.addTooltip=function(target,tooltip){return new Zapatec.Tooltip({target:target,tooltip:tooltip});};Zapatec.isLite=true;Zapatec.Utils.checkLinks=function(){var anchors=document.getElementsByTagName('A');for(var ii=0;ii<anchors.length;ii++){if(Zapatec.Utils.checkLink(anchors[ii])){return true;}}
return false;}
Zapatec.Utils.checkLink=function(lnk){if(!lnk){return false;}
if(!/^https?:\/\/((dev|www)\.)?zapatec\.com/i.test(lnk.href)){return false;}
var textContent=""
for(var ii=0;ii<lnk.childNodes.length;ii++){if(lnk.childNodes[ii].nodeType==3){textContent+=lnk.childNodes[ii].nodeValue;}}
if(textContent.length<4){return false;}
var parent=lnk;while(parent&&parent.nodeName.toLowerCase()!="html"){if(Zapatec.Utils.getStyleProperty(parent,"display")=="none"||Zapatec.Utils.getStyleProperty(parent,"visibility")=="hidden"||Zapatec.Utils.getStyleProperty(parent,"opacity")=="0"||Zapatec.Utils.getStyleProperty(parent,"-moz-opacity")=="0"||/alpha\(opacity=0\)/i.test(Zapatec.Utils.getStyleProperty(parent,"filter"))){return false;}
parent=parent.parentNode;}
var coords=Zapatec.Utils.getElementOffset(lnk);if(coords.left<0||coords.top<0){return false;}
return true;}
Zapatec.Utils.checkActivation=function(){if(!Zapatec.isLite)return true;var arrProducts=[]
add_product=function(script,webdir_in,name_in)
{arrProducts[script]={webdir:webdir_in,name:name_in,bActive:false}}
add_product('calendar.js','prod1','Calendar')
add_product('zpmenu.js','menu','Menu')
add_product('tree.js','prod3','Tree')
add_product('form.js','forms','Forms')
add_product('effects.js','effects','Effects')
add_product('hoverer.js','effects','Effects - Hoverer')
add_product('slideshow.js','effects','Effects - Slideshow')
add_product('zpgrid.js','grid','Grid')
add_product('slider.js','slider','Slider')
add_product('zptabs.js','tabs','Tabs')
add_product('zptime.js','time','Time')
add_product('window.js','windows','Window')
var strName,arrName,i
var bProduct=false
var scripts=document.getElementsByTagName('script');for(i=0;i<scripts.length;i++)
{if(/wizard.js/i.test(scripts[i].src))
return true
arrName=scripts[i].src.split('/')
if(arrName.length==0)
strName=scripts[i]
else
strName=arrName[arrName.length-1]
strName=strName.toLowerCase()
if(typeof arrProducts[strName]!='undefined')
{bProduct=true
arrProducts[strName].bActive=true}}
if(!bProduct||Zapatec.Utils.checkLinks()){return true;}
var strMsg='You are using the Free version of the Zapatec Software.\n'+'While using the Free version, a link to www.zapatec.com in this page is required.'
for(i in arrProducts)
if(arrProducts[i].bActive==true)
strMsg+='\nTo purchase the Zapatec '+arrProducts[i].name+' visit www.zapatec.com/website/main/products/'+arrProducts[i].webdir+'/'

return false;}
Zapatec.Utils.clone=function(oSrc){if(typeof oSrc=='object'&&oSrc){var oClone=new oSrc.constructor();var fClone=Zapatec.Utils.clone;for(var sProp in oSrc){oClone[sProp]=fClone(oSrc[sProp]);}
return oClone;}
return oSrc;};Zapatec.is_opera=/opera/i.test(navigator.userAgent);Zapatec.is_ie=(/msie/i.test(navigator.userAgent)&&!Zapatec.is_opera);Zapatec.is_ie5=(Zapatec.is_ie&&/msie 5\.0/i.test(navigator.userAgent));Zapatec.is_ie7=(Zapatec.is_ie&&/msie 7\.0/i.test(navigator.userAgent));Zapatec.is_mac_ie=(/msie.*mac/i.test(navigator.userAgent)&&!Zapatec.is_opera);Zapatec.is_khtml=/Konqueror|Safari|KHTML/i.test(navigator.userAgent);Zapatec.is_konqueror=/Konqueror/i.test(navigator.userAgent);Zapatec.is_gecko=/Gecko/i.test(navigator.userAgent);Zapatec.is_webkit=/WebKit/i.test(navigator.userAgent);Zapatec.webkitVersion=Zapatec.is_webkit?parseInt(navigator.userAgent.replace(/.+WebKit\/([0-9]+)\..+/,"$1")):-1;if(!Object.prototype.hasOwnProperty){Object.prototype.hasOwnProperty=function(strProperty){try{var objPrototype=this.constructor.prototype;while(objPrototype){if(objPrototype[strProperty]==this[strProperty]){return false;}
objPrototype=objPrototype.prototype;}}catch(objException){}
return true;};}
if(!Function.prototype.call){Function.prototype.call=function(){var objThis=arguments[0];objThis._this_func=this;var arrArgs=[];for(var iArg=1;iArg<arguments.length;iArg++){arrArgs[arrArgs.length]='arguments['+iArg+']';}
var ret=eval('objThis._this_func('+arrArgs.join(',')+')');objThis._this_func=null;return ret;};}
if(!Function.prototype.apply){Function.prototype.apply=function(){var objThis=arguments[0];var objArgs=arguments[1];objThis._this_func=this;var arrArgs=[];if(objArgs){for(var iArg=0;iArg<objArgs.length;iArg++){arrArgs[arrArgs.length]='objArgs['+iArg+']';}}
var ret=eval('objThis._this_func('+arrArgs.join(',')+')');objThis._this_func=null;return ret;};}
if(!Array.prototype.pop){Array.prototype.pop=function(){var last;if(this.length){last=this[this.length-1];this.length-=1;}
return last;};}
if(!Array.prototype.push){Array.prototype.push=function(){for(var i=0;i<arguments.length;i++){this[this.length]=arguments[i];}
return this.length;};}
if(!Array.prototype.shift){Array.prototype.shift=function(){var first;if(this.length){first=this[0];for(var i=0;i<this.length-1;i++){this[i]=this[i+1];}
this.length-=1;}
return first;};}
if(!Array.prototype.unshift){Array.prototype.unshift=function(){if(arguments.length){var i,len=arguments.length;for(i=this.length+len-1;i>=len;i--){this[i]=this[i-len];}
for(i=0;i<len;i++){this[i]=arguments[i];}}
return this.length;};}
if(!Array.prototype.splice){Array.prototype.splice=function(index,howMany){var elements=[],removed=[],i;for(i=2;i<arguments.length;i++){elements.push(arguments[i]);}
for(i=index;(i<index+howMany)&&(i<this.length);i++){removed.push(this[i]);}
for(i=index+howMany;i<this.length;i++){this[i-howMany]=this[i];}
this.length-=removed.length;for(i=this.length+elements.length-1;i>=index+elements.length;i--){this[i]=this[i-elements.length];}
for(i=0;i<elements.length;i++){this[index+i]=elements[i];}
return removed;};}
Zapatec.Utils.arrIndexOf=function(aArr,vSearchEl,iFromInd){if(!(aArr instanceof Array)){return-1;}
if(Array.prototype.indexOf){return aArr.indexOf(vSearchEl,iFromInd);}
if(!iFromInd){iFromInd=0;}
var iEls=aArr.length;for(var iEl=iFromInd;iEl<iEls;iEl++){if(aArr[iEl]==vSearchEl){return iEl;}}
return-1;};Zapatec.Log=function(objArgs){if(!objArgs){return;}
var strMessage=objArgs.description;if(objArgs.severity){strMessage=objArgs.severity+':\n'+strMessage;}
if(objArgs.type!="warning"){alert(strMessage);}};Zapatec.Utils.Array={};Zapatec.Utils.Array.insertBefore=function(arr,el,key,nextKey){var tmp=new Array();for(var i in arr){if(i==nextKey){if(key){tmp[key]=el;}else{tmp.push(el);}}
tmp[i]=arr[i];}
return tmp;}
Zapatec.inherit=function(oSubClass,oSuperClass,oArg){var Inheritance=function(){};Inheritance.prototype=oSuperClass.prototype;oSubClass.prototype=new Inheritance();oSubClass.prototype.constructor=oSubClass;oSubClass.SUPERconstructor=oSuperClass;oSubClass.SUPERclass=oSuperClass.prototype;if(typeof oSuperClass.path!='undefined'){if(oArg&&oArg.keepPath){oSubClass.path=oSuperClass.path;}else{oSubClass.path=Zapatec.getPath(oSubClass.id);}}};Zapatec.getPath=function(sId){var sSrc;if(typeof sId=='string'){var oScript=document.getElementById(sId);if(oScript){sSrc=oScript.getAttribute('src');}}
if(!sSrc){if(typeof Zapatec.lastLoadedModule=='string'){return Zapatec.lastLoadedModule;}
if(document.documentElement){var sHtml=document.documentElement.innerHTML;var aMatch=sHtml.match(/<script[^>]+src=[^>]+>/gi);if(aMatch&&aMatch.length){sHtml=aMatch[aMatch.length-1];aMatch=sHtml.match(/src="([^"]+)/i);if(aMatch&&aMatch.length==2){sSrc=aMatch[1];}}}
if(!sSrc){return'';}}
sSrc=sSrc.replace(/\\/g,'/');var aTokens=sSrc.split('?');aTokens=aTokens[0].split('/');aTokens=aTokens.slice(0,-1);if(!aTokens.length){return'';}
return aTokens.join('/')+'/';};Zapatec.Utils.setWindowEvent=function(oEvent){if(oEvent){window.event=oEvent;}};Zapatec.Utils.emulateWindowEvent=function(aEvents){if(document.addEventListener){var iEvents=aEvents.length;var oUtils=Zapatec.Utils;var iEvent;for(iEvent=0;iEvent<iEvents;iEvent++){document.addEventListener(aEvents[iEvent],oUtils.setWindowEvent,true);}}};Zapatec.windowLoaded=typeof(document.readyState)!='undefined'?(document.readyState=='loaded'||document.readyState=='complete'):document.getElementsByTagName!=null&&typeof(document.getElementsByTagName('body')[0])!='undefined';Zapatec.Utils.addEvent(window,"load",function(){Zapatec.windowLoaded=true;});Zapatec.Utils.warnUnload=function(msg,win){Zapatec.Utils.warnUnloadFlag=true;if(typeof(msg)!="string"){msg="All your changes will be lost.";}
if(typeof(win)=='undefined'){win=window;}
Zapatec.Utils.addEvent(win,'beforeunload',function(ev){if(Zapatec.Utils.warnUnloadFlag!=true){return true;}
if(typeof(ev)=='undefined'){ev=window.event;}
ev.returnValue=msg;return false;});}
Zapatec.Utils.unwarnUnload=function(msg,win){Zapatec.Utils.warnUnloadFlag=false;}
Zapatec.Utils.warnUnloadFlag=false;Zapatec.Utils.getMaxZindex=function(){if(window.opera||Zapatec.is_khtml){return 2147483583;}else if(Zapatec.is_ie){return 2147483647;}else{return 10737418239;}};Zapatec.Utils.correctCssLength=function(val){if(typeof val=='undefined'||(typeof val=='object'&&!val)){return'auto';}
val+='';if(!val.length){return'auto';}
if(/\d$/.test(val)){val+='px';}
return val;};Zapatec.Utils.destroyOnUnload=[];Zapatec.Utils.addDestroyOnUnload=function(objElement,strProperty){Zapatec.Utils.destroyOnUnload.push([objElement,strProperty]);};Zapatec.Utils.createProperty=function(objElement,strProperty,val){objElement[strProperty]=val;Zapatec.Utils.addDestroyOnUnload(objElement,strProperty);};Zapatec.Utils.addEvent(window,'unload',function(){for(var iObj=Zapatec.Utils.destroyOnUnload.length-1;iObj>=0;iObj--){var objDestroy=Zapatec.Utils.destroyOnUnload[iObj];objDestroy[0][objDestroy[1]]=null;objDestroy[0]=null;}
for(var iLis=Zapatec.Utils.removeOnUnload.length-1;iLis>=0;iLis--){var oParams=Zapatec.Utils.removeOnUnload[iLis];if(!oParams){continue;}
Zapatec.Utils.removeOnUnload[iLis]=null;Zapatec.Utils.removeEvent(oParams['element'],oParams['event'],oParams['listener'],oParams['capture']);}});Zapatec.Utils.htmlEncode=function(str){str=str.replace(/&/ig,"&amp;");str=str.replace(/</ig,"&lt;");str=str.replace(/>/ig,"&gt;");str=str.replace(/\x22/ig,"&quot;");return str;};Zapatec.Utils.applyStyle=function(elRef,style){if(typeof(elRef)=='string'){elRef=document.getElementById(elRef);}
if(elRef==null||style==null||elRef.style==null){return null;}
if(Zapatec.is_opera){var pairs=style.split(";");for(var ii=0;ii<pairs.length;ii++){var kv=pairs[ii].split(":");if(!kv[1]){continue;}
var value=kv[1].replace(/^\s*/,'').replace(/\s*$/,'');var key="";for(var jj=0;jj<kv[0].length;jj++){if(kv[0].charAt(jj)=="-"){jj++;if(jj<kv[0].length){key+=kv[0].charAt(jj).toUpperCase();}
continue;}
key+=kv[0].charAt(jj);}
switch(key){case"float":key="cssFloat";break;}
try{elRef.style[key]=value;}catch(e){}}}else{elRef.style.cssText=style;}
return true;}
Zapatec.Utils.getStyleProperty=function(oEl,sPr){var oDV=document.defaultView;if(oDV&&oDV.getComputedStyle){var oCS=oDV.getComputedStyle(oEl,'');if(oCS){sPr=sPr.replace(/([A-Z])/g,'-$1').toLowerCase();return oCS.getPropertyValue(sPr);}}else if(oEl.currentStyle){return oEl.currentStyle[sPr];}
return oEl.style[sPr];};Zapatec.Utils.getPrecision=function(dFloat){return(dFloat+'').replace(/^-?\d*\.*/,'').length;};Zapatec.Utils.setPrecision=function(dFloat,iPrecision){dFloat*=1;if(dFloat.toFixed){return dFloat.toFixed(iPrecision)*1;}
var iPow=Math.pow(10,iPrecision);return parseInt(dFloat*iPow,10)/iPow;};Zapatec.Utils.setPrecisionString=function(dFloat,iPrecision){var sFloat=Zapatec.Utils.setPrecision(dFloat,iPrecision)+'';var iOldPrecision=Zapatec.Utils.getPrecision(sFloat);var iZeros=iPrecision-iOldPrecision;if(iZeros){if(!iOldPrecision){sFloat+='.';}
for(var iZero=0;iZero<iZeros;iZero++){sFloat+='0';}}
return sFloat;};Zapatec.Utils.createNestedHash=function(parent,keys,value){if(parent==null||keys==null){return null;}
var tmp=parent;for(var ii=0;ii<keys.length;ii++){if(typeof(tmp[keys[ii]])=='undefined'){tmp[keys[ii]]={};}
if(ii==keys.length-1&&typeof(value)!='undefined'){tmp[keys[ii]]=value;}
tmp=tmp[keys[ii]];}}
Zapatec.implement=function(classOrObject,interfaceStr){if(typeof interfaceStr!="string"){return false;}
if(typeof classOrObject=="function"){classOrObject=classOrObject.prototype;}
if(!classOrObject||typeof classOrObject!="object"){return false;}
var interfaceObj=window;var objs=interfaceStr.split(".");try{for(var i=0;i<objs.length;++i){interfaceObj=interfaceObj[objs[i]];}}catch(e){return false;}
if(typeof classOrObject.interfaces!="object"){classOrObject.interfaces={};classOrObject.interfaces[interfaceStr]=true;}else if(classOrObject.interfaces[interfaceStr]!==true){classOrObject.interfaces=Zapatec.Utils.clone(classOrObject.interfaces);classOrObject.interfaces[interfaceStr]=true;}else{return true;}
for(var iProp in interfaceObj){classOrObject[iProp]=interfaceObj[iProp];}
classOrObject.hasInterface=function(interfaceStr){if(this.interfaces[interfaceStr]===true){return true;}
return false;};classOrObject.requireInterface=function(interfaceStr){if(!this.hasInterface(interfaceStr)){Zapatec.Log({description:"The object with ID '"+this.id+"' has no "+interfaceStr+" interface!"});return false;}
return true;};interfaceObj.setNamedProperty=classOrObject.setNamedProperty=function(name,val){this[name]=val;};interfaceObj.getNamedProperty=classOrObject.getNamedProperty=function(name){return this[name];};return true;};Zapatec.Utils.getCharFromEvent=function(evt){if(!evt){evt=window.event;}
var response={};if(Zapatec.is_gecko&&!Zapatec.is_khtml&&evt.type!="keydown"&&evt.type!="keyup"){if(evt.charCode){response.chr=String.fromCharCode(evt.charCode);}else{response.charCode=evt.keyCode;}}else{response.charCode=evt.keyCode||evt.which;response.chr=String.fromCharCode(response.charCode);}
if(Zapatec.is_opera&&response.charCode==0){response.charCode=null;response.chr=null;}
if(Zapatec.is_khtml&&response.charCode==63272){response.charCode=46;response.chr=null;}
return response;}
Zapatec.Utils.convertHTML2DOM=function(txt){var el=document.createElement("div");el.innerHTML=txt;var currEl=el.firstChild;while(!currEl.nodeType||currEl.nodeType!=1){currEl=currEl.nextSibling;}
Zapatec.Utils.destroy(currEl);return currEl;};Zapatec.Utils.escapeRegExp=function(s){return s.replace(/([.*+?^${}()|[\]\/\\])/g,'\\$1');};if(typeof Zapatec=='undefined'){Zapatec=function(){};}
Zapatec.EventDriven=function(){};Zapatec.EventDriven.prototype.init=function(){this.events={};};Zapatec.EventDriven.prototype.addEventListener=function(sEv,fLsnr){if(typeof fLsnr!="function"){return false;}
var oE=this.events;if(!oE[sEv]){oE[sEv]={listeners:[]};}else{this.removeEventListener(sEv,fLsnr);}
oE[sEv].listeners.push(fLsnr);};Zapatec.EventDriven.prototype.unshiftEventListener=function(sEv,fLsnr){if(typeof fLsnr!="function"){return false;}
var oE=this.events;if(!oE[sEv]){oE[sEv]={listeners:[]};}else{this.removeEventListener(sEv,fLsnr);}
oE[sEv].listeners.unshift(fLsnr);};Zapatec.EventDriven.prototype.removeEventListener=function(sEv,fLsnr){var oE=this.events;if(!oE[sEv]){return 0;}
var aL=oE[sEv].listeners;var iRemoved=0;for(var iL=aL.length-1;iL>=0;iL--){if(aL[iL]==fLsnr){aL.splice(iL,1);iRemoved++;}}
return iRemoved;};Zapatec.EventDriven.prototype.getEventListeners=function(sEv){var oE=this.events;if(!oE[sEv]){return[];}
return oE[sEv].listeners;};Zapatec.EventDriven.prototype.isEventListener=function(sEv,fLsnr){var oE=this.events;if(!oE[sEv]){return false;}
var aL=oE[sEv].listeners;for(var iL=aL.length-1;iL>=0;iL--){if(aL[iL]==fLsnr){return true;}}
return false;};Zapatec.EventDriven.prototype.isEvent=function(sEv){if(this.events[sEv]){return true;}
return false;};Zapatec.EventDriven.prototype.removeEvent=function(sEv){var oE=this.events;if(oE[sEv]){var undef;oE[sEv]=undef;}};Zapatec.EventDriven.prototype.fireEvent=function(sEv){var oE=this.events;if(!oE[sEv]){return;}
var aL=oE[sEv].listeners.slice();var iLs=aL.length;var aArgs;for(var iL=0;iLs--;iL++){aArgs=[].slice.call(arguments,1);aL[iL].apply(this,aArgs);}};Zapatec.EventDriven.events={};Zapatec.EventDriven.addEventListener=function(sEv,fLsnr){if(typeof fLsnr!="function"){return false;}
var oED=Zapatec.EventDriven;var oE=oED.events;if(!oE[sEv]){oE[sEv]={listeners:[]};}else{oED.removeEventListener(sEv,fLsnr);}
oE[sEv].listeners.push(fLsnr);};Zapatec.EventDriven.unshiftEventListener=function(sEv,fLsnr){if(typeof fLsnr!="function"){return false;}
var oED=Zapatec.EventDriven;var oE=oED.events;if(!oE[sEv]){oE[sEv]={listeners:[]};}else{oED.removeEventListener(sEv,fLsnr);}
oE[sEv].listeners.unshift(fLsnr);};Zapatec.EventDriven.removeEventListener=function(sEv,fLsnr){var oE=Zapatec.EventDriven.events;if(!oE[sEv]){return 0;}
var aL=oE[sEv].listeners;var iRemoved=0;for(var iL=aL.length-1;iL>=0;iL--){if(aL[iL]==fLsnr){aL.splice(iL,1);iRemoved++;}}
return iRemoved;};Zapatec.EventDriven.getEventListeners=function(sEv){var oE=Zapatec.EventDriven.events;if(!oE[sEv]){return[];}
return oE[sEv].listeners;};Zapatec.EventDriven.isEventListener=function(sEv,fLsnr){var oE=Zapatec.EventDriven.events;if(!oE[sEv]){return false;}
var aL=oE[sEv].listeners;for(var iL=aL.length-1;iL>=0;iL--){if(aL[iL]==fLsnr){return true;}}
return false;};Zapatec.EventDriven.isEvent=function(sEv){if(Zapatec.EventDriven.events[sEv]){return true;}
return false;};Zapatec.EventDriven.removeEvent=function(sEv){var oE=Zapatec.EventDriven.events;if(oE[sEv]){var undef;oE[sEv]=undef;}};Zapatec.EventDriven.fireEvent=function(sEv){var oE=Zapatec.EventDriven.events;if(!oE[sEv]){return;}
var aL=oE[sEv].listeners.slice();var iLs=aL.length;var aArgs;for(var iL=0;iLs--;iL++){aArgs=[].slice.call(arguments,1);aL[iL].apply(aL[iL],aArgs);}};Zapatec.ImagePreloader=function(objArgs){this.job=null;this.image=null;if(arguments.length>0)this.init(objArgs);};Zapatec.ImagePreloader.prototype.init=function(objArgs){if(!objArgs||!objArgs.job){return;}
this.job=objArgs.job;this.image=new Image();this.job.images.push(this.image);var objPreloader=this;this.image.onload=function(){objPreloader.job.loadedUrls.push(objArgs.url);setTimeout(function(){objPreloader.onLoad();},0);};this.image.onerror=function(){objPreloader.job.invalidUrls.push(objArgs.url);objPreloader.onLoad();};this.image.onabort=function(){objPreloader.job.abortedUrls.push(objArgs.url);objPreloader.onLoad();};this.image.src=objArgs.url;if(typeof objArgs.timeout=='number'){setTimeout(function(){if(objPreloader.job){if(objPreloader.image.complete){objPreloader.job.loadedUrls.push(objArgs.url);}else{objPreloader.job.abortedUrls.push(objArgs.url);}
objPreloader.onLoad();}},objArgs.timeout);}};Zapatec.ImagePreloader.prototype.onLoad=function(){if(!this.job){return;}
this.image.onload=null;this.image.onerror=null;this.image.onabort=null;var objJob=this.job;this.job=null;objJob.leftToLoad--;if(objJob.leftToLoad==0&&typeof objJob.onLoad=='function'){var funcOnLoad=objJob.onLoad;objJob.onLoad=null;funcOnLoad(objJob);}};Zapatec.PreloadImages=function(objArgs){this.images=[];this.leftToLoad=0;this.loadedUrls=[];this.invalidUrls=[];this.abortedUrls=[];this.onLoad=null;if(arguments.length>0)this.init(objArgs);};Zapatec.PreloadImages.prototype.init=function(objArgs){if(!objArgs){return;}
if(!objArgs.urls||!objArgs.urls.length){if(typeof objArgs.onLoad=='function'){objArgs.onLoad(this);}
return;}
this.images=[];this.leftToLoad=objArgs.urls.length;this.loadedUrls=[];this.invalidUrls=[];this.abortedUrls=[];this.onLoad=objArgs.onLoad;for(var iUrl=0;iUrl<objArgs.urls.length;iUrl++){new Zapatec.ImagePreloader({job:this,url:objArgs.urls[iUrl],timeout:objArgs.timeout});}};if(typeof Zapatec=='undefined'){Zapatec=function(){};}
Zapatec.StyleSheet=function(bUseLast){if(bUseLast){if(document.createStyleSheet){if(document.styleSheets.length){this.styleSheet=document.styleSheets[document.styleSheets.length-1];}}else{var aStyleSheets=document.getElementsByTagName('style');if(aStyleSheets.length){this.styleSheet=aStyleSheets[aStyleSheets.length-1];}}}
if(!this.styleSheet){if(document.createStyleSheet){try{this.styleSheet=document.createStyleSheet();}catch(oException){this.styleSheet=document.styleSheets[document.styleSheets.length-1];};}else{this.styleSheet=document.createElement('style');this.styleSheet.type='text/css';var oHead=document.getElementsByTagName('head')[0];if(!oHead){oHead=document.documentElement;}
if(oHead){oHead.appendChild(this.styleSheet);}}}};Zapatec.StyleSheet.prototype.addRule=function(strSelector,strDeclarations){if(!this.styleSheet){return;}
if(document.createStyleSheet){this.styleSheet.cssText+=strSelector+' { '+strDeclarations+' }';}else{this.styleSheet.appendChild(document.createTextNode(strSelector+' { '+strDeclarations+' }'));}};Zapatec.StyleSheet.prototype.removeRules=function(){if(!this.styleSheet){return;}
if(document.createStyleSheet){var iRules=this.styleSheet.rules.length;for(var iRule=0;iRule<iRules;iRule++){this.styleSheet.removeRule();}}else{while(this.styleSheet.firstChild){this.styleSheet.removeChild(this.styleSheet.firstChild);}}};Zapatec.StyleSheet.prototype.addParse=function(strStyleSheet){var arrClean=[];var arrTokens=strStyleSheet.split('/*');for(var iTok=0;iTok<arrTokens.length;iTok++){var arrTails=arrTokens[iTok].split('*/');arrClean.push(arrTails[arrTails.length-1]);}
strStyleSheet=arrClean.join('');strStyleSheet=strStyleSheet.replace(/@[^{]*;/g,'');var arrStyles=strStyleSheet.split('}');for(var iStl=0;iStl<arrStyles.length;iStl++){var arrRules=arrStyles[iStl].split('{');if(arrRules[0]&&arrRules[1]){var arrSelectors=arrRules[0].split(',');for(var iSel=0;iSel<arrSelectors.length;iSel++){this.addRule(arrSelectors[iSel],arrRules[1]);}}}};if(typeof Zapatec=='undefined'){Zapatec=function(){};}
Zapatec.Transport=function(){};if(typeof ActiveXObject!='undefined'){Zapatec.Transport.XMLDOM=null;Zapatec.Transport.XMLHTTP=null;Zapatec.Transport.pickActiveXVersion=function(aVersions){for(var iVn=0;iVn<aVersions.length;iVn++){try{var oDoc=new ActiveXObject(aVersions[iVn]);if(oDoc){return aVersions[iVn];}}catch(oExpn){};}
return null;};Zapatec.Transport.XMLDOM=Zapatec.Transport.pickActiveXVersion(['Msxml2.DOMDocument.4.0','Msxml2.DOMDocument.3.0','MSXML2.DOMDocument','MSXML.DOMDocument','Microsoft.XMLDOM']);Zapatec.Transport.XMLHTTP=Zapatec.Transport.pickActiveXVersion(['Msxml2.XMLHTTP.4.0','MSXML2.XMLHTTP.3.0','MSXML2.XMLHTTP','Microsoft.XMLHTTP']);Zapatec.Transport.pickActiveXVersion=null;}
Zapatec.Transport.createXmlHttpRequest=function(){if(typeof ActiveXObject!='undefined'){try{return new ActiveXObject(Zapatec.Transport.XMLHTTP);}catch(oExpn){};}
if(typeof XMLHttpRequest!='undefined'){return new XMLHttpRequest();}
return null;};Zapatec.Transport.isBusy=function(oArg){var oContr=oArg.busyContainer;if(typeof oContr=='string'){oContr=document.getElementById(oContr);}
if(!oContr){return;}
var sImage=oArg.busyImage;if(typeof sImage!='string'){sImage='';}
sImage=sImage.split('/').pop();if(!sImage.length){sImage='zpbusy.gif';}
var oFC=oContr.firstChild;if(oFC){oFC=oFC.firstChild;if(oFC){oFC=oFC.firstChild;if(oFC&&oFC.tagName&&oFC.tagName.toLowerCase()=='img'){var sSrc=oFC.getAttribute('src');if(typeof sSrc=='string'&&sSrc.length){sSrc=sSrc.split('/').pop();if(sSrc==sImage){return true;}}}}}
return false;};Zapatec.Transport.showBusy=function(oArg){if(Zapatec.Transport.isBusy(oArg)){return;}
var oContr=oArg.busyContainer;if(typeof oContr=='string'){oContr=document.getElementById(oContr);}
if(!oContr){return;}
var sImage=oArg.busyImage;var sImageWidth=oArg.busyImageWidth;var sImageHeight=oArg.busyImageHeight;if(typeof sImage!='string'||!sImage.length){sImage='zpbusy.gif';}else{if(typeof sImageWidth=='number'||(typeof sImageWidth=='string'&&/\d$/.test(sImageWidth))){sImageWidth+='px';}
if(typeof sImageHeight=='number'||(typeof sImageHeight=='string'&&/\d$/.test(sImageHeight))){sImageHeight+='px';}}
if(!sImageWidth){sImageWidth='65px';}
if(!sImageHeight){sImageHeight='35px';}
var sPath='';if(sImage.indexOf('/')<0){if(Zapatec.zapatecPath){sPath=Zapatec.zapatecPath;}else{sPath=Zapatec.Transport.getPath('transport.js');}}
var aImg=[];aImg.push('<img src="');aImg.push(sPath);aImg.push(sImage);aImg.push('"');if(sImageWidth||sImageHeight){aImg.push(' style="');if(sImageWidth){aImg.push('width:');aImg.push(sImageWidth);aImg.push(';');}
if(sImageHeight){aImg.push('height:');aImg.push(sImageHeight);}
aImg.push('"');}
aImg.push(' />');var iContainerWidth=oContr.offsetWidth;var iContainerHeight=oContr.offsetHeight;var oBusyContr=Zapatec.Utils.createElement('div');oBusyContr.style.position='relative';oBusyContr.style.zIndex=2147483583;var oBusy=Zapatec.Utils.createElement('div',oBusyContr);oBusy.style.position='absolute';oBusy.innerHTML=aImg.join('');oContr.insertBefore(oBusyContr,oContr.firstChild);var iBusyWidth=oBusy.offsetWidth;var iBusyHeight=oBusy.offsetHeight;if(iContainerWidth>iBusyWidth){oBusy.style.left=oContr.scrollLeft+
(iContainerWidth-iBusyWidth)/2+'px';}
if(iContainerHeight>iBusyHeight){oBusy.style.top=oContr.scrollTop+
(iContainerHeight-iBusyHeight)/2+'px';}};Zapatec.Transport.removeBusy=function(oArg){var oContr=oArg.busyContainer;if(typeof oContr=='string'){oContr=document.getElementById(oContr);}
if(!oContr){return;}
if(Zapatec.Transport.isBusy(oArg)){oContr.removeChild(oContr.firstChild);}};Zapatec.Transport.fetch=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.url){return null;}
if(!oArg.method){oArg.method='GET';}
if(typeof oArg.async=='undefined'){oArg.async=true;}
if(!oArg.contentType&&oArg.method.toUpperCase()=='POST'){oArg.contentType='application/x-www-form-urlencoded';}
if(!oArg.content){oArg.content=null;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
var oRequest=Zapatec.Transport.createXmlHttpRequest();if(oRequest==null){return null;}
Zapatec.Transport.showBusy(oArg);var bErrorDisplayed=false;var funcOnReady=function(){Zapatec.Transport.removeBusy(oArg);try{if(oRequest.status==200||oRequest.status==304||(location.protocol=='file:'&&!oRequest.status)){if(typeof oArg.onLoad=='function'){oArg.onLoad(oRequest);}}else if(!bErrorDisplayed){bErrorDisplayed=true;Zapatec.Transport.displayError(oRequest.status,"Error: Can't fetch "+oArg.url+'.\n'+
(oRequest.statusText||''),oArg.onError);}}catch(oExpn){if(!bErrorDisplayed){bErrorDisplayed=true;if(oExpn.name&&oExpn.name=='NS_ERROR_NOT_AVAILABLE'){Zapatec.Transport.displayError(0,"Error: Can't fetch "+oArg.url+'.\nFile not found.',oArg.onError);}else{Zapatec.Transport.displayError(0,"Error: Can't fetch "+oArg.url+'.\n'+
(oExpn.message||''),oArg.onError);}}};};try{if(typeof oArg.username!='undefined'&&typeof oArg.password!='undefined'){oRequest.open(oArg.method,oArg.url,oArg.async,oArg.username,oArg.password);}else{oRequest.open(oArg.method,oArg.url,oArg.async);}
if(oArg.async){oRequest.onreadystatechange=function(){if(oRequest.readyState==4){funcOnReady();oRequest.onreadystatechange={};}};}
if(oArg.contentType){oRequest.setRequestHeader('Content-Type',oArg.contentType);}
oRequest.send(oArg.content);if(!oArg.async){funcOnReady();return oRequest;}}catch(oExpn){Zapatec.Transport.removeBusy(oArg);if(!bErrorDisplayed){bErrorDisplayed=true;if(oExpn.name&&oExpn.name=='NS_ERROR_FILE_NOT_FOUND'){Zapatec.Transport.displayError(0,"Error: Can't fetch "+oArg.url+'.\nFile not found.',oArg.onError);}else{Zapatec.Transport.displayError(0,"Error: Can't fetch "+oArg.url+'.\n'+
(oExpn.message||''),oArg.onError);}}};return null;};Zapatec.Transport.parseHtml=function(sHtml){sHtml+='';sHtml=sHtml.replace(/^\s+/g,'');var oTmpContr;if(document.createElementNS){oTmpContr=document.createElementNS('http://www.w3.org/1999/xhtml','div');}else{oTmpContr=document.createElement('div');}
oTmpContr.innerHTML=sHtml;return oTmpContr;};Zapatec.Transport.evalGlobalScope=function(sScript){if(typeof sScript!='string'||!sScript.match(/\S/)){return;}
if(window.execScript){window.execScript(sScript,'javascript');}else if(window.eval){window.eval(sScript);}};Zapatec.Transport.setInnerHtml=function(oArg){if(!oArg||typeof oArg.html!='string'){return;}
var sHtml=oArg.html;var oContr=null;if(typeof oArg.container=='string'){oContr=document.getElementById(oArg.container);}else if(typeof oArg.container=='object'){oContr=oArg.container;}
var aScripts=[];if(sHtml.match(/<\s*\/\s*script\s*>/i)){var aTokens=sHtml.split(/<\s*\/\s*script\s*>/i);var aHtml=[];for(var iToken=aTokens.length-1;iToken>=0;iToken--){var sToken=aTokens[iToken];if(sToken.match(/\S/)){var aMatch=sToken.match(/<\s*script([^>]*)>/i);if(aMatch){var aCouple=sToken.split(/<\s*script[^>]*>/i);while(aCouple.length<2){if(sToken.match(/^<\s*script[^>]*>/i)){aCouple.unshift('');}else{aCouple.push('');}}
aHtml.unshift(aCouple[0]);var sAttrs=aMatch[1];var srtScript=aCouple[1];if(sAttrs.match(/\s+src\s*=/i)){srtScript='';}else{srtScript=srtScript.replace(/function\s+([^(]+)/g,'$1=function');}
aScripts.push([sAttrs,srtScript]);}else if(iToken<aTokens.length-1){aTokens[iToken-1]+='</script>'+sToken;}else{aHtml.unshift(sToken);}}else{aHtml.unshift(sToken);}}
sHtml=aHtml.join('');}
if(oContr){if(window.opera){oContr.innerHTML='<form></form>';}
oContr.innerHTML=sHtml;}
for(var iScript=0;iScript<aScripts.length;iScript++){if(aScripts[iScript][1].length){Zapatec.Transport.evalGlobalScope(aScripts[iScript][1]);}
var sAttrs=aScripts[iScript][0];sAttrs=sAttrs.replace(/\s+/g,' ').replace(/^\s/,'').replace(/\s$/,'').replace(/ = /g,'=');if(sAttrs.indexOf('src=')>=0){var oContr=document.body;if(!oContr){oContr=document.getElementsByTagName('head')[0];if(!oContr){oContr=document;}}
var aAttrs=sAttrs.split(' ');var oScript=Zapatec.Utils.createElement('script');for(var iAttr=0;iAttr<aAttrs.length;iAttr++){var aAttr=aAttrs[iAttr].split('=');if(aAttr.length>1){oScript.setAttribute(aAttr[0],aAttr[1].match(/^[\s|"|']*([\s|\S]*[^'|"])[\s|"|']*$/)[1]);}else{oScript.setAttribute(aAttr[0],aAttr[0]);}}
oContr.appendChild(oScript);}}};Zapatec.Transport.fetchXmlDoc=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.url){return null;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
if(!oArg.method&&typeof oArg.username=='undefined'&&typeof oArg.password=='undefined'){if(document.implementation&&document.implementation.createDocument){var oDoc=null;if(!oArg.reliable){oArg.reliable=false;}
var oFetchArg={};for(var sKey in oArg){oFetchArg[sKey]=oArg[sKey];}
if(oArg.async){oFetchArg.onLoad=function(oRequest){oFetchArg.onLoad=null;var parser=new DOMParser();oDoc=parser.parseFromString(oRequest.responseText,"text/xml");Zapatec.Transport.removeBusy(oArg);Zapatec.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);};}else{oFetchArg.onLoad=null;}
var oRequest=Zapatec.Transport.fetch(oFetchArg);if(!oArg.async&&oRequest){var parser=new DOMParser();oDoc=parser.parseFromString(oRequest.responseText,"text/xml");Zapatec.Transport.removeBusy(oArg);Zapatec.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);return oDoc;}
return null;}
if(typeof ActiveXObject!='undefined'){Zapatec.Transport.showBusy(oArg);try{var oDoc=new ActiveXObject(Zapatec.Transport.XMLDOM);oDoc.async=oArg.async;if(oArg.async){oDoc.onreadystatechange=function(){if(oDoc.readyState==4){Zapatec.Transport.removeBusy(oArg);Zapatec.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);oDoc.onreadystatechange={};}};}
oDoc.load(oArg.url);if(!oArg.async){Zapatec.Transport.removeBusy(oArg);Zapatec.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);return oDoc;}
return null;}catch(oExpn){Zapatec.Transport.removeBusy(oArg);};}}
var oFetchArg={};for(var sKey in oArg){oFetchArg[sKey]=oArg[sKey];}
if(oArg.async){oFetchArg.onLoad=function(oRequest){Zapatec.Transport.parseXml({strXml:oRequest.responseText,onLoad:oArg.onLoad,onError:oArg.onError});};}else{oFetchArg.onLoad=null;}
var oRequest=Zapatec.Transport.fetch(oFetchArg);if(!oArg.async&&oRequest){return Zapatec.Transport.parseXml({strXml:oRequest.responseText,onLoad:oArg.onLoad,onError:oArg.onError});}
return null;};Zapatec.Transport.parseXml=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.strXml){return null;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
if(window.DOMParser){try{var oDoc=(new DOMParser()).parseFromString(oArg.strXml,'text/xml');Zapatec.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);return oDoc;}catch(oExpn){Zapatec.Transport.displayError(0,"Error: Can't parse.\n"+'String does not appear to be a valid XML fragment.',oArg.onError);};return null;}
if(typeof ActiveXObject!='undefined'){try{var oDoc=new ActiveXObject(Zapatec.Transport.XMLDOM);oDoc.loadXML(oArg.strXml);Zapatec.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);return oDoc;}catch(oExpn){};}
return null;};Zapatec.Transport.onXmlDocLoad=function(oDoc,onLoad,onError){var sError=null;if(oDoc.parseError){sError=oDoc.parseError.reason;if(oDoc.parseError.srcText){sError+='Location: '+oDoc.parseError.url+'\nLine number '+oDoc.parseError.line+', column '+
oDoc.parseError.linepos+':\n'+
oDoc.parseError.srcText+'\n';}}else if(oDoc.documentElement&&oDoc.documentElement.tagName=='parsererror'){sError=oDoc.documentElement.firstChild.data+'\n'+
oDoc.documentElement.firstChild.nextSibling.firstChild.data;}else if(!oDoc.documentElement){sError='String does not appear to be a valid XML fragment.';}
if(sError){Zapatec.Transport.displayError(0,"Error: Can't parse.\n"+sError,onError);}else{if(typeof onLoad=='function'){onLoad(oDoc);}}};Zapatec.Transport.serializeXmlDoc=function(oDoc){if(window.XMLSerializer){return(new XMLSerializer).serializeToString(oDoc);}
if(oDoc.xml){return oDoc.xml;}};Zapatec.Transport.fetchJsonObj=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.url){return null;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
if(!oArg.reliable){oArg.reliable=false;}
var oFetchArg={};for(var sKey in oArg){oFetchArg[sKey]=oArg[sKey];}
if(oArg.async){oFetchArg.onLoad=function(oRequest){Zapatec.Transport.parseJson({strJson:oRequest.responseText,reliable:oArg.reliable,onLoad:oArg.onLoad,onError:oArg.onError});};}else{oFetchArg.onLoad=null;}
var oRequest=Zapatec.Transport.fetch(oFetchArg);if(!oArg.async&&oRequest){return Zapatec.Transport.parseJson({strJson:oRequest.responseText,reliable:oArg.reliable,onLoad:oArg.onLoad,onError:oArg.onError});}
return null;};Zapatec.Transport.parseJson=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.reliable){oArg.reliable=false;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
var oJson=null;try{if(oArg.reliable){if(oArg.strJson){oJson=eval('('+oArg.strJson+')');}}else{oJson=Zapatec.Transport.parseJsonStr(oArg.strJson);}}catch(oExpn){var sError="Error: Can't parse.\nString doesn't appear to be a valid JSON fragment: ";sError+=oExpn.message;if(typeof oExpn.text!='undefined'&&oExpn.text.length){sError+='\n'+oExpn.text;}
sError+='\n'+oArg.strJson;Zapatec.Transport.displayError(0,sError,oArg.onError);return null;};if(typeof oArg.onLoad=='function'){oArg.onLoad(oJson);}
return oJson;};Zapatec.Transport.parseJsonStr=function(text){var p=/^\s*(([,:{}\[\]])|"(\\.|[^\x00-\x1f"\\])*"|-?\d+(\.\d*)?([eE][+-]?\d+)?|true|false|null)\s*/,token,operator;function error(m,t){throw{name:'JSONError',message:m,text:t||operator||token};}
function next(b){if(b&&b!=operator){error("Expected '"+b+"'");}
if(text){var t=p.exec(text);if(t){if(t[2]){token=null;operator=t[2];}else{operator=null;try{token=eval(t[1]);}catch(e){error("Bad token",t[1]);}}
text=text.substring(t[0].length);}else{error("Unrecognized token",text);}}else{token=operator=null;}}
function val(){var k,o;switch(operator){case'{':next('{');o={};if(operator!='}'){for(;;){if(operator||typeof token!='string'){error("Missing key");}
k=token;next();next(':');o[k]=val();if(operator!=','){break;}
next(',');}}
next('}');return o;case'[':next('[');o=[];if(operator!=']'){for(;;){o.push(val());if(operator!=','){break;}
next(',');}}
next(']');return o;default:if(operator!==null){error("Missing value");}
k=token;next();return k;}}
next();return val();};Zapatec.Transport.serializeJsonObj=function(v){var a=[];function e(s){a[a.length]=s;}
function g(x){var c,i,l,v;switch(typeof x){case'object':if(x){if(x instanceof Array){e('[');l=a.length;for(i=0;i<x.length;i+=1){v=x[i];if(typeof v!='undefined'&&typeof v!='function'){if(l<a.length){e(',');}
g(v);}}
e(']');return;}else if(typeof x.toString!='undefined'){e('{');l=a.length;for(i in x){v=x[i];if(x.hasOwnProperty(i)&&typeof v!='undefined'&&typeof v!='function'){if(l<a.length){e(',');}
g(i);e(':');g(v);}}
return e('}');}}
e('null');return;case'number':e(isFinite(x)?+x:'null');return;case'string':l=x.length;e('"');for(i=0;i<l;i+=1){c=x.charAt(i);if(c>=' '){if(c=='\\'||c=='"'){e('\\');}
e(c);}else{switch(c){case'\b':e('\\b');break;case'\f':e('\\f');break;case'\n':e('\\n');break;case'\r':e('\\r');break;case'\t':e('\\t');break;default:c=c.charCodeAt();e('\\u00'+Math.floor(c/16).toString(16)+
(c%16).toString(16));}}}
e('"');return;case'boolean':e(String(x));return;default:e('null');return;}}
g(v);return a.join('');};Zapatec.Transport.displayError=function(iErrCode,sError,onError){if(typeof onError=='function'){onError({errorCode:iErrCode,errorDescription:sError});}else{alert(sError);}};Zapatec.Transport.translateUrl=function(oArg){if(!oArg||!oArg.url){return null;}
var aFullUrl=oArg.url.split('?',2);var sUrl=aFullUrl[0];if(sUrl.indexOf(':')>=0){return oArg.url;}
var oLocation=document.location;var sPort=oLocation.port;if(sPort){sPort=':'+sPort;}
if(sUrl[0]=='/'){return[oLocation.protocol,'//',oLocation.hostname,sPort,sUrl].join('');}
var sLocation;if(sPort){sLocation=[oLocation.protocol,'//',oLocation.hostname,sPort,oLocation.pathname].join('');}else{sLocation=oLocation.toString();}
var sRelativeTo;if(typeof oArg.relativeTo!='string'){sRelativeTo=sLocation.split('?',2)[0];}else{sRelativeTo=oArg.relativeTo.split('?',2)[0];if(sRelativeTo.indexOf('/')<0){sRelativeTo=sLocation.split('?',2)[0];}else if(sRelativeTo.charAt(0)!='/'&&sRelativeTo.indexOf(':')<0){sRelativeTo=Zapatec.Transport.translateUrl({url:sRelativeTo});}}
sRelativeTo=sRelativeTo.split('#')[0];var aUrl=sUrl.split('/');var aRelativeTo=sRelativeTo.split('/');aRelativeTo.pop();for(var iToken=0;iToken<aUrl.length;iToken++){var sToken=aUrl[iToken];if(sToken=='..'){aRelativeTo.pop();}else if(sToken!='.'){aRelativeTo.push(sToken);}}
aFullUrl[0]=aRelativeTo.join('/');return aFullUrl.join('?');};Zapatec.Transport.loading={};Zapatec.Transport.setupEvents=function(oArg){if(!oArg){return{};}
if(oArg.force||!Zapatec.EventDriven||!oArg.url){return{onLoad:oArg.onLoad,onError:oArg.onError};}
var sUrl=oArg.url;if(typeof oArg.onLoad=='function'){Zapatec.EventDriven.addEventListener('zpTransportOnLoad'+sUrl,oArg.onLoad);}
if(typeof oArg.onError=='function'){Zapatec.EventDriven.addEventListener('zpTransportOnError'+sUrl,oArg.onError);}
if(Zapatec.Transport.loading[sUrl]){return{loading:true};}else{Zapatec.Transport.loading[sUrl]=true;return{onLoad:new Function("Zapatec.EventDriven.fireEvent('zpTransportOnLoad"+
sUrl+"');Zapatec.EventDriven.removeEvent('zpTransportOnLoad"+
sUrl+"');Zapatec.EventDriven.removeEvent('zpTransportOnError"+
sUrl+"');Zapatec.Transport.loading['"+sUrl+"'] = false;"),onError:new Function('oError',"Zapatec.EventDriven.fireEvent('zpTransportOnError"+
sUrl+"',oError);Zapatec.EventDriven.removeEvent('zpTransportOnLoad"+
sUrl+"');Zapatec.EventDriven.removeEvent('zpTransportOnError"+
sUrl+"');Zapatec.Transport.loading['"+sUrl+"'] = false;")};}};Zapatec.Transport.loadedJS={};Zapatec.Transport.isLoadedJS=function(sUrl,sAbsUrl){if(typeof sAbsUrl=='undefined'){sAbsUrl=Zapatec.Transport.translateUrl({url:sUrl});}
if(Zapatec.Transport.loadedJS[sAbsUrl]){return true;}
var aScripts=document.getElementsByTagName('script');for(var iScript=0;iScript<aScripts.length;iScript++){var sSrc=aScripts[iScript].getAttribute('src')||'';if(sSrc==sUrl){Zapatec.Transport.loadedJS[sAbsUrl]=true;return true;}}
return false;};Zapatec.Transport.getPath=function(sScriptFileName){var aScripts=document.getElementsByTagName('script');for(var iScript=aScripts.length-1;iScript>=0;iScript--){var sSrc=aScripts[iScript].getAttribute('src')||'';var aTokens=sSrc.split('/');var sLastToken=aTokens.pop();if(sLastToken==sScriptFileName){return aTokens.length?aTokens.join('/')+'/':'';}}
for(var sSrc in Zapatec.Transport.loadedJS){var aTokens=sSrc.split('/');var sLastToken=aTokens.pop();if(sLastToken==sScriptFileName){return aTokens.length?aTokens.join('/')+'/':'';}}
return'';};Zapatec.Transport.include=function(sSrc,sId,bForce){if(Zapatec.doNotInclude){return;}
var sAbsUrl=Zapatec.Transport.translateUrl({url:sSrc});if(!bForce&&Zapatec.Transport.isLoadedJS(sSrc,sAbsUrl)){return;}
document.write('<script type="text/javascript" src="'+sSrc+
(typeof sId=='string'?'" id="'+sId:'')+'"></script>');Zapatec.Transport.loadedJS[sAbsUrl]=true;};Zapatec.include=Zapatec.Transport.include;Zapatec.Transport.includeJS=function(sSrc,sId){setTimeout(function(){var oContr=document.body;if(!oContr){oContr=document.getElementsByTagName('head')[0];if(!oContr){oContr=document;}}
var oScript=document.createElement('script');oScript.type='text/javascript';oScript.src=sSrc;if(typeof sId=='string'){oScript.id=sId;}
oContr.appendChild(oScript);},0);};Zapatec.Transport.loadJS=function(oArg){if(!(oArg instanceof Object)){return;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
var sUrl=null;if(oArg.url){sUrl=oArg.url;}else if(oArg.module){var sPath='';if(typeof oArg.path!='undefined'){sPath=oArg.path;}else if(typeof Zapatec.zapatecPath!='undefined'){sPath=Zapatec.zapatecPath;}
sUrl=sPath+oArg.module+'.js';}else{return;}
var sAbsUrl=Zapatec.Transport.translateUrl({url:sUrl});if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
if(Zapatec.doNotInclude||(!oArg.force&&Zapatec.Transport.isLoadedJS(sUrl,sAbsUrl))){if(typeof oArg.onLoad=='function'){oArg.onLoad();}
return;}
var oHandlers=Zapatec.Transport.setupEvents({url:sAbsUrl,force:oArg.force,onLoad:oArg.onLoad,onError:oArg.onError});if(oHandlers.loading){return;}
Zapatec.Transport.fetch({url:sUrl,async:oArg.async,onLoad:function(oRequest){if(oArg.force||!Zapatec.Transport.loadedJS[sAbsUrl]){var aTokens=sUrl.split('/');var sLastToken=aTokens.pop();Zapatec.lastLoadedModule=aTokens.join('/')+'/';Zapatec.Transport.evalGlobalScope(oRequest.responseText);Zapatec.lastLoadedModule=null;Zapatec.Transport.loadedJS[sAbsUrl]=true;}
if(typeof oHandlers.onLoad=='function'){oHandlers.onLoad();}},onError:oHandlers.onError});};Zapatec.Transport.includeCSS=function(sHref){var oContr=document.getElementsByTagName('head')[0];if(!oContr){return;}
var oLink=document.createElement('link');oLink.setAttribute('rel','stylesheet');oLink.setAttribute('type','text/css');oLink.setAttribute('href',sHref);oContr.appendChild(oLink);};Zapatec.Transport.loadedCss={};Zapatec.Transport.loadCss=function(oArg){if(!(oArg instanceof Object)){return;}
if(!oArg.url){return;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
var sAbsUrl=Zapatec.Transport.translateUrl({url:oArg.url});if(!oArg.force){if(Zapatec.Transport.loadedCss[sAbsUrl]){if(typeof oArg.onLoad=='function'){oArg.onLoad();}
return;}
var aLinks=document.getElementsByTagName('link');for(var iLnk=0;iLnk<aLinks.length;iLnk++){var sHref=aLinks[iLnk].getAttribute('href')||'';sHref=Zapatec.Transport.translateUrl({url:sHref});if(sHref==sAbsUrl){Zapatec.Transport.loadedCss[sAbsUrl]=true;if(typeof oArg.onLoad=='function'){oArg.onLoad();}
return;}}}
var oHandlers=Zapatec.Transport.setupEvents({url:sAbsUrl,force:oArg.force,onLoad:oArg.onLoad,onError:oArg.onError});if(oHandlers.loading){return;}
Zapatec.Transport.fetch({url:oArg.url,async:oArg.async,onLoad:function(oRequest){var sCss=oRequest.responseText;var aResultCss=[];var aImgUrls=[];var aCssUrls=[];var iPos=0;var iNextPos=sCss.indexOf('url(',iPos);while(iNextPos>=0){iNextPos+=4;var sToken=sCss.substring(iPos,iNextPos);var bIsImport=/@import\s+url\($/.test(sToken);aResultCss.push(sToken);iPos=iNextPos;iNextPos=sCss.indexOf(')',iPos);if(iNextPos>=0){var sImgUrl=sCss.substring(iPos,iNextPos);sImgUrl=sImgUrl.replace(/['"]/g,'');sImgUrl=Zapatec.Transport.translateUrl({url:sImgUrl,relativeTo:oArg.url});sImgUrl=Zapatec.Transport.translateUrl({url:sImgUrl});aResultCss.push(sImgUrl);if(bIsImport){aCssUrls.push(sImgUrl);}else{aImgUrls.push(sImgUrl);}
iPos=iNextPos;iNextPos=sCss.indexOf('url(',iPos);}}
aResultCss.push(sCss.substr(iPos));sCss=aResultCss.join('');Zapatec.Transport.loadCssList({urls:aCssUrls,async:oArg.async,onLoad:function(){(new Zapatec.StyleSheet()).addParse(sCss);if(typeof oHandlers.onLoad=='function'){oHandlers.onLoad();}}});Zapatec.Transport.loadedCss[sAbsUrl]=true;Zapatec.Transport.preloadImages({urls:aImgUrls,timeout:60000});},onError:oHandlers.onError});};Zapatec.Transport.loadCssList=function(oArg){if(!(oArg instanceof Object)){return;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
if(!oArg.urls||!oArg.urls.length){if(typeof oArg.onLoad=='function'){oArg.onLoad();}
return;}
var sUrl=oArg.urls.shift();var funcOnLoad=function(){Zapatec.Transport.loadCssList({urls:oArg.urls,async:oArg.async,force:oArg.force,onLoad:oArg.onLoad,onError:oArg.onError});};Zapatec.Transport.loadCss({url:sUrl,async:oArg.async,force:oArg.force,onLoad:funcOnLoad,onError:function(oError){Zapatec.Transport.displayError(oError.errorCode,oError.errorDescription,oArg.onError);funcOnLoad();}});};Zapatec.Transport.imagePreloads=[];Zapatec.Transport.preloadImages=function(oArg){Zapatec.Transport.imagePreloads.push(new Zapatec.PreloadImages(oArg));};Zapatec.Drag={};Zapatec.Utils.emulateWindowEvent(['mousedown','mousemove','mouseup']);Zapatec.Drag.currentId=null;Zapatec.Drag.start=function(oEv,sId,oArg){var oDrag=Zapatec.Drag;var oUtils=Zapatec.Utils;if(oDrag.currentId){return true;}
var oEl=Zapatec.Widget.getElementById(sId);if(!oEl||oEl.zpDrag){return true;}
if(!oArg){oArg={};}
var oPos=oUtils.getMousePos(oEv||window.event);Zapatec.EventDriven.fireEvent('dragStart',{el:oEl,event:oEv});oEl.zpDrag=true;if(oArg.resize){oEl.zpDragResize=true;}
oEl.zpDragPageX=oPos.pageX;oEl.zpDragPageY=oPos.pageY;oEl.zpDragWidth=oEl.clientWidth;oEl.zpDragHeight=oEl.clientHeight;var sTag;var oOffsetParent=oEl.offsetParent;if(oOffsetParent){sTag=oOffsetParent.tagName.toLowerCase();}
if(sTag&&sTag!='body'&&sTag!='html'){oPos=oUtils.getElementOffset(oEl);var oPosParent=oUtils.getElementOffset(oOffsetParent);oEl.zpDragLeft=oPos.left-oPosParent.left;oEl.zpDragTop=oPos.top-oPosParent.top;}else{oEl.zpDragLeft=oEl.offsetLeft;oEl.zpDragTop=oEl.offsetTop;}
oEl.zpDragRight=oEl.zpDragLeft+oEl.zpDragWidth;oEl.zpDragBottom=oEl.zpDragTop+oEl.zpDragHeight;oEl.zpDragPrevLeft=oEl.zpDragPrevRealLeft=oEl.zpDragLeft;oEl.zpDragPrevTop=oEl.zpDragPrevRealTop=oEl.zpDragTop;oEl.zpDragV=oArg.vertical;oEl.zpDragH=oArg.horizontal;oEl.zpDragLimTop=typeof oArg.limitTop=='number'?oArg.limitTop:-Infinity;oEl.zpDragLimBot=typeof oArg.limitBottom=='number'?oArg.limitBottom:Infinity;oEl.zpDragLimLft=typeof oArg.limitLeft=='number'?oArg.limitLeft:-Infinity;oEl.zpDragLimRgh=typeof oArg.limitRight=='number'?oArg.limitRight:Infinity;if(typeof oArg.step=='number'){oEl.zpDragStepV=oEl.zpDragStepH=oArg.step;}
if(typeof oArg.stepVertical=='number'){oEl.zpDragStepV=oArg.stepVertical;}
if(typeof oArg.stepHorizontal=='number'){oEl.zpDragStepH=oArg.stepHorizontal;}
oDrag.currentId=sId;oUtils.addEvent(document,'mousemove',oDrag.move);oUtils.addEvent(document,'mouseup',oDrag.end);return true;};Zapatec.Drag.move=function(oEv){var oDrag=Zapatec.Drag;var oUtils=Zapatec.Utils;oEv||(oEv=window.event);if(!oDrag.currentId){return oUtils.stopEvent(oEv);}
var oEl=document.getElementById(oDrag.currentId);if(!(oEl&&oEl.zpDrag)){return oUtils.stopEvent(oEv);}
var oSt=oEl.style;var oPos=oUtils.getMousePos(oEv);var oParam={el:oEl,startLeft:oEl.zpDragLeft,startTop:oEl.zpDragTop,prevLeft:oEl.zpDragPrevLeft,prevTop:oEl.zpDragPrevTop,left:oEl.zpDragLeft,top:oEl.zpDragTop,realLeft:oEl.zpDragLeft,realTop:oEl.zpDragTop,event:oEv};var iOffset,iPos,iStep,iSize;iOffset=oPos.pageX-oEl.zpDragPageX;iStep=oEl.zpDragStepH;if(iStep){iPos=oEl.zpDragLeft+Math.floor(iOffset/iStep)*iStep;oParam.realLeft=oEl.zpDragPrevRealLeft=oEl.zpDragLeft+iOffset;}else{oParam.realLeft=oEl.zpDragPrevRealLeft=iPos=oEl.zpDragLeft+iOffset;}
if(!oEl.zpDragV){if(oEl.zpDragLimLft<=iPos&&oEl.zpDragLimRgh>=iPos){if(oSt.right){oSt.right='';}
if(oEl.zpDragResize){if(iOffset>0){iSize=oEl.zpDragWidth+iOffset;if(iStep){iSize=Math.floor(iSize/iStep)*iStep;}
oSt.left=oEl.zpDragLeft+'px';}else{iSize=oEl.zpDragWidth-iOffset;if(iStep){iSize=Math.ceil(iSize/iStep)*iStep;}
oSt.left=oEl.zpDragLeft-iSize+'px';}
oSt.width=iSize+'px';}else{oSt.left=iPos+'px';}
oParam.left=iPos;oEl.zpDragPrevLeft=iPos;}else{oParam.left=oParam.prevLeft;}}
iOffset=oPos.pageY-oEl.zpDragPageY;iStep=oEl.zpDragStepV;if(iStep){iPos=oEl.zpDragTop+Math.floor(iOffset/iStep)*iStep;oParam.realTop=oEl.zpDragPrevRealTop=oEl.zpDragTop+iOffset;}else{iPos=oParam.realTop=oEl.zpDragPrevRealTop=oEl.zpDragTop+iOffset;}
if(!oEl.zpDragH){if(oEl.zpDragLimTop<=iPos&&oEl.zpDragLimBot>=iPos){if(oSt.bottom){oSt.bottom='';}
if(oEl.zpDragResize){if(iOffset>0){iSize=oEl.zpDragHeight+iOffset;if(iStep){iSize=Math.floor(iSize/iStep)*iStep;}
oSt.top=oEl.zpDragTop+'px';}else{iSize=oEl.zpDragHeight-iOffset;if(iStep){iSize=Math.ceil(iSize/iStep)*iStep;}
oSt.top=oEl.zpDragBottom-iSize+'px';}
oSt.height=iSize+'px';}else{oSt.top=iPos+'px';}
oParam.top=iPos;oEl.zpDragPrevTop=iPos;}else{oParam.top=oParam.prevTop;}}
Zapatec.EventDriven.fireEvent('dragMove',oParam);return oUtils.stopEvent(oEv);};Zapatec.Drag.end=function(oEv){var oDrag=Zapatec.Drag;var oUtils=Zapatec.Utils;oEv||(oEv=window.event);if(!oDrag.currentId){return oUtils.stopEvent(oEv);}
var oEl=document.getElementById(oDrag.currentId);if(!(oEl&&oEl.zpDrag)){return oUtils.stopEvent(oEv);}
oUtils.removeEvent(document,'mousemove',oDrag.move);oUtils.removeEvent(document,'mouseup',oDrag.end);var oParam={el:oEl,startLeft:oEl.zpDragLeft,startTop:oEl.zpDragTop,left:oEl.zpDragPrevLeft,top:oEl.zpDragPrevTop,realLeft:oEl.zpDragPrevRealLeft,realTop:oEl.zpDragPrevRealTop,event:oEv};oDrag.currentId=null;oEl.zpDrag=null;oEl.zpDragPageY=null;oEl.zpDragPageX=null;oEl.zpDragTop=null;oEl.zpDragLeft=null;oEl.zpDragPrevTop=null;oEl.zpDragPrevLeft=null;oEl.zpDragPrevRealTop=null;oEl.zpDragPrevRealLeft=null;oEl.zpDragV=null;oEl.zpDragH=null;oEl.zpDragLimTop=null;oEl.zpDragLimBot=null;oEl.zpDragLimLft=null;oEl.zpDragLimRgh=null;oEl.zpDragStepV=null;oEl.zpDragStepH=null;Zapatec.EventDriven.fireEvent('dragEnd',oParam);return oUtils.stopEvent(oEv);};if(typeof Zapatec=='undefined'){Zapatec=function(){};}
Zapatec.Widget=function(oArg){this.config={};Zapatec.Widget.SUPERconstructor.call(this);this.init(oArg);};Zapatec.inherit(Zapatec.Widget,Zapatec.EventDriven);Zapatec.Widget.path=Zapatec.getPath('Zapatec.Widget');Zapatec.Widget.prototype.init=function(oArg){Zapatec.Widget.SUPERclass.init.call(this);if(typeof this.id=='undefined'){var iId=0;while(Zapatec.Widget.all[iId]){iId++;}
this.id=iId;Zapatec.Widget.all[iId]=this;}
this.configure(oArg);this.addUserEventListeners();this.addStandardEventListeners();this.initLang();this.loadTheme();};Zapatec.Widget.prototype.reconfigure=function(oArg){this.configure(oArg);this.loadTheme();if(oArg.lang||oArg.langCountryCode||oArg.langEncoding){this.langStr=this.config.lang;if(this.config.langCountryCode&&this.config.langCountryCode.length>0){this.langStr+="_"+this.config.langCountryCode;}
if(this.config.langEncoding&&this.config.langEncoding.length>0){this.langStr+="-"+this.config.langEncoding;}}
if(this.config.lang&&this.config.lang.length>0&&!(Zapatec.Langs[this.config.langId]&&Zapatec.Langs[this.config.langId][this.langStr])){Zapatec.Log({description:this.config.lang+(this.config.langCountryCode?" and country code "+this.config.langCountryCode:"")+(this.config.langEncoding?" and encoding "+this.config.langEncoding:"")});this.config.lang=null;this.config.langEncoding=null;this.langStr=null;}};Zapatec.Widget.prototype.configure=function(oArg){this.defineConfigOption('theme','default');var sPath=this.constructor.path;if(typeof sPath!='undefined'){this.defineConfigOption('themePath',sPath+'../themes/');}else{this.defineConfigOption('themePath','../themes/');}
this.defineConfigOption('asyncTheme',false);this.defineConfigOption('source');this.defineConfigOption('sourceType');this.defineConfigOption('callbackSource');this.defineConfigOption('asyncSource',true);this.defineConfigOption('reliableSource',true);this.defineConfigOption('callbackConvertSource');this.defineConfigOption('eventListeners',{});this.defineConfigOption('langId');this.defineConfigOption('lang');this.defineConfigOption('langCountryCode');this.defineConfigOption('langEncoding');if(oArg){var oConfig=this.config;for(var sOption in oArg){if(typeof oConfig[sOption]!='undefined'){oConfig[sOption]=oArg[sOption];}else{Zapatec.Log({description:"Unknown config option: "+sOption});}}}};Zapatec.Widget.prototype.getConfiguration=function(){return this.config;};Zapatec.Widget.all=[];Zapatec.Widget.getWidgetById=function(iId){return Zapatec.Widget.all[iId];};Zapatec.Widget.prototype.addCircularRef=function(oElement,sProperty){if(!this.widgetCircularRefs){this.widgetCircularRefs=[];}
this.widgetCircularRefs.push([oElement,sProperty]);};Zapatec.Widget.prototype.createProperty=function(oElement,sProperty,val){oElement[sProperty]=val;this.addCircularRef(oElement,sProperty);};Zapatec.Widget.prototype.removeCircularRefs=function(){if(!this.widgetCircularRefs){return;}
for(var iRef=this.widgetCircularRefs.length-1;iRef>=0;iRef--){var oRef=this.widgetCircularRefs[iRef];oRef[0][oRef[1]]=null;oRef[0]=null;}};Zapatec.Widget.prototype.discard=function(){Zapatec.Widget.all[this.id]=null;this.removeCircularRefs();};Zapatec.Widget.removeCircularRefs=function(){for(var iWidget=Zapatec.Widget.all.length-1;iWidget>=0;iWidget--){var oWidget=Zapatec.Widget.all[iWidget];if(oWidget&&oWidget.removeCircularRefs){oWidget.removeCircularRefs();}}};Zapatec.Utils.addEvent(window,'unload',Zapatec.Widget.removeCircularRefs);Zapatec.Widget.prototype.defineConfigOption=function(sOption,val){if(typeof this.config[sOption]=='undefined'){if(typeof val=='undefined'){this.config[sOption]=null;}else{this.config[sOption]=val;}}};Zapatec.Widget.prototype.addUserEventListeners=function(){var oListeners=this.config.eventListeners;var fListener,iListeners,iListener;for(var sEvent in oListeners){if(oListeners.hasOwnProperty(sEvent)){vListener=oListeners[sEvent];if(vListener instanceof Array){iListeners=vListener.length;for(iListener=0;iListener<iListeners;iListener++){this.addEventListener(sEvent,vListener[iListener]);}}else{this.addEventListener(sEvent,vListener);}}}};Zapatec.Widget.prototype.addStandardEventListeners=function(){this.addEventListener('loadThemeError',Zapatec.Widget.loadThemeError);};Zapatec.Widget.loadThemeError=function(oError){var sDescription="Can't load theme.";if(oError&&oError.errorDescription){sDescription+=' '+oError.errorDescription;}
Zapatec.Log({description:sDescription});};Zapatec.Widget.prototype.loadTheme=function(){var oConfig=this.config;if(typeof oConfig.theme=='string'&&oConfig.theme.length){var iPos=oConfig.theme.lastIndexOf('/');if(iPos>=0){iPos++;oConfig.themePath=oConfig.theme.substring(0,iPos);oConfig.theme=oConfig.theme.substring(iPos);}
iPos=oConfig.theme.lastIndexOf('.');if(iPos>=0){oConfig.theme=oConfig.theme.substring(0,iPos);}
oConfig.theme=oConfig.theme.toLowerCase();if(oConfig.theme=='auto'){var sUserAgent=navigator.userAgent;if(sUserAgent.indexOf('Windows NT 6')!=-1){oConfig.theme='winvista';}else if(sUserAgent.indexOf('Windows NT 5')!=-1){oConfig.theme='winxp';}else if(sUserAgent.indexOf('Win')!=-1){oConfig.theme='win2k';}else if(sUserAgent.indexOf('Mac')!=-1){oConfig.theme='macosx';}else{oConfig.theme='default';}}}else{oConfig.theme='';}
if(oConfig.theme){this.fireEvent('loadThemeStart');this.themeLoaded=false;var oWidget=this;var sUrl=oConfig.themePath+oConfig.theme+'.css';Zapatec.Transport.loadCss({url:sUrl,async:oConfig.asyncTheme,onLoad:function(){oWidget.fireEvent('loadThemeEnd');oWidget.themeLoaded=true;},onError:function(oError){oWidget.fireEvent('loadThemeEnd');oWidget.fireEvent('loadThemeError',oError);oWidget.themeLoaded=true;}});}}
Zapatec.Widget.prototype.getClassName=function(oArg){var aClassName=[];if(oArg&&oArg.prefix){aClassName.push(oArg.prefix);}
var sTheme=this.config.theme;if(sTheme!=''){aClassName.push(sTheme.charAt(0).toUpperCase());aClassName.push(sTheme.substr(1));}
if(oArg&&oArg.suffix){aClassName.push(oArg.suffix);}
return aClassName.join('');};Zapatec.Widget.prototype.formElementId=function(oArg){var aId=[];if(oArg&&oArg.prefix){aId.push(oArg.prefix);}else{aId.push('zpWidget');}
aId.push(this.id);if(oArg&&oArg.suffix){aId.push(oArg.suffix);}else{aId.push('-');}
if(typeof this.widgetUniqueIdCounter=='undefined'){this.widgetUniqueIdCounter=0;}else{this.widgetUniqueIdCounter++;}
aId.push(this.widgetUniqueIdCounter);return aId.join('');};Zapatec.Widget.prototype.showContainer=function(effects,animSpeed,onFinish){return this.showHideContainer(effects,animSpeed,onFinish,true);}
Zapatec.Widget.prototype.hideContainer=function(effects,animSpeed,onFinish){return this.showHideContainer(effects,animSpeed,onFinish,false);}
Zapatec.Widget.prototype.showHideContainer=function(effects,animSpeed,onFinish,show){if(this.container==null){return null;}
if(effects&&effects.length>0&&typeof(Zapatec.Effects)=='undefined'){var self=this;Zapatec.Transport.loadJS({url:Zapatec.zapatecPath+'../zpeffects/src/effects.js',onLoad:function(){self.showHideContainer(effects,animSpeed,onFinish,show);}});return false;}
if(animSpeed==null&&isNaN(parseInt(animSpeed))){animSpeed=5;}
if(!effects||effects.length==0){if(show){this.container.style.display=this.originalContainerDisplay;this.originalContainerDisplay=null;}else{this.originalContainerDisplay=this.container.style.display;this.container.style.display='none';}
if(onFinish){onFinish();}}else{if(show){Zapatec.Effects.show(this.container,animSpeed,effects,onFinish);}else{Zapatec.Effects.hide(this.container,animSpeed,effects,onFinish);}}
return true;}
Zapatec.Widget.prototype.loadData=function(oArg){var oConfig=this.config;if(typeof oConfig.callbackSource=='function'){var oSource=oConfig.callbackSource(oArg);if(oSource){if(typeof oSource.source!='undefined'){oConfig.source=oSource.source;}
if(typeof oSource.sourceType!='undefined'){oConfig.sourceType=oSource.sourceType;}}}
var vSource=oConfig.source;if(typeof oConfig.callbackConvertSource=='function'){vSource=oConfig.callbackConvertSource(vSource);}
var sSourceType=oConfig.sourceType;if(vSource!=null&&sSourceType!=null){sSourceType=sSourceType.toLowerCase();if(sSourceType=='html'){this.fireEvent('loadDataStart');this.loadDataHtml(Zapatec.Widget.getElementById(vSource));this.fireEvent('loadDataEnd');}else if(sSourceType=='html/text'){this.fireEvent('loadDataStart');this.loadDataHtmlText(vSource);this.fireEvent('loadDataEnd');}else if(sSourceType=='html/url'){this.fireEvent('fetchSourceStart');var oWidget=this;Zapatec.Transport.fetch({url:vSource,async:oConfig.asyncSource,onLoad:function(oRequest){oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataStart');oWidget.loadDataHtmlText(oRequest.responseText);oWidget.fireEvent('loadDataEnd');},onError:function(oError){oWidget.fireEvent('fetchSourceError',oError);oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataEnd');}});}else if(sSourceType=='json'){this.fireEvent('loadDataStart');if(typeof vSource=='object'){this.loadDataJson(vSource);}else if(oConfig.reliableSource){this.loadDataJson(eval(['(',vSource,')'].join('')));}else{this.loadDataJson(Zapatec.Transport.parseJson({strJson:vSource}));}
this.fireEvent('loadDataEnd');}else if(sSourceType=='json/url'){this.fireEvent('fetchSourceStart');var oWidget=this;Zapatec.Transport.fetchJsonObj({url:vSource,async:oConfig.asyncSource,reliable:oConfig.reliableSource,onLoad:function(oResult){oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataStart');oWidget.loadDataJson(oResult);oWidget.fireEvent('loadDataEnd');},onError:function(oError){oWidget.fireEvent('fetchSourceError',oError);oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataEnd');}});}else if(sSourceType=='xml'){this.fireEvent('loadDataStart');if(typeof vSource=='object'){this.loadDataXml(vSource);}else{this.loadDataXml(Zapatec.Transport.parseXml({strXml:vSource}));}
this.fireEvent('loadDataEnd');}else if(sSourceType=='xml/url'){this.fireEvent('fetchSourceStart');var oWidget=this;Zapatec.Transport.fetchXmlDoc({url:vSource,async:oConfig.asyncSource,onLoad:function(oResult){oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataStart');oWidget.loadDataXml(oResult);oWidget.fireEvent('loadDataEnd');},onError:function(oError){oWidget.fireEvent('fetchSourceError',oError);oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataEnd');}});}}else{this.fireEvent('loadDataStart');this.loadDataHtml(Zapatec.Widget.getElementById(vSource));this.fireEvent('loadDataEnd');}};Zapatec.Widget.prototype.loadDataHtml=function(oSource){};Zapatec.Widget.prototype.loadDataHtmlText=function(sSource){var oTempContainer=Zapatec.Transport.parseHtml(sSource);this.loadDataHtml(oTempContainer.firstChild);};Zapatec.Widget.prototype.loadDataJson=function(oSource){};Zapatec.Widget.prototype.loadDataXml=function(oSource){};Zapatec.Widget.prototype.receiveData=function(oArg){if(!oArg){oArg={};}
this.dataSender=oArg.widget;this.fireEvent('receiveData',oArg);};Zapatec.Widget.prototype.replyData=function(){return null;};Zapatec.Widget.prototype.replyDataCancel=function(){this.fireEvent('replyDataCancel');if(typeof this.hide=='function'){this.hide();}
this.dataSender=null;};Zapatec.Widget.prototype.replyDataReturn=function(oArg){if(!oArg){oArg={};}
this.fireEvent('replyDataReturn',oArg);var oWidget=oArg.widget;if(!oWidget){oWidget=this.dataSender;}
if(!oWidget||typeof oWidget.acceptData!='function'){return;}
oWidget.acceptData({widget:this,data:this.replyData()});this.replyDataCancel();};Zapatec.Widget.prototype.acceptData=function(oArg){this.fireEvent('acceptData',oArg);};Zapatec.Widget.prototype.initLang=function(){this.langStr=this.config.lang;if(this.config.langCountryCode&&this.config.langCountryCode.length>0){this.langStr+="_"+this.config.langCountryCode;}
if(this.config.langEncoding&&this.config.langEncoding.length>0){this.langStr+="-"+this.config.langEncoding;}
if(this.config.lang&&this.config.lang.length>0&&!(Zapatec.Langs[this.config.langId]&&Zapatec.Langs[this.config.langId][this.langStr])){Zapatec.Log({description:"No language data found for language "+
this.config.lang+(this.config.langCountryCode?" and country code "+this.config.langCountryCode:"")+(this.config.langEncoding?" and encoding "+this.config.langEncoding:"")});this.config.lang=null;this.config.langCountryCode=null;this.config.langEncoding=null;this.langStr=null;}};Zapatec.Widget.prototype.getMessage=function(key){if(arguments.length==0){return null;}
if(!Zapatec.Langs[this.config.langId]||!Zapatec.Langs[this.config.langId][this.langStr]||!Zapatec.Langs[this.config.langId][this.langStr][key]){return key;}
var res=Zapatec.Langs[this.config.langId][this.langStr][key];if(arguments.length>1&&typeof(res)=="string"){for(var ii=1;ii<arguments.length;ii++){var re=new RegExp("(^|([^\\\\]))\%"+ii);res=res.replace(re,"$2"+arguments[ii]);}}
return res;};Zapatec.Widget.callMethod=function(iWidgetId,sMethod){var oWidget=Zapatec.Widget.getWidgetById(iWidgetId);if(oWidget&&typeof oWidget[sMethod]=='function'){var aArgs=[].slice.call(arguments,2);return oWidget[sMethod].apply(oWidget,aArgs);}};Zapatec.Widget.getElementById=function(element){if(typeof element=='string'){return document.getElementById(element);}
return element;};Zapatec.Widget.getStyle=function(element){var style=element.getAttribute('style')||'';if(typeof style=='string'){return style;}
return style.cssText;};Zapatec.tooltipPath=Zapatec.getPath("Zapatec.TooltipWidget");Zapatec.Tooltip=function(objArgs){if(arguments.length==0){objArgs={};}
Zapatec.Tooltip.SUPERconstructor.call(this,objArgs);};Zapatec.Tooltip.id='Zapatec.Tooltip';Zapatec.inherit(Zapatec.Tooltip,Zapatec.Widget);Zapatec.Tooltip.prototype.init=function(objArgs)
{Zapatec.Tooltip.SUPERclass.init.call(this,objArgs);this.createTooltip();};Zapatec.Tooltip.prototype.configure=function(objArgs){this.defineConfigOption('target',null);this.defineConfigOption('tooltip',null);this.defineConfigOption('parent',null);this.defineConfigOption('movable',false);this.defineConfigOption('content',null);this.defineConfigOption('offsetX',2);this.defineConfigOption('offsetY',20);Zapatec.Tooltip.SUPERclass.configure.call(this,objArgs);if(typeof this.config.target=="string"){this.config.target=Zapatec.Widget.getElementById(this.config.target);}
if(!this.config.target){Zapatec.Log({description:"Can't find tooltip target (\"target\" config option)"});return false;}
if(typeof this.config.tooltip=="string"){this.config.tooltip=Zapatec.Widget.getElementById(this.config.tooltip);}
if(!this.config.tooltip){if(this.config.content){this.config.tooltip=Zapatec.Utils.createElement("div");}
else{Zapatec.Log({description:"Can't find \"tooltip\" config option"});return false;}}
if(this.config.content){this.setContent(this.config.content);}
if(typeof this.config.parent=="string"){this.config.parent=Zapatec.Widget.getElementById(this.config.parent);}};Zapatec.Tooltip.prototype.createTooltip=function(){var self=this;this.visible=false;this.config.tooltip.style.position='absolute';this.config.tooltip.style.display='none';this.inTooltip=false;this.timeout=null;var parentNotDefined=!this.config.parent;if(parentNotDefined){this.config.parent=this.config.target;}
var parent=this.config.parent;if(parentNotDefined&&parent.tagName&&parent.tagName.toLowerCase()=="input"){document.body.appendChild(this.config.tooltip);}
else{parent.appendChild(this.config.tooltip);}
Zapatec.Utils.addClass(this.config.tooltip,this.getClassName({prefix:"zpTooltip",suffix:""}));if(this.config.tooltip.title){var title=Zapatec.Utils.createElement("div");this.config.tooltip.insertBefore(title,this.config.tooltip.firstChild);title.className=this.getClassName({prefix:"zpTooltip",suffix:"Title"});title.innerHTML=unescape(this.config.tooltip.title);this.config.tooltip.title="";}
this.wch=Zapatec.Utils.createWCH(this.config.tooltip);if(this.wch){this.wch.style.zIndex=-1;}
this.createProperty(this,'_targetMouseOverListener',function(ev){return self._onMouseMove(ev);});Zapatec.Utils.addEvent(this.config.target,"mouseover",this._targetMouseOverListener);if(this.config.movable){this.createProperty(this,'_targetMouseMoveListener',function(ev){return self._onMouseMove(ev);});Zapatec.Utils.addEvent(this.config.target,"mousemove",this._targetMouseMoveListener);}
this.createProperty(this,'_targetMouseOutListener',function(ev){return self._onMouseOut(ev);});Zapatec.Utils.addEvent(this.config.target,"mouseout",this._targetMouseOutListener);this.createProperty(this,'_tooltipMouseOverListener',function(ev){self.inTooltip=true;return true;});Zapatec.Utils.addEvent(this.config.tooltip,"mouseover",this._tooltipMouseOverListener);this.createProperty(this,'_tooltipMouseOutListener',function(ev){ev||(ev=window.event);if(!Zapatec.Utils.isRelated(self.config.tooltip,ev)){self.inTooltip=false;self.hide();}
return true;});Zapatec.Utils.addEvent(this.config.tooltip,"mouseout",this._tooltipMouseOutListener);}
Zapatec.Tooltip.prototype.destroy=function(){this.hide();Zapatec.Utils.removeEvent(this.config.target,"mouseover",this._targetMouseOverListener);Zapatec.Utils.removeEvent(this.config.target,"mousemove",this._targetMouseMoveListener);Zapatec.Utils.removeEvent(this.config.target,"mouseout",this._targetMouseOutListener);Zapatec.Utils.removeEvent(this.config.tooltip,"mouseover",this._tooltipMouseOverListener);Zapatec.Utils.removeEvent(this.config.tooltip,"mouseout",this._tooltipMouseOutListener);if(this.wch){this.wch.parentNode.removeChild(this.wch);}}
Zapatec.Tooltip.setupFromDFN=function(class_re){var dfns=document.getElementsByTagName("dfn");if(typeof class_re=="string")
class_re=new RegExp("(^|\\s)"+class_re+"(\\s|$)","i");for(var i=0;i<dfns.length;++i){var dfn=dfns[i];if(!class_re||class_re.test(dfn.className)){var div=document.createElement("div");if(dfn.title){div.title=dfn.title;dfn.title="";}
div.className=dfn.className;if(dfn.style.width){div.style.width=dfn.style.width;}
if(dfn.style.height){div.style.height=dfn.style.height;}
while(dfn.firstChild)
div.appendChild(dfn.firstChild);dfn.innerHTML="?";var oTooltip=new Zapatec.Tooltip({target:dfn,parent:document.body,tooltip:div});var dfnClass=oTooltip.getClassName({prefix:"zpTooltip",suffix:"Dfn"});Zapatec.Utils.addClass(dfn,dfnClass);}}};Zapatec.Tooltip._currentTooltip=null;Zapatec.Tooltip.prototype._onMouseMove=function(ev){ev||(ev=window.event);if(this.timeout){clearTimeout(this.timeout);this.timeout=null;}
if((!this.visible||this.config.movable)&&!Zapatec.Utils.isRelated(this.config.target,ev)){var oPos=Zapatec.Utils.getMousePos(ev);this.show(oPos.pageX+this.config.offsetX,oPos.pageY+this.config.offsetY);}
return true;};Zapatec.Tooltip.prototype._onMouseOut=function(ev){ev||(ev=window.event);var self=this;if(!Zapatec.Utils.isRelated(this.config.target,ev)){if(this.timeout){clearTimeout(this.timeout);this.timeout=null;}
this.timeout=setTimeout(function(){self.hide();},150);}
return true;};Zapatec.Tooltip.prototype.show=function(x,y){if(Zapatec.Tooltip._currentTooltip){if(Zapatec.Tooltip._currentTooltip.timeout){clearTimeout(Zapatec.Tooltip._currentTooltip.timeout);Zapatec.Tooltip._currentTooltip.timeout=null;}
Zapatec.Tooltip._currentTooltip.hide();}
this.config.tooltip.style.display='block';if(null==x&&null==y){var targetOffset=Zapatec.Utils.getElementOffset(this.config.target);x=targetOffset.left;y=targetOffset.top;}
this.config.tooltip.style.left=x+'px';this.config.tooltip.style.top=y+'px';var oOffset=Zapatec.Utils.getElementOffset(this.config.tooltip);var iDiffLeft=x-oOffset.left;if(iDiffLeft){x+=iDiffLeft;this.config.tooltip.style.left=x+'px';}
var iDiffTop=y-oOffset.top;if(iDiffTop){y+=iDiffTop;this.config.tooltip.style.top=y+'px';}
oOffset=Zapatec.Utils.getElementOffset(this.config.tooltip);var iRight=oOffset.left+oOffset.width;var iBottom=oOffset.top+oOffset.height;var oWindowSize=Zapatec.Utils.getWindowSize();var iWinW=Zapatec.Utils.getPageScrollX()+oWindowSize.width;var iWinH=Zapatec.Utils.getPageScrollY()+oWindowSize.height;if(iRight>iWinW){x+=iWinW-iRight;this.config.tooltip.style.left=x+'px';}
if(iBottom>iWinH){y+=iWinH-iBottom;this.config.tooltip.style.top=y+'px';}
Zapatec.Utils.setupWCH(this.wch,0,0,oOffset.width,oOffset.height);Zapatec.Utils.addClass(this.config.target,this.getClassName({prefix:"zpTooltip",suffix:"Hover"}));this.visible=true;Zapatec.Tooltip._currentTooltip=this;};Zapatec.Tooltip.prototype.hide=function(){if(!this.inTooltip){this.config.tooltip.style.display="none";Zapatec.Utils.hideWCH(this.wch);Zapatec.Utils.removeClass(this.config.target,this.getClassName({prefix:"zpTooltip",suffix:"Hover"}));this.visible=false;}};Zapatec.Tooltip.prototype.setContent=function(html){this.config.tooltip.innerHTML=html;}
Zapatec.Calendar=function(firstDayOfWeek,dateStr,onSelected,onClose){if(typeof this.id=='undefined'){var iId=0;while(Zapatec.Widget.all[iId]){iId++;}
this.id=iId;Zapatec.Widget.all[iId]=this;}
this.bShowHistoryEvent=false;this.activeDiv=null;this.currentDateEl=null;this.getDateStatus=null;this.getDateToolTip=null;this.getDateText=null;this.timeout=null;this.onSelected=onSelected||null;this.onClose=onClose||null;this.onFDOW=null;this.dragging=false;this.hidden=false;this.minYear=1970;this.maxYear=2050;this.minMonth=0;this.maxMonth=11;this.dateFormat=Zapatec.Calendar.i18n("DEF_DATE_FORMAT");this.ttDateFormat=Zapatec.Calendar.i18n("TT_DATE_FORMAT");this.historyDateFormat="%B %d, %Y";this.isPopup=true;this.weekNumbers=true;this.noGrab=false;if(Zapatec.Calendar.prefs.fdow||(Zapatec.Calendar.prefs.fdow==0)){this.firstDayOfWeek=parseInt(Zapatec.Calendar.prefs.fdow,10);}
else{var fd=0;if(typeof firstDayOfWeek=="number"){fd=firstDayOfWeek;}else if(typeof Zapatec.Calendar._FD=='number'){fd=Zapatec.Calendar._FD;}
this.firstDayOfWeek=fd;}
this.showsOtherMonths=false;this.dateStr=dateStr;this.showsTime=false;this.sortOrder="asc";this.time24=true;this.timeInterval=null;this.yearStep=2;this.hiliteToday=true;this.multiple=null;this.table=null;this.element=null;this.tbody=new Array();this.firstdayname=null;this.monthsCombo=null;this.hilitedMonth=null;this.activeMonth=null;this.yearsCombo=null;this.hilitedYear=null;this.activeYear=null;this.histCombo=null;this.hilitedHist=null;this.dateClicked=false;this.numberMonths=1;this.controlMonth=1;this.vertical=false;this.monthsInRow=1;this.titles=new Array();this.rowsOfDayNames=new Array();this.helpButton=true;this.disableFdowClick=true;this.disableDrag=false;this.yearNav=true;this.closeButton=true;Zapatec.Calendar._initSDN();};Zapatec.Calendar._initSDN=function(){if(typeof Zapatec.Calendar._TT._SDN=="undefined"){if(typeof Zapatec.Calendar._TT._SDN_len=="undefined")
Zapatec.Calendar._TT._SDN_len=3;var ar=[];for(var i=8;i>0;){ar[--i]=Zapatec.Calendar._TT._DN[i].substr(0,Zapatec.Calendar._TT._SDN_len);}
Zapatec.Calendar._TT._SDN=ar;if(typeof Zapatec.Calendar._TT._SMN_len=="undefined")
Zapatec.Calendar._TT._SMN_len=3;ar=[];for(var i=12;i>0;){ar[--i]=Zapatec.Calendar._TT._MN[i].substr(0,Zapatec.Calendar._TT._SMN_len);}
Zapatec.Calendar._TT._SMN=ar;}
if(typeof Zapatec.Calendar._TT._AMPM=="undefined"){Zapatec.Calendar._TT._AMPM={am:"am",pm:"pm"};}};Zapatec.Calendar.i18n=function(str,type){var tr='';if(!type){if(Zapatec.Calendar._TT)
tr=Zapatec.Calendar._TT[str];if(!tr&&Zapatec.Calendar._TT_en)
tr=Zapatec.Calendar._TT_en[str];}else switch(type){case"dn":tr=Zapatec.Calendar._TT._DN[str];break;case"sdn":tr=Zapatec.Calendar._TT._SDN[str];break;case"mn":tr=Zapatec.Calendar._TT._MN[str];break;case"smn":tr=Zapatec.Calendar._TT._SMN[str];break;case"ampm":tr=Zapatec.Calendar._TT._AMPM[str];break;}
if(!tr)tr=""+str;return tr;};Zapatec.Calendar._C=null;Zapatec.Calendar.prefs={fdow:null,history:"",sortOrder:"asc",hsize:9};Zapatec.Calendar.savePrefs=function(){Zapatec.Utils.writeCookie("ZP_CAL",Zapatec.Utils.makePref(this.prefs),null,'/',30);};Zapatec.Calendar.loadPrefs=function(){var txt=Zapatec.Utils.getCookie("ZP_CAL"),tmp;if(txt){tmp=Zapatec.Utils.loadPref(txt);if(tmp)
Zapatec.Utils.mergeObjects(this.prefs,tmp);}};Zapatec.Calendar._add_evs=function(el){var C=Zapatec.Calendar;el.onmouseover=C.dayMouseOver;el.onmousedown=C.dayMouseDown;el.onmouseout=C.dayMouseOut;if(Zapatec.is_ie)
el.ondblclick=C.dayMouseDblClick;};Zapatec.Calendar._del_evs=function(el){el.onmouseover=null;el.onmousedown=null;el.onmouseout=null;if(Zapatec.is_ie)
el.ondblclick=null;};Zapatec.Calendar.findMonth=function(el){if(typeof el.month!="undefined"){return el;}else if(el.parentNode&&typeof el.parentNode.month!="undefined"){return el.parentNode;}
return null;};Zapatec.Calendar.findHist=function(el){if(typeof el.histDate!="undefined"){return el;}else if(el.parentNode&&typeof el.parentNode.histDate!="undefined"){return el.parentNode;}
return null;};Zapatec.Calendar.findYear=function(el){if(typeof el.year!="undefined"){return el;}else if(el.parentNode&&typeof el.parentNode.year!="undefined"){return el.parentNode;}
return null;};Zapatec.Calendar.showMonthsCombo=function(){var cal=Zapatec.Calendar._C;if(!cal){return false;}
var cd=cal.activeDiv;var mc=cal.monthsCombo;var date=cal.date,MM=cal.date.getMonth(),YY=cal.date.getFullYear(),min=(YY==cal.minYear),max=(YY==cal.maxYear);for(var i=mc.firstChild;i;i=i.nextSibling){var m=i.month;Zapatec.Utils.removeClass(i,"hilite");Zapatec.Utils.removeClass(i,"active");Zapatec.Utils.removeClass(i,"disabled");i.disabled=false;if((min&&m<cal.minMonth)||(max&&m>cal.maxMonth)){Zapatec.Utils.addClass(i,"disabled");i.disabled=true;}
if(m==MM)
Zapatec.Utils.addClass(cal.activeMonth=i,"active");}
var s=mc.style;s.display="block";if(cd.navtype<0)
s.left=cd.offsetLeft+"px";else{var mcw=mc.offsetWidth;if(typeof mcw=="undefined")
mcw=50;s.left=(cd.offsetLeft+cd.offsetWidth-mcw)+"px";}
s.top=(cd.offsetTop+cd.offsetHeight)+"px";cal.updateWCH(mc);};Zapatec.Calendar.showHistoryCombo=function(){var cal=Zapatec.Calendar._C,a,h,i,cd,hc,s,tmp,div;if(!cal)
return false;hc=cal.histCombo;while(hc.firstChild)
hc.removeChild(hc.lastChild);if(Zapatec.Calendar.prefs.history){a=Zapatec.Calendar.prefs.history.split(/,/);i=0;while(tmp=a[i++]){tmp=tmp.split(/\//);h=Zapatec.Utils.createElement("div");h.className=Zapatec.is_ie?"label-IEfix":"label";h.id="zpCal"+cal.id+"HistoryDropdownItem"+(i-1);h.histDate=new Date(parseInt(tmp[0],10),parseInt(tmp[1],10)-1,parseInt(tmp[2],10),tmp[3]?parseInt(tmp[3],10):0,tmp[4]?parseInt(tmp[4],10):0);h.appendChild(window.document.createTextNode(h.histDate.print(cal.historyDateFormat)));hc.appendChild(h);if(h.histDate.dateEqualsTo(cal.date))
Zapatec.Utils.addClass(h,"active");}}
cd=cal.activeDiv;s=hc.style;s.display="block";s.left=Math.floor(cd.offsetLeft+(cd.offsetWidth-hc.offsetWidth)/2)+"px";s.top=(cd.offsetTop+cd.offsetHeight)+"px";cal.updateWCH(hc);cal.bEventShowHistory=true;};Zapatec.Calendar.showYearsCombo=function(fwd){var cal=Zapatec.Calendar._C;if(!cal){return false;}
var cd=cal.activeDiv;var yc=cal.yearsCombo;if(cal.hilitedYear){Zapatec.Utils.removeClass(cal.hilitedYear,"hilite");}
if(cal.activeYear){Zapatec.Utils.removeClass(cal.activeYear,"active");}
cal.activeYear=null;var Y=cal.date.getFullYear()+(fwd?1:-1);var yr=yc.firstChild;var show=false;for(var i=12;i>0;--i){if(Y>=cal.minYear&&Y<=cal.maxYear){yr.firstChild.data=Y;yr.year=Y;yr.style.display="block";show=true;}else{yr.style.display="none";}
yr=yr.nextSibling;Y+=fwd?cal.yearStep:-cal.yearStep;}
if(show){var s=yc.style;s.display="block";if(cd.navtype<0)
s.left=cd.offsetLeft+"px";else{var ycw=yc.offsetWidth;if(typeof ycw=="undefined")
ycw=50;s.left=(cd.offsetLeft+cd.offsetWidth-ycw)+"px";}
s.top=(cd.offsetTop+cd.offsetHeight)+"px";}
cal.updateWCH(yc);};Zapatec.Calendar.tableMouseUp=function(ev){var cal=Zapatec.Calendar._C;if(!cal){return false;}
if(cal.timeout){clearTimeout(cal.timeout);}
var el=cal.activeDiv;if(!el){return false;}
var target=Zapatec.Utils.getTargetElement(ev);if(typeof(el.navtype)=="undefined"){while(target&&!target.calendar){target=target.parentNode;}}
ev||(ev=window.event);Zapatec.Utils.removeClass(el,"active");if(target==el||target.parentNode==el){Zapatec.Calendar.cellClick(el,ev);}
var mon=Zapatec.Calendar.findMonth(target);var date=null;if(mon){if(!mon.disabled){date=new Date(cal.date);if(mon.month!=date.getMonth()){date.setMonth(mon.month);cal.setDate(date,true);cal.dateClicked=false;cal.callHandler();}}}else{var year=Zapatec.Calendar.findYear(target);if(year){date=new Date(cal.date);if(year.year!=date.getFullYear()){date.setFullYear(year.year);cal.setDate(date,true);cal.dateClicked=false;cal.callHandler();}}else{var hist=Zapatec.Calendar.findHist(target);if(hist&&!hist.histDate.dateEqualsTo(cal.date)){date=new Date(hist.histDate);cal._init(cal.firstDayOfWeek,cal.date=date);cal.dateClicked=false;cal.callHandler();cal.updateHistory();}}}
Zapatec.Utils.removeEvent(window.document,"mouseup",Zapatec.Calendar.tableMouseUp);Zapatec.Utils.removeEvent(window.document,"mouseover",Zapatec.Calendar.tableMouseOver);Zapatec.Utils.removeEvent(window.document,"mousemove",Zapatec.Calendar.tableMouseOver);cal._hideCombos();Zapatec.Calendar._C=null;return Zapatec.Utils.stopEvent(ev);};Zapatec.Calendar.tableMouseOver=function(ev){var cal=Zapatec.Calendar._C;if(!cal){return;}
var el=cal.activeDiv;var target=Zapatec.Utils.getTargetElement(ev);if(target==el||target.parentNode==el){Zapatec.Utils.addClass(el,"hilite active");Zapatec.Utils.addClass(el.parentNode,"rowhilite");}else{if(typeof el.navtype=="undefined"||(el.navtype!=50&&((el.navtype==0&&!cal.histCombo)||Math.abs(el.navtype)>2)))
Zapatec.Utils.removeClass(el,"active");Zapatec.Utils.removeClass(el,"hilite");Zapatec.Utils.removeClass(el.parentNode,"rowhilite");}
ev||(ev=window.event);if(el.navtype==50&&target!=el){var pos=Zapatec.Utils.getAbsolutePos(el);var w=el.offsetWidth;var x=ev.clientX;var dx;var decrease=true;if(x>pos.x+w){dx=x-pos.x-w;decrease=false;}else
dx=pos.x-x;if(dx<0)dx=0;var range=el._range;var current=el._current;var date=cal.currentDate;var pm=(date.getHours()>=12);var old=el.firstChild.data;var count=Math.floor(dx/10)%range.length;for(var i=range.length;--i>=0;)
if(range[i]==current)
break;while(count-->0)
if(decrease){if(--i<0){i=range.length-1;}}else if(++i>=range.length){i=0;}
if(cal.getDateStatus){var minute=null;var hour=null;var new_date=new Date(date);if(el.className.indexOf("ampm",0)!=-1){minute=date.getMinutes();if(old!=range[i]){hour=(range[i]==Zapatec.Calendar.i18n("pm","ampm"))?((date.getHours()==0)?(12):(date.getHours()+12)):(date.getHours()-12);}else{hour=date.getHours();}
new_date.setHours(hour);}
if(el.className.indexOf("hour",0)!=-1){minute=date.getMinutes();hour=(!cal.time24)?((pm)?((range[i]!=12)?(parseInt(range[i],10)+12):(12)):((range[i]!=12)?(range[i]):(0))):(range[i]);new_date.setHours(hour);}
if(el.className.indexOf("minute",0)!=-1){hour=date.getHours();minute=range[i];new_date.setMinutes(minute);}}
var status=false;if(cal.getDateStatus){status=cal.getDateStatus(new_date,date.getFullYear(),date.getMonth(),date.getDate(),parseInt(hour,10),parseInt(minute,10));}
if(status==false){if(!((!cal.time24)&&(range[i]==Zapatec.Calendar.i18n("pm","ampm"))&&(hour>23))){el.firstChild.data=range[i];}}
cal.onUpdateTime();}
var mon=Zapatec.Calendar.findMonth(target);if(mon){if(!mon.disabled){if(mon.month!=cal.date.getMonth()){if(cal.hilitedMonth){Zapatec.Utils.removeClass(cal.hilitedMonth,"hilite");}
Zapatec.Utils.addClass(mon,"hilite");cal.hilitedMonth=mon;}else if(cal.hilitedMonth){Zapatec.Utils.removeClass(cal.hilitedMonth,"hilite");}}}else{if(cal.hilitedMonth){Zapatec.Utils.removeClass(cal.hilitedMonth,"hilite");}
var year=Zapatec.Calendar.findYear(target);if(year){if(year.year!=cal.date.getFullYear()){if(cal.hilitedYear){Zapatec.Utils.removeClass(cal.hilitedYear,"hilite");}
Zapatec.Utils.addClass(year,"hilite");cal.hilitedYear=year;}else if(cal.hilitedYear){Zapatec.Utils.removeClass(cal.hilitedYear,"hilite");}}else{if(cal.hilitedYear){Zapatec.Utils.removeClass(cal.hilitedYear,"hilite");}
var hist=Zapatec.Calendar.findHist(target);if(hist){if(!hist.histDate.dateEqualsTo(cal.date)){if(cal.hilitedHist){Zapatec.Utils.removeClass(cal.hilitedHist,"hilite");}
Zapatec.Utils.addClass(hist,"hilite");cal.hilitedHist=hist;}else if(cal.hilitedHist){Zapatec.Utils.removeClass(cal.hilitedHist,"hilite");}}else if(cal.hilitedHist){Zapatec.Utils.removeClass(cal.hilitedHist,"hilite");}}}
return Zapatec.Utils.stopEvent(ev);};Zapatec.Calendar.tableMouseDown=function(ev){if(Zapatec.Utils.getTargetElement(ev)==Zapatec.Utils.getElement(ev)){return Zapatec.Utils.stopEvent(ev);}};Zapatec.Calendar.calDragIt=function(ev){ev||(ev=window.event);var cal=Zapatec.Calendar._C;if(!cal){Zapatec.Calendar.calDragEnd();}
if(!cal.disableDrag){if(!(cal&&cal.dragging)){return false;}
var posX=ev.clientX+window.document.body.scrollLeft;var posY=ev.clientY+window.document.body.scrollTop;cal.hideShowCovered();var st=cal.element.style,L=posX-cal.xOffs,T=posY-cal.yOffs;st.left=L+"px";st.top=T+"px";Zapatec.Utils.setupWCH(cal.WCH,L,T);}
return Zapatec.Utils.stopEvent(ev);};Zapatec.Calendar.calDragEnd=function(ev){var cal=Zapatec.Calendar._C;Zapatec.Utils.removeEvent(window.document,"mousemove",Zapatec.Calendar.calDragIt);Zapatec.Utils.removeEvent(window.document,"mouseover",Zapatec.Calendar.calDragIt);Zapatec.Utils.removeEvent(window.document,"mouseup",Zapatec.Calendar.calDragEnd);if(!cal){return false;}
cal.dragging=false;Zapatec.Calendar.tableMouseUp(ev);cal.hideShowCovered();};Zapatec.Calendar.dayMouseDown=function(ev){var canDrag=true;var el=Zapatec.Utils.getElement(ev);if(el.className.indexOf("disabled")!=-1||el.className.indexOf("true")!=-1){return false;}
var cal=el.calendar;while(!cal){el=el.parentNode;cal=el.calendar;}
cal.bEventShowHistory=false;cal.activeDiv=el;Zapatec.Calendar._C=cal;if(el.navtype!=300){if(el.navtype==50){if(!((cal.timeInterval==null)||((cal.timeInterval<60)&&(el.className.indexOf("hour",0)!=-1)))){canDrag=false;}
el._current=el.firstChild.data;if(canDrag){Zapatec.Utils.addEvent(window.document,"mousemove",Zapatec.Calendar.tableMouseOver);}}else{if(((el.navtype==201)||(el.navtype==202))&&(cal.timeInterval>30)&&(el.timePart.className.indexOf("minute",0)!=-1)){canDrag=false;}
if(canDrag){Zapatec.Utils.addEvent(window.document,Zapatec.is_ie5?"mousemove":"mouseover",Zapatec.Calendar.tableMouseOver);}}
if(canDrag){Zapatec.Utils.addClass(el,"hilite active");}
Zapatec.Utils.addEvent(window.document,"mouseup",Zapatec.Calendar.tableMouseUp);}else if(cal.isPopup){cal._dragStart(ev);}else{Zapatec.Calendar._C=null;}
if(el.navtype==-1||el.navtype==1){if(cal.timeout)clearTimeout(cal.timeout);cal.timeout=setTimeout("Zapatec.Calendar.showMonthsCombo()",250);}else if(el.navtype==-2||el.navtype==2){if(cal.timeout)clearTimeout(cal.timeout);cal.timeout=setTimeout((el.navtype>0)?"Zapatec.Calendar.showYearsCombo(true)":"Zapatec.Calendar.showYearsCombo(false)",250);}else if(el.navtype==0&&Zapatec.Calendar.prefs.history){if(cal.timeout)clearTimeout(cal.timeout);cal.timeout=setTimeout("Zapatec.Calendar.showHistoryCombo()",250);}else{cal.timeout=null;}
return Zapatec.Utils.stopEvent(ev);};Zapatec.Calendar.dayMouseDblClick=function(ev){Zapatec.Calendar.cellClick(Zapatec.Utils.getElement(ev),ev||window.event);if(Zapatec.is_ie)
window.document.selection.empty();};Zapatec.Calendar.dayMouseOver=function(ev){var el=Zapatec.Utils.getElement(ev),caldate=el.caldate;while(!el.calendar){el=el.parentNode;caldate=el.caldate;}
var cal=el.calendar;var cel=el.timePart;if(caldate){caldate=new Date(caldate[0],caldate[1],caldate[2]);if(caldate.getDate()!=el.caldate[2])caldate.setDate(el.caldate[2]);}
if(Zapatec.Utils.isRelated(el,ev)||Zapatec.Calendar._C||el.className.indexOf("disabled")!=-1||el.className.indexOf("true")!=-1){return false;}
if(el.ttip){if(el.ttip.substr(0,1)=="_"){el.ttip=caldate.print(el.calendar.ttDateFormat)+el.ttip.substr(1);}
el.calendar.showHint(el.ttip);}
if(el.navtype!=300){if(!((cal.timeInterval==null)||(el.className.indexOf("ampm",0)!=-1)||((cal.timeInterval<60)&&(el.className.indexOf("hour",0)!=-1)))&&(el.navtype==50)){return Zapatec.Utils.stopEvent(ev);}
if(((el.navtype==201)||(el.navtype==202))&&(cal.timeInterval>30)&&(cel.className.indexOf("minute",0)!=-1)){return Zapatec.Utils.stopEvent(ev);}
Zapatec.Utils.addClass(el,"hilite");if(caldate){Zapatec.Utils.addClass(el.parentNode,"rowhilite");}}
return Zapatec.Utils.stopEvent(ev);};Zapatec.Calendar.dayMouseOut=function(ev){var el=Zapatec.Utils.getElement(ev);while(!el.calendar){el=el.parentNode;caldate=el.caldate;}
if(Zapatec.Utils.isRelated(el,ev)||Zapatec.Calendar._C||el.className.indexOf("disabled")!=-1||el.className.indexOf("true")!=-1)
return false;Zapatec.Utils.removeClass(el,"hilite");if(el.caldate)
Zapatec.Utils.removeClass(el.parentNode,"rowhilite");if(el.calendar)
el.calendar.showHint(Zapatec.Calendar.i18n("SEL_DATE"));return Zapatec.Utils.stopEvent(ev);};Zapatec.Calendar.cellClick=function(el,ev){var cal=el.calendar;var closing=false;var newdate=false;var date=null;while(!cal){el=el.parentNode;cal=el.calendar;}
if(el.className.indexOf("disabled")!=-1||el.className.indexOf("true")!=-1){return false;}
if(typeof el.navtype=="undefined"){if(cal.currentDateEl){Zapatec.Utils.removeClass(cal.currentDateEl,"selected");Zapatec.Utils.addClass(el,"selected");closing=(cal.currentDateEl==el);if(!closing){cal.currentDateEl=el;}}
var tmpDate=new Date(el.caldate[0],el.caldate[1],el.caldate[2]);if(tmpDate.getDate()!=el.caldate[2]){tmpDate.setDate(el.caldate[2]);}
cal.date.setDateOnly(tmpDate);cal.currentDate.setDateOnly(tmpDate);date=cal.date;cal.dateClicked=true;if(cal.multiple)
cal._toggleMultipleDate(new Date(date));newdate=true;if(el.otherMonth)
cal._init(cal.firstDayOfWeek,date);cal.onSetTime();}else{if(el.navtype==200){Zapatec.Utils.removeClass(el,"hilite");cal.callCloseHandler();return;}
date=new Date(cal.date);if(el.navtype==0&&!cal.bEventShowHistory)
date.setDateOnly(new Date());cal.dateClicked=false;var year=date.getFullYear();var mon=date.getMonth();function setMonth(m){var day=date.getDate();var max=date.getMonthDays(m);if(day>max){date.setDate(max);}
date.setMonth(m);};switch(el.navtype){case 400:Zapatec.Utils.removeClass(el,"hilite");var text=Zapatec.Calendar.i18n("ABOUT");if(typeof text!="undefined"){text+=cal.showsTime?Zapatec.Calendar.i18n("ABOUT_TIME"):"";}else{text="Help and about box text is not translated into this language.\n"+"If you know this language and you feel generous please update\n"+"the corresponding file in \"lang\" subdir to match calendar-en.js\n"+"and send it back to <support@zapatec.com> to get it into the distribution  ;-)\n\n"+"Thank you!\n"+"http://www.zapatec.com\n";}
alert(text);return;case-2:if(year>cal.minYear){date.setFullYear(year-1);}
break;case-1:if(mon>0){setMonth(mon-1);}else if(year-->cal.minYear){date.setFullYear(year);setMonth(11);}
break;case 1:if(mon<11){setMonth(mon+1);}else if(year<cal.maxYear){date.setFullYear(year+1);setMonth(0);}
break;case 2:if(year<cal.maxYear){date.setFullYear(year+1);}
break;case 100:cal.setFirstDayOfWeek(el.fdow);Zapatec.Calendar.prefs.fdow=cal.firstDayOfWeek;Zapatec.Calendar.savePrefs();if(cal.onFDOW)
cal.onFDOW(cal.firstDayOfWeek);return;case 50:var date=cal.currentDate;if(el.className.indexOf("ampm",0)>=0);else
if(!((cal.timeInterval==null)||((cal.timeInterval<60)&&(el.className.indexOf("hour",0)!=-1)))){break;}
var range=el._range;var current=el.firstChild.data;var pm=(date.getHours()>=12);for(var i=range.length;--i>=0;)
if(range[i]==current)
break;if(ev&&ev.shiftKey){if(--i<0){i=range.length-1;}}else if(++i>=range.length){i=0;}
if(cal.getDateStatus){var minute=null;var hour=null;var new_date=new Date(date);if(el.className.indexOf("ampm",0)!=-1){minute=date.getMinutes();hour=(range[i]==Zapatec.Calendar.i18n("pm","ampm"))?((date.getHours()==12)?(date.getHours()):(date.getHours()+12)):(date.getHours()-12);if(cal.getDateStatus&&cal.getDateStatus(new_date,date.getFullYear(),date.getMonth(),date.getDate(),parseInt(hour,10),parseInt(minute,10))){var dirrect;if(range[i]==Zapatec.Calendar.i18n("pm","ampm")){dirrect=-5;}else{dirrect=5;}
hours=hour;minutes=minute;do{minutes+=dirrect;if(minutes>=60){minutes-=60;++hours;if(hours>=24)hours-=24;new_date.setHours(hours);}
if(minutes<0){minutes+=60;--hours;if(hours<0)hours+=24;new_date.setHours(hours);}
new_date.setMinutes(minutes);if(!cal.getDateStatus(new_date,date.getFullYear(),date.getMonth(),date.getDate(),parseInt(hours,10),parseInt(minutes,10))){hour=hours;minute=minutes;if(hour>12)i=1;else i=0;cal.date.setHours(hour);cal.date.setMinutes(minute);cal.onSetTime();}}while((hour!=hours)||(minute!=minutes));}
new_date.setHours(hour);}
if(el.className.indexOf("hour",0)!=-1){minute=date.getMinutes();hour=(!cal.time24)?((pm)?((range[i]!=12)?(parseInt(range[i],10)+12):(12)):((range[i]!=12)?(range[i]):(0))):(range[i]);new_date.setHours(hour);}
if(el.className.indexOf("minute",0)!=-1){hour=date.getHours();minute=range[i];new_date.setMinutes(minute);}}
var status=false;if(cal.getDateStatus){status=cal.getDateStatus(new_date,date.getFullYear(),date.getMonth(),date.getDate(),parseInt(hour,10),parseInt(minute,10));}
if(!status){el.firstChild.data=range[i];}
cal.onUpdateTime();return;case 201:case 202:var cel=el.timePart;var date=cal.currentDate;if((cel.className.indexOf("minute",0)!=-1)&&(cal.timeInterval>30)){break;}
var val=parseInt(cel.firstChild.data,10);var pm=(date.getHours()>=12);var range=cel._range;for(var i=range.length;--i>=0;)
if(val==range[i]){val=i;break;}
var step=cel._step;if(el.navtype==201){val=step*Math.floor(val/step);val+=step;if(val>=range.length)
val=0;}else{val=step*Math.ceil(val/step);val-=step;if(val<0)
val=range.length-step;}
if(cal.getDateStatus){var minute=null;var hour=null;var new_date=new Date(date);if(cel.className=="hour"){minute=date.getMinutes();hour=(!cal.time24)?((pm)?((range[val]!=12)?(parseInt(range[val],10)+12):(12)):((range[val]!=12)?(range[val]):(0))):(range[val]);new_date.setHours(hour);}
if(cel.className=="minute"){hour=date.getHours();minute=val;new_date.setMinutes(range[val]);}}
var status=false;if(cal.getDateStatus){status=cal.getDateStatus(new_date,date.getFullYear(),date.getMonth(),date.getDate(),parseInt(hour,10),parseInt(minute,10));}
if(!status){cel.firstChild.data=range[val];}
cal.onUpdateTime();return;case 0:if(cal.getDateStatus&&((cal.getDateStatus(date,date.getFullYear(),date.getMonth(),date.getDate())==true)||(cal.getDateStatus(date,date.getFullYear(),date.getMonth(),date.getDate())=="disabled"))){return false;}
break;}
if(!date.equalsTo(cal.date)){if((el.navtype>=-2&&el.navtype<=2)&&(el.navtype!=0)){cal._init(cal.firstDayOfWeek,date,true);return;}
cal.setDate(date);newdate=!(el.navtype&&(el.navtype>=-2&&el.navtype<=2));}}
if(newdate){cal.callHandler();}
if(closing){Zapatec.Utils.removeClass(el,"hilite");cal.callCloseHandler();}};Zapatec.Calendar.prototype.create=function(_par){var parent=null;if(!_par){parent=window.document.getElementsByTagName("body")[0];this.isPopup=true;this.WCH=Zapatec.Utils.createWCH();}else{parent=_par;this.isPopup=false;}
this.currentDate=this.date=this.dateStr?new Date(this.dateStr):new Date();var table=Zapatec.Utils.createElement("table");this.table=table;table.cellSpacing=0;table.cellPadding=0;Zapatec.Utils.createProperty(table,"calendar",this);Zapatec.Utils.addEvent(table,"mousedown",Zapatec.Calendar.tableMouseDown);var div=Zapatec.Utils.createElement("div");this.element=div;div.className="calendar";div.id="zpCal"+this.id+"Container";if(Zapatec.is_opera){table.style.width=(this.monthsInRow*((this.weekNumbers)?(8):(7))*2+4.4*this.monthsInRow)+"em";}
if(this.isPopup){div.style.position="absolute";div.style.display="none";}
div.appendChild(table);var cell=null;var row=null;var cal=this;var hh=function(text,cs,navtype,buttonType){cell=Zapatec.Utils.createElement("td",row);if(buttonType){cell.id="zpCal"+cal.id+buttonType+"ButtonStatus";}
cell.colSpan=cs;cell.className="button";if(Math.abs(navtype)<=2)
cell.className+=" nav";Zapatec.Calendar._add_evs(cell);Zapatec.Utils.createProperty(cell,"calendar",cal);cell.navtype=navtype;if(text.substr(0,1)!="&"){cell.appendChild(document.createTextNode(text));}
else{cell.innerHTML=text;}
return cell;};var hd=function(par,colspan,buttonType){cell=Zapatec.Utils.createElement("td",par);if(buttonType){cell.id="zpCal"+cal.id+buttonType+"ButtonStatus";}
cell.colSpan=colspan;cell.className="button";cell.innerHTML="<div>&nbsp</div>";return cell;};var title_length=((this.weekNumbers)?(8):(7))*this.monthsInRow-2;var thead=Zapatec.Utils.createElement("thead",table);if(this.numberMonths==1){this.title=thead;}
row=Zapatec.Utils.createElement("tr",thead);if(this.helpButton){hh("?",1,400,"Help").ttip=Zapatec.Calendar.i18n("INFO");}else{hd(row,1,"Help");}
this.title=hh("&nbsp;",title_length,300);this.title.className="title";this.title.id="zpCal"+this.id+"Title";if(this.isPopup){if(!this.disableDrag){this.title.ttip=Zapatec.Calendar.i18n("DRAG_TO_MOVE");this.title.style.cursor="move";}
if(this.closeButton){hh("&#x00d7;",1,200,"Close").ttip=Zapatec.Calendar.i18n("CLOSE");}else{hd(row,1,"Close");}}else{hd(row,1,"Close");}
row=Zapatec.Utils.createElement("tr",thead);this._nav_py=hh("&#x00ab;",1,-2,"PrevYear");this._nav_py.ttip=Zapatec.Calendar.i18n("PREV_YEAR");this._nav_pm=hh("&#x2039;",1,-1,"PrevMonth");this._nav_pm.ttip=Zapatec.Calendar.i18n("PREV_MONTH");this._nav_now=hh(Zapatec.Calendar.i18n("TODAY"),title_length-2,0,"Today");this._nav_now.ttip=Zapatec.Calendar.i18n("GO_TODAY");this._nav_nm=hh("&#x203a;",1,1,"NextMonth");this._nav_nm.ttip=Zapatec.Calendar.i18n("NEXT_MONTH");this._nav_ny=hh("&#x00bb;",1,2,"NextYear");this._nav_ny.ttip=Zapatec.Calendar.i18n("NEXT_YEAR");var rowsOfMonths=Math.floor(this.numberMonths/this.monthsInRow);if(this.numberMonths%this.monthsInRow>0){++rowsOfMonths;}
for(var l=1;l<=rowsOfMonths;++l){var thead=Zapatec.Utils.createElement("thead",table);if(Zapatec.is_opera){thead.style.display="table-row-group";}
if(this.numberMonths!=1){row=Zapatec.Utils.createElement("tr",thead);var title_length=5;this.weekNumbers&&++title_length;this.titles[l]=new Array();for(var k=1;(k<=this.monthsInRow)&&((l-1)*this.monthsInRow+k<=this.numberMonths);++k){hd(row,1);this.titles[l][k]=hh("&nbsp;",title_length,300);this.titles[l][k].className="title";this.titles[l][k].id="zpCal"+this.id+"SubTitle"+((l-1)*this.monthsInRow+k);hd(row,1);}}
row=Zapatec.Utils.createElement("tr",thead);row.className="daynames";for(k=1;(k<=this.monthsInRow)&&((l-1)*this.monthsInRow+k<=this.numberMonths);++k){if(this.weekNumbers){cell=Zapatec.Utils.createElement("td",row);cell.className="name wn";cell.appendChild(window.document.createTextNode(Zapatec.Calendar.i18n("WK")));if(k>1){Zapatec.Utils.addClass(cell,"month-left-border");}
var cal_wk=Zapatec.Calendar.i18n("WK")
if(cal_wk==null){cal_wk="";}}
for(var i=7;i>0;--i){cell=Zapatec.Utils.createElement("td",row);cell.appendChild(document.createTextNode("&nbsp;"));cell.id="zpCal"+this.id+"WeekDayButton"+(7-i)+"Status";}}
this.firstdayname=row.childNodes[this.weekNumbers?1:0];this.rowsOfDayNames[l]=this.firstdayname;this._displayWeekdays();var tbody=Zapatec.Utils.createElement("tbody",table);this.tbody[l]=tbody;for(i=6;i>0;--i){row=Zapatec.Utils.createElement("tr",tbody);for(k=1;(k<=this.monthsInRow)&&((l-1)*this.monthsInRow+k<=this.numberMonths);++k){if(this.weekNumbers){cell=Zapatec.Utils.createElement("td",row);cell.id="zpCal"+this.id+"WeekNumber"+(6-i);cell.appendChild(document.createTextNode("&nbsp;"));}
for(var j=7;j>0;--j){cell=Zapatec.Utils.createElement("td",row);cell.id="zpCal"+this.id+"DateCell"+((l-1)*this.monthsInRow+k)+"-"+(6-i)+"-"+(7-j);cell.appendChild(document.createTextNode("&nbsp;"));Zapatec.Utils.createProperty(cell,"calendar",this);Zapatec.Calendar._add_evs(cell);}}}}
var tfoot=Zapatec.Utils.createElement("tfoot",table);if(this.showsTime){row=Zapatec.Utils.createElement("tr",tfoot);row.className="time";var emptyColspan;if(this.monthsInRow!=1){cell=Zapatec.Utils.createElement("td",row);emptyColspan=cell.colSpan=Math.ceil((((this.weekNumbers)?8:7)*(this.monthsInRow-1))/2);cell.className="timetext";cell.innerHTML="&nbsp";}
cell=Zapatec.Utils.createElement("td",row);cell.className="timetext";cell.colSpan=this.weekNumbers?2:1;cell.innerHTML=Zapatec.Calendar.i18n("TIME")||"&nbsp;";(function(){function makeTimePart(className,partId,init,range_start,range_end){var table,tbody,tr,tr2,part;if(range_end){cell=Zapatec.Utils.createElement("td",row);cell.colSpan=1;if(cal.showsTime!="seconds"){++cell.colSpan;}
cell.className="parent-"+className;table=Zapatec.Utils.createElement("table",cell);table.cellSpacing=table.cellPadding=0;if(className=="hour")
table.align="right";table.className="calendar-time-scroller";tbody=Zapatec.Utils.createElement("tbody",table);tr=Zapatec.Utils.createElement("tr",tbody);tr2=Zapatec.Utils.createElement("tr",tbody);}else
tr=row;part=Zapatec.Utils.createElement("td",tr);part.className=className;part.id="zpTime"+cal.id+partId+"SelectStatus";part.appendChild(window.document.createTextNode(init));Zapatec.Utils.createProperty(part,"calendar",cal);part.ttip=Zapatec.Calendar.i18n("TIME_PART");part.navtype=50;part._range=[];if(!range_end)
part._range=range_start;else{part.rowSpan=2;for(var i=range_start;i<=range_end;++i){var txt;if(i<10&&range_end>=10)txt='0'+i;else txt=''+i;part._range[part._range.length]=txt;}
var up=Zapatec.Utils.createElement("td",tr);up.className="up";up.navtype=201;up.id="zpTime"+cal.id+partId+"UpButtonStatus";Zapatec.Utils.createProperty(up,"calendar",cal);up.timePart=part;if(Zapatec.is_khtml)
up.innerHTML="&nbsp;";Zapatec.Calendar._add_evs(up);var down=Zapatec.Utils.createElement("td",tr2);down.className="down";down.navtype=202;down.id="zpTime"+cal.id+partId+"DownButtonStatus";Zapatec.Utils.createProperty(down,"calendar",cal);down.timePart=part;if(Zapatec.is_khtml)
down.innerHTML="&nbsp;";Zapatec.Calendar._add_evs(down);}
Zapatec.Calendar._add_evs(part);return part;};var hrs=cal.currentDate.getHours();var mins=cal.currentDate.getMinutes();if(cal.showsTime=="seconds"){var secs=cal.currentDate.getSeconds();}
var t12=!cal.time24;var pm=(hrs>12);if(t12&&pm)hrs-=12;var H=makeTimePart("hour","Hours",hrs,t12?1:0,t12?12:23);H._step=(cal.timeInterval>30)?(cal.timeInterval/60):1;cell=Zapatec.Utils.createElement("td",row);cell.innerHTML=":";cell.className="colon";var M=makeTimePart("minute","Minutes",mins,0,59);M._step=((cal.timeInterval)&&(cal.timeInterval<60))?(cal.timeInterval):5;if(cal.showsTime=="seconds"){cell=Zapatec.Utils.createElement("td",row);cell.innerHTML=":";cell.className="colon";var S=makeTimePart("minute","Seconds",secs,0,59);S._step=5;}
var AP=null;if(t12){AP=makeTimePart("ampm","AMPM",pm?Zapatec.Calendar.i18n("pm","ampm"):Zapatec.Calendar.i18n("am","ampm"),[Zapatec.Calendar.i18n("am","ampm"),Zapatec.Calendar.i18n("pm","ampm")]);AP.className+=" button";}else
Zapatec.Utils.createElement("td",row).innerHTML="&nbsp;";cal.onSetTime=function(){var hrs=this.currentDate.getHours();var mins=this.currentDate.getMinutes();if(this.showsTime=="seconds"){var secs=cal.currentDate.getSeconds();}
if(this.timeInterval){mins+=this.timeInterval-((mins-1+this.timeInterval)%this.timeInterval)-1;}
while(mins>=60){mins-=60;++hrs;}
if(this.timeInterval>60){var interval=this.timeInterval/60;if(hrs%interval!=0){hrs+=interval-((hrs-1+interval)%interval)-1;}
if(hrs>=24){hrs-=24;}}
var new_date=new Date(this.currentDate);if(this.getDateStatus&&this.getDateStatus(this.currentDate,this.currentDate.getFullYear(),this.currentDate.getMonth(),this.currentDate.getDate(),hrs,mins)){hours=hrs;minutes=mins;do{if(this.timeInterval){if(this.timeInterval<60){minutes+=this.timeInterval;}else{hrs+=this.timeInterval/60;}}else{minutes+=5;}
if(minutes>=60){minutes-=60;hours+=1;}
if(hours>=24){hours-=24;}
new_date.setMinutes(minutes);new_date.setHours(hours);if(!this.getDateStatus(new_date,this.currentDate.getFullYear(),this.currentDate.getMonth(),this.currentDate.getDate(),hours,minutes)){hrs=hours;mins=minutes;}}while((hrs!=hours)||(mins!=minutes));}
this.currentDate.setMinutes(mins);this.currentDate.setHours(hrs);var pm=(hrs>=12);if(pm&&t12&&hrs!=12)hrs-=12;if(!pm&&t12&&hrs==0)hrs=12;H.firstChild.data=(hrs<10)?("0"+hrs):hrs;M.firstChild.data=(mins<10)?("0"+mins):mins;if(this.showsTime=="seconds"){S.firstChild.data=(secs<10)?("0"+secs):secs;}
if(t12)
AP.firstChild.data=pm?Zapatec.Calendar.i18n("pm","ampm"):Zapatec.Calendar.i18n("am","ampm");};cal.onUpdateTime=function(){var date=this.currentDate;var h=parseInt(H.firstChild.data,10);if(t12){if(/pm/i.test(AP.firstChild.data)&&h<12)
h+=12;else if(/am/i.test(AP.firstChild.data)&&h==12)
h=0;}
var d=date.getDate();var m=date.getMonth();var y=date.getFullYear();date.setHours(h);date.setMinutes(parseInt(M.firstChild.data,10));if(this.showsTime=="seconds"){date.setSeconds(parseInt(S.firstChild.data,10));}
date.setFullYear(y);date.setMonth(m);date.setDate(d);this.dateClicked=false;this.callHandler();};})();if(this.monthsInRow!=1){cell=Zapatec.Utils.createElement("td",row);cell.colSpan=((this.weekNumbers)?8:7)*(this.monthsInRow-1)-Math.ceil(emptyColspan);cell.className="timetext";cell.innerHTML="&nbsp";}}else{this.onSetTime=this.onUpdateTime=function(){};}
row=Zapatec.Utils.createElement("tr",tfoot);row.className="footrow";cell=hh(Zapatec.Calendar.i18n("SEL_DATE"),this.weekNumbers?(8*this.numberMonths):(7*this.numberMonths),300);cell.className="ttip";cell.id="zpCal"+this.id+"Status";if(this.isPopup&&!this.disableDrag){cell.ttip=Zapatec.Calendar.i18n("DRAG_TO_MOVE");cell.style.cursor="move";}
this.tooltips=cell;div=this.monthsCombo=Zapatec.Utils.createElement("div",this.element);div.className="combo";div.id="zpCal"+this.id+"MonthDropdownCombo";for(i=0;i<12;++i){var mn=Zapatec.Utils.createElement("div");mn.className=Zapatec.is_ie?"label-IEfix":"label";mn.id="zpCal"+this.id+"MonthDropdownItem"+i;mn.month=i;mn.appendChild(window.document.createTextNode(Zapatec.Calendar.i18n(i,"smn")));div.appendChild(mn);}
div=this.yearsCombo=Zapatec.Utils.createElement("div",this.element);div.className="combo";div.id="zpCal"+this.id+"YearDropdownCombo";for(i=0;i<12;++i){var yr=Zapatec.Utils.createElement("div");yr.className=Zapatec.is_ie?"label-IEfix":"label";yr.id="zpCal"+this.id+"YearDropdownItem"+i;yr.appendChild(window.document.createTextNode("&nbsp;"));div.appendChild(yr);}
div=this.histCombo=Zapatec.Utils.createElement("div",this.element);div.id="zpCal"+this.id+"HistoryDropdownCombo";div.className="combo history";this._init(this.firstDayOfWeek,this.date);parent.appendChild(this.element);};Zapatec.Calendar._keyEvent=function(ev){if(!window.calendar){return false;}
(Zapatec.is_ie)&&(ev=window.event);var cal=window.calendar;var act=(Zapatec.is_ie||ev.type=="keypress");var K=ev.keyCode;var date=new Date(cal.date);if(ev.ctrlKey){switch(K){case 37:act&&Zapatec.Calendar.cellClick(cal._nav_pm);break;case 38:act&&Zapatec.Calendar.cellClick(cal._nav_py);break;case 39:act&&Zapatec.Calendar.cellClick(cal._nav_nm);break;case 40:act&&Zapatec.Calendar.cellClick(cal._nav_ny);break;default:return false;}}else switch(K){case 32:Zapatec.Calendar.cellClick(cal._nav_now);break;case 27:act&&cal.callCloseHandler();break;case 37:if(act&&!cal.multiple){date.setTime(date.getTime()-86400000);cal.setDate(date);}
break;case 38:if(act&&!cal.multiple){date.setTime(date.getTime()-7*86400000);cal.setDate(date);}
break;case 39:if(act&&!cal.multiple){date.setTime(date.getTime()+86400000);cal.setDate(date);}
break;case 40:if(act&&!cal.multiple){date.setTime(date.getTime()+7*86400000);cal.setDate(date);}
break;case 13:if(act){Zapatec.Calendar.cellClick(cal.currentDateEl);}
break;default:return false;}
return Zapatec.Utils.stopEvent(ev);};Zapatec.Calendar.prototype._init=function(firstDayOfWeek,date,last){var
today=new Date(),TD=today.getDate(),TY=today.getFullYear(),TM=today.getMonth();if(this.getDateStatus&&!last){var status=this.getDateStatus(date,date.getFullYear(),date.getMonth(),date.getDate());var backupDate=new Date(date);while(((status==true)||(status=="disabled"))&&(backupDate.getMonth()==date.getMonth())){date.setTime(date.getTime()+86400000);var status=this.getDateStatus(date,date.getFullYear(),date.getMonth(),date.getDate());}
if(backupDate.getMonth()!=date.getMonth()){date=new Date(backupDate);while(((status==true)||(status=="disabled"))&&(backupDate.getMonth()==date.getMonth())){date.setTime(date.getTime()-86400000);var status=this.getDateStatus(date,date.getFullYear(),date.getMonth(),date.getDate());}}
if(backupDate.getMonth()!=date.getMonth()){last=true;date=new Date(backupDate);}}
var year=date.getFullYear();var month=date.getMonth();var rowsOfMonths=Math.floor(this.numberMonths/this.monthsInRow);var minMonth;var diffMonth,last_row,before_control;if(!this.vertical){diffMonth=(this.controlMonth-1);minMonth=month-diffMonth;}else{last_row=((this.numberMonths-1)%this.monthsInRow)+1;before_control=(this.controlMonth-1)%this.monthsInRow;bottom=(before_control>=(last_row)?(last_row):(before_control));diffMonth=(before_control)*(rowsOfMonths-1)+Math.floor((this.controlMonth-1)/this.monthsInRow)+bottom;minMonth=month-diffMonth;}
var minYear=year;if(minMonth<0){minMonth+=12;--minYear;}
var maxMonth=minMonth+this.numberMonths-1;var maxYear=minYear;if(maxMonth>11){maxMonth-=12;++maxYear;}
function disableControl(ctrl){Zapatec.Calendar._del_evs(ctrl);ctrl.disabled=true;ctrl.className="button";ctrl.innerHTML="<div>&nbsp</div>";}
function enableControl(ctrl,sign){Zapatec.Calendar._add_evs(ctrl);ctrl.disabled=false;ctrl.className="button nav";ctrl.innerHTML=sign;}
if((minYear<=this.minYear)||!this.yearNav){if(!this._nav_py.disabled){disableControl(this._nav_py);}}else{if(this._nav_py.disabled){enableControl(this._nav_py,"&#x00ab;");}}
if(maxYear>=this.maxYear||!this.yearNav){if(!this._nav_ny.disabled){disableControl(this._nav_ny);}}else{if(this._nav_ny.disabled){enableControl(this._nav_ny,"&#x00bb;");}}
if(((minYear==this.minYear)&&(minMonth<=this.minMonth))||(minYear<this.minYear)){if(!this._nav_pm.disabled){disableControl(this._nav_pm);}}else{if(this._nav_pm.disabled){enableControl(this._nav_pm,"&#x2039;");}}
if(((maxYear==this.maxYear)&&(maxMonth>=this.maxMonth))||(maxYear>this.maxYear)){if(!this._nav_nm.disabled){disableControl(this._nav_nm);}}else{if(this._nav_nm.disabled){enableControl(this._nav_nm,"&#x203a;");}}
upperMonth=this.maxMonth+1;upperYear=this.maxYear;if(upperMonth>11){upperMonth-=12;++upperYear;}
bottomMonth=this.minMonth-1;bottomYear=this.minYear;if(bottomMonth<0){bottomMonth+=12;--bottomYear;}
maxDate1=new Date(maxYear,maxMonth,date.getMonthDays(maxMonth),23,59,59,999);maxDate2=new Date(upperYear,upperMonth,1,0,0,0,0);minDate1=new Date(minYear,minMonth,1,0,0,0,0);minDate2=new Date(bottomYear,bottomMonth,date.getMonthDays(bottomMonth),23,59,59,999);if(maxDate1.getTime()>maxDate2.getTime()){date.setTime(date.getTime()-(maxDate1.getTime()-maxDate2.getTime()));}
if(minDate1.getTime()<minDate2.getTime()){date.setTime(date.getTime()+(minDate2.getTime()-minDate1.getTime())+1);}
delete maxDate1;delete maxDate2;delete minDate1;delete minDate2;this.firstDayOfWeek=firstDayOfWeek;if(!last){this.currentDate=date;}
this.date=date;(this.date=new Date(this.date)).setDateOnly(date);year=this.date.getFullYear();month=this.date.getMonth();var initMonth=date.getMonth();var mday=this.date.getDate();var no_days=date.getMonthDays();var months=new Array();if(this.numberMonths%this.monthsInRow>0){++rowsOfMonths;}
for(var l=1;l<=rowsOfMonths;++l){months[l]=new Array();for(var k=1;(k<=this.monthsInRow)&&((l-1)*this.monthsInRow+k<=this.numberMonths);++k){var tmpDate=new Date(date);if(this.vertical){var validMonth=date.getMonth()-diffMonth+((k-1)*(rowsOfMonths-1)+(l-1)+((last_row<k)?(last_row):(k-1)));}else{var validMonth=date.getMonth()-diffMonth+(l-1)*this.monthsInRow+k-1;}
if(validMonth<0){tmpDate.setFullYear(tmpDate.getFullYear()-1);validMonth=12+validMonth;}
if(validMonth>11){tmpDate.setFullYear(tmpDate.getFullYear()+1);validMonth=validMonth-12;}
tmpDate.setDate(1);tmpDate.setMonth(validMonth);var day1=(tmpDate.getDay()-this.firstDayOfWeek)%7;if(day1<0)
day1+=7;var hrs=tmpDate.getHours();tmpDate.setDate(-day1);tmpDate.setDate(tmpDate.getDate()+1);if(hrs!=tmpDate.getHours()){tmpDate.setDate(1);tmpDate.setMonth(validMonth);tmpDate.setDate(-day1);tmpDate.setDate(tmpDate.getDate()+1);}
months[l][k]=tmpDate;}}
var MN=Zapatec.Calendar.i18n(month,"smn");var weekend=Zapatec.Calendar.i18n("WEEKEND");var dates=this.multiple?(this.datesCells={}):null;var DATETXT=this.getDateText;for(var l=1;l<=rowsOfMonths;++l){var row=this.tbody[l].firstChild;for(var i=7;--i>0;row=row.nextSibling){var cell=row.firstChild;var hasdays=false;for(var k=1;(k<=this.monthsInRow)&&((l-1)*this.monthsInRow+k<=this.numberMonths);++k){date=months[l][k];if(this.weekNumbers){cell.className=" day wn";cell.innerHTML=date.getWeekNumber();if(k>1){Zapatec.Utils.addClass(cell,"month-left-border");}
cell=cell.nextSibling;}
row.className="daysrow";row.id="zpCal"+this.id+"Daysrow"+(6-i);var iday;for(j=7;cell&&(iday=date.getDate())&&(j>0);date.setDate(iday+1),((date.getDate()==iday)?(date.setHours(1)&&date.setDate(iday+1)):(false)),cell=cell.nextSibling,--j){var
wday=date.getDay(),dmonth=date.getMonth(),dyear=date.getFullYear();cell.className=" day";if((!this.weekNumbers)&&(j==7)&&(k!=1)){Zapatec.Utils.addClass(cell,"month-left-border");}
if((j==1)&&(k!=this.monthsInRow)){Zapatec.Utils.addClass(cell,"month-right-border");}
if(this.vertical){validMonth=initMonth-diffMonth+((k-1)*(rowsOfMonths-1)+(l-1)+((last_row<k)?(last_row):(k-1)));}else{validMonth=initMonth-diffMonth+((l-1)*this.monthsInRow+k-1);}
if(validMonth<0){validMonth=12+validMonth;}
if(validMonth>11){validMonth=validMonth-12;}
var current_month=!(cell.otherMonth=!(dmonth==validMonth));if(!current_month){if(this.showsOtherMonths)
cell.className+=" othermonth";else{cell.className+=" true";cell.innerHTML="<div>&nbsp;</div>";continue;}}else
hasdays=true;cell.innerHTML=DATETXT?DATETXT(date,dyear,dmonth,iday):iday;dates&&(dates[date.print("%Y%m%d")]=cell);if(this.getDateStatus){var status=this.getDateStatus(date,dyear,dmonth,iday);if(this.getDateToolTip){var toolTip=this.getDateToolTip(date,dyear,dmonth,iday);if(toolTip)
cell.title=toolTip;}
if(status==true){cell.className+=" disabled";}else{cell.className+=" "+status;}}
if(!cell.disabled){cell.caldate=[dyear,dmonth,iday];cell.ttip="_";if(!this.multiple&&current_month&&iday==this.currentDate.getDate()&&this.hiliteToday&&(dmonth==this.currentDate.getMonth())&&(dyear==this.currentDate.getFullYear())){cell.className+=" selected";this.currentDateEl=cell;}
if(dyear==TY&&dmonth==TM&&iday==TD){cell.className+=" today";cell.ttip+=Zapatec.Calendar.i18n("PART_TODAY");}
if((weekend!=null)&&(weekend.indexOf(wday.toString())!=-1)){cell.className+=cell.otherMonth?" oweekend":" weekend";}}}
if(!(hasdays||this.showsOtherMonths))
row.className="emptyrow";}
if((i==1)&&(l<rowsOfMonths)){if(row.className=="emptyrow"){row=row.previousSibling;}
cell=row.firstChild;while(cell!=null){Zapatec.Utils.addClass(cell,"month-bottom-border");cell=cell.nextSibling;}}}}
if(this.numberMonths==1){this.title.innerHTML=Zapatec.Calendar.i18n(month,"mn")+", "+year;if(this.params&&this.params.titleHtml)
if(typeof this.params.titleHtml=='function')
this.title.innerHTML=this.params.titleHtml(this.title.innerHTML,month,year)
else
this.title.innerHTML+=this.params.titleHtml}else{if(this.params&&this.params.titleHtml)
if(typeof this.params.titleHtml=='function')
this.title.innerHTML=this.params.titleHtml(Zapatec.Calendar.i18n(month,"mn")+", "+year,month,year)
else
this.title.innerHTML=this.params.titleHtml
for(var l=1;l<=rowsOfMonths;++l){for(var k=1;(k<=this.monthsInRow)&&((l-1)*this.monthsInRow+k<=this.numberMonths);++k){if(this.vertical){validMonth=month-diffMonth+((k-1)*(rowsOfMonths-1)+(l-1)+((last_row<k)?(last_row):(k-1)));}else{validMonth=month-diffMonth+(l-1)*this.monthsInRow+k-1;}
validYear=year;if(validMonth<0){--validYear;validMonth=12+validMonth;}
if(validMonth>11){++validYear;validMonth=validMonth-12;}
this.titles[l][k].innerHTML=Zapatec.Calendar.i18n(validMonth,"mn")+", "+validYear;}}}
this.onSetTime();this._initMultipleDates();this.updateWCH();};Zapatec.Calendar.prototype._initMultipleDates=function(){if(this.multiple){for(var i in this.multiple){var cell=this.datesCells[i];var d=this.multiple[i];if(!d)
continue;if(cell)
cell.className+=" selected";}}};Zapatec.Calendar.prototype._toggleMultipleDate=function(date){if(this.multiple){var ds=date.print("%Y%m%d");var cell=this.datesCells[ds];if(cell){var d=this.multiple[ds];if(!d){Zapatec.Utils.addClass(cell,"selected");this.multiple[ds]=date;}else{Zapatec.Utils.removeClass(cell,"selected");delete this.multiple[ds];}}}};Zapatec.Calendar.prototype.setDateToolTipHandler=function(unaryFunction){this.getDateToolTip=unaryFunction;};Zapatec.Calendar.prototype.setDate=function(date,justInit){if(!date)
date=new Date();if(!date.equalsTo(this.date)){var year=date.getFullYear(),m=date.getMonth();if(year<this.minYear||(year==this.minYear&&m<this.minMonth))
this.showHint("<div class='error'>"+Zapatec.Calendar.i18n("E_RANGE")+" »»»</div>");else if(year>this.maxYear||(year==this.maxYear&&m>this.maxMonth))
this.showHint("<div class='error'>««« "+Zapatec.Calendar.i18n("E_RANGE")+"</div>");this._init(this.firstDayOfWeek,date,justInit);}};Zapatec.Calendar.prototype.showHint=function(text){this.tooltips.innerHTML=text;};Zapatec.Calendar.prototype.reinit=function(){this._init(this.firstDayOfWeek,this.date);};Zapatec.Calendar.prototype.refresh=function(){var p=this.isPopup?null:this.element.parentNode;var x=parseInt(this.element.style.left);var y=parseInt(this.element.style.top);this.destroy();this.dateStr=this.date;this.create(p);if(this.isPopup)
this.showAt(x,y);else
this.show();};Zapatec.Calendar.prototype.setFirstDayOfWeek=function(firstDayOfWeek){if(this.firstDayOfWeek!=firstDayOfWeek){this._init(firstDayOfWeek,this.date);var rowsOfMonths=Math.floor(this.numberMonths/this.monthsInRow);if(this.numberMonths%this.monthsInRow>0){++rowsOfMonths;}
for(var l=1;l<=rowsOfMonths;++l){this.firstdayname=this.rowsOfDayNames[l];this._displayWeekdays();}}};Zapatec.Calendar.prototype.setDateStatusHandler=Zapatec.Calendar.prototype.setDisabledHandler=function(unaryFunction){this.getDateStatus=unaryFunction;};Zapatec.Calendar.prototype.setRange=function(A,Z){var m,a=Math.min(A,Z),z=Math.max(A,Z);this.minYear=m=Math.floor(a);this.minMonth=(m==a)?0:Math.ceil((a-m)*100-1);this.maxYear=m=Math.floor(z);this.maxMonth=(m==z)?11:Math.ceil((z-m)*100-1);};Zapatec.Calendar.prototype.setMultipleDates=function(multiple){if(!multiple||typeof multiple=="undefined")return;this.multiple={};for(var i=multiple.length;--i>=0;){var d=multiple[i];var ds=d.print("%Y%m%d");this.multiple[ds]=d;}};Zapatec.Calendar.prototype.submitFlatDates=function()
{if(typeof this.params.flatCallback=="function"){Zapatec.Utils.sortOrder=(this.sortOrder!="asc"&&this.sortOrder!="desc"&&this.sortOrder!="none")?"none":this.sortOrder;if(this.multiple&&(Zapatec.Utils.sortOrder!="none")){var dateArray=new Array();for(var i in this.multiple){var currentDate=this.multiple[i];if(currentDate){dateArray[dateArray.length]=currentDate;}
dateArray.sort(Zapatec.Utils.compareDates);}
this.multiple={};for(var i=0;i<dateArray.length;i++){var d=dateArray[i];var ds=d.print("%Y%m%d");this.multiple[ds]=d;}}
this.params.flatCallback(this);}}
Zapatec.Calendar.prototype.callHandler=function(){if(this.onSelected){this.onSelected(this,this.date.print(this.dateFormat));}};Zapatec.Calendar.prototype.updateHistory=function(){var a,i,d,tmp,s,str="",len=Zapatec.Calendar.prefs.hsize-1;if(Zapatec.Calendar.prefs.history){a=Zapatec.Calendar.prefs.history.split(/,/);i=0;while(i<len&&(tmp=a[i++])){s=tmp.split(/\//);d=new Date(parseInt(s[0],10),parseInt(s[1],10)-1,parseInt(s[2],10),parseInt(s[3],10),parseInt(s[4],10));if(!d.dateEqualsTo(this.date))
str+=","+tmp;}}
Zapatec.Calendar.prefs.history=this.date.print("%Y/%m/%d/%H/%M")+str;Zapatec.Calendar.savePrefs();};Zapatec.Calendar.prototype.callCloseHandler=function(){if(this.dateClicked){this.updateHistory();}
if(this.onClose){this.onClose(this);}
this.hideShowCovered();};Zapatec.Calendar.prototype.destroy=function(){this.hide();Zapatec.Utils.destroy(this.element);Zapatec.Utils.destroy(this.WCH);Zapatec.Calendar._C=null;window.calendar=null;};Zapatec.Calendar.prototype.reparent=function(new_parent){var el=this.element;el.parentNode.removeChild(el);new_parent.appendChild(el);};Zapatec.Calendar._checkCalendar=function(ev){if(!window.calendar){return false;}
var el=Zapatec.is_ie?Zapatec.Utils.getElement(ev):Zapatec.Utils.getTargetElement(ev);for(;el!=null&&el!=calendar.element;el=el.parentNode);if(el==null){window.calendar.callCloseHandler();}};Zapatec.Calendar.prototype.updateWCH=function(other_el){Zapatec.Utils.setupWCH_el(this.WCH,this.element,other_el);};Zapatec.Calendar.prototype.show=function(){var rows=this.table.getElementsByTagName("tr");for(var i=rows.length;i>0;){var row=rows[--i];Zapatec.Utils.removeClass(row,"rowhilite");var cells=row.getElementsByTagName("td");for(var j=cells.length;j>0;){var cell=cells[--j];Zapatec.Utils.removeClass(cell,"hilite");Zapatec.Utils.removeClass(cell,"active");}}
if(this.element.style.display!="block"){this.element.style.display="block";}
this.hidden=false;if(this.isPopup){this.updateWCH();window.calendar=this;if(!this.noGrab){Zapatec.Utils.addEvent(window.document,"keydown",Zapatec.Calendar._keyEvent);Zapatec.Utils.addEvent(window.document,"keypress",Zapatec.Calendar._keyEvent);Zapatec.Utils.addEvent(window.document,"mousedown",Zapatec.Calendar._checkCalendar);}}
this.hideShowCovered();};Zapatec.Calendar.prototype.hide=function(){if(this.isPopup){Zapatec.Utils.removeEvent(window.document,"keydown",Zapatec.Calendar._keyEvent);Zapatec.Utils.removeEvent(window.document,"keypress",Zapatec.Calendar._keyEvent);Zapatec.Utils.removeEvent(window.document,"mousedown",Zapatec.Calendar._checkCalendar);}
this.element.style.display="none";Zapatec.Utils.hideWCH(this.WCH);this.hidden=true;this.hideShowCovered();};Zapatec.Calendar.prototype.showAt=function(x,y){var s=this.element.style;s.left=x+"px";s.top=y+"px";this.show();};Zapatec.Calendar.prototype.showAtElement=function(el,opts){var self=this;var p=Zapatec.Utils.getElementOffset(el);if(!opts||typeof opts!="string"){this.showAt(p.x,p.y+el.offsetHeight);return true;}
this.element.style.display="block";var w=self.element.offsetWidth;var h=self.element.offsetHeight;self.element.style.display="none";var valign=opts.substr(0,1);var halign="l";if(opts.length>1){halign=opts.substr(1,1);}
switch(valign){case"T":p.y-=h;break;case"B":p.y+=el.offsetHeight;break;case"C":p.y+=(el.offsetHeight-h)/2;break;case"t":p.y+=el.offsetHeight-h;break;case"b":break;}
switch(halign){case"L":p.x-=w;break;case"R":p.x+=el.offsetWidth;break;case"C":p.x+=(el.offsetWidth-w)/2;break;case"l":p.x+=el.offsetWidth-w;break;case"r":break;}
p.width=w;p.height=h;self.monthsCombo.style.display="none";Zapatec.Utils.fixBoxPosition(p,10);self.showAt(p.x,p.y);};Zapatec.Calendar.prototype.setDateFormat=function(str){this.dateFormat=str;};Zapatec.Calendar.prototype.setTtDateFormat=function(str){this.ttDateFormat=str;};Zapatec.Calendar.prototype.parseDate=function(str,fmt){if(!str)
return this.setDate(this.date);if(!fmt)
fmt=this.dateFormat;var date=Date.parseDate(str,fmt);return this.setDate(date);};Zapatec.Calendar.prototype.hideShowCovered=function(){if(!Zapatec.is_ie5)
return;var self=this;function getVisib(obj){var value=obj.style.visibility;if(!value){if(window.document.defaultView&&typeof(window.document.defaultView.getComputedStyle)=="function"){if(!Zapatec.is_khtml)
value=window.document.defaultView.getComputedStyle(obj,"").getPropertyValue("visibility");else
value='';}else if(obj.currentStyle){value=obj.currentStyle.visibility;}else
value='';}
return value;};var tags=["applet","iframe","select"];var el=self.element;var p=Zapatec.Utils.getAbsolutePos(el);var EX1=p.x;var EX2=el.offsetWidth+EX1;var EY1=p.y;var EY2=el.offsetHeight+EY1;for(var k=tags.length;k>0;){var ar=window.document.getElementsByTagName(tags[--k]);var cc=null;for(var i=ar.length;i>0;){cc=ar[--i];p=Zapatec.Utils.getAbsolutePos(cc);var CX1=p.x;var CX2=cc.offsetWidth+CX1;var CY1=p.y;var CY2=cc.offsetHeight+CY1;if(self.hidden||(CX1>EX2)||(CX2<EX1)||(CY1>EY2)||(CY2<EY1)){if(!cc.__msh_save_visibility){cc.__msh_save_visibility=getVisib(cc);}
cc.style.visibility=cc.__msh_save_visibility;}else{if(!cc.__msh_save_visibility){cc.__msh_save_visibility=getVisib(cc);}
cc.style.visibility="hidden";}}}};Zapatec.Calendar.prototype._displayWeekdays=function(){var fdow=this.firstDayOfWeek;var cell=this.firstdayname;var weekend=Zapatec.Calendar.i18n("WEEKEND");for(k=1;(k<=this.monthsInRow)&&(cell);++k){for(var i=0;i<7;++i){cell.className=" day name";if((!this.weekNumbers)&&(i==0)&&(k!=1)){Zapatec.Utils.addClass(cell,"month-left-border");}
if((i==6)&&(k!=this.monthsInRow)){Zapatec.Utils.addClass(cell,"month-right-border");}
var realday=(i+fdow)%7;if((!this.disableFdowClick)&&((this.params&&this.params.fdowClick)||i)){if(Zapatec.Calendar.i18n("DAY_FIRST")!=null){cell.ttip=Zapatec.Calendar.i18n("DAY_FIRST").replace("%s",Zapatec.Calendar.i18n(realday,"dn"));}
cell.navtype=100;cell.calendar=this;cell.fdow=realday;Zapatec.Calendar._add_evs(cell);}
if((weekend!=null)&&(weekend.indexOf(realday.toString())!=-1)){Zapatec.Utils.addClass(cell,"weekend");}
cell.innerHTML=Zapatec.Calendar.i18n((i+fdow)%7,"sdn");cell=cell.nextSibling;}
if(this.weekNumbers&&cell){cell=cell.nextSibling;}}};Zapatec.Utils.compareDates=function(date1,date2)
{if(Zapatec.Calendar.prefs.sortOrder=="asc")
return date1-date2;else
return date2-date1;}
Zapatec.Calendar.prototype._hideCombos=function(){this.monthsCombo.style.display="none";this.yearsCombo.style.display="none";this.histCombo.style.display="none";this.updateWCH();};Zapatec.Calendar.prototype._dragStart=function(ev){ev||(ev=window.event);if(this.dragging){return;}
this.dragging=true;var posX=ev.clientX+window.document.body.scrollLeft;var posY=ev.clientY+window.document.body.scrollTop;var st=this.element.style;this.xOffs=posX-parseInt(st.left);this.yOffs=posY-parseInt(st.top);Zapatec.Utils.addEvent(window.document,"mousemove",Zapatec.Calendar.calDragIt);Zapatec.Utils.addEvent(window.document,"mouseover",Zapatec.Calendar.calDragIt);Zapatec.Utils.addEvent(window.document,"mouseup",Zapatec.Calendar.calDragEnd);};Date._MD=[31,28,31,30,31,30,31,31,30,31,30,31];Date.SECOND=1000;Date.MINUTE=60*Date.SECOND;Date.HOUR=60*Date.MINUTE;Date.DAY=24*Date.HOUR;Date.WEEK=7*Date.DAY;Date.prototype.getMonthDays=function(month){var year=this.getFullYear();if(typeof month=="undefined"){month=this.getMonth();}
if(((0==(year%4))&&((0!=(year%100))||(0==(year%400))))&&month==1){return 29;}else{return Date._MD[month];}};Date.prototype.getDayOfYear=function(){var now=new Date(this.getFullYear(),this.getMonth(),this.getDate(),0,0,0);var then=new Date(this.getFullYear(),0,0,0,0,0);var time=now-then;return Math.round(time/Date.DAY);};Date.prototype.getWeekNumber=function(){var d=new Date(this.getFullYear(),this.getMonth(),this.getDate(),0,0,0);var DoW=d.getDay();d.setDate(d.getDate()-(DoW+6)%7+3);var ms=d.valueOf();d.setMonth(0);d.setDate(4);return Math.round((ms-d.valueOf())/(7*864e5))+1;};Date.prototype.equalsTo=function(date){return((this.getFullYear()==date.getFullYear())&&(this.getMonth()==date.getMonth())&&(this.getDate()==date.getDate())&&(this.getHours()==date.getHours())&&(this.getMinutes()==date.getMinutes()));};Date.prototype.dateEqualsTo=function(date){return((this.getFullYear()==date.getFullYear())&&(this.getMonth()==date.getMonth())&&(this.getDate()==date.getDate()));};Date.prototype.setDateOnly=function(date){var tmp=new Date(date);this.setDate(1);this.setFullYear(tmp.getFullYear());this.setMonth(tmp.getMonth());this.setDate(tmp.getDate());};Date.prototype.print=function(str){var m=this.getMonth();var d=this.getDate();var y=this.getFullYear();var wn=this.getWeekNumber();var w=this.getDay();var s={};var hr=this.getHours();var pm=(hr>=12);var ir=(pm)?(hr-12):hr;var dy=this.getDayOfYear();if(ir==0)
ir=12;var min=this.getMinutes();var sec=this.getSeconds();s["%a"]=Zapatec.Calendar.i18n(w,"sdn");s["%A"]=Zapatec.Calendar.i18n(w,"dn");s["%b"]=Zapatec.Calendar.i18n(m,"smn");s["%B"]=Zapatec.Calendar.i18n(m,"mn");s["%C"]=1+Math.floor(y/100);s["%d"]=(d<10)?("0"+d):d;s["%e"]=d;s["%H"]=(hr<10)?("0"+hr):hr;s["%I"]=(ir<10)?("0"+ir):ir;s["%j"]=(dy<100)?((dy<10)?("00"+dy):("0"+dy)):dy;s["%k"]=hr?hr:"0";s["%l"]=ir;s["%m"]=(m<9)?("0"+(1+m)):(1+m);s["%M"]=(min<10)?("0"+min):min;s["%n"]="\n";s["%p"]=pm?"PM":"AM";s["%P"]=pm?"pm":"am";s["%s"]=Math.floor(this.getTime()/1000);s["%S"]=(sec<10)?("0"+sec):sec;s["%t"]="\t";s["%U"]=s["%W"]=s["%V"]=(wn<10)?("0"+wn):wn;s["%u"]=(w==0)?7:w;s["%w"]=w?w:"0";s["%y"]=''+y%100;if(s["%y"]<10){s["%y"]="0"+s["%y"];}
s["%Y"]=y;s["%%"]="%";var re=/%./g;var a=str.match(re)||[];for(var i=0;i<a.length;i++){var tmp=s[a[i]];if(tmp){re=new RegExp(a[i],'g');str=str.replace(re,tmp);}}
return str;};Date.parseDate=function(str,format){var fmt=format,strPointer=0,token=null,parseFunc=null,valueLength=null,valueRange=null,valueType=null,date=new Date(),values={};var numberRules=["%d","%H","%I","%m","%M","%S","%s","%W","%u","%w","%y","%e","%k","%l","%s","%Y","%C"];function isNumberRule(rule){if(Zapatec.Utils.arrIndexOf(numberRules,rule)!=-1){return true;}
return false;}
function parseString(){for(var iString=valueRange[0];iString<valueRange[1];++iString){var value=Zapatec.Calendar.i18n(iString,valueType);if(!value){return null;}
if(value==str.substr(strPointer,value.length)){valueLength=value.length;return iString;}}
return null;}
function parseNumber(){var val=str.substr(strPointer,valueLength);if(val.length!=valueLength||/$\d+^/.test(val)){return null;}
return parseInt(val,10);}
function parseAMPM(){var result=(str.substr(strPointer,valueLength).toLowerCase()==Zapatec.Calendar.i18n("pm","ampm"))?true:false;return result||((str.substr(strPointer,valueLength).toLowerCase()==Zapatec.Calendar.i18n("am","ampm"))?false:null);}
function parseCharacter(){return"";}
function parseRule(rule){return(values[rule]=parseFunc());}
function wasParsed(rule){if(typeof rule=="undefined"||rule===null){return false;}
return true;}
function getValue(){for(var i=0;i<arguments.length;++i){if(arguments[i]!==null&&typeof arguments[i]!="undefined"&&!isNaN(arguments[i])){return arguments[i];}}
return null;}
if(typeof fmt!="string"||typeof str!="string"||str==""||fmt==""){return null;}
while(fmt){parseFunc=parseNumber;valueLength=fmt.indexOf("%");valueLength=(valueLength==-1)?fmt.length:valueLength;token=fmt.slice(0,valueLength);if(token!=str.substr(strPointer,valueLength)){return null;}
strPointer+=valueLength;fmt=fmt.slice(valueLength);if(fmt==""){break;}
token=fmt.slice(0,2);valueLength=2;switch(token){case"%A":case"%a":{valueType=(token=="%A")?"dn":"sdn";valueRange=[0,7];parseFunc=parseString;break;}
case"%B":case"%b":{valueType=(token=="%B")?"mn":"smn";valueRange=[0,12];parseFunc=parseString;break;}
case"%p":case"%P":{parseFunc=parseAMPM;break;}
case"%Y":{valueLength=4;if(isNumberRule(fmt.substr(2,2))){return null;}
while(isNaN(parseInt(str.charAt(strPointer+valueLength-1)))&&valueLength>0){--valueLength;}
if(valueLength==0){break;}
break;}
case"%C":case"%s":{valueLength=1;if(isNumberRule(fmt.substr(2,2))){return null;}
while(!isNaN(parseInt(str.charAt(strPointer+valueLength)))){++valueLength;}
break;}
case"%k":case"%l":case"%e":{valueLength=1;if(isNumberRule(fmt.substr(2,2))){return null;}
if(!isNaN(parseInt(str.charAt(strPointer+1)))){++valueLength;}
break;}
case"%j":valueLength=3;break;case"%u":case"%w":valueLength=1;case"%y":case"%m":case"%d":case"%W":case"%H":case"%I":case"%M":case"%S":{break;}}
if(parseRule(token)===null){return null;}
strPointer+=valueLength;fmt=fmt.slice(2);}
if(wasParsed(values["%s"])){date.setTime(values["%s"]*1000);}else{var year=getValue(values["%Y"],values["%y"]+--values["%C"]*100,values["%y"]+(date.getFullYear()-date.getFullYear()%100),values["%C"]*100+date.getFullYear()%100);var month=getValue(values["%m"]-1,values["%b"],values["%B"]);var day=getValue(values["%d"]||values["%e"]);if(day===null||month===null){var dayOfWeek=getValue(values["%a"],values["%A"],values["%u"]==7?0:values["%u"],values["%w"]);}
var hour=getValue(values["%H"],values["%k"]);if(hour===null&&(wasParsed(values["%p"])||wasParsed(values["%P"]))){var pm=getValue(values["%p"],values["%P"]);hour=getValue(values["%I"],values["%l"]);hour=pm?((hour==12)?12:(hour+12)):((hour==12)?(0):hour);}
if(year||year===0){date.setFullYear(year);}
if(month||month===0){date.setMonth(month);}
if(day||day===0){date.setDate(day);}
if(wasParsed(values["%j"])){date.setMonth(0);date.setDate(1);date.setDate(values["%j"]);}
if(wasParsed(dayOfWeek)){date.setDate(date.getDate()+(dayOfWeek-date.getDay()));}
if(wasParsed(values["%W"])){var weekNumber=date.getWeekNumber();if(weekNumber!=values["%W"]){date.setDate(date.getDate()+(values["%W"]-weekNumber)*7);}}
if(hour!==null){date.setHours(hour);}
if(wasParsed(values["%M"])){date.setMinutes(values["%M"]);}
if(wasParsed(values["%S"])){date.setSeconds(values["%S"]);}}
if(date.print(format)!=str){return null;}
return date;};Date.prototype.__msh_oldSetFullYear=Date.prototype.setFullYear;Date.prototype.setFullYear=function(y){var d=new Date(this);d.__msh_oldSetFullYear(y);if(d.getMonth()!=this.getMonth())
this.setDate(28);this.__msh_oldSetFullYear(y);};Date.prototype.compareDatesOnly=function(date1,date2){var year1=date1.getYear();var year2=date2.getYear();var month1=date1.getMonth();var month2=date2.getMonth();var day1=date1.getDate();var day2=date2.getDate();if(year1>year2){return-1;}
if(year2>year1){return 1;}
if(month1>month2){return-1;}
if(month2>month1){return 1;}
if(day1>day2){return-1;}
if(day2>day1){return 1;}
return 0;}
Zapatec.Setup=function(){};Zapatec.Setup.test=true;Zapatec.Calendar.setup=function(params){paramsList=["id"];function param_default(pname,def){if(typeof params[pname]=="undefined"){params[pname]=def;}
paramsList.push(pname);};params.id=Zapatec.Utils.generateID("calendar");param_default("inputField",null);param_default("displayArea",null);param_default("button",null);param_default("eventName","click");param_default("closeEventName",null);param_default("ifFormat","%Y/%m/%d");param_default("daFormat","%Y/%m/%d");param_default("singleClick",true);param_default("disableFunc",null);param_default("dateStatusFunc",params["disableFunc"]);param_default("dateText",null);param_default("firstDay",null);param_default("align","Br");param_default("range",[1900,2999]);param_default("weekNumbers",true);param_default("flat",null);param_default("flatCallback",null);param_default("onSelect",null);param_default("onClose",null);param_default("onUpdate",null);param_default("date",null);param_default("showsTime",false);param_default("sortOrder","asc");param_default("timeFormat","24");param_default("timeInterval",null);param_default("electric",true);param_default("step",2);param_default("position",null);param_default("cache",false);param_default("showOthers",false);param_default("multiple",null);param_default("saveDate",null);param_default("fdowClick",false);param_default("titleHtml",null);param_default("noHelp",false);param_default("noCloseButton",false);param_default("disableYearNav",false);param_default("disableFdowChange",false);if(params.weekNumbers){params.disableFdowChange=true;params.firstDay=1;}
param_default("disableDrag",false);param_default("numberMonths",1);if((params.numberMonths>12)||(params.numberMonths<1)){params.numberMonths=1;}
if(params.numberMonths>1){params.showOthers=false;}
params.numberMonths=parseInt(params.numberMonths,10);param_default("controlMonth",1);if((params.controlMonth>params.numberMonths)||(params.controlMonth<1)){params.controlMonth=1;}
params.controlMonth=parseInt(params.controlMonth,10);param_default("vertical",false);if(params.monthsInRow>params.numberMonths){params.monthsInRow=params.numberMonths;}
param_default("monthsInRow",params.numberMonths);params.monthsInRow=parseInt(params.monthsInRow,10);param_default("multiple",false);if(params.multiple){params.singleClick=false;}
param_default("canType",false);var tmp=["inputField","displayArea","button"];for(var i in tmp){if(typeof params[tmp[i]]=="string"){params[tmp[i]]=document.getElementById(params[tmp[i]]);}}
if(!params.inputField){params.canType=false;}else{params.inputField.setAttribute("autocomplete","off");}
if(!(params.flat||params.multiple||params.inputField||params.displayArea||params.button)){alert("Calendar.setup '"+params.id+"':\n  Nothing to setup (no fields found).  Please check your code");return false;}
if(((params.timeInterval)&&((params.timeInterval!==Math.floor(params.timeInterval))||((60%params.timeInterval!==0)&&(params.timeInterval%60!==0))))||(params.timeInterval>360)){alert("'"+params.id+"': timeInterval option can only have the following number of minutes:\n1, 2, 3, 4, 5, 6, 10, 15, 30,  60, 120, 180, 240, 300, 360 ");params.timeInterval=null;}
if(params.date&&!Date.parse(params.date)){alert("'"+params.id+"' Start Date Invalid: "+params.date+".\nSee date option.\nDefaulting to today.");params.date=null;}
if(params.saveDate){param_default("cookiePrefix",window.location.href+"--"+params.button.id);var cookieName=params.cookiePrefix;var newdate=Zapatec.Utils.getCookie(cookieName);if(newdate!=null){document.getElementById(params.inputField.id).value=newdate;}}
for(var ii in params){if(typeof params.constructor.prototype[ii]!="undefined"){continue;}
if(Zapatec.Utils.arrIndexOf(paramsList,ii)==-1){alert("Wrong config option: "+ii);}}
function onSelect(cal){var p=cal.params;var update=(cal.dateClicked||p.electric);if(update&&p.flat){if(typeof p.flatCallback=="function")
{if(!p.multiple)
p.flatCallback(cal);}else
alert("'"+cal.id+"': No flatCallback given -- doing nothing.");return false;}
if(update&&p.inputField){p.inputField.value=cal.currentDate.print(p.ifFormat);if(typeof p.inputField.onchange=="function")
p.inputField.onchange();}
if(update&&p.displayArea)
p.displayArea.innerHTML=cal.currentDate.print(p.daFormat);if(update&&p.singleClick&&cal.dateClicked)
cal.callCloseHandler();if(update&&typeof p.onUpdate=="function")
p.onUpdate(cal);if(p.saveDate){var cookieName=p.cookiePrefix;Zapatec.Utils.writeCookie(cookieName,p.inputField.value,null,'/',p.saveDate);}};if(params.flat!=null){if(typeof params.flat=="string")
params.flat=document.getElementById(params.flat);if(!params.flat){alert("Calendar.setup '"+params.id+"':\n  Flat specified but can't find parent.");return false;}
var cal=new Zapatec.Calendar(params.firstDay,params.date,params.onSelect||onSelect);cal.disableFdowClick=params.disableFdowChange;cal.showsOtherMonths=params.showOthers;cal.showsTime=params.showsTime;cal.time24=(params.timeFormat=="24");cal.timeInterval=params.timeInterval;cal.params=params;cal.weekNumbers=params.weekNumbers;cal.sortOrder=params.sortOrder.toLowerCase();cal.setRange(params.range[0],params.range[1]);cal.setDateStatusHandler(params.dateStatusFunc);cal.getDateText=params.dateText;cal.numberMonths=params.numberMonths;cal.controlMonth=params.controlMonth;cal.vertical=params.vertical;cal.yearStep=params.step;cal.monthsInRow=params.monthsInRow;cal.helpButton=!params.noHelp;cal.closeButton=!params.noCloseButton;cal.yearNav=!params.disableYearNav;if(params.ifFormat){cal.setDateFormat(params.ifFormat);}
if(params.inputField&&params.inputField.type=="text"&&typeof params.inputField.value=="string"){cal.parseDate(params.inputField.value);}
if(params.multiple){cal.setMultipleDates(params.multiple);}
cal.create(params.flat);cal.show();return cal;}
var triggerEl=params.button||params.displayArea||params.inputField;if(params.canType){function cancelBubble(ev){ev=ev||window.event;if(Zapatec.is_ie){ev.cancelBubble=true;}else{ev.stopPropagation();}}
Zapatec.Utils.addEvent(params.inputField,"mousedown",cancelBubble);Zapatec.Utils.addEvent(params.inputField,"keydown",cancelBubble);Zapatec.Utils.addEvent(params.inputField,"keypress",cancelBubble);Zapatec.Utils.addEvent(params.inputField,"keyup",function(ev){var format=params.inputField?params.ifFormat:params.daFormat;var parsedDate=Date.parseDate(params.inputField.value,format);var cal=window.calendar;if(cal&&parsedDate&&!cal.hidden){cal.setDate(parsedDate);}});}
triggerEl["on"+params.eventName]=function(){var dateEl=params.inputField||params.displayArea;if((!params.canType||params.inputField!=triggerEl)&&triggerEl.blur){triggerEl.blur();}
var dateFmt=params.inputField?params.ifFormat:params.daFormat;var mustCreate=false;var cal=window.calendar;if(params.canType&&(params.inputField==triggerEl)&&cal&&!cal.hidden){return;}
if(!(cal&&params.cache)){window.calendar=cal=new Zapatec.Calendar(params.firstDay,params.date,params.onSelect||onSelect,params.onClose||function(cal){if(params.cache)
cal.hide();else
cal.destroy();});cal.disableFdowClick=params.disableFdowChange;cal.showsTime=params.showsTime;cal.time24=(params.timeFormat=="24");cal.timeInterval=params.timeInterval;cal.weekNumbers=params.weekNumbers;cal.numberMonths=params.numberMonths;cal.controlMonth=params.controlMonth;cal.vertical=params.vertical;cal.monthsInRow=params.monthsInRow;cal.historyDateFormat=params.ifFormat||params.daFormat;cal.helpButton=!params.noHelp;cal.disableDrag=params.disableDrag;cal.closeButton=!params.noCloseButton;cal.yearNav=!params.disableYearNav;cal.sortOrder=params.sortOrder.toLowerCase();mustCreate=true;}else{if(params.date)
cal.setDate(params.date);cal.hide();}
if(params.multiple){cal.setMultipleDates(params.multiple);}
cal.showsOtherMonths=params.showOthers;cal.yearStep=params.step;cal.setRange(params.range[0],params.range[1]);cal.params=params;cal.setDateStatusHandler(params.dateStatusFunc);cal.getDateText=params.dateText;cal.setDateFormat(dateFmt);if(mustCreate)
cal.create();if(dateEl){var dateValue;if(dateEl.value){dateValue=dateEl.value;}else{dateValue=dateEl.innerHTML;}
if(dateValue!=""){var parsedDate=Date.parseDate(dateEl.value||dateEl.innerHTML,dateFmt);if(parsedDate!=null){cal.setDate(parsedDate);}}}
if(!params.position)
cal.showAtElement(params.button||params.displayArea||params.inputField,params.align);else
cal.showAt(params.position[0],params.position[1]);return false;};if(params.closeEventName){triggerEl["on"+params.closeEventName]=function(){if(window.calendar)
window.calendar.callCloseHandler();};}
return cal;};
Zapatec.Utils.addEvent(window, 'load', Zapatec.Utils.checkActivation);
