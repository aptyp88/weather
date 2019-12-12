/**
 * init birthday picker register page
 */
$(document).ready(function () {
    $("#birth-piker").birthdayPicker({
        maxAge: 100,
        minAge: 10,
        dateFormat: "littleEndian",
        monthFormat: "number",
        placeholder: true,
        defaultDate: false,
        sizeClass: "form-control px-0",
        fieldSetClass: 'd-flex justify-content-between',
        selectWrapperClass:'col-4'
    });
});