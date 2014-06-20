/**
*   Header
*
*/

function setMenuAjaxFlow() {
    $('#top-bar-menu a.link-ajax').each(function(){
        $(this).bind('click', function(evt){
            evt.preventDefault();
            page = $(this).attr("href")
            loadPage(page);
        });
    });

}

function setMenuActiveItem(page) {
    $('#main-menu li, #main-menu- ul').each(function(){
        $(this).removeClass('active');
    });

    $('#main-menu > ul > li').each(function(){
        $(this).removeClass('active');
    });

    switch (page) {
        case 'search' :
            $('#menu-search').addClass('active');
            break;

        case 'list' :
            $('#menu-top-places-abidjan').addClass('active').parent().parent().addClass('active');
            break;
    }
}

function generalCallback() {

    setMenuAjaxFlow();
    loadPage('search');
}

/**
*   Ajax Flow
*
*/

function setContentAjaxFlow() {
    $('#content a.link-ajax').each(function(){
        $(this).bind('click', function(evt){
            evt.preventDefault();
            page = evt.delegateTarget.attributes[1].nodeValue;
            loadPage(page);
        });
    });
}

function loadPage(page) {

    $('#content').load('./handler/' + page + '.php',
        function(response) {
            setContentAjaxFlow();
            window[page + 'Callback']();
        }
    );

}

/**
*   Forms
*
*/

function formHasErrors($form) {
    return $form.children().hasClass('.has-error').length > 0 ? true : false;
}

function resetFormErrors($form) {
    $form.children().removeClass('has-error');
    $form.find('.text-danger').remove();
}

function addFormError($el, type) {
    var str = '> '
    ,   $msg = $('<span class="text-danger">');

    switch (type) {
        case 'required':
            str += "This field is required";
            break;
    }

    $msg.html(str);
    $el.parent().children('label').eq(0).append($msg);
    $el.parent().addClass('has-error');
}

/**
*   Google Maps
*
*/

function setGoogleMap() {
    var map
    ,   longitude = $('#map-canvas').data('longitude')
    ,   latitude  = $('#map-canvas').data('latitude');

    function initialize() {
        var mapOptions = {
        zoom: 8,
        center: new google.maps.LatLng(latitude, longitude)
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}

/**
*   Search
*
*/
function searchCallback() {

    setAddEmplacementForm();
}

function setAddEmplacementForm() {
    var $form = $('#form-create-place')
    ,   $submit = $('#form-create-place-submit')
    ,   $continent = $('#continent')
    ,   $country = $('#country-modal')
    ,   $town = $('#town-modal')
		,   $name = $('#name')
		,   $address = $('#address')
		,   $longitude = $('#longitude')
		,   $latitude = $('#latitude')
    ,   $description = $('#description');

    $submit.bind('click', function(evt){
        evt.preventDefault();
        $form.submit();
        return false;
    });

    $form.bind('submit', function(){
        resetFormErrors($form);
				
				var error = false;
				
        if ($continent.val() === '') {
            addFormError($continent, 'required');
						error = true;
        }
        if ($country.val() === '') {
            addFormError($country, 'required');
						error = true;
        }
        if ($town.val() === '') {
            addFormError($town, 'required');
						error = true;
        }
				if ($name.val() === '') {
            addFormError($name, 'required');
						error = true;
        }
				if ($address.val() === '') {
            addFormError($address, 'required');
						error = true;
        }
				if ($latitude.val() === '') {
            addFormError($latitude, 'required');
						error = true;
        }
				if ($longitude.val() === '') {
            addFormError($longitude, 'required');
						error = true;
        }
        if ($description.val() === '') {
            addFormError($description, 'required');
						error = true;
        }

        if (error === false) {
					$submit.addClass('disabled');
					$.post('./handler/addplace.php',
						$('#form-create-place').serialize()
					, 
					function(data){
						$submit.removeClass('disabled');
						if(data == '1'){
							$('#modal-add-emplacement').modal('hide');
						}
					}, "text");
					return false;
				}else{
					$submit.removeClass('disabled');
				}

        return false;
    });
}

/**
*   List
*
*/

function listCallback() {

    setWriteReviewForm();

    setGoogleMap();
}

function setWriteReviewForm() {
    var $form = $('#form-create-review')
    ,   $submit = $('#form-create-review-submit')
    ,   $place_id = $("#place_id")
    ,   $name = $('#name')
    ,   $note = $('#note')
    ,   $review = $('#review');

    $submit.bind('click', function(evt){
        evt.preventDefault();
        $form.submit();
        return false;
    });

    $form.bind('submit', function(){
        resetFormErrors($form);

        if ($name.val() === '') {
            addFormError($name, 'required');
        }
        if ($note.val() === '') {
            addFormError($note, 'required');
        }
        if ($review.val() === '') {
            addFormError($review, 'required');
        }

        if (formHasErrors($form)) {
            return false;
        }

        $submit.addClass('disabled');

        jQuery.post(
            'handler/list.php',
            {
                "addReview": true,
                "place_id": $place_id.val(),
                "name": $name.val(),
                "note": $note.val(),
                "review": $review.val()
            },
            function(data) {
                $("#modal-write-review").modal("hide");
            }
        )

        return false;
    });
}

/**
   Search page
**/

function loadCountries(id){
	$('#countries-div select').attr('disabled', 'disabled');
	$('#towns-div select').attr('disabled', 'disabled');
	$('#towns-div select').html('<option>&mdash;&nbsp;&nbsp;Select a town&nbsp;&nbsp;&mdash;</option>');
	$('#countries-div select').load('./handler/countries.php?continent='+id,
		function(response) {
				//setContentAjaxFlow();
				$('#countries-div select').removeAttr('disabled');
		}
	);
	
	$('#places').load('./handler/places.php?continent='+id,
		function(response) {
				//setContentAjaxFlow();
				$('#countries-div select').removeAttr('disabled');
		}
	);
}

function loadTowns(id){
	$('#towns-div select').attr('disabled', 'disabled');
	$('#towns-div select').load('./handler/towns.php?country='+id,
        function(response) {
            //setContentAjaxFlow();
            $('#towns-div select').removeAttr('disabled');
        }
    );
	$('#places').load('./handler/places.php?country_id='+id,
		function(response) {
				//setContentAjaxFlow();
				$('#countries-div select').removeAttr('disabled');
		}
	);
}

function loadPlaces(id){
	$('#places').load('./handler/places.php?town_id='+id,
		function(response) {
				//setContentAjaxFlow();
				$('#countries-div select').removeAttr('disabled');
		}
	);
}

/**
		modal load
**/

function modalLoadCountries(id){
	$('#country-modal').attr('disabled', 'disabled');
	$('#country-modal').load('./handler/countries.php?continent='+id,
		function(response) {
				//setContentAjaxFlow();
				$('#country-modal').removeAttr('disabled');
		}
	);
}

function modalLoadTowns(id){
	$('#town-modal').attr('disabled', 'disabled');
	$('#town-modal').load('./handler/towns.php?country='+id,
        function(response) {
            //setContentAjaxFlow();
            $('#town-modal').removeAttr('disabled');
        }
    );
}