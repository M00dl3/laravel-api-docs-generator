
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}


$('body').scrollspy({ target: '#navbar-example3' });
$( window ).scroll(function() {
    $(".top-level").next().css("display", "none");
    $(".top-level.active").next().css("display", "block");
});
$( document ).ready(function() {
    $(".top-level").next().css("display", "none");
    $(".top-level.active").next().css("display", "block");
});