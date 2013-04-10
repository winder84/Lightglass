/**
 * Created with JetBrains PhpStorm.
 * User: rustam
 * Date: 20.03.13
 * Time: 9:48
 * To change this template use File | Settings | File Templates.
 */

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