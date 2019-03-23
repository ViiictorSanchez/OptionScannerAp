
function switchfunction() {

        $('#demo').toggleClass('demo-dark');
        $('#line-separate').toggleClass('line-separate-dark');
        $(document.body).toggleClass('body-dark');
        $('#topnav').toggleClass('top-nav-dark');
        $('#topnavlogo').toggleClass('top-nav-logo-dark');
        $('#navigation').toggleClass('navigation-dark');
        $('.font-size-portfolio').toggleClass('font-size-portfolio-dark');
        $('.menu-my-portfolio-color').toggleClass('menu-my-portfolio-color-dark');
        $('.color-watchlist').toggleClass('color-watchlist-dark');
        $('.line-separate-graph').toggleClass('line-separate-graph-dark');
        $('.app-search .form-control, .app-search .form-control:focus').toggleClass('form-control-dark');
        $('.menu-color').toggleClass('menu-color-dark');
        $('.title-graph').toggleClass('title-graph-dark');
        $('.color-principal-menu').toggleClass('color-principal-menu-dark');
        $('.card-body').toggleClass('card-body-dark');
        $('.button-my-portfolio').toggleClass('button-my-portfolio-dark');
        $('.value-sub-menu').toggleClass('value-sub-menu-dark');
        $('.sub-menu-trade-color').toggleClass('sub-menu-trade-color-dark');
        $('.button-trade-with').toggleClass('button-trade-with-dark');
        $('.nav-link').toggleClass('nav-link-dark');
        $('.button-trade-order-blue').toggleClass('button-trade-order-blue-dark');
        $('.label-text').toggleClass('label-text-dark');
        $('.button-order-trade').toggleClass('button-order-trade-dark');
        $('.input-trade').toggleClass('input-trade-dark');
        $('.call-menu-color').toggleClass('call-menu-color-dark');
        $('.padding-watchlist').toggleClass('table-dark');


        if ($('#imagelogo').attr('src') == '/assets/images/logo.png') 
            $('#imagelogo').attr('src', '/assets/images/logo-light.png')
        else 
            $('#imagelogo').attr('src', '/assets/images/logo.png')

       
        

        





}