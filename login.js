var updateErrorMessage = function(message) {
    var $errors = $('.errors');

    if (0 === $errors.length) {
        $errors = $('<p class="errors"></p>');
        $('legend').after($errors);
    }
    $errors.text(message);
};

$('#login-form').on('submit', function(e) {
    e.preventDefault();

    $.ajax('authenticate.php', {
        dataType: 'json',
        type: 'POST',
        data: $(this).serialize(),
        beforeSend: function() {
            $('#login').attr('disabled', true).val('Processing...');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            updateErrorMessage('Somethig went wrong, please try again in a few minutes...');
            $('#login').removeAttr('disabled').val('Login');
        },
        success: function(response) {
            if (response.error) {
                updateErrorMessage(response.error);
                $('#login').removeAttr('disabled').val('Login');
            }

            if (response.success) {
                window.location.href = 'home.html';
            }
        }
    });
});
