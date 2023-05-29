(function ($, Drupal) {
    Drupal.behaviors.studentForm = {
      attach: function (context, settings) {
        $('#edit-attendance', context).once('studentForm').on('change', function () {
          $(this).closest('form').submit();
        });
      }
    };
  })(jQuery, Drupal);
  