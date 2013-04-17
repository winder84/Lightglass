/**
 * Created with JetBrains PhpStorm.
 * User: rustam
 * Date: 20.03.13
 * Time: 9:48
 * To change this template use File | Settings | File Templates.
 */

var main_par_index = 1;

$(document).ready(function() {

});

function gal_show(id) {
	$('#gal_m_' + id).fadeIn(100);
}

function gal_hide(id) {
	$('#gal_m_' + id).fadeOut(100);
}

function tech_b(id) {
	$('#ins_text h1:visible').fadeOut(100, function() {
		$('#ins_text div:visible:first').fadeOut(100, function() {
			$('#tech_h1_'+id).fadeIn(100, function() {
				$('#tech_text_'+id).fadeIn(100)})})})
	$('.tech_menu_items').children('.current').removeClass('current');
	$('#t_b_'+id).attr('class','current');
}

function main_par_b(i) {
	$('#par_logo_'+main_par_index).slideUp(100);
	$('#par_id_'+main_par_index).slideUp(100);

	switch (i) {
		case 1:
			main_par_index--;
			break;
		case 2:
			main_par_index++;
			break;
	}

	if(main_par_index == 0) {
		main_par_index = 4
	} else {
		if(main_par_index == 5) {
			main_par_index = 1
		}
	};
	$('#par_logo_'+main_par_index).slideDown(100);
	$('#par_id_'+main_par_index).slideDown(100);

}

function question_form_show() {
    $('.question_form ul').show();
    $('.question_form').animate({height:200}, 200);
    $('.question_form div:first').animate({height:180}, 200).css({opacity:1},200);
    $('.question_arrow_up').show();
}


function question_form_hide() {
    $('.question_form').animate({height:0}, 200);
    $('.question_form div:first').animate({height:0}, 200).css({opacity:0},200);
    $('.question_arrow_up').hide();
    $('.question_form ul').hide();
}

function mail_submit() {
    $.post('mail_submit.php', {name: $('#mail_name').val(), email : $('#mail_email').val(), topic: $('#mail_topic').val(), text: $('#mail_text').val()})
        .done(function(data) {
            alert(data);
            question_form_hide();
        });
}