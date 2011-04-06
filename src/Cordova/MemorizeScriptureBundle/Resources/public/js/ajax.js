/* this is ajax code to enable fire up actions to modify elements on User, Session, SessionVerse entities  */
$(document).ready(function() {
   // do stuff when DOM is ready


    $("#ajax_link").click(function(e) {
        e.preventDefault();
        var $url = $(this).attr('href');
        $url = "tracker";

        $.get($url, function(data) {
            $('p.post_body').html(data);
        });
    });

 });
