
function switchfunction() {


        if(localStorage.getItem('dark') === 'on')
            localStorage.setItem('dark', 'off')
        else
            localStorage.setItem('dark', 'on')
            
        

        $(document.body).toggleClass('body-dark');
        $('#demo').toggleClass('demo-dark');
        $('#line-separate').toggleClass('line-separate-dark');
        $('#topnav').toggleClass('top-nav-dark');
        $('#topnavlogo').toggleClass('top-nav-logo-dark');
        $('#navigation').toggleClass('navigation-dark');
        $('.font-size-portfolio').toggleClass('font-size-portfolio-dark');
        $('.menu-my-portfolio-color').toggleClass('menu-my-portfolio-color-dark');
        $('.color-watchlist').toggleClass('color-watchlist-dark');
        $('.line-separate-graph').toggleClass('line-separate-graph-dark');
        $('.app-search .form-control, .app-search .form-control:focus, .input-width').toggleClass('form-control-dark');
        $('.menu-color').toggleClass('menu-color-dark');
        $('.title-graph').toggleClass('title-graph-dark');
        $('.color-principal-menu').toggleClass('color-principal-menu-dark');
        $('.card-body').toggleClass('card-body-dark');
        $('.button-my-portfolio').toggleClass('button-my-portfolio-dark');
        $('.value-sub-menu').toggleClass('value-sub-menu-dark');
        $('.sub-menu-trade-color').toggleClass('sub-menu-trade-color-dark');
        $('.button-trade-with').toggleClass('button-trade-with-dark');
        $('.nav-link').toggleClass('nav-link-dark');
        $('.nav-tabs-custom').toggleClass('nav-tabs-custom-dark');
        $('.button-trade-order-blue').toggleClass('button-trade-order-blue-dark');
        $('.label-text').toggleClass('label-text-dark');
        $('.button-order-trade').toggleClass('button-order-trade-dark');
        $('.input-trade').toggleClass('input-trade-dark');
        $('.call-menu-color').toggleClass('call-menu-color-dark');
        $('.padding-watchlist').toggleClass('table-dark');
        $("#tech-companies-1").toggleClass('table-dark');
        if ($('#demo-dark')){
            $('.nav-tabs-custom > li > a.active').toggleClass('nav-tabs-custom-dark > li > a.active');
            $('.navigation-menu > li .submenu').toggleClass('nav-tabs-custom-dark > li > a.active');
            $('.fa, .fas').toggleClass('fas-dark');
        }
        if ($('#imagelogo').attr('src') == '/assets/images/logo.png') 
            $('#imagelogo').attr('src', '/assets/images/logo-light.png')
        else 
            $('#imagelogo').attr('src', '/assets/images/logo.png')


}

