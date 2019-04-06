$("document").ready(function () {
    /* Menu użytkownika */
    if (isLogged) {
        $('.user-brand').removeAttr("data-toggle data-target");
        $('.user-brand').click(function () {
            var menu = $('.user-menu');
            if (!menu.is(':animated')) menu.slideToggle(1500);
            // $('.modal').toggleClass('flip');

        });
    }
        /* -Pojedyncza opcja menu */
        $('.bm-item').click(function () {
            // alert('Został kliknięty ' + this.innerText);
        });
    /* Przycisk dodający multimedia */
    $('.add-button:last').click(function () {
        var menu = $('.button-menu');

        if (!menu.is(':animated')) {
            menu.slideToggle(1500);
            this.classList.toggle('modify');
        }
    });

    /* Zdarzenia dotyczące modali */
    function swift(modalA, modalB) {
        return function () {
            $(modalA).modal('hide').removeClass("fade");
            $(modalB).modal("show").addClass("fade");
        }
    }

    /* -Zmiana modala LogIn -> Register */
    $('#toRegister').on('click',
        swift(
            '#modalLogIn',
            '#modalRegister'
        ));
    /* -Zmiana modala Register -> LogIn */
    $('#modalRegister .arrow-backward')
        .on('click',
            swift(
                '#modalRegister',
                '#modalLogIn'));
    /* -Modal Register zdarzenia pokazania i ukrycia */
    $('#modalRegister')
        .on('show.bs.modal',
            function () {
        $('#modalRegister .modal-dialog')
            .attr('class', 'modal-dialog modal-dialog-centered rotateIn animated');
    })
        .on('hide.bs.modal',
            function () {
        $('#modalRegister .modal-dialog')
            .attr('class', 'modal-dialog modal-dialog-centered rotateOut animated');
    })
        .on('hidden.bs.modal',
            function () {
                $('#modalLogIn').addClass("fade");
                $('#modalRegister').removeClass("fade")
            });
    /* -Modal Register zdarzenia pokazania i ukrycia */
    $('#modalLogIn').on('show.bs.modal', function () {
        $('#modalLogIn .modal-dialog')
            .attr('class', 'modal-dialog modal-dialog-centered rotateIn animated');
    }).on('hide.bs.modal', function () {
        $('#modalLogIn .modal-dialog')
            .attr('class', 'modal-dialog modal-dialog-centered rotateOut animated');
    });

    /* Rolka */
    function roller($roller, $container) {
        var $current = $roller.children().first(); //obiekt (wiersz) środkowy
        var $length = $roller.children().length; //ilość obiektów (wierszy)
        var $next = $current.next(); //obiekt (wiersz) dolny

        /* -uniemożliwienie klikania gdy jest mniej niż 5 elementów */
        if ($length < 2) $roller.siblings().addClass("disabled");

        /* -Gdy są dwa rzędy klonujemy je by zdobyć efekt rolki */
        if ($length === 2) {
            $current.clone().appendTo(".roller-inner").removeClass("current");
            $next.clone().appendTo(".roller-inner").removeClass("next");
        }

        /* -Ustawienie kolejności wierszy (obiektów) */
        var $prev = $current.siblings().last().addClass("previous"); //obiekt (wiersz) górny
        $current.addClass("current");
        $next.addClass("next");

        function up($p, $c, $n) {
            $p.removeClass("previous");
            $n.removeClass("next");
            $c.removeClass("current");
            $prev = $c.addClass("previous");
            $current = $next;
            $next = ($current.next().length === 0) ? $roller.children().first().addClass("next") : $current.next().addClass("next");
            $current.addClass("current");
        }

        function down($p, $c, $n) {
            $p.removeClass("previous");
            $n.removeClass("next");
            $c.removeClass("current");
            $next = $c.addClass("next");
            $current = $prev;
            $prev = ($current.prev().length === 0) ? $roller.children().last().addClass("previous") : $current.prev().addClass("previous");
            $current.addClass("current");
        }

        if ($length > 1) {
            /* --Zdarzenie podczas kliknięcia strzałek */
            $(document).bind('keypress', function (e) {
                if (e.originalEvent.key === "ArrowUp") up($prev, $current, $next);
                else if (e.originalEvent.key === "ArrowDown") down($prev, $current, $next);
            });

            /* --Zdarzenie podszas ruchu kółka myszki */
            $container.on('mousewheel DOMMouseScroll', function (e) {
                if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) up($prev, $current, $next);
                else down($prev, $current, $next);
            });

            /* --Zdarzenie kliknięcia w strzałkę */
            $roller.siblings().first().on('click', function () {
                up($prev, $current, $next)
            });
            $roller.siblings().last().on('click', function () {
                down($prev, $current, $next)
            });
        } else {
            $roller.siblings().on('mouseover', function () {
                $(this).css("cursor", "not-allowed");
            });
        }
    }

    roller($('.roller-inner'), $('.sideright'));

    /* Zdarzenia panelu informacyjnego */
    var $prevPanes = $('.previous .pane');
    var $curPanes = $('.current .pane');
    var $nextPanes = $('.next .pane');

    $curPanes.on('click', function () {
        var $cur = $(this);
        var $onLeftSide = $(this).prevAll();
        var $onRightSide = $(this).nextAll();
        var $others = $('.previous .pane, .current .pane, .next .pane').not($cur);

        if ($others.has('.come-out.hide') && $others.css('opacity') < 1) {
            $cur.removeClass('pane-big');
            $others.removeClass('hide');
            $others.one('transitionend', function () {
                $others.removeClass('come-out left right');
            });
        } else if (!$others.hasClass('.come-out.hide') && $others.css('opacity') == 1) {
            $prevPanes.addClass("come-out");
            $onLeftSide.addClass("come-out left");
            $onRightSide.addClass("come-out right");
            $nextPanes.addClass("come-out");
            $others.one('transitionend', function () {
                $others.addClass('hide');
                $cur.addClass('pane-big');
            });
        }
    });


    // var $pane = $('.pane'); // wybór wszystkich panelów
    // $pane.on('click', function () {
    //     var $cur = $(this); // bieżący panel
    //     var $notThis = $pane.not($cur); // pozostałe panele
    //     if($notThis.is('.come-out.hide') && $notThis.css('opacity') < 1){
    //         $cur.removeClass('pane-big');
    //         $notThis.removeClass('hide');
    //         $notThis.one('transitionend', function (){
    //             $notThis.removeClass('come-out');
    //         });
    //     }
    //     else if(!$notThis.is('.come-out.hide') && $notThis.css('opacity') == 1){
    //         $notThis.addClass('come-out');
    //         $notThis.one('transitionend', function (){
    //             $notThis.addClass('hide');
    //             $cur.addClass('pane-big');
    //         });
    //     }
    // });
});
