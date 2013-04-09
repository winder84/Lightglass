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