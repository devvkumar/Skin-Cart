(function($) {

    // Cache DOM
    var $doc = $(document),
            $popupTrigger = $doc.find('.popop__trigger'),
            $popup = $doc.find('.popup'),
            $popupContainer = $doc.find('.popup__container'),
            $popupClose = $doc.find('.popup__close');
    
    
    // Custom functions
    function openPopup (evt) {
        $popup.addClass('popup--is-visible');
        $popupContainer.addClass('popup__container-is-lower');
        evt.preventDefault();
    }
    
    function closePopup (evt) {
        $popup.removeClass('popup--is-visible');
        $popupContainer.removeClass('popup__container-is-lower');
        evt.preventDefault();
    }
    
    
    // Bind events
    $popupTrigger.on('click', openPopup);
    
    $doc.on('keyup', function (evt) {
        // keyCode 27 is the "esc" key
        if ( evt.keyCode === 27 ) {
            closePopup();
        }
    });
    
    $popup.on('click', function (evt) {
    
        if ( $(evt.target).is($popupClose) || $(evt.target).is($popup) ) {
            closePopup(evt);
        }
    
        evt.preventDefault();
    
    });
    
    })(jQuery);