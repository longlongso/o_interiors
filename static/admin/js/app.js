//globe reset
var eg_confirm = window.eg_confirm = function(m, f, y, n) {
    var time = new Date().getTime();
    var id = 'confirm_' + time;
    m = m ? m : 'confirm ?';
    y = y ? y : '';
    n = n ? n : '';
    var h = '<div id="' + id + '" class="confirm_modal"><div class="confirm_body"><div class="confirm_title"></div><div class="confirm_content">' + m + '</div> <div class="confirm_footer button-group"><button class="button fa fa-check-circle-o confirm_true" type="button"> ' + y + '</button><button class="alert button fa fa-ban confirm_false" type="button"> ' + n + '</button></div> <button class="close-button confirm_false" type="button"><span aria-hidden="true">&times;</span></button></div></div>';

    $('body').append(h);
    var top = $(window).height() / 2 - $('#' + id + ' .confirm_body').height() * 2;
    $('#' + id + ' .confirm_body').css('margin-top', top > 0 ? top : 100);

    $('#' + id + ' .confirm_true').click(function() {
        $('#' + id).remove();
        if (f)
            return f(true);
    });
    $('.confirm_modal .confirm_false').click(function() {
        $('#' + id).remove();
        if (f)
            return f(false);
    });
}

$(function() {
    // ini foundation
    $(document).foundation();

    $('body').on('click', '.close-button', function() {
        $(this).parent('.callout, .success, .alert').slideUp();
    });

    $(document).ajaxStart(function() {
            $("button:submit").addClass("disabled").attr("disabled", true);
        })
        .ajaxStop(function() {
            $("button:submit").removeClass("disabled").attr("disabled", false);
        });

    $('body').on('click, focus', '.has-error, .has-error input', function() {
        if ($(this).hasClass('has-error')) {
            $(this).removeClass('has-error');
        } else {
            $(this).parent().removeClass('has-error');
        }
        var name = $(this).find('input').attr('name') ? $(this).find('input').attr('name') : ($(this).attr('name') ? $(this).attr('name') : '');
        $('.error_tips[for="' + name + '"]').slideUp(function() {
            $(this).remove();
        });
    });
    $('body').on('keyup', '.has-error, .has-error input', function() {
        if ($(this).hasClass('has-error')) {
            $(this).removeClass('has-error');
        } else {
            $(this).parent().removeClass('has-error');
        }
        var name = $(this).find('input').attr('name') ? $(this).find('input').attr('name') : ($(this).attr('name') ? $(this).attr('name') : '');
        $('.error_tips[for="' + name + '"]').slideUp(function() {
            $(this).remove();
        });
    });
    $('.logout').click(function() {

        self = $(this);
        $.get(self.attr('href'), function(res) {
            window.success(res.msg);
            setTimeout(function() {
                location.href = res.url;
            }, 500);
        });
        return false;
    });

    //desktop toggle Menu 
    $('body').on('click', '#toggleMenu', function() {
        if ($('.off-canvas-content').hasClass('is_expanded')) {
            $('.off-canvas-content').removeClass('is_expanded');
            $('#largeMenu').foundation('destroy');
            new Foundation.AccordionMenu($('#largeMenu .menu'));
            $(this).removeClass('fa-dedent').addClass('fa-indent');
            setCookie('lMenuTag', '');
        } else {
            $('.off-canvas-content').addClass('is_expanded');
            new Foundation.AccordionMenu($('#largeMenu'));
            $(this).removeClass('fa-indent').addClass('fa-dedent');
            setCookie('lMenuTag', 1);
        }
    });

    if (getCookie('lMenuTag') == 1) {
        $('.off-canvas-content').addClass('is_expanded');
        new Foundation.AccordionMenu($('#largeMenu'));
        // new Foundation.AccordionMenu($('#largeMenu .menu'));
        $('#toggleMenu').removeClass('fa-indent').addClass('fa-dedent');
    }
    /*else{
    		$('.off-canvas-content').removeClass('is_expanded');
    		new Foundation.AccordionMenu($('#largeMenu'));
    		new Foundation.AccordionMenu($('#largeMenu .menu'));
    		$('#toggleMenu').removeClass('fa-dedent').addClass('fa-indent');
    	}*/

    //if (Foundation.MediaQuery.atLeast('medium')) {
    // True if medium or large
    // False if small
    //}


    //to top 
    $('.off-canvas-content').append('<a id="to_top" style="display: none;position: fixed;width: 45px;height: 45px;overflow: hidden;right: 0;bottom: 30px;background: #1EBADF;color: #fff;line-height: 45px;text-align: center;font-size: 45px;border-radius: 50%;" onClick="$(\'.off-canvas-content\').animate({ scrollTop: 0 }, \'fast\');"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>');

    var d_top = $('.off-canvas-content').scrollTop();

    $('.off-canvas-content').scroll(function() {
        var d_top = $(this).scrollTop();
        to_top_show(d_top);
    });

    function to_top_show(d_top) {
        if (d_top > 50) {
            $('#to_top').show();
        } else {
            $('#to_top').hide();
        }
    }
    to_top_show(d_top);
});