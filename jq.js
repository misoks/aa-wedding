$('button#ourstory').click(function() {
   //optionally remove the 500 (which is time in milliseconds) of the
   //scrolling animation to remove the animation and make it instant
   $.scrollTo($('div#1'), 500);
});