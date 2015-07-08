function Validate() {
    // first we clear any left over error messages
    $('#error p').remove();

    // store the error div, to save typing
    var error = $('#error');

    // we start by assuming everything is correct
    // if it later turns out not to be, we just set
    // this to false
    var correct = true;

    // we can't tell much about valid names, so we
    // just make sure the field isn't empty
    if ($('#item_title').val() == '') {
        error.append('<p>No Item Title Provided</p>');
        correct = false;
    }

    // ditto for last name
    if ($('#item_state').val() == '') {
        error.append('<p>Please Enter a valid State Name</p>');
        correct = false;
    }

    // zip codes we know have to be 5 digits, so check the length
    if ($('#item_city').val() == '') {
        error.append('<p>Please Enter your city</p>');
        correct = false;
    }
	if ($('#item_country').val() == '') {
        error.append('<p>Please Enter your Country</p>');
        correct = false;
    }


    if ($('#item_category').val() == '') {
        error.append('<p>Select and Item Category</p>');
        correct = false;
    }


    if ($('#item_price').val() == '') {
        error.append('<p>Select a price, 0 if free</p>');
        correct = false;
    }


    if ($('#item_description').val() == '') {
        error.append('<p>Write few lines about the item</p>');
        correct = false;
    }

    if ($('#item_quantity').val() == '') {
        error.append('<p>Quantity of donated items is required</p>');
        correct = false;
    }

    // if we haven't found an error, we hide the error message
    if (correct) {
        error.css('display', 'none');
        document.getElementById('add_item').submit();
    }
    // otherwise, we show the error
    else {
        error.css('display', 'block');
    }

    return false;
}



function ItemRequestValidate() {
    // first we clear any left over error messages
    $('#error p').remove();

    // store the error div, to save typing
    var error = $('#error');

    // we start by assuming everything is correct
    // if it later turns out not to be, we just set
    // this to false
    var correct = true;

    // we can't tell much about valid names, so we
    // just make sure the field isn't empty
    if ($('#item_title').val() == '') {
        error.append('<p>No Item Title Provided</p>');
        correct = false;
    }

    // ditto for last name
    if ($('#item_state').val() == '') {
        error.append('<p>Please Enter a valid State Name</p>');
        correct = false;
    }

    // zip codes we know have to be 5 digits, so check the length
    if ($('#item_city').val() == '') {
        error.append('<p>Please Enter your city</p>');
        correct = false;
    }

	if ($('#item_country').val() == '') {
        error.append('<p>Please Enter your country</p>');
        correct = false;
    }

    if ($('#item_category').val() == '') {
        error.append('<p>Select an Item Category</p>');
        correct = false;
    }



    if ($('#item_description').val() == '') {
        error.append('<p>Write few lines about the item</p>');
        correct = false;
    }

    // if we haven't found an error, we hide the error message
    if (correct) {
        error.css('display', 'none');
        document.getElementById('add_item_request').submit();
    }
    // otherwise, we show the error
    else {
        error.css('display', 'block');
    }

    return false;
}





function PersonValidate() {
    // first we clear any left over error messages
    $('#error p').remove();

    // store the error div, to save typing
    var error = $('#error');

    // we start by assuming everything is correct
    // if it later turns out not to be, we just set
    // this to false
    var correct = true;

    // we can't tell much about valid names, so we
    // just make sure the field isn't empty
    if ($('#person_title').val() == '') {
        error.append('<p>* Enter valid Name or title for the person request </p>');
        correct = false;
    }

    // ditto for last name
    if ($('#person_state').val() == '') {
        error.append('<p>* Please Enter a valid State Name</p>');
        correct = false;
    }

    // zip codes we know have to be 5 digits, so check the length
    if ($('#person_city').val() == '') {
        error.append('<p>* Please Enter your city</p>');
        correct = false;
    }

	if ($('#person_country').val() == '') {
        error.append('<p>* Please Enter your Country</p>');
        correct = false;
    }

    if ($('#person_category').val() == '') {
        error.append('<p>* Select and Item Category</p>');
        correct = false;
    }


    if ($('#person_description').val() == '') {
        error.append('<p>* Write few lines about the person and details where they can contact you</p>');
        correct = false;
    }
    // if we haven't found an error, we hide the error message
    if (correct) {
        error.css('display', 'none');
        document.getElementById('add_person').submit();
    }
    // otherwise, we show the error
    else {
        error.css('display', 'block');
    }

    return false;
}

function ContactValidate() {
    // first we clear any left over error messages
    $('#error p').remove();

    // store the error div, to save typing
    var error = $('#error');

    // we start by assuming everything is correct
    // if it later turns out not to be, we just set
    // this to false
    var correct = true;

    // we can't tell much about valid names, so we
    // just make sure the field isn't empty
    if ($('#name').val() == '') {
        error.append('<p>* Name is Required </p>');
        correct = false;
    }

    // ditto for last name
    if ($('#email').val() == '') {
        error.append('<p>* Email is required </p>');
        correct = false;
    }

    // zip codes we know have to be 5 digits, so check the length
    if ($('#subject').val() == '') {
        error.append('<p>* Please Enter a Valid Subject</p>');
        correct = false;
    }


    if ($('#message').val() == '') {
        error.append('<p>* Message cannot by Empty</p>');
        correct = false;
    }

    // if we haven't found an error, we hide the error message
    if (correct) {
        error.css('display', 'none');
        document.getElementById('contact').submit();
    }
    // otherwise, we show the error
    else {
        error.css('display', 'block');
    }

    return false;
}