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
    window.currentStep = 0;
    window.profileWizard = $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 500,
        onStepChanging: function (event, currentIndex, newIndex) {
            console.log(event);
            console.log('current: ' + currentIndex);
            window.currentStep = newIndex;
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

            if (currentIndex < newIndex) {
                $('.actions ul').addClass('actions-next');
                /* $('#finish_btn').css('display', 'block'); */
            } else {
                $('.actions ul').removeClass('actions-next');
                /* $('#finish_btn').css('display', 'none'); */
            }

            $('html, body').animate({
                scrollTop: $('.page__title').offset().top
            }, 1000);

            form = $('#wizard-p-' + currentIndex + ' >form');
            form.validate().settings.ignore = ":disabled,:hidden";

            repeater = $('#wizard-p-' + currentIndex);
            items = $('#wizard-p-' + currentIndex).find(".items");
            var triggerAddBtn = false;
            if (items.length > 0) {
                var child = items.eq(items.length - 1);

                var row_inputs = $(child).find('input,select,textarea');
                console.log(row_inputs);
                var emptyFields = row_inputs.filter(function () {
                    return $(this).val() === "";
                }).length;

                console.log(emptyFields);

                if (emptyFields === 0) {

                    triggerAddBtn = true;
                } else {
                    if (emptyFields < row_inputs.length) {
                        window.finishTrigger = false;
                        toastr.error('input can not be empty');
                        return false;
                    } else {

                    }

                }

                /* row_inputs.each(function (index, el) {
                    if ($(el).attr('value') == '') {
                        toastr.error('input can not be empty');
                        return false;
                    } else {
                        return true;
                    }
                }); */
            } else {

            }
            nextCallback(triggerAddBtn, currentIndex);
            return form.valid();
        },
        labels: {
            finish: "Next",
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

