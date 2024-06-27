function openTab(evt, tabName) {
    var i, tabContent, tabLinks;


    tabcontent = document.getElementsByClassName("tabContent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }


    tablinks = document.getElementsByClassName("tabLinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('defaultOpen').click();
});


/***
 * Validation function for Edit Package Form
 * Validation function for Edit Service Form
 * Validation function for Edit Package Form
 */
$(document).ready(function () {


    $('#editPackageForm').validate({
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        errorPlacement: function (error, element) {
            error.appendTo(element.next('.invalid-feedback'));
        },
        rules: {
            name: { required: true },
            price: { required: true, number: true },
            description: { required: true }
        },
        messages: {
            name: "Please select a package name.",
            price: {
                required: "Please enter a price.",
                number: "Please enter a valid number."
            },
            description: "Please enter a description."
        }
    });

    // Validate Edit Services Form
    $('#editServicesForm').validate({
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        errorPlacement: function (error, element) {
            error.appendTo(element.next('.invalid-feedback'));
        },
        rules: {
            header: { required: true },
            description: { required: true }
        },
        messages: {
            header: "Please enter a header.",
            description: "Please enter a description."
        }
    });

    // Validate Edit Content Form
    $('#editContentForm').validate({
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        errorPlacement: function (error, element) {
            error.appendTo(element.next('.invalid-feedback'));
        },
        rules: {
            header: { required: true },
            description: { required: true },
            image1: { accept: "image/*" },
            image2: { accept: "image/*" },
            who_we_are: { required: true },
            our_vision: { required: true },
            our_history: { required: true }
        },
        messages: {
            header: "Please enter a header.",
            description: "Please enter a description.",
            image1: { accept: "Please upload an image file." },
            image2: { accept: "Please upload an image file." },
            who_we_are: "Please enter 'Who We Are' content.",
            our_vision: "Please enter 'Our Vision' content.",
            our_history: "Please enter 'Our History' content."
        }
    });

});
