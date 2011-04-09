/* this is ajax code to enable fire up actions to modify elements on User, Session, SessionVerse entities  */
$(document).ready(function() {
   // do stuff when DOM is ready


    $(".ajax_link").click(function(e) {

        // stop normal click link
        e.preventDefault();

        // builds the url
        var url = $(this).attr('href');

        // fetches the resource
        $.get(url, function(obj) {
            if(obj.Recitedyesno === 'yes') {
                $('#lineverse-' + (obj.id-1) + ' .versetext').removeClass('notrecited').addClass('yesrecited');
                //$('.buttontoglex')
            } else {
                $('#lineverse-' + (obj.id-1) + ' .versetext').removeClass('yesrecited').addClass('notrecited');
            }

        });
    });

 });
