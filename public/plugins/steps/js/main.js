$(function () {
    var form = $("#profile_form");

    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });

    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 500,
        onStepChanging: function (event, currentIndex, newIndex) {
            /* console.log($('#wizard-p-' + currentIndex + ' >form')); */
            /*  if (newIndex >= 1) {
                 $('.actions ul').addClass('actions-next');
             } else {
                 $('.actions ul').removeClass('actions-next');
             }  */

            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                return false;
            }
            console.log(currentIndex, newIndex);
            if (currentIndex < newIndex) {
                $('.actions ul').addClass('actions-next');
                $('#finish_btn').css('display', 'block');
            } else {
                $('.actions ul').removeClass('actions-next');
                $('#finish_btn').css('display', 'none');
            }
            form = $('#wizard-p-' + currentIndex + ' >form');
            form.validate().settings.ignore = ":disabled,:hidden";

            return form.valid();
        },
        labels: {
            finish: "Continue",
            next: "Next",
            notyet: "None yet.  Continue",
            previous: "Back"
        }
    });
    // Custom Steps 
    $('.wizard > .steps li a').click(function () {
        $(this).parent().addClass('checked');
        $(this).parent().prevAll().addClass('checked');
        $(this).parent().nextAll().removeClass('checked');
    });
    // Custom Button Jquery Step
    $('.forward').click(function () {
        $("#wizard").steps('next');
    });
    $('.backward').click(function () {
        $("#wizard").steps('previous');
    });
    // Input Focus
    $('.form-holder').delegate("input", "focus", function () {
        $('.form-holder').removeClass("active");
        $(this).parent().addClass("active");
    });
});

