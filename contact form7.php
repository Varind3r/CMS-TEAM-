Multifile:

https://github.com/WPPlugins/multifile-upload-field-for-contact-form-7/blob/master/multifile-for-contact-form-7.php


https://codewp.ai/blog/contact-form-7-developers-guide/


Multiple Submit Validations:

<script type="text/javascript">
    var disableSubmit = false;
    jQuery('input.wpcf7-submit[type="submit"]').click(function () {
        jQuery(':input[type="submit"]').attr('value', "Sending...")
        if (disableSubmit == true) {
            return false;
        }
        disableSubmit = true;
        return true;
    })

    var wpcf7Elm = document.querySelector('.wpcf7');
    wpcf7Elm.addEventListener('wpcf7submit', function (event) {
        jQuery(':input[type="submit"]').attr('value', "Send")
        disableSubmit = false;
    }, false);
</script>

Range Limit:

[tel* tel-3 id:phoneNumber class:form-control
minlength:10
maxlength:13
placeholder "Enter phone number"]

Space issue:

<script>
    $(document).ready(function () {
        // Select both textarea and text input fields
        $('.wpcf7-textarea, .wpcf7-text').on('input', function () {
            let value = $(this).val();

            // Block the first whitespace character if the input starts with it
            if (value.startsWith(' ')) {
                value = value.substring(1); // Remove the first character (the whitespace)
            }

            // Replace occurrences of three or more spaces with two spaces
            value = value.replace(/ {3,}/g, '  ');

            // Update the field value
            $(this).val(value);

            // Check if input has at least one non-whitespace character
            if (value.trim().length === 0) {
                $(this).addClass('error'); // Add a class to style the input (optional)
            } else {
                $(this).removeClass('error'); // Remove the error class if valid
            }
        });
    });
</script>