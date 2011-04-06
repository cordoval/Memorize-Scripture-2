/* this is ajax code to enable fire up actions to modify elements on User, Session, SessionVerse entities  */
$(document).ready(function() {
   // do stuff when DOM is ready


    $("#ajax_link").click(function(e) {

        // stop normal click link
        e.preventDefault();

        // builds the url
        var $url = $(this).attr('href');

        // hard coded now
        $url = "tracker";

        // fetches the resource
        $.get($url, function(data) {
            $('p.post_body').html(data);
        });
        
    });

 });
