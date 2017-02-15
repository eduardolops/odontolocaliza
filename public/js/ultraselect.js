jQuery&&!function(e){"use strict";function t(e){var t=e.style.overflow;t&&"visible"!==t||(e.style.overflow="hidden");var s=e.clientWidth<e.scrollWidth;return e.style.overflow=t,s}function s(e){var t=e.find(".selectable.hover").position().top+e.find(".selectable.hover").outerHeight();t>e.innerHeight()&&e.scrollTop(e.scrollTop()+t-e.innerHeight()),e.find(".selectable.hover").position().top<0&&e.scrollTop(e.scrollTop()+e.find(".selectable.hover").position().top)}function l(t){var s=this.data("ultraselect").options;if(s.optGroupSelectable){var l=!0;e(t).children(":not(.optGroupLabel)").find("input:checkbox").each(function(){e(this).is(":checked")||(l=!1)}),e(t).find("input.optGroup").prop("checked",l).parent().toggleClass("checked",l)}}function i(){var s=this.children(".select"),l=this.children(".options"),i=s.find("span.selection"),a=this.data("ultraselect").options;if(a.multiple){var n=0,o=!0,c="";l.find("input:checkbox").not(".selectAll, .optGroup").each(function(){e(this).is(":checked")?(n+=1,c=c+e(this).parent().text().trim()+", "):o=!1}),c=c.replace(/\s*,\s*$/,""),0===n?s.find("span.selection").html(a.noneSelected):"*"===a.oneOrMoreSelected||a.autoListSelected?(i.html(c),s.attr("title",c),a.autoListSelected&&t(i[0])&&i.html(a.oneOrMoreSelected.replace("%",n))):i.html(a.oneOrMoreSelected.replace("%",n)),a.selectAll&&l.find("input.selectAll").prop("checked",o).parent().toggleClass("checked",o)}else{var r=this.children("input").val();l.find(".option").each(function(){if(e(this).data("value")===r)return i.html(e("label",this).text()),!1})}}function a(t,s,l){d+=1;var i=t+"_"+d,a=e("<div />",{class:"option"}),n=e("<input />",{type:"checkbox",name:l.name,id:i,tabindex:-1}),o=e("<label />",{for:i}),c=e("<span><span></span></span>");return a.addClass(s.classes||"").data(s.data),l.multiple?(n.val(s.value),s.selected&&n.prop("checked","checked"),a.append(n,o.append(c,s.text)).addClass(s.classes||"").data(s.data)):(a.data("value",s.value),s.selected&&a.data("selected","selected"),a.addClass("selectable").append(e("<label />").html(s.text)))}function n(t,s,l){var i,o,c,r,h=e("<div />",{class:"options"});for(o=0;o<s.length;o+=1)s[o].optgroup?(c=e("<div />"),c.attr("class",s[o].classes||null).addClass("optGroup").data(s[o].data),r=e("<label />"),l.multiple&&l.optGroupSelectable&&(d+=1,i=t+"_"+d,c.append(e("<input />",{type:"checkbox",class:"optGroup",id:i,tabindex:-1})),r.attr("for",i).append("<span><span></span></span>")),c.append(r.append(s[o].optgroup)).wrapInner('<div class="optGroupLabel"></div>').append(n(t,s[o].options,l)),h.append(c)):h.append(a(t,s[o],l));return h.children()}function o(t){d+=1;var a="selectAll_"+d,o=e(this),c=o.children(".select"),r=o.children(".options"),h=this.data("ultraselect"),p=h.options,u=h.callback;r.html(""),p.multiple&&p.selectAll&&r.append(e("<div />",{class:"selectAll"}).append(e("<input />",{type:"checkbox",class:"selectAll",id:a,tabindex:-1}),e("<label />",{for:a}).append("<span><span></span></span>",p.selectAllText))),r.append(n(this.attr("id"),t,p)),o.ultraselect("setListHeight",p.listHeight),p.multiple?(p.multiple&&p.selectAll&&r.find("input.selectAll").click(function(){r.find("input:checkbox").prop("checked",e(this).is(":checked")).parent().toggleClass("checked",e(this).is(":checked"))}),p.multiple&&p.optGroupSelectable&&(r.addClass("optGroupHasCheckboxes"),r.find("input.optGroup").click(function(){e(this).parent().parent().find("input:not(.optGroup, .selectAll):checkbox").prop("checked",e(this).is(":checked")).parent().toggleClass("checked",e(this).is(":checked"))})),r.find("input:checkbox").click(function(){e(this).parent().toggleClass("checked",e(this).is(":checked")),i.call(o),c.focus(),e(this).parent().parent().hasClass("optGroup")&&l.call(o,e(this).parent().parent()),u&&u(e(this))}),r.each(function(){e(this).find("input:checked").parent().addClass("checked")}),i.call(o),p.optGroupSelectable&&r.find("div.optGroup").each(function(){l.call(o,e(this))}),r.find("input:checkbox").parent().addClass("selectable")):(i.call(o),e(".option",r).click(function(){e("input",o).val(e(this).data("value")),o.ultraselect("hideOptions"),i.call(o),c.focus()})),r.find(".selectable").hover(function(){e(this).parent().find(".hover").removeClass("hover"),e(this).addClass("hover")},function(){p.multiple&&e(this).removeClass("hover")}),c.keydown(function(t){r=e(this).next(".options");var l,a,n;if("hidden"!==o.parent().css("overflow")){if(9===t.keyCode)return e(this).addClass("focus").trigger("click"),!0;if(27!==t.keyCode&&37!==t.keyCode&&39!==t.keyCode||e(this).addClass("focus").trigger("click"),40===t.keyCode||38===t.keyCode)return l=r.find(".selectable"),a=l.index(l.filter(".hover")),n=-1,a<0?r.find(".selectable:first").addClass("hover"):40===t.keyCode&&a<l.length-1?n=a+1:38===t.keyCode&&a>0&&(n=a-1),n>=0&&(e(l.get(a)).removeClass("hover"),e(l.get(n)).addClass("hover"),s(r)),!1;if(13===t.keyCode||32===t.keyCode){p.multiple||e(".option.hover",r).trigger("click");var c=r.find("div.hover input:checkbox");return c.prop("checked",!c.is(":checked")).parent().toggleClass("checked",c.is(":checked")),c.hasClass("selectAll")&&r.find("input:checkbox").prop("checked",c.is(":checked")).parent().addClass("checked").toggleClass("checked",c.is(":checked")),i.call(o),u&&u(e(this)),!1}if(t.keyCode>=33&&t.keyCode<=126){var d=r.find(".selectable:startsWith("+String.fromCharCode(t.keyCode)+")"),h=d.index(d.filter(".selectable.hover")),f=d.filter(function(e){return e>h});d=f.length>=1?f:d,d=d.filter(".selectable:first"),1===d.length&&(r.find(".selectable.hover").removeClass("hover"),d.addClass("hover"),s(r))}}else{if(!p.multiple&&(40===t.keyCode||38===t.keyCode))return l=r.find(".selectable"),a=l.index(l.filter(".hover")),n=a,a<0?n=0:40===t.keyCode&&a<l.length-1?n=a+1:38===t.keyCode&&a>0&&(n=a-1),l.removeClass("hover"),e(l.get(n)).addClass("hover").trigger("click"),!1;if(38===t.keyCode||40===t.keyCode||13===t.keyCode||32===t.keyCode)return e(this).removeClass("focus").trigger("click"),r.find(".selectable:first").addClass("hover"),!1;if(9===t.keyCode)return!0}if(13===t.keyCode)return!1})}function c(t,s,l){this.element=t,this.options=e.extend(!0,{},r,s),this.callback=l,this.init()}String.prototype.trim||!function(){var e=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;String.prototype.trim=function(){return this.replace(e,"")}}();var r={selectAll:!0,selectAllText:"Select All",noneSelected:"Select options",oneOrMoreSelected:"% selected",autoListSelected:!1,optGroupSelectable:!1,listHeight:200,maxWidth:!1},d=0;e.extend(c.prototype,{init:function(){var t=this.options,s=e(this.element);t.maxWidth="none"!==s.css("maxWidth")?s.css("maxWidth"):t.maxWidth,t.multiple=s.attr("multiple"),t.name=s.attr("name");var l=e("<div />",{class:"ultraselect"}),i=e("<div />",{class:"select",tabIndex:0}),a=e("<div />",{class:"options",tabIndex:-1});t.multiple||l.append(e("<input />",{type:"hidden",name:t.name,value:s.val()})),i.append(e("<span />",{class:"selection"}),e("<span />",{class:"arrow"}).append(e("<b />"))),l.append(i,a),s.after(l),t.maxWidth&&i.css("maxWidth",t.maxWidth),l.addClass(s.attr("class")),l.data(s.data()),this.element=l[0],l.data("ultraselect",this);var n=[];s.children().each(function(){if("optgroup"===this.tagName.toLowerCase()){var t=[];n.push({optgroup:e(this).attr("label"),options:t,classes:e(this).attr("class"),data:e(this).data()||{}}),e(this).children("option").each(function(){""!==e(this).val()&&t.push({text:e(this).html(),value:e(this).val(),selected:e(this).prop("selected"),classes:e(this).attr("class"),data:e(this).data()||{}})})}else"option"===this.tagName.toLowerCase()&&""!==e(this).val()&&n.push({text:e(this).html(),value:e(this).val(),selected:e(this).prop("selected"),classes:e(this).attr("class"),data:e(this).data()||{}})}),s.remove(),l.attr("id",s.attr("id")),o.call(l,n),l.wrap('<div class="ultraselectWrapper"></div>'),l.parent().height(i.outerHeight()),i.hover(function(){e(this).addClass("hover")},function(){e(this).removeClass("hover")}).click(function(){return e(this).hasClass("active")?l.ultraselect("hideOptions"):l.ultraselect("showOptions"),!1}).focus(function(){e(this).addClass("focus")}).blur(function(){e(this).removeClass("focus")}),e(document).click(function(t){e(t.target).parents().addBack().is(".ultraselect > .options")||l.ultraselect("hideOptions")})},getValue:function(){var t=[];return this.options.multiple?(e("input:not(.selectAll, .optGroup)",this.element).each(function(){e(this).is(":checked")&&t.push(e(this).val())}),t):e("input",this.element).val()},setValue:function(t){if(!this.options.multiple){var s=this.element;e("input",s).val(t),e(".option",this.element).removeClass("hover").each(function(){e(this).val()===t&&(e(this).addClass("hover"),e("span.selection",s).html(e("label",this).text()))})}var l=t?t:[];return"string"==typeof l&&(l=[t]),e("input:not(.selectAll, .optGroup)",this.element).each(function(){var t=l.indexOf(e(this).val())!==-1;e(this).prop("checked",t).parent().toggleClass("checked",t)}),i.call(e(this.element)),this},updateOptions:function(e){o.call(this,e)},hideOptions:function(){this.children(".select").removeClass("active").removeClass("hover"),this.parent().css("overflow","hidden")},showOptions:function(){var t=this.children(".select"),s=this.children(".options"),l=this.data("ultraselect").options;if(e(".ultraselect").ultraselect("hideOptions"),this.parent().css("overflow","visible"),s.find(".option, .optGroup").removeClass("hover"),t.addClass("active").focus(),l.multiple)s.scrollTop(0);else{var i=this.children("input").val();s.find(".option").each(function(){if(e(this).data("value")===i)return e(this).addClass("hover"),!1})}},selectedString:function(){var t="";return this.find("input:checkbox:checked").not(".optGroup, .selectAll").each(function(){t+=e(this).attr("value")+","}),t.replace(/\s*,\s*$/,"")},setListHeight:function(e){var t=this.children(".options");t.height()>e?(t.css("height",e+"px"),navigator.userAgent.toLowerCase().indexOf("firefox")>-1&&t.addClass("_firefox")):t.css("height","")}}),e.expr[":"].startsWith=function(t,s,l){var i=l[3];return!!i&&new RegExp("^[/s]*"+i,"i").test(e(t).text())};var h=e.fn.val;e.fn.val=function(t){var s;return 0===arguments.length?(s=this.data("ultraselect"),s?s.getValue():h.call(this)):this.each(function(){s=e(this).data("ultraselect"),s?s.setValue(t):h.call(e(this),t)})},e.fn.ultraselect=function(t,s){var l=Array.prototype.slice.call(arguments,1);return this.each(function(){e(this).data("ultraselect")?"string"==typeof t&&"function"==typeof c.prototype[t]?e(this).data("ultraselect")[t].apply(e(this),l):console.log("ultraselect: invalid arguments"):new c(this,t,s)})}}(jQuery);