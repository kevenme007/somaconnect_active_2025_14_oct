
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Head here --}}
@include('includes.front.head')
<body>


    <!--header-->
    @include('includes.front.header1')



    <!-- ***** Main Banner Area Start ***** -->
    {{-- @include('includes.front.banner') --}}
    @yield('banner')


    <!-- ***** Main Banner Area End ***** -->

    @yield('content')



    {{-- Footer here --}}
    @include('includes.front.footer')

    <!-- Scripts -->
    @include('includes.front.js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, '')
                , reqSection = $('.section').filter('[data-section="' + direction + '"]')
                , reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    }
                    , 800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this)
                    , topEdge = $this.offset().top - 80
                    , bottomEdge = topEdge + $this.height()
                    , wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section')
                        , reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function(e) {
            if ($(e.target).hasClass('external')) {
                return;
            }
            e.preventDefault();
            $('#menu').removeClass('active');
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });

    </script>
    @include('sweetalert::alert')

</body>

</html>
