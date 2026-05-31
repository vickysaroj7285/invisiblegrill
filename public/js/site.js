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
        function openMenu() {
            $('#mobile-menu').addClass('is-open').attr('aria-hidden', 'false');
            $('#menu-backdrop').addClass('is-open');
            $('#menu-toggle').attr('aria-expanded', 'true');
            $('body').css('overflow', 'hidden');
        }
        function closeMenu() {
            $('#mobile-menu').removeClass('is-open').attr('aria-hidden', 'true');
            $('#menu-backdrop').removeClass('is-open');
            $('#menu-toggle').attr('aria-expanded', 'false');
            $('body').css('overflow', '');
        }

        $('#menu-toggle').on('click', openMenu);
        $('#menu-close').on('click', closeMenu);
        $('#menu-backdrop').on('click', closeMenu);

        // Close when a nav link inside drawer is clicked
        $('#mobile-menu a').on('click', closeMenu);

        // Close on Escape key
        $(document).on('keydown', function (e) {
            if (e.key === 'Escape') { closeMenu(); }
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


        /* ----------  PRODUCT CARD SLIDER  ---------- */
        (function () {
            var $trackOuter = $('.prod-track-outer');
            var $track      = $('#prod-track');
            if (!$track.length) { return; }

            var $cards    = $track.find('.prod-card');
            var $dotsWrap = $('#prod-dots');
            var $prev     = $('.prod-prev');
            var $next     = $('.prod-next');
            var total     = $cards.length;
            var GAP       = 24;
            var idx       = 0;

            function perPage() {
                if (window.innerWidth >= 1024) { return 3; }
                if (window.innerWidth >= 640)  { return 2; }
                return 1;
            }

            function cardWidth() {
                var pp = perPage();
                var ow = $trackOuter.width();
                return Math.floor((ow - GAP * (pp - 1)) / pp);
            }

            function maxIdx() {
                return Math.max(0, total - perPage());
            }

            function buildDots() {
                $dotsWrap.empty();
                var max = maxIdx();
                for (var i = 0; i <= max; i++) {
                    $('<button>')
                        .attr({ type: 'button', 'data-i': i, 'aria-label': 'Product ' + (i + 1), role: 'tab' })
                        .addClass('prod-dot' + (i === idx ? ' is-active' : ''))
                        .appendTo($dotsWrap)
                        .on('click', function () { goTo(+$(this).data('i')); });
                }
            }

            function render() {
                var cw     = cardWidth();
                var offset = idx * (cw + GAP);
                $cards.css('width', cw + 'px');
                $track.css('transform', 'translateX(-' + offset + 'px)');
                var max = maxIdx();
                $prev.prop('disabled', idx === 0);
                $next.prop('disabled', idx >= max);
                $dotsWrap.find('.prod-dot').removeClass('is-active').eq(idx).addClass('is-active');
            }

            function goTo(n) {
                idx = Math.max(0, Math.min(n, maxIdx()));
                render();
            }

            $prev.on('click', function () { goTo(idx - 1); });
            $next.on('click', function () { goTo(idx + 1); });

            /* Touch / swipe */
            var startX = 0;
            $track[0].addEventListener('touchstart', function (e) {
                startX = e.touches[0].clientX;
            }, { passive: true });
            $track[0].addEventListener('touchend', function (e) {
                var dx = startX - e.changedTouches[0].clientX;
                if (Math.abs(dx) > 40) { goTo(dx > 0 ? idx + 1 : idx - 1); }
            }, { passive: true });

            /* Resize: debounced */
            var resizeTid;
            $(window).on('resize.prodSlider', function () {
                clearTimeout(resizeTid);
                resizeTid = setTimeout(function () {
                    idx = Math.min(idx, maxIdx());
                    buildDots();
                    render();
                }, 150);
            });

            buildDots();
            render();
        }());


        /* ----------  REVIEW CARD SLIDER  ---------- */
        (function () {
            var $trackOuter = $('.rev-track-outer');
            var $track      = $('#rev-track');
            if (!$track.length) { return; }

            var $cards    = $track.find('.rev-card');
            var $dotsWrap = $('#rev-dots');
            var $prev     = $('.rev-prev');
            var $next     = $('.rev-next');
            var total     = $cards.length;
            var GAP       = 24;
            var idx       = 0;

            function perPage() {
                if (window.innerWidth >= 1024) { return 3; }
                if (window.innerWidth >= 640)  { return 2; }
                return 1;
            }

            function cardWidth() {
                var pp = perPage();
                var ow = $trackOuter.width();
                return Math.floor((ow - GAP * (pp - 1)) / pp);
            }

            function maxIdx() { return Math.max(0, total - perPage()); }

            function buildDots() {
                $dotsWrap.empty();
                var max = maxIdx();
                for (var i = 0; i <= max; i++) {
                    $('<button>')
                        .attr({ type: 'button', 'data-i': i, 'aria-label': 'Review ' + (i + 1), role: 'tab' })
                        .addClass('rev-dot' + (i === idx ? ' is-active' : ''))
                        .appendTo($dotsWrap)
                        .on('click', function () { goTo(+$(this).data('i')); });
                }
            }

            function render() {
                var cw     = cardWidth();
                var offset = idx * (cw + GAP);
                $cards.css('width', cw + 'px');
                $track.css('transform', 'translateX(-' + offset + 'px)');
                var max = maxIdx();
                $prev.prop('disabled', idx === 0);
                $next.prop('disabled', idx >= max);
                $dotsWrap.find('.rev-dot').removeClass('is-active').eq(idx).addClass('is-active');
            }

            function goTo(n) {
                idx = Math.max(0, Math.min(n, maxIdx()));
                render();
            }

            $prev.on('click', function () { goTo(idx - 1); });
            $next.on('click', function () { goTo(idx + 1); });

            var startX = 0;
            $track[0].addEventListener('touchstart', function (e) {
                startX = e.touches[0].clientX;
            }, { passive: true });
            $track[0].addEventListener('touchend', function (e) {
                var dx = startX - e.changedTouches[0].clientX;
                if (Math.abs(dx) > 40) { goTo(dx > 0 ? idx + 1 : idx - 1); }
            }, { passive: true });

            var resizeTid;
            $(window).on('resize.revSlider', function () {
                clearTimeout(resizeTid);
                resizeTid = setTimeout(function () {
                    idx = Math.min(idx, maxIdx());
                    buildDots();
                    render();
                }, 150);
            });

            buildDots();
            render();
        }());


        /* ----------  VIDEO CARD SLIDER  ---------- */
        (function () {
            var $trackOuter = $('.vid-track-outer');
            var $track      = $('#vid-track');
            if (!$track.length) { return; }

            var $cards    = $track.find('.vid-card');
            var $dotsWrap = $('#vid-dots');
            var $prev     = $('.vid-prev');
            var $next     = $('.vid-next');
            var total     = $cards.length;
            var GAP       = 24;
            var idx       = 0;

            function perPage() {
                if (window.innerWidth >= 1024) { return 3; }
                if (window.innerWidth >= 640)  { return 2; }
                return 1;
            }

            function cardWidth() {
                var pp = perPage();
                var ow = $trackOuter.width();
                return Math.floor((ow - GAP * (pp - 1)) / pp);
            }

            function maxIdx() {
                return Math.max(0, total - perPage());
            }

            function buildDots() {
                $dotsWrap.empty();
                var max = maxIdx();
                for (var i = 0; i <= max; i++) {
                    $('<button>')
                        .attr({ type: 'button', 'data-i': i, 'aria-label': 'Video ' + (i + 1), role: 'tab' })
                        .addClass('vid-dot' + (i === idx ? ' is-active' : ''))
                        .appendTo($dotsWrap)
                        .on('click', function () { goTo(+$(this).data('i')); });
                }
            }

            function render() {
                var cw     = cardWidth();
                var offset = idx * (cw + GAP);
                $cards.css('width', cw + 'px');
                $track.css('transform', 'translateX(-' + offset + 'px)');
                var max = maxIdx();
                $prev.prop('disabled', idx === 0);
                $next.prop('disabled', idx >= max);
                $dotsWrap.find('.vid-dot').removeClass('is-active').eq(idx).addClass('is-active');
            }

            function goTo(n) {
                idx = Math.max(0, Math.min(n, maxIdx()));
                render();
            }

            $prev.on('click', function () { goTo(idx - 1); });
            $next.on('click', function () { goTo(idx + 1); });

            var startX = 0;
            $track[0].addEventListener('touchstart', function (e) {
                startX = e.touches[0].clientX;
            }, { passive: true });
            $track[0].addEventListener('touchend', function (e) {
                var dx = startX - e.changedTouches[0].clientX;
                if (Math.abs(dx) > 40) { goTo(dx > 0 ? idx + 1 : idx - 1); }
            }, { passive: true });

            var resizeTid;
            $(window).on('resize.vidSlider', function () {
                clearTimeout(resizeTid);
                resizeTid = setTimeout(function () {
                    idx = Math.min(idx, maxIdx());
                    buildDots();
                    render();
                }, 150);
            });

            buildDots();
            render();
        }());


        /* ----------  VIDEO GALLERY MODAL  ---------- */
        (function () {
            var $modal    = $('#vid-modal');
            var $player   = $('#vid-player');
            if (!$modal.length) { return; }

            var $backdrop = $modal.find('.vid-modal-backdrop');
            var $close    = $modal.find('.vid-modal-close');

            function openVideo(videoFile) {
                $player.html(
                    '<video src="' + videoFile + '" ' +
                    'controls autoplay playsinline preload="metadata" ' +
                    'style="position:absolute;inset:0;width:100%;height:100%;border:0;background:#000;">' +
                    '</video>'
                );
                $modal.addClass('is-open').attr('aria-hidden', 'false');
                $('body').css('overflow', 'hidden');
                $close.focus();
            }

            function closeVideo() {
                var $vid = $player.find('video');
                if ($vid.length) { $vid[0].pause(); }
                $modal.removeClass('is-open').attr('aria-hidden', 'true');
                setTimeout(function () { $player.empty(); }, 300);
                $('body').css('overflow', '');
            }

            $(document).on('click', '.vid-card', function () {
                openVideo($(this).data('video-file'));
            });

            $backdrop.on('click', closeVideo);
            $close.on('click', closeVideo);

            $(document).on('keydown', function (e) {
                if (e.key === 'Escape' && $modal.hasClass('is-open')) { closeVideo(); }
            });
        }());


        /* ----------  LUCIDE ICON RENDER  ---------- */
        if (window.lucide && typeof window.lucide.createIcons === 'function') {
            window.lucide.createIcons();
        }


        /* ----------  YEAR IN FOOTER  ---------- */
        $('#current-year').text(new Date().getFullYear());

    });

})(jQuery);
