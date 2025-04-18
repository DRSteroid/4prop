function trim(a) {
    return a.replace(/^\s+/, "").replace(/\s+$/, "")
}
$(document).ready(function () {
    $("body").on("dblclick", function (a) {
        a.preventDefault();
        a.stopPropagation()
    });
    initTooltips();
    initOverlays();
    $(".shopItemOverlay").live("mouseover", function (a) {
        a.preventDefault();
        $(this).fancybox({
            autoDimensions: false,
            width: 540,
            height: 500,
            scrolling: "no",
            overlayOpacity: 0.6,
            showCloseButton: true,
            enableEscapeButton: false,
            hideOnContentClick: false,
            padding: 0,
            margin: 5,
            titleShow: false,
            onComplete: function () {
                initOverlayContent();
                $("#tiptip_holder").hide()
            },
            onStart: function () {
                $("#tiptip_holder").hide()
            }
        })
    });
    initCategoryCountdown()
});

function initTooltips() {
    $("#tiptip_holder").hide();
    $(".tip").tipTip();
    $(".tipStay").tipTip({
        keepAlive: true
    })
}

function initOverlays() {
    $("a.openinformation").fancybox({
        autoDimensions: false,
        width: 540,
        height: 500,
        scrolling: "no",
        overlayOpacity: 0.6,
        showCloseButton: true,
        enableEscapeButton: false,
        hideOnContentClick: false,
        padding: 0,
        margin: 5,
        titleShow: false,
        onComplete: initOverlayContent,
        onStart: destroyCategoryCountdown,
        onClosed: function () {
            document.location.reload(true)
        }
    })
}

function destroyCategoryCountdown() {
    $(".teleshoppingCountdown").each(function (a) {
        $(this).countdown("destroy")
    })
}

function initCategoryCountdown() {
    $(".teleshoppingCountdown").each(function (b) {
        var a = new Date(parseInt($(this).attr("data-end")) * 1000);
        $(this).countdown({
            until: a,
            format: "HMS",
            compact: true,
            description: "",
            layout: '{hnn}<span style="padding:0 3px 0 3px;color:#FEF6AA;">{sep}</span>{mnn}<span style="padding:0 3px 0 3px;color:#FEF6AA;">{sep}</span>{snn}',
            onExpiry: function () {
                document.location.reload()
            }
        })
    })
}

function initOverlayContent() {
    initTooltips();
    $(".scrollpane").jScrollPane({
        showArrows: true,
        horizontalGutter: 10
    });
    $(".jCarouselLite").each(function () {
        if ($(this).find("li").length > 3) {
            $(this).parent().addClass("carousel");
            $(this).jCarouselLite({
                btnNext: ".carousel .next",
                btnPrev: ".carousel .prev",
                mouseWheel: true,
                circular: false,
                visible: 4
            })
        }
        $(this).delegate("a", "click", function (i) {
            i.preventDefault();
            var g = $(this).parent();
            var j = $(this).find(".bigPreloaded").attr("src");
            var f = $(this).find(".bigPreloaded").attr("alt");
            var c = $(this).parent().find(".buySelectionLink").attr("href");
            var h = $(this).parent().find(".giftSelectionLink").attr("href");
            var b = $(this).attr("name");
            var d = g.parent().hasClass("random-package");
            g.siblings().removeClass("ui-selected");
            g.addClass("ui-selected");
            $(".headlineNameSub").html($(".headlineName" + b).html());
            $(".longDescriptionText").find(".jspContainer").find(".jspPane").find("p").html($(".longDescription" + b).html());
            $(".scrollpane").jScrollPane({
                showArrows: true,
                horizontalGutter: 10
            });
            if (!d) {
                $(".mainHeadline").text($(".headlineName" + b).text());
                $(".visual").find("img").attr("src", j);
                $(".visual").find("img").attr("alt", f)
            }
            if ($("#buyItemLink").attr("href") != "#") {
                $("#buyItemLink").attr("href", c)
            }
            if ($("#buyItemLink").attr("href") == "#") {
                $("#buyItemLink").attr("href", c);
                $("#buyItemLink").attr("class", "tip ");
                $("#buyItemLink").html("Koupit předmět");
            }
            if ($("#giftItemLink").attr("href") != "#") {
                $("#giftItemLink").attr("href", h)
            }
            $("#selectItem").val($("#selectItem").find("option:first").val())
        })
    });
    $(".countdown").each(function (d) {
        var b = new Date(parseInt($(this).attr("data-end")) * 1000);
        var c = $(this).attr("data-url");
        $(this).countdown({
            until: b,
            format: "HMS",
            compact: true,
            description: "",
            layout: '{hnn}<span style="padding:0 3px 0 3px;color:#FEF6AA;">{sep}</span>{mnn}<span style="padding:0 3px 0 3px;color:#FEF6AA;">{sep}</span>{snn}',
            onExpiry: function () {
                $.ajax({
                    url: c,
                    success: function (e) {
                        $("#fancybox-content > div").html(e);
                        initOverlayContent()
                    }
                })
            }
        })
    });
    $(".suggestion").click(function () {
        $.ajax({
            url: $(this).attr("href"),
            success: function (b) {
                $("#fancybox-content > div").html(b);
                initOverlayContent()
            }
        });
        return false
    });

    function a() {
        if ($(this).attr("href") === "#") {
            return false
        }
        $("#buyItemLink, #giftItemLink").attr("disabled", "disabled");
        $("#buyItemLink, #giftItemLink").hide();
        $("#buyItemLinkBlank, #giftItemLinkBlank").show();
        $.ajax({
            url: $(this).attr("href"),
            success: function (b) {
                $("#fancybox-content > div").html(b);
                initOverlayContent()
            }
        });
        return false
    }
    $(".buy, #boxGift").on("click", "#buyItemLink, #giftItemLink", a);
    $("#GoToAjaxPage").click(function () {
		$.ajax({
		url: $(this).attr("href"),
		success: function (b) {
		$("#fancybox-content > div").html(b);
		initOverlayContent()
		}
		});
	return false
	}); 
	$("#selectItem").on("click", "tr", function () {
        if (!$(this).hasClass("bgSelected")) {
            $("#selectItem").find("tr").removeClass("bgSelected");
            $(this).addClass("bgSelected")
            
        }
        if (userAmountLocaString !== undefined) {
            $("#userAmount").val(userAmountLocaString)
        }
        var d = $(this).attr("value").split(":");
        var f = parseInt(d[1]) || 0;
        var c = parseInt(d[2]) || 0;
        var b = parseInt(d[3]) || 0;
        var e = parseInt(d[4]) || 0;
        var g = parseInt(d[5]) || 0;
        $("#priceAmount").text(f);
        if (c !== f) {
            $("#oldPriceAmount").show()
			$("#oldPriceAmount").text(c)
        }else{
			$("#oldPriceAmount").hide()
		}
        if (b > 0) {
            $("#mileageAmount").text(b)
        }
       	$("#buyItemLink").attr("href", './shop/buy/' + $('#deko').val() +'/'+f);
       	$("#buyItemLink").attr("class", 'tip ');
        if (parseInt(e) == 0) {
            $("#volumeDiscount").hide()
        } else {
            $("#volumeDiscount").find("span").text(e);
            $("#volumeDiscount").show()
        }
    });
    $("#userAmount").on("focusin", function () {
        if (userAmountLocaString && $(this).val() === userAmountLocaString) {
            $(this).val("")
        }
    });
    $("#userAmount").on("focusout", function () {
        if (userAmountLocaString && $(this).val() === "") {
            $(this).val(userAmountLocaString)
        }
    });
    $("#userAmount").on("keyup", function () {
        $("#selectItem").find("tr").removeClass("bgSelected");
        var j = 2500;
        var e = $(this).val();
        if (e.length <= 0) {
            return
        }
        var o = parseInt(e) || 0;
        if (o <= 0) {
            o = 1
        } else {
            if (o > j) {
                o = j
            }
        }
        $(this).val(o);
        var f = parseInt($("#selectItem").find("tr").first().attr("value")) || 0;
        var k = Math.round(o / f);
        var b = 0;
        var n = 0;
        var m = 0;
        var p = 0;
        var d = 0;
        var i;
        $("#selectItem").find("tr").each(function () {
            i = $(this).attr("value").split(":");
            if (i[0] > o) {
                return
            } else {
                b = parseInt(i[0]) || 0;
                n = parseInt(i[1]) || 0;
                m = parseInt(i[2]) || 0;
                p = parseInt(i[3]) || 0;
                d = parseInt(i[4]) || 0
            }
        });
        var h = Math.ceil(n / b * o);
        var l = Math.ceil(m / b * o);
        var g = Math.ceil(p / b * o);
        var c = Math.round(d / b * o);
        if (isNaN(b) || isNaN(h) || isNaN(l) || isNaN(g) || o < b || f == 0 || (o % f) != 0) {
            $("#buyItemLink, #giftItemLink").hide();
            $("#buyItemLinkBlank, #giftItemLinkBlank").show();
            $("#priceAmount").html("&mdash;");
            $("#oldPriceAmount").html("&mdash;");
            $("#mileageAmount").html("&mdash;");
            return
        }
        $("#priceAmount").text(h);
        $("#oldPriceAmount").text(l);
        $("#mileageAmount").text(g);
        if ($("#buyItemLink").length > 0) {
            $("#buyItemLink").attr("href", $("#buyItemLink").attr("href").replace(/\/\d+?\/\d+?\/\d+?\?/, "/" + k + "/" + h + "/" + g + "?"))
        }
        if ($("#giftItemLink").length > 0) {
            $("#giftItemLink").attr("href", $("#giftItemLink").attr("href").replace(/\/\d+?\/\d+?\/\d+?\/\d+?\?/, "/" + k + "/" + h + "/" + g + "/" + l + "?"))
        }
        $("#buyItemLink, #giftItemLink").show();
        $("#buyItemLinkBlank, #giftItemLinkBlank").hide();
        if (parseInt(c) <= 0) {
            $("#volumeDiscount").hide()
        } else {
            $("#volumeDiscount").find("span").text(c);
            $("#volumeDiscount").show()
        }
    });
    $("#recipientSelect").on("click", "a", function (c) {
        c.stopPropagation();
        c.preventDefault();
        var b = $(this).parent();
        $.ajax({
            url: $(this).attr("href"),
            dataType: "json",
            success: function (d) {
                if (d.listed && d.listed === true) {
                    $("#recipientList").empty().append(d.content);
                    b.siblings().removeClass("selected");
                    b.addClass("selected")
                } else {
                    window.location.reload(true)
                }
            },
            error: function (d) {
                if (d.responseText !== "") {
                    $("#fancybox-content").find("div").empty().append(d.responseText)
                } else {
                    window.location.reload(true)
                }
            }
        })
    });
    $("#recipientList").on("click", "a", function (b) {
        b.stopPropagation();
        b.preventDefault();
        $(this).parent().siblings().removeClass("selected");
        $(this).parent().addClass("selected");
        $("#giftItemLink").attr("href", $(this).attr("href"));
        $("#recipient").text($(this).text());
        $("#boxGift").show()
    })
};