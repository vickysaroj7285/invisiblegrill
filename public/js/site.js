/* ------------------------------------------------------------------
   InvisibleGrill — site.js
   Hero slider + AJAX contact form + mobile menu (jQuery)
------------------------------------------------------------------- */
(function ($) {
    'use strict';

    $(function () {

        /* ----------  HERO SLIDER  ---------- */
        var $slides    = $('.slide-layer');
        var $dots      = $('.slide-dot');
        var $counter   = $('#slide-counter');
        var $slideText = $('#slide-text');
        var $kicker    = $('#slide-kicker');
        var $title     = $('#slide-title');
        var $sub       = $('#slide-sub');
        var total      = $slides.length;
        var active     = 0;
        var autoTimer  = null;

        function setActive(idx) {
            active = ((idx % total) + total) % total;

            $slides.each(function (i) {
                var $s = $(this);
                $s.toggleClass('is-active', i === active);
                $s.attr('aria-hidden', i === active ? 'false' : 'true');
            });

            // Update text content from active slide's data attrs
            var $current = $slides.eq(active);
            $kicker.text($current.attr('data-kicker') || '');
            $title.text($current.attr('data-title') || '');
            $sub.text($current.attr('data-sub') || '');

            // Re-trigger fade animation
            $slideText.removeClass('animate-fade-in');
            void $slideText[0].offsetWidth; // force reflow
            $slideText.addClass('animate-fade-in');

            $dots.each(function (i) {
                var $d = $(this);
                if (i === active) {
                    $d.removeClass('w-5 bg-[#1c1c1a]/30').addClass('w-10 bg-[#2e3438]');
                } else {
                    $d.removeClass('w-10 bg-[#2e3438]').addClass('w-5 bg-[#1c1c1a]/30');
                }
            });

            if ($counter.length) {
                $counter.text('0' + (active + 1) + ' / 0' + total);
            }
        }

        function startAuto() {
            stopAuto();
            autoTimer = setInterval(function () { setActive(active + 1); }, 5000);
        }
        function stopAuto() {
            if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
        }

        if (total > 0) {
            setActive(0);
            startAuto();

            $dots.on('click', function () {
                var idx = parseInt($(this).attr('data-idx'), 10) || 0;
                setActive(idx);
                startAuto();
            });

            // Pause on tab hidden
            $(document).on('visibilitychange', function () {
                if (document.hidden) { stopAuto(); } else { startAuto(); }
            });
        }


        /* ----------  MOBILE MENU  ---------- */
        $('#menu-toggle').on('click', function () {
            $('#mobile-menu').toggleClass('is-open');
        });

        // close mobile menu when an anchor link inside it is clicked
        $('#mobile-menu a').on('click', function () {
            $('#mobile-menu').removeClass('is-open');
        });


        /* ----------  CONTACT FORM (AJAX)  ---------- */
        var $form     = $('#contact-form');
        var $feedback = $('#form-feedback');
        var $submit   = $('#contact-submit');
        var originalBtnText = $submit.text();

        $form.on('submit', function (e) {
            e.preventDefault();

            // Reset previous errors
            $form.find('.field-error').removeClass('is-visible').text('');
            $form.find('input, textarea').removeClass('has-error');
            $feedback.removeClass('is-success is-error').text('');

            $submit.prop('disabled', true).text($submit.data('submitting') || 'Submitting…');

            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                dataType: 'json',
                data: $form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .done(function (res) {
                $feedback.addClass('is-success').text(res.message || 'Thank you!');
                $form[0].reset();
            })
            .fail(function (xhr) {
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                    var errs = xhr.responseJSON.errors;
                    $.each(errs, function (field, messages) {
                        var $input = $form.find('[name="' + field + '"]');
                        $input.addClass('has-error');
                        $input.siblings('.field-error')
                            .text(messages[0])
                            .addClass('is-visible');
                    });
                } else {
                    $feedback.addClass('is-error').text($form.data('error') || 'Something went wrong.');
                }
            })
            .always(function () {
                $submit.prop('disabled', false).text(originalBtnText);
            });
        });


        /* ----------  LUCIDE ICON RENDER  ---------- */
        if (window.lucide && typeof window.lucide.createIcons === 'function') {
            window.lucide.createIcons();
        }


        /* ----------  YEAR IN FOOTER  ---------- */
        $('#current-year').text(new Date().getFullYear());

    });

})(jQuery);
