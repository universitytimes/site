(function(a){var c=function(e,c){a.each(c,function(a,c){e=e.replace(RegExp("{{ *"+a+" *}}"),c)});return e};a(function(){var e=a("#wp_rp_earnings_wrap"),k=a("#wp_rp_earnings_holder"),h=a("#wp_rp_statistics_wrap"),l=a("#wp_rp_dashboard_url").val(),i=a("#wp_rp_blog_id").val(),j=a("#wp_rp_auth_key").val(),g=a("#wp_rp_ajax_nonce").val();traffic_exchange_enabled=0<a("#wp_rp_show_traffic_exchange_statistics").length;promoted_content_enabled=0<a("#wp_rp_show_promoted_content_statistics").length;update_interval=
req_timeout=null;update_interval_sec=2E3;update_interval_error_sec=3E4;updating=!1;ul=null;stats={};set_update_interval=function(a){a||(a=update_interval_sec);clearInterval(update_interval);0<a&&(update_interval=setInterval(update_dashboard,a))};ajaxCallSubscribe=function(b,f){a.ajax({url:ajaxurl,data:{action:"rp_subscribe",_wpnonce:g,email:b||"0"},success:f,type:"POST"})};disableCustomCSS=function(){var b=1!==a("#wp_rp_desktop_custom_theme_enabled:checked").length;a("#wp_rp_desktop_theme_custom_css").prop("disabled",
b)};display_error=function(b){var f=a("#wp_rp_statistics_wrap");b||f.find(".unavailable").slideDown();set_update_interval(update_interval_error_sec);updating=!1};create_dashboard=function(){ul=a('<ul class="statistics" />');h.find(".unavailable").slideUp();ul.append('<li class="title"><div class="desktop">Desktop</div><div class="mobile">Mobile</div></li>');ul.append(c('<li class="{{class}} stats"><p class="num mobile"></p><p class="num all"></p><h5>{{ title}}<span>{{range}}</span></h5></li>',{"class":"ctr",
title:"click-through rate",range:"last 30 days"}));ul.append(c('<li class="{{class}} stats"><p class="num mobile"></p><p class="num all"></p><h5>{{ title}}<span>{{range}}</span></h5></li>',{"class":"pageviews",title:"page views",range:"last 30 days"}));ul.append(c('<li class="{{class}} stats"><p class="num mobile"></p><p class="num all"></p><h5>{{ title}}<span>{{range}}</span></h5></li>',{"class":"clicks",title:"clicks",range:"last 30 days"}));h.append(ul);traffic_exchange_enabled&&h.append('<div class="network"><div class="icon"></div><span class="num"></span><h4>Inbound Visitors</h4><div class="description"><p>Number of visitors that came to your site because this plugin promoted your content on other sites.<strong>Wow, a traffic exchange! :)</strong></p></div></div>')};
update_dashboard=function(b){updating||(updating=!0,req_timeout=setTimeout(function(){display_error(!b)},2E3),a.getJSON(l+"pageviews/?callback=?",{blog_id:i,auth_key:j},function(a){var d=a.data;clearTimeout(req_timeout);if(!a||"ok"!==a.status||!a.data)display_error(!b);else{ul||create_dashboard();set_update_interval(a.data.update_interval);stats.mobile_pageviews=Math.max(d.mobile_pageviews,stats.mobile_pageviews||0);stats.mobile_clicks=Math.max(d.mobile_clicks,stats.mobile_clicks||0);a=0<stats.mobile_pageviews&&
(100*(stats.mobile_clicks/stats.mobile_pageviews)).toFixed(1)||0;stats.desktop_pageviews=Math.max(d.pageviews-stats.mobile_pageviews,stats.desktop_pageviews||0);stats.desktop_clicks=Math.max(d.clicks-stats.mobile_clicks,stats.desktop_clicks||0);var c=0<stats.desktop_pageviews&&(100*(stats.desktop_clicks/stats.desktop_pageviews)).toFixed(1)||0;stats.network_in_pageviews=Math.max(d.network_in_pageviews,stats.network_in_pageviews||0);if(promoted_content_enabled&&d.promoted_content_money_earned){stats.promoted_content_money_earned=
Math.max(d.promoted_content_money_earned,stats.promoted_content_money_earned||0);var g=(stats.promoted_content_money_earned/100).toFixed(2),j=(d.meta.min_payout/100).toFixed(2);e.find(".num").html("$"+g);e.find(".payout").html("$"+j);stats.promoted_content_money_earned>=d.meta.min_payout&&e.find(".claim").hasClass("disabled")&&(e.find(".claim").removeClass("disabled"),e.find(".claim").attr("href","mailto:support+claim@zemanta.com?subject="+encodeURIComponent("I earned over $50!")+"&body="+encodeURIComponent("I would like to claim my money.\nMy reference code is: "+
i+" \nMy PayPal account is:\n")));k.show()}ul.find(".ctr .num.all").html(c+"%");ul.find(".pageviews .num.all").html(stats.desktop_pageviews);ul.find(".clicks .num.all").html(stats.desktop_clicks);ul.find(".ctr .num.mobile").html(a+"%");ul.find(".pageviews .num.mobile").html(stats.mobile_pageviews);ul.find(".clicks .num.mobile").html(stats.mobile_clicks);h.find(".network .num").html(stats.network_in_pageviews);updating=!1}}))};turn_on_rp=function(b){a("#wp_rp_static_base_url").val();a("#wp_rp_ctr_dashboard_enabled, #wp_rp_enable_themes, #wp_rp_promoted_content_enabled, #wp_rp_traffic_exchange_enabled").prop("checked",
!0);a("#wp_rp_settings_form").append('<input type="hidden" value="statistics+thumbnails+promoted" name="wp_rp_turn_on_button_pressed" id="wp_rp_turn_on_button_pressed">');a("#wp_rp_settings_form").append('<input type="hidden" value="'+b+'" name="wp_rp_button_type" id="wp_rp_button_type">');a("#wp_rp_settings_form").submit()};disableCustomCSS();a("#wp_rp_desktop_custom_theme_enabled").click(disableCustomCSS);i&&j&&(update_dashboard(!0),update_interval=setInterval(update_dashboard,2E3));!i&&document.location.search.match(/ref=turn-on-rp/)&&
turn_on_rp("turn-on-banner");a("#wp_rp_turn_on_statistics a.turn-on").click(function(b){b.preventDefault();b=a(this).data("type");turn_on_rp(b)});a("#wp_rp_subscribe_email").length&&(a("#wp_rp_subscribe_email").val().length?a("#wp_rp_subscribe_button").hide():a("#wp_rp_unsubscribe_button").hide());a("#wp_rp_subscribe_button").on("click",function(b){var f=a("#wp_rp_subscribe_email").val();b.preventDefault();f&&(a("#wp_rp_subscribe_button").prop("disabled",!0),ajaxCallSubscribe(f,function(b){parseInt(b)&&
(a("#wp_rp_subscribe_button").prop("disabled",!1),a("#wp_rp_subscribe_button").hide(),a("#wp_rp_unsubscribe_button").show())}))});a("#wp_rp_unsubscribe_button").on("click",function(b){b.preventDefault();a("#wp_rp_unsubscribe_button").prop("disabled",!0);ajaxCallSubscribe(!1,function(b){parseInt(b)&&(a("#wp_rp_subscribe_email").val(""),a("#wp_rp_unsubscribe_button").prop("disabled",!1),a("#wp_rp_unsubscribe_button").hide(),a("#wp_rp_subscribe_button").show())})});a(".wp_rp_notification .close").on("click",
function(b){a.ajax({url:a(this).attr("href"),data:{noredirect:!0},_wpnonce:g});a(this).parent().slideUp(function(){a(this).remove()});b.preventDefault()});a("#wp_rp_wrap .collapsible .collapse-handle").on("click",function(b){var f=a(this).closest(".collapsible"),d=f.find(".container"),e=f.hasClass("collapsed"),c=f.attr("block");e?(d.slideDown(),a.post(ajaxurl,{action:"rp_show_hide_"+c,show:!0,_wpnonce:g})):(d.slideUp(),a.post(ajaxurl,{action:"rp_show_hide_"+c,hide:!0,_wpnonce:g}));f.toggleClass("collapsed");
b.preventDefault()})})})(jQuery);
