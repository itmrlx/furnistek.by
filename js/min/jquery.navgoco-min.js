!function(t){"use strict";var e=function(e,o,a){return this.el=e,this.$el=t(e),this.options=o,this.uuid=this.$el.attr("id")?this.$el.attr("id"):a,this.state={},this.init(),this};e.prototype={init:function(){var e=this;e._load(),e.$el.find("ul").each(function(o){var a=t(this);a.attr("data-index",o),e.options.save&&e.state.hasOwnProperty(o)?(a.parent().addClass(e.options.openClass),a.show()):a.parent().hasClass(e.options.openClass)?(a.show(),e.state[o]=1):a.hide()});var o=t("<span></span>").prepend(e.options.caretHtml),a=e.$el.find("li > a");e._trigger(o,!1),e._trigger(a,!0),e.$el.find("li:has(ul) > a ").prepend(o)},_trigger:function(e,o){var a=this;e.on("click",function(e){e.stopPropagation();var n=o?t(this).next():t(this).parent().next(),i=!1;if(n=n.length>0?n:!1,a.options.onClickBefore.call(this,e,n),!o||n&&i)e.preventDefault(),a._toggle(n,n.is(":hidden")),a._save();else if(a.options.accordion){var r=a.state=a._parents(t(this));a.$el.find("ul").filter(":visible").each(function(){var e=t(this),o=e.attr("data-index");r.hasOwnProperty(o)||a._toggle(e,!1)}),a._save()}a.options.onClickAfter.call(this,e,n)})},_toggle:function(e,o){var a=this,n=e.attr("data-index"),i=e.parent();if(a.options.onToggleBefore.call(this,e,o),o){if(i.addClass(a.options.openClass),e.slideDown(a.options.slide),a.state[n]=1,a.options.accordion){var r=a.state=a._parents(e);r[n]=a.state[n]=1,a.$el.find("ul").filter(":visible").each(function(){var e=t(this),o=e.attr("data-index");r.hasOwnProperty(o)||a._toggle(e,!1)})}}else i.removeClass(a.options.openClass),e.slideUp(a.options.slide),a.state[n]=0;a.options.onToggleAfter.call(this,e,o)},_parents:function(e,o){var a={},n=e.parent(),i=n.parents("ul");return i.each(function(){var e=t(this),n=e.attr("data-index");return n?void(a[n]=o?e:1):!1}),a},_save:function(){if(this.options.save){var e={};for(var a in this.state)1===this.state[a]&&(e[a]=1);o[this.uuid]=this.state=e,t.cookie(this.options.cookie.name,JSON.stringify(o),this.options.cookie)}},_load:function(){if(this.options.save){if(null===o){var e=t.cookie(this.options.cookie.name);o=e?JSON.parse(e):{}}this.state=o.hasOwnProperty(this.uuid)?o[this.uuid]:{}}},toggle:function(e){var o=this,a=arguments.length;if(1>=a)o.$el.find("ul").each(function(){var a=t(this);o._toggle(a,e)});else{var n,i={},r=Array.prototype.slice.call(arguments,1);a--;for(var s=0;a>s;s++){n=r[s];var c=o.$el.find('ul[data-index="'+n+'"]').first();if(c&&(i[n]=c,e)){var l=o._parents(c,!0);for(var f in l)i.hasOwnProperty(f)||(i[f]=l[f])}}for(n in i)o._toggle(i[n],e)}o._save()},destroy:function(){t.removeData(this.$el),this.$el.find("li:has(ul) > a").unbind("click"),this.$el.find("li:has(ul) > a > span").unbind("click")}},t.fn.navgoco=function(o){if("string"==typeof o&&"_"!==o.charAt(0)&&"init"!==o)var a=!0,n=Array.prototype.slice.call(arguments,1);else o=t.extend({},t.fn.navgoco.defaults,o||{}),t.cookie||(o.save=!1);return this.each(function(i){var r=t(this),s=r.data("navgoco");s||(s=new e(this,a?t.fn.navgoco.defaults:o,i),r.data("navgoco",s)),a&&s[o].apply(s,n)})};var o=null;t.fn.navgoco.defaults={caretHtml:"",accordion:!1,openClass:"open",save:!0,cookie:{name:"navgoco",expires:!1,path:"/"},slide:{duration:400,easing:"swing"},onClickBefore:t.noop,onClickAfter:t.noop,onToggleBefore:t.noop,onToggleAfter:t.noop}}(jQuery);
