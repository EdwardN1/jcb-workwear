jQuery(document).ready(function ($) {
    /*$('<input type="button" value="-" class="minus">').insertBefore($('.custom-quantity input[type=number]'));
    $('<input type="button" value="+" class="plus">').insertAfter($('.custom-quantity input[type=number]'));*/
    function wcqib_refresh_quantity_increments() {
        $("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function (a, b) {
            var c = $(b);
            c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
        })
    }

    String.prototype.getDecimals || (String.prototype.getDecimals = function () {
        var a = this,
            b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
    }), $(document).ready(function () {
        wcqib_refresh_quantity_increments()
    }), $(document).on("updated_wc_div", function () {
        wcqib_refresh_quantity_increments()
    }), $(document).on("click", ".plus, .minus", function () {
        var a = $(this).closest(".quantity").find(".qty"),
            b = parseFloat(a.val()),
            c = parseFloat(a.attr("max")),
            d = parseFloat(a.attr("min")),
            e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), $(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
    });
});