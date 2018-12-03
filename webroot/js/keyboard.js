// Add next/previous buttons
var addNav = function(base) {
    base.$el.addClass('current');
    $("body").css('padding-bottom', '250px'); // keep Donate Now button in view
    var inputs = $('input'),
        len = inputs.length - 1,
        indx = inputs.index(base.$el),
        topPadding = 50; // distance from top where the focused input is placed
    // make sure input is in view
    $(window).scrollTop(inputs.eq(indx).offset().top - topPadding);

    // see if nav is already set up
    if (base.$keyboard.find('.ui-keyboard-nav').length) {
        return;
    }

    // add nav window & buttons
    base.$keyboard.append('<div class="ui-keyboard-nav"><button class="prev ui-state-default ui-corner-all">prev</button><button class="next ui-state-default ui-corner-all">next</button></div>');

    base.$keyboard.find('.next').hover(function() {
        $(this).addClass('ui-state-hover');
    }, function() {
        $(this).removeClass('ui-state-hover');
    }).click(function() {
        var n = indx + 1;
        if (n >= len) {
            return;
        }
        base.close(true); // true = auto accept
        // set focus to next input
        inputs.eq(n).focus();
        // make sure input is in view
        $(window).scrollTop(inputs.eq(n).offset().top - topPadding);
    });

    base.$keyboard.find('.prev').hover(function() {
        $(this).addClass('ui-state-hover');
    }, function() {
        $(this).removeClass('ui-state-hover');
    }).click(function() {
        var n = indx - 1;
        if (n < 0) {
            return;
        }
        base.close(true); // true = auto accept
        // set focus to previous input
        inputs.eq(n).focus();
        // make sure input is in view
        $(window).scrollTop(inputs.eq(n).offset().top - topPadding);
    });

}; // end prev/next button code
$(document).ready(function() {
    // Keyboard Layouts
    $('.keyboard-normal').keyboard({
        layout: 'qwerty',
        autoAccept: 'true',
        usePreview: false,
        visible: function(e, keyboard, el) {
            addNav(keyboard);
        },
        beforeClose: function(e, keyboard, el, accepted) {
            $('input.current').removeClass('current');
            $("body").css('padding-bottom', '0px');
        }
    });

    $('.keyboard-zip').keyboard({
        layout: 'custom',
        autoAccept: 'true',
        maxLength: 5,
        customLayout: {
            'default': [
                '7 8 9',
                '4 5 6',
                '1 2 3',
                '0 {bksp}',
                '{accept}'
                ]
        },
        usePreview: false,
        visible: function(e, keyboard, el) {
            addNav(keyboard);
        },
        beforeClose: function(e, keyboard, el, accepted) {
            $('input.current').removeClass('current');
            $("body").css('padding-bottom', '0px');
        }
    });

    $('.keyboard-num').keyboard({
        layout: 'custom',
        autoAccept: 'true',
        customLayout: {
            'default': [
                '7 8 9',
                '4 5 6',
                '1 2 3',
                '0 {bksp}',
                '{accept}'
                ]
        },
        usePreview: false,
        visible: function(e, keyboard, el) {
            addNav(keyboard);
        },
        beforeClose: function(e, keyboard, el, accepted) {
            $('input.current').removeClass('current');
            $("body").css('padding-bottom', '0px');
        }
    });

    $('.keyboard-states').keyboard({
        layout: 'custom',
        customLayout: {
            'default': [
                'AL AK AZ AR CA CO CT DE FL GA',
                'HI ID IL IN IA KS KY LA ME MD',
                'MA MI MN MS MO MT NE NV NH NJ',
                'NM NY NC ND OH OK OR PA RI SC',
                'SD TN TX UT VT VA WA WV WI WY',
                '{accept}{clear}'
                ]
        },
        usePreview: false,
        visible: function(e, keyboard, el) {
            addNav(keyboard);
        },
        // prevent entering more than one state
        change: function(e, keyboard, el) {
            var v = keyboard.$el.val();
            if (v.length > 2) {
                keyboard.$el.val(v.slice(-2));
            }
        },
        beforeClose: function(e, keyboard, el, accepted) {
            $('input.current').removeClass('current');
            $("button.ui-keyboard-widekey").removeClass('state-button');
            $("body").css('padding-bottom', '0px');
        }
    });
});

function changeQty(obj) {
    $("input[name='"+$(obj).attr('data-priceName')+"']").val($(obj).val()*$(obj).attr('data-price'));
}

// for qty's incr/decr
function btnNum(obj){

    fieldName = $(obj).attr('data-field');
    priceName = $(obj).attr('data-priceName');
    type      = $(obj).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var priceInput = $("input[name='"+priceName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {

            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
                priceInput.val((currentVal - 1)*$(obj).attr('data-price')).change();
            }
            if(parseInt(input.val()) == input.attr('min')) {
                $(obj).attr('disabled', true);
            }
            // console.log($(obj).parent().find('.plus'));
            if(parseInt(input.val()) != input.attr('max')) {
                $(obj).parent().parent().find('.plus').attr('disabled', false);

            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
                priceInput.val((currentVal + 1)*$(obj).attr('data-price')).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(obj).attr('disabled', true);
            }

            if(parseInt(input.val()) != input.attr('min')) {
                $(obj).parent().parent().find('.minus').attr('disabled', false);
            }

        }
    } else {
        input.val(0);
    }

    var totalPoints = 0;
    $('.total').each(function(){
        totalPoints += parseInt($(this).val()); //<==== a catch  in here !! read below
    });
    $('#subTotal').html('P ' + parseFloat(totalPoints*0.88).toFixed(2));
    $('#tax').html('P ' + parseFloat(totalPoints*0.12).toFixed(2));
    $('#grandTotal').html('P ' + parseFloat(totalPoints).toFixed(2));
    $('#grandTotal2').html('P ' + parseFloat(totalPoints).toFixed(2));
    $('#grandTotal3').val(parseFloat(totalPoints).toFixed(2));
    $('#grandTotalInput').val(parseFloat(totalPoints).toFixed(2));
};
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {

    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }


});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
