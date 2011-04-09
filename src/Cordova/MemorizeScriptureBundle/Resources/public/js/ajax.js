/* this is ajax code to enable fire up actions to modify elements on User, Session, SessionVerse entities  */
$(document).ready(function() {
   // do stuff when DOM is ready


    $(".ajax_link").click(function(e) {

        // stop normal click link
        e.preventDefault();

        // builds the url
        var url = $(this).attr('href');

        // hard coded for now
        //url = "tracker/get/"+id+".json";

        //path('route_name', {slug: 'myslug', id:12})

        // fetches the resource now changing ajax1
        $.get(url, function(obj) {
            $('p.post_body').prepend(obj.Recitedyesno);
        });
        //return false;
    });

 });
