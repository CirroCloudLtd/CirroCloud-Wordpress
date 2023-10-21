
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        $('.image-link a').magnificPopup({type:'iframe'});


    })

})(jQuery);

