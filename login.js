var $errors = $('.errors');

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
            $errors.text('Somethig went wrong, please try again in a few minutes...');
            $('#login').removeAttr('disabled').val('Login');
        },
        success: function(response) {
            if (response.error) {
                $errors.text(response.error);
                $('#login').removeAttr('disabled').val('Login');
            }

            if (response.success) {
                window.location.href = 'home.html';
            }
        }
    });
});
