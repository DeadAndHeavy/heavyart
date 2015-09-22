// Jquery with no conflict
jQuery(document).ready(function($) {
	
	//##########################################
	// Superfish
	//##########################################

	$("ul.sf-menu").superfish({
        animation: {height:'show'},   // slide-down effect without fade-in
        delay:     200 ,              // 1.2 second delay on mouseout
        autoArrows:  false,
        speed: 200
    });

    //##########################################
	// HOME SLIDER
	//##########################################

    $('.home-slider').flexslider({
    	animation: "fade",
    	controlNav: false,
    	keyboardNav: true
    });

    //##########################################
	// PROJECT SLIDER
	//##########################################

    $('.project-slider').flexslider({
    	animation: "fade",
    	controlNav: true,
    	directionNav: false,
    	keyboardNav: true
    });

	//##########################################
	// Top Widget
	//##########################################

	var topContainer = $("#top-widget");
	var topTrigger = $("#top-open");

	topTrigger.click(function(){
		topContainer.animate({
			height: 'toggle'
		});

		if( topTrigger.hasClass('tab-closed')){
			topTrigger.removeClass('tab-closed');
		}else{
			topTrigger.addClass('tab-closed');
		}

		return false;

	});

	//##########################################
	// Tool tips
	//##########################################


	$('.poshytip').poshytip({
    	className: 'tip-twitter',
		showTimeout: 1,
		alignTo: 'target',
		alignX: 'center',
		offsetY: 5,
		allowTipHover: false
    });



    $('.form-poshytip').poshytip({
		className: 'tip-twitter',
		showOn: 'focus',
		alignTo: 'target',
		alignX: 'right',
		alignY: 'center',
		offsetX: 5
	});


	//##########################################
	// PrettyPhoto
	//##########################################

	$('a[data-rel]').each(function() {
	    $(this).attr('rel', $(this).data('rel'));
	});

	$("a[rel^='prettyPhoto']").prettyPhoto({
        social_tools: false,
        callback: function(){
            history.pushState("", document.title, window.location.pathname);
        }
    });
	

	//##########################################
	// Create Combo Navi
	//##########################################

	// Create the dropdown base
	$("<select id='comboNav' />").appendTo("#combo-holder");

	// Create default option "Go to..."
	$("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Navigation"
	}).appendTo("#combo-holder select");

	// Populate dropdown with menu items
	$("#nav a").each(function() {
		var el = $(this);
		var label = $(this).parent().parent().attr('id');
		var sub = (label == 'nav') ? '' : '- ';

		$("<option />", {
		 "value"   : el.attr("href"),
		 "text"    :  sub + el.text()
		}).appendTo("#combo-holder select");
	});

	//##########################################
	// Combo Navigation action
	//##########################################

	$("#comboNav").change(function() {
	  location = this.options[this.selectedIndex].value;
	});

    // validate signup form on keyup and submit
    $("#regForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#reg_password"
            },
            game_class: {
                required: true
            },
            faction: {
                required: true
            },
            race: {
                required: true
            },
            gender: {
                required: true
            }
        },
        messages: {
            username: {
                required: "Укажите никнейм",
                minlength: "Не менее 2-х символов"
            },
            password: {
                required: "Укажите пароль",
                minlength: "Не менее 6-х символов"
            },
            password_confirmation: {
                required: "Повторно укажите пароль",
                minlength: "Не менее 6-х символов",
                equalTo: "А пароли-то не совпадают"
            },
            game_class: {
                required: "Без класса никак нельзя)"
            },
            faction: {
                required: "Без фракции никак нельзя)"
            },
            race: {
                required: "Без рассы никак нельзя)"
            },
            gender: {
                required: "Пол бы тоже не помешало указать)"
            }
        }
    });

    // validate comics adding form on keyup and submit
    $("#addComicsForm").validate({
        rules: {
            comics_name: {
                required: true,
                maxlength: 80
            },
            comics_description: {
                required: true
            }
        },
        messages: {
            comics_name: {
                required: "Укажите название комикса",
                maxlength: "Не более 80 символов"
            },
            comics_description: {
                required: "Укажите описание комикса"
            }
        }
    });

    // validate auth form on keyup and submit
    $("#authForm").validate({
        errorPlacement: function(error,element) {
            return true;
        },
        rules: {
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            username: {
                required: "Укажите никнейм",
                minlength: "Не менее 2-х символов"
            },
            password: {
                required: "Укажите пароль",
                minlength: "Не менее 6-х символов"
            }
        }
    });

    $("select option[value='']").prop("selected", true);

    $("#faction_selector").on("change", function() {
        var faction_id = $(this).val();
        var race_container = "#race_selector";
        $(race_container + " option:selected").prop("selected", false);
        $(race_container + " option[value='']").prop("selected", true);

        $(race_container).prop("disabled", false );
        $(race_container + " option[data-faction-id!=" + faction_id + "]").hide();
        $(race_container + " option[data-faction-id=" + faction_id + "]").show();
        $(race_container + " option[data-faction-id=0]").show();
    });

    $("#comment_area").val('');

    $('.send-comment-btn').click(function(e){
        e.preventDefault();
        comment_area = $("#comment_area");
        if (comment_area.hasClass('error')) {
            comment_area.removeClass('error');
        }

        if (comment_area.val() == '') {
            comment_area.addClass('error');
            return false;
        }
        comment_area.prop("disabled", true);
        $(".comment_loading").show();
        $.ajax({
            url: 'comment',
            type: "post",
            data: {
                'comment_text': $('textarea[name=comment_text]').val(),
                '_token': $('input[name=_token]').val(),
                'comics_id': $('input[name=comics_id]').val()
            },
            success: function(data){
                if (data.success) {
                    $("#comments-wrap").html(data.html);
                    comment_area.val('').prop("disabled", false);
                    $(".comment_loading").hide();
                    $(".meta .comments b").html(data.comments_count);
                }
            }
        });
    });

    $('.comics-like-button').click(function(e){
        e.preventDefault();
        $(".like_loader").show();
        $(this).hide();
        comics_id = $(this).data('comics-id');
        token = $(this).data('token');

        $.ajax({
            url: 'like',
            type: "post",
            data: {
                'comics_id': comics_id,
                '_token': token
            },
            success: function(data){
                if (data.success) {
                    $(".vote-block").empty();
                    $(".vote-block").html(data.html);
                    $(".meta .likes b").html(data.likes_count);
                }
            }
        });
    });

    $('.rating-vote-button').click(function(e){
        $voteBlock = $(this).parent();
        rating = parseInt($(this).parent().find(".value b").html(), 10)+1;

        if (rating > 0) {
            $voteBlock.find(".value b").addClass('rating_state_good');
            rating = '+' + rating;
        } else if (rating < 0) {
            $voteBlock.find(".value b").addClass('rating_state_bad');
        } else {
            $voteBlock.find(".value b").removeClass('rating_state_good');
            $voteBlock.find(".value b").removeClass('rating_state_bad');
        }

        $voteBlock.find(".value b").html(rating);

        $voteBlock.find('.rating-vote-button').remove();
        $voteBlock.find('.rating-unvote-button').remove();
        task_id = $voteBlock.data('task-id');
        token = $voteBlock.data('token');

        $.ajax({
            url: 'task/vote',
            type: "post",
            data: {
                'task_id': task_id,
                '_token': token
            }
        });
    });

    $('.rating-unvote-button').click(function(e){
        $voteBlock = $(this).parent();
        rating = parseInt($(this).parent().find(".value b").html(), 10)-1;

        if (rating > 0) {
            $voteBlock.find(".value b").addClass('rating_state_good');
            rating = '+' + rating;
        } else if (rating < 0) {
            $voteBlock.find(".value b").addClass('rating_state_bad');
        } else {
            $voteBlock.find(".value b").removeClass('rating_state_good');
            $voteBlock.find(".value b").removeClass('rating_state_bad');
        }

        $voteBlock.find(".value b").html(rating);

        $voteBlock.find('.rating-vote-button').remove();
        $voteBlock.find('.rating-unvote-button').remove();
        task_id = $voteBlock.data('task-id');
        token = $voteBlock.data('token');

        $.ajax({
            url: 'task/unvote',
            type: "post",
            data: {
                'task_id': task_id,
                '_token': token
            }
        });
    });

    $('.send-task-btn').click(function(e){
        e.preventDefault();
        task_area = $("#task_area");
        if (task_area.hasClass('error')) {
            task_area.removeClass('error');
        }

        if (task_area.val() == '') {
            task_area.addClass('error');
            return false;
        }
        task_area.prop("disabled", true);
        $(".comment_loading").show();
        $.ajax({
            url: 'task/add-task',
            type: "post",
            data: {
                'task_text': $('textarea[name=task_text]').val(),
                '_token': $('input[name=_token]').val()
            },
            success: function(data){
                if (data.success) {
                    $("#tasks-wrap").html(data.html);
                    task_area.val('').prop("disabled", false);
                    $(".comment_loading").hide();
                }
            }
        });
    });

    $('.send-task-comment-btn').click(function(e){
        e.preventDefault();
        main_block = $(this).parents(".task-comment-block");
        comment_area = main_block.find(".task_comment_area");
        if (comment_area.hasClass('error')) {
            comment_area.removeClass('error');
        }

        if (comment_area.val() == '') {
            comment_area.addClass('error');
            return false;
        }
        comment_area.prop("disabled", true);
        main_block.find(".task_comment_loading").show();
        $.ajax({
            url: 'task/comment',
            type: "post",
            data: {
                'comment_text': comment_area.val(),
                '_token': main_block.find('input[name=_token]').val(),
                'task_id': main_block.find('input[name=task_id]').val()
            },
            success: function(data){
                if (data.success) {
                    main_block.find(".comments-wrap").html(data.html);
                    comment_area.val('').prop("disabled", false);
                    main_block.find(".task_comment_loading").hide();
                    //$(".meta .comments b").html(data.comments_count);
                }
            }
        });
    });

    $(".alert .close").click(function(){
        $(this).parent().remove();
    });

    $(".taskCommentButton").on("click", function(){
        $(this).parents(".comment").find(".task-comment-block").toggle();
    });

    $(".forum_answer").click(function(){
        parent = $(this).parents(".forum-post-row");
        name = parent.find(".author_info strong").text();
        $("#quick-reply").find("textarea").text(name + ', ').focus();
    });


//close
});

