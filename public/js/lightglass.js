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
	$('.current').removeClass('current');
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