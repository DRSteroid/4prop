(function(aG) {
    var ay, aq, ap, aD, aj, aA, ai, ax, am, al, au = 0, aE = {}, aw = [], av = 0, aF = {}, az = [], ag = null , ao = new Image, ae = /\.(jpg|gif|png|bmp|jpeg)(.*)?$/i, k = /[^\.]\.(swf)\s*$/i, ad, ac = 1, an = 0, ar = "", at, aB, aC = false, ak = aG.extend(aG("<div/>")[0], {
        prop: 0
    }), ab = aG.browser.msie && aG.browser.version < 7 && !window.XMLHttpRequest, aa = function() {
        aq.hide();
        ao.onerror = ao.onload = null ;
        ag && ag.abort();
        ay.empty()
    }
    , R = function() {
        if (false === aE.onError(aw, au, aE)) {
            aq.hide();
            aC = false
        } else {
            aE.titleShow = false;
            aE.width = "auto";
            aE.height = "auto";
            ay.html('<p id="fancybox-error">The requested content cannot be loaded.<br />Please try again later.</p>');
            ah()
        }
    }
    , af = function() {
        var d = aw[au], j, f, e, i, h, b;
        aa();
        aE = aG.extend({}, aG.fn.fancybox.defaults, typeof aG(d).data("fancybox") == "undefined" ? aE : aG(d).data("fancybox"));
        b = aE.onStart(aw, au, aE);
        if (b === false) {
            aC = false
        } else {
            if (typeof b == "object") {
                aE = aG.extend(aE, b)
            }
            e = aE.title || (d.nodeName ? aG(d).attr("title") : d.title) || "";
            if (d.nodeName && !aE.orig) {
                aE.orig = aG(d).children("img:first").length ? aG(d).children("img:first") : aG(d)
            }
            if (e === "" && aE.orig && aE.titleFromAlt) {
                e = aE.orig.attr("alt")
            }
            j = aE.href || (d.nodeName ? aG(d).attr("href") : d.href) || null ;
            if (/^(?:javascript)/i.test(j) || j == "#") {
                j = null
            }
            if (aE.type) {
                f = aE.type;
                if (!j) {
                    j = aE.content
                }
            } else {
                if (aE.content) {
                    f = "html"
                } else {
                    if (j) {
                        f = j.match(ae) ? "image" : j.match(k) ? "swf" : aG(d).hasClass("iframe") ? "iframe" : j.indexOf("#") === 0 ? "inline" : "ajax"
                    }
                }
            }
            if (f) {
                if (f == "inline") {
                    d = j.substr(j.indexOf("#"));
                    f = aG(d).length > 0 ? "inline" : "ajax"
                }
                aE.type = f;
                aE.href = j;
                aE.title = e;
                if (aE.autoDimensions) {
                    if (aE.type == "html" || aE.type == "inline" || aE.type == "ajax") {
                        aE.width = "auto";
                        aE.height = "auto"
                    } else {
                        aE.autoDimensions = false
                    }
                }
                if (aE.modal) {
                    aE.overlayShow = true;
                    aE.hideOnOverlayClick = false;
                    aE.hideOnContentClick = false;
                    aE.enableEscapeButton = false;
                    aE.showCloseButton = false
                }
                aE.padding = parseInt(aE.padding, 10);
                aE.margin = parseInt(aE.margin, 10);
                ay.css("padding", aE.padding + aE.margin);
                aG(".fancybox-inline-tmp").unbind("fancybox-cancel").bind("fancybox-change", function() {
                    aG(this).replaceWith(aA.children())
                });
                switch (f) {
                case "html":
                    ay.html(aE.content);
                    ah();
                    break;
                case "inline":
                    if (aG(d).parent().is("#fancybox-content") === true) {
                        aC = false;
                        break
                    }
                    aG('<div class="fancybox-inline-tmp" />').hide().insertBefore(aG(d)).bind("fancybox-cleanup", function() {
                        aG(this).replaceWith(aA.children())
                    }).bind("fancybox-cancel", function() {
                        aG(this).replaceWith(ay.children())
                    });
                    aG(d).appendTo(ay);
                    ah();
                    break;
                case "image":
                    aC = false;
                    aG.fancybox.showActivity();
                    ao = new Image;
                    ao.onerror = function() {
                        R()
                    }
                    ;
                    ao.onload = function() {
                        aC = true;
                        ao.onerror = ao.onload = null ;
                        aE.width = ao.width;
                        aE.height = ao.height;
                        aG("<img />").attr({
                            id: "fancybox-img",
                            src: ao.src,
                            alt: aE.title
                        }).appendTo(ay);
                        P()
                    }
                    ;
                    ao.src = j;
                    break;
                case "swf":
                    aE.scrolling = "no";
                    i = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' + aE.width + '" height="' + aE.height + '"><param name="movie" value="' + j + '"></param>';
                    h = "";
                    aG.each(aE.swf, function(l, m) {
                        i += '<param name="' + l + '" value="' + m + '"></param>';
                        h += " " + l + '="' + m + '"'
                    });
                    i += '<embed src="' + j + '" type="application/x-shockwave-flash" width="' + aE.width + '" height="' + aE.height + '"' + h + "></embed></object>";
                    ay.html(i);
                    ah();
                    break;
                case "ajax":
                    aC = false;
                    aG.fancybox.showActivity();
                    aE.ajax.win = aE.ajax.success;
                    ag = aG.ajax(aG.extend({}, aE.ajax, {
                        url: j,
                        data: aE.ajax.data || {},
                        error: function(l) {
                            l.status > 0 && R()
                        },
                        success: function(l, m, n) {
                            if ((typeof n == "object" ? n : ag).status == 200) {
                                if (typeof aE.ajax.win == "function") {
                                    b = aE.ajax.win(j, l, m, n);
                                    if (b === false) {
                                        aq.hide();
                                        return
                                    } else {
                                        if (typeof b == "string" || typeof b == "object") {
                                            l = b
                                        }
                                    }
                                }
                                ay.html(l);
                                ah()
                            }
                        }
                    }));
                    break;
                case "iframe":
                    P()
                }
            } else {
                R()
            }
        }
    }
    , ah = function() {
        var b = aE.width
          , d = aE.height;
        b = b.toString().indexOf("%") > -1 ? parseInt((aG(window).width() - aE.margin * 2) * parseFloat(b) / 100, 10) + "px" : b == "auto" ? "auto" : b + "px";
        d = d.toString().indexOf("%") > -1 ? parseInt((aG(window).height() - aE.margin * 2) * parseFloat(d) / 100, 10) + "px" : d == "auto" ? "auto" : d + "px";
        ay.wrapInner('<div style="width:' + b + ";height:" + d + ";overflow: " + (aE.scrolling == "auto" ? "auto" : aE.scrolling == "yes" ? "scroll" : "hidden") + ';position:relative;"></div>');
        aE.width = ay.width();
        aE.height = ay.height();
        P()
    }
    , P = function() {
        var b, d;
        aq.hide();
        if (aD.is(":visible") && false === aF.onCleanup(az, av, aF)) {
            aG.event.trigger("fancybox-cancel");
            aC = false
        } else {
            aC = true;
            aG(aA.add(ap)).unbind();
            aG(window).unbind("resize.fb scroll.fb");
            aG(document).unbind("keydown.fb");
            aD.is(":visible") && aF.titlePosition !== "outside" && aD.css("height", aD.height());
            az = aw;
            av = au;
            aF = aE;
            if (aF.overlayShow) {
                ap.css({
                    "background-color": aF.overlayColor,
                    opacity: aF.overlayOpacity,
                    cursor: aF.hideOnOverlayClick ? "pointer" : "auto",
                    height: aG(document).height()
                });
                if (!ap.is(":visible")) {
                    ab && aG("select:not(#fancybox-tmp select)").filter(function() {
                        return this.style.visibility !== "hidden"
                    }).css({
                        visibility: "hidden"
                    }).one("fancybox-cleanup", function() {
                        this.style.visibility = "inherit"
                    });
                    ap.show()
                }
            } else {
                ap.hide()
            }
            aB = g();
            ar = aF.title || "";
            an = 0;
            ax.empty().removeAttr("style").removeClass();
            if (aF.titleShow !== false) {
                if (aG.isFunction(aF.titleFormat)) {
                    b = aF.titleFormat(ar, az, av, aF)
                } else {
                    b = ar && ar.length ? aF.titlePosition == "float" ? '<table id="fancybox-title-float-wrap" cellpadding="0" cellspacing="0"><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">' + ar + '</td><td id="fancybox-title-float-right"></td></tr></table>' : '<div id="fancybox-title-' + aF.titlePosition + '">' + ar + "</div>" : false
                }
                ar = b;
                if (!(!ar || ar === "")) {
                    ax.addClass("fancybox-title-" + aF.titlePosition).html(ar).appendTo("body").show();
                    switch (aF.titlePosition) {
                    case "inside":
                        ax.css({
                            width: aB.width - aF.padding * 2,
                            marginLeft: aF.padding,
                            marginRight: aF.padding
                        });
                        an = ax.outerHeight(true);
                        ax.appendTo(aj);
                        aB.height += an;
                        break;
                    case "over":
                        ax.css({
                            marginLeft: aF.padding,
                            width: aB.width - aF.padding * 2,
                            bottom: aF.padding
                        }).appendTo(aj);
                        break;
                    case "float":
                        ax.css("left", parseInt((ax.width() - aB.width - 40) / 2, 10) * -1).appendTo(aD);
                        break;
                    default:
                        ax.css({
                            width: aB.width - aF.padding * 2,
                            paddingLeft: aF.padding,
                            paddingRight: aF.padding
                        }).appendTo(aD)
                    }
                }
            }
            ax.hide();
            if (aD.is(":visible")) {
                aG(ai.add(am).add(al)).hide();
                b = aD.position();
                at = {
                    top: b.top,
                    left: b.left,
                    width: aD.width(),
                    height: aD.height()
                };
                d = at.width == aB.width && at.height == aB.height;
                aA.fadeTo(aF.changeFade, 0.3, function() {
                    var e = function() {
                        aA.html(ay.contents()).fadeTo(aF.changeFade, 1, H)
                    }
                    ;
                    aG.event.trigger("fancybox-change");
                    aA.empty().removeAttr("filter").css({
                        "border-width": aF.padding,
                        width: aB.width - aF.padding * 2,
                        height: aE.autoDimensions ? "auto" : aB.height - an - aF.padding * 2
                    });
                    if (d) {
                        e()
                    } else {
                        ak.prop = 0;
                        aG(ak).animate({
                            prop: 1
                        }, {
                            duration: aF.changeSpeed,
                            easing: aF.easingChange,
                            step: C,
                            complete: e
                        })
                    }
                })
            } else {
                aD.removeAttr("style");
                aA.css("border-width", aF.padding);
                if (aF.transitionIn == "elastic") {
                    at = w();
                    aA.html(ay.contents());
                    aD.show();
                    if (aF.opacity) {
                        aB.opacity = 0
                    }
                    ak.prop = 0;
                    aG(ak).animate({
                        prop: 1
                    }, {
                        duration: aF.speedIn,
                        easing: aF.easingIn,
                        step: C,
                        complete: H
                    })
                } else {
                    aF.titlePosition == "inside" && an > 0 && ax.show();
                    aA.css({
                        width: aB.width - aF.padding * 2,
                        height: aE.autoDimensions ? "auto" : aB.height - an - aF.padding * 2
                    }).html(ay.contents());
                    aD.css(aB).fadeIn(aF.transitionIn == "none" ? 0 : aF.speedIn, H)
                }
            }
        }
    }
    , c = function() {
        if (aF.enableEscapeButton || aF.enableKeyboardNav) {
            aG(document).bind("keydown.fb", function(b) {
                if (b.keyCode == 27 && aF.enableEscapeButton) {
                    b.preventDefault();
                    aG.fancybox.close()
                } else {
                    if ((b.keyCode == 37 || b.keyCode == 39) && aF.enableKeyboardNav && b.target.tagName !== "INPUT" && b.target.tagName !== "TEXTAREA" && b.target.tagName !== "SELECT") {
                        b.preventDefault();
                        aG.fancybox[b.keyCode == 37 ? "prev" : "next"]()
                    }
                }
            })
        }
        if (aF.showNavArrows) {
            if (aF.cyclic && az.length > 1 || av !== 0) {
                am.show()
            }
            if (aF.cyclic && az.length > 1 || av != az.length - 1) {
                al.show()
            }
        } else {
            am.hide();
            al.hide()
        }
    }
    , H = function() {
        if (!aG.support.opacity) {
            aA.get(0).style.removeAttribute("filter");
            aD.get(0).style.removeAttribute("filter")
        }
        aE.autoDimensions && aA.css("height", "auto");
        aD.css("height", "auto");
        ar && ar.length && ax.show();
        aF.showCloseButton && ai.show();
        c();
        aF.hideOnContentClick && aA.bind("click", aG.fancybox.close);
        aF.hideOnOverlayClick && ap.bind("click", aG.fancybox.close);
        aG(window).bind("resize.fb", aG.fancybox.resize);
        aF.centerOnScroll && aG(window).bind("scroll.fb", aG.fancybox.center);
        if (aF.type == "iframe") {
            aG('<iframe id="fancybox-frame" name="fancybox-frame' + (new Date).getTime() + '" frameborder="0" hspace="0" ' + (aG.browser.msie ? 'allowtransparency="true""' : "") + ' scrolling="' + aE.scrolling + '" src="' + aF.href + '"></iframe>').appendTo(aA)
        }
        aD.show();
        aC = false;
        aG.fancybox.center();
        aF.onComplete(az, av, aF);
        var b, d;
        if (az.length - 1 > av) {
            b = az[av + 1].href;
            if (typeof b !== "undefined" && b.match(ae)) {
                d = new Image;
                d.src = b
            }
        }
        if (av > 0) {
            b = az[av - 1].href;
            if (typeof b !== "undefined" && b.match(ae)) {
                d = new Image;
                d.src = b
            }
        }
    }
    , C = function(b) {
        var d = {
            width: parseInt(at.width + (aB.width - at.width) * b, 10),
            height: parseInt(at.height + (aB.height - at.height) * b, 10),
            top: parseInt(at.top + (aB.top - at.top) * b, 10),
            left: parseInt(at.left + (aB.left - at.left) * b, 10)
        };
        if (typeof aB.opacity !== "undefined") {
            d.opacity = b < 0.5 ? 0.5 : b
        }
        aD.css(d);
        aA.css({
            width: d.width - aF.padding * 2,
            height: d.height - an * b - aF.padding * 2
        })
    }
    , x = function() {
        return [aG(window).width() - aF.margin * 2, aG(window).height() - aF.margin * 2, aG(document).scrollLeft() + aF.margin, aG(document).scrollTop() + aF.margin]
    }
    , g = function() {
        var b = x()
          , f = {}
          , e = aF.autoScale
          , d = aF.padding * 2;
        f.width = aF.width.toString().indexOf("%") > -1 ? parseInt(b[0] * parseFloat(aF.width) / 100, 10) : aF.width + d;
        f.height = aF.height.toString().indexOf("%") > -1 ? parseInt(b[1] * parseFloat(aF.height) / 100, 10) : aF.height + d;
        if (e && (f.width > b[0] || f.height > b[1])) {
            if (aE.type == "image" || aE.type == "swf") {
                e = aF.width / aF.height;
                if (f.width > b[0]) {
                    f.width = b[0];
                    f.height = parseInt((f.width - d) / e + d, 10)
                }
                if (f.height > b[1]) {
                    f.height = b[1];
                    f.width = parseInt((f.height - d) * e + d, 10)
                }
            } else {
                f.width = Math.min(f.width, b[0]);
                f.height = Math.min(f.height, b[1])
            }
        }
        f.top = parseInt(Math.max(b[3] - 20, b[3] + (b[1] - f.height - 40) * 0.5), 10);
        f.left = parseInt(Math.max(b[2] - 20, b[2] + (b[0] - f.width - 40) * 0.5), 10);
        return f
    }
    , w = function() {
        var b = aE.orig ? aG(aE.orig) : false
          , d = {};
        if (b && b.length) {
            d = b.offset();
            d.top += parseInt(b.css("paddingTop"), 10) || 0;
            d.left += parseInt(b.css("paddingLeft"), 10) || 0;
            d.top += parseInt(b.css("border-top-width"), 10) || 0;
            d.left += parseInt(b.css("border-left-width"), 10) || 0;
            d.width = b.width();
            d.height = b.height();
            d = {
                width: d.width + aF.padding * 2,
                height: d.height + aF.padding * 2,
                top: d.top - aF.padding - 20,
                left: d.left - aF.padding - 20
            }
        } else {
            b = x();
            d = {
                width: aF.padding * 2,
                height: aF.padding * 2,
                top: parseInt(b[3] + b[1] * 0.5, 10),
                left: parseInt(b[2] + b[0] * 0.5, 10)
            }
        }
        return d
    }
    , a = function() {
        if (aq.is(":visible")) {
            aG("div", aq).css("top", ac * -40 + "px");
            ac = (ac + 1) % 12
        } else {
            clearInterval(ad)
        }
    }
    ;
    aG.fn.fancybox = function(b) {
        if (!aG(this).length) {
            return this
        }
        aG(this).data("fancybox", aG.extend({}, b, aG.metadata ? aG(this).metadata() : {})).unbind("click.fb").bind("click.fb", function(d) {
            d.preventDefault();
            if (!aC) {
                aC = true;
                aG(this).blur();
                aw = [];
                au = 0;
                d = aG(this).attr("rel") || "";
                if (!d || d == "" || d === "nofollow") {
                    aw.push(this)
                } else {
                    aw = aG("a[rel=" + d + "], area[rel=" + d + "]");
                    au = aw.index(this)
                }
                af()
            }
        });
        return this
    }
    ;
    aG.fancybox = function(b, h) {
        var e;
        if (!aC) {
            aC = true;
            e = typeof h !== "undefined" ? h : {};
            aw = [];
            au = parseInt(e.index, 10) || 0;
            if (aG.isArray(b)) {
                for (var d = 0, f = b.length; d < f; d++) {
                    if (typeof b[d] == "object") {
                        aG(b[d]).data("fancybox", aG.extend({}, e, b[d]))
                    } else {
                        b[d] = aG({}).data("fancybox", aG.extend({
                            content: b[d]
                        }, e))
                    }
                }
                aw = jQuery.merge(aw, b)
            } else {
                if (typeof b == "object") {
                    aG(b).data("fancybox", aG.extend({}, e, b))
                } else {
                    b = aG({}).data("fancybox", aG.extend({
                        content: b
                    }, e))
                }
                aw.push(b)
            }
            if (au > aw.length || au < 0) {
                au = 0
            }
            af()
        }
    }
    ;
    aG.fancybox.showActivity = function() {
        clearInterval(ad);
        aq.show();
        ad = setInterval(a, 66)
    }
    ;
    aG.fancybox.hideActivity = function() {
        aq.hide()
    }
    ;
    aG.fancybox.next = function() {
        return aG.fancybox.pos(av + 1)
    }
    ;
    aG.fancybox.prev = function() {
        return aG.fancybox.pos(av - 1)
    }
    ;
    aG.fancybox.pos = function(b) {
        if (!aC) {
            b = parseInt(b);
            aw = az;
            if (b > -1 && b < az.length) {
                au = b;
                af()
            } else {
                if (aF.cyclic && az.length > 1) {
                    au = b >= az.length ? 0 : az.length - 1;
                    af()
                }
            }
        }
    }
    ;
    aG.fancybox.cancel = function() {
        if (!aC) {
            aC = true;
            aG.event.trigger("fancybox-cancel");
            aa();
            aE.onCancel(aw, au, aE);
            aC = false
        }
    }
    ;
    aG.fancybox.close = function() {
        function b() {
            ap.fadeOut("fast");
            ax.empty().hide();
            aD.hide();
            aG.event.trigger("fancybox-cleanup");
            aA.empty();
            aF.onClosed(az, av, aF);
            az = aE = [];
            av = au = 0;
            aF = aE = {};
            aC = false
        }
        if (!(aC || aD.is(":hidden"))) {
            aC = true;
            if (aF && false === aF.onCleanup(az, av, aF)) {
                aC = false
            } else {
                aa();
                aG(ai.add(am).add(al)).hide();
                aG(aA.add(ap)).unbind();
                aG(window).unbind("resize.fb scroll.fb");
                aG(document).unbind("keydown.fb");
                aA.find("iframe").attr("src", ab && /^https/i.test(window.location.href || "") ? "javascript:void(false)" : "about:blank");
                aF.titlePosition !== "inside" && ax.empty();
                aD.stop();
                if (aF.transitionOut == "elastic") {
                    at = w();
                    var d = aD.position();
                    aB = {
                        top: d.top,
                        left: d.left,
                        width: aD.width(),
                        height: aD.height()
                    };
                    if (aF.opacity) {
                        aB.opacity = 1
                    }
                    ax.empty().hide();
                    ak.prop = 1;
                    aG(ak).animate({
                        prop: 0
                    }, {
                        duration: aF.speedOut,
                        easing: aF.easingOut,
                        step: C,
                        complete: b
                    })
                } else {
                    aD.fadeOut(aF.transitionOut == "none" ? 0 : aF.speedOut, b)
                }
            }
        }
    }
    ;
    aG.fancybox.resize = function() {
        ap.is(":visible") && ap.css("height", aG(document).height());
        aG.fancybox.center(true)
    }
    ;
    aG.fancybox.center = function(b) {
        var e, d;
        if (!aC) {
            d = b === true ? 1 : 0;
            e = x();
            !d && (aD.width() > e[0] || aD.height() > e[1]) || aD.stop().animate({
                top: parseInt(Math.max(e[3] - 20, e[3] + (e[1] - aA.height() - 40) * 0.5 - aF.padding)),
                left: parseInt(Math.max(e[2] - 20, e[2] + (e[0] - aA.width() - 40) * 0.5 - aF.padding))
            }, typeof b == "number" ? b : 200)
        }
    }
    ;
    aG.fancybox.init = function() {
        if (!aG("#fancybox-wrap").length) {
            aG("body").append(ay = aG('<div id="fancybox-tmp"></div>'), aq = aG('<div id="fancybox-loading"><div></div></div>'), ap = aG('<div id="fancybox-overlay"></div>'), aD = aG('<div id="fancybox-wrap"></div>'));
            aj = aG('<div id="fancybox-outer"></div>').append('<div class="fancybox-bg" id="fancybox-bg-n"></div><div class="fancybox-bg" id="fancybox-bg-ne"></div><div class="fancybox-bg" id="fancybox-bg-e"></div><div class="fancybox-bg" id="fancybox-bg-se"></div><div class="fancybox-bg" id="fancybox-bg-s"></div><div class="fancybox-bg" id="fancybox-bg-sw"></div><div class="fancybox-bg" id="fancybox-bg-w"></div><div class="fancybox-bg" id="fancybox-bg-nw"></div>').appendTo(aD);
            aj.append(aA = aG('<div id="fancybox-content"></div>'), ai = aG('<a id="fancybox-close"></a>'), ax = aG('<div id="fancybox-title"></div>'), am = aG('<a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a>'), al = aG('<a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>'));
            ai.click(aG.fancybox.close);
            aq.click(aG.fancybox.cancel);
            am.click(function(b) {
                b.preventDefault();
                aG.fancybox.prev()
            });
            al.click(function(b) {
                b.preventDefault();
                aG.fancybox.next()
            });
            aG.fn.mousewheel && aD.bind("mousewheel.fb", function(b, d) {
                if (aC) {
                    b.preventDefault()
                } else {
                    if (aG(b.target).get(0).clientHeight == 0 || aG(b.target).get(0).scrollHeight === aG(b.target).get(0).clientHeight) {
                        b.preventDefault();
                        aG.fancybox[d > 0 ? "prev" : "next"]()
                    }
                }
            });
            aG.support.opacity || aD.addClass("fancybox-ie");
            if (ab) {
                aq.addClass("fancybox-ie6");
                aD.addClass("fancybox-ie6");
                aG('<iframe id="fancybox-hide-sel-frame" src="' + (/^https/i.test(window.location.href || "") ? "javascript:void(false)" : "about:blank") + '" scrolling="no" border="0" frameborder="0" tabindex="-1"></iframe>').prependTo(aj)
            }
        }
    }
    ;
    aG.fn.fancybox.defaults = {
        padding: 10,
        margin: 40,
        opacity: false,
        modal: false,
        cyclic: false,
        scrolling: "auto",
        width: 560,
        height: 340,
        autoScale: true,
        autoDimensions: true,
        centerOnScroll: false,
        ajax: {},
        swf: {
            wmode: "transparent"
        },
        hideOnOverlayClick: true,
        hideOnContentClick: false,
        overlayShow: true,
        overlayOpacity: 0.7,
        overlayColor: "#777",
        titleShow: true,
        titlePosition: "float",
        titleFormat: null ,
        titleFromAlt: false,
        transitionIn: "fade",
        transitionOut: "fade",
        speedIn: 300,
        speedOut: 300,
        changeSpeed: 300,
        changeFade: "fast",
        easingIn: "swing",
        easingOut: "swing",
        showCloseButton: true,
        showNavArrows: true,
        enableEscapeButton: true,
        enableKeyboardNav: true,
        onStart: function() {},
        onCancel: function() {},
        onComplete: function() {},
        onCleanup: function() {},
        onClosed: function() {},
        onError: function() {}
    };
    aG(document).ready(function() {
        aG.fancybox.init()
    })
})(jQuery);
