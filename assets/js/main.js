// Extend jQuery so jQuery.postProcess() calls our hooks.
(function( $ ) {
  $.fn.postProcess = function() {
 	// MathJax it (and all children elements, since MathJax sucks).
	this.find("*").each( function () {
		MathJax.Hub.Queue(["Typeset",MathJax.Hub, $(this).get(0)]);
	});
	// Pretty print the date.
	this.find(".timeago").timeago();
    this.find("img").each(function() {
        // Let's put a caption if there is one
        if($(this).attr("title")) {
            $(this).wrap('<figure class="image"></figure>')
                .after('<figcaption>'+$(this).attr("title")+'</figcaption>');
        }
    });
  };
})( jQuery );

$(document).ready(function () {
    // TODO(awreece) Do this for comments too? ?>
    $(".markdown pre").addClass("prettyprint");
    prettyPrint();
    $(".markdown").postProcess();
});
