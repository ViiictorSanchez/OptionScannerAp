
function switchfunction() {

        document.getElementById("demo").style.color = "#fff";
        document.getElementById('line-separate').style.color = "#000";
        document.body.style.backgroundColor = "#242b3c";
        document.getElementById('topnav').style.backgroundColor = "#1f2431";
        document.getElementById('topnavlogo').style.backgroundColor = "#1f2431";
        document.getElementById('navigation').style.backgroundColor = "#1f2431";
        document.getElementById('imagelogo').src = '/assets/images/logo-light.png';
        document.getElementById('line-separate').style.backgroundColor = "#000";

        var cols = document.getElementsByClassName('font-size-portfolio');
        for (i=0;i<cols.length;i++){
         cols[i].style.color = '#fff';
        }

        var cols = document.getElementsByClassName('menu-my-portfolio-color');
        for (i=0;i<cols.length;i++){
            cols[i].style.color = '#fff';
        }

        var cols = document.getElementsByClassName('color-watchlist');
        for (i=0;i<cols.length;i++){
            cols[i].style.backgroundColor = '#1f2431';
            cols[i].style.color = '#fff';
        }

        var cols = document.getElementsByClassName('line-separate-graph');
        for (i=0;i<cols.length;i++){
            cols[i].style.color = '#000';
        }

        var cols = document.querySelectorAll('.app-search .form-control, .app-search .form-control:focus');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.backgroundColor = '#242b3c';
            cols[i].style.border = '1px solid #000';
        }

        var cols = document.getElementsByClassName('menu-color');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.color = '#fff';
        }

        cols = document.getElementsByClassName('title-graph');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.color = '#fff';
        }

        cols = document.getElementsByClassName('color-principal-menu');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.color = '#fff';
        }

        cols = document.getElementsByClassName('card-body');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.backgroundColor = '#1f2431';
            cols[i].style.color = '#fff';
            cols[i].style.border = '1px solid #000';
        }

        cols = document.getElementsByClassName('button-my-portfolio');
        for(i= 0;i<cols.length;i++){
            cols[i].style.backgroundColor = '#ff7d39';
            cols[i].style.color = '#1f2431';
            cols[i].style.border = '1px solid #000';
        }

        cols = document.getElementsByClassName('value-sub-menu');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.color = '#fff';
        }

        cols = document.getElementsByClassName('sub-menu-trade-color');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.color = '#585c63';
        }

        cols = document.getElementsByClassName('button-trade-with');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.color = "#ff7d39";
            cols[i].style.backgroundColor = '#1f2431';
            cols[i].style.border = '1px solid #ff7d39';
        }

        cols = document.querySelectorAll('.btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show > .btn-secondary.dropdown-toggle');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.backgroundColor = '#ff7d39';
            cols[i].style.color = '#000';
        }

        cols = document.getElementsByClassName('nav-link');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.background = '#1f2431';
            cols[i].style.color = '#fff';
        }

        cols = document.querySelectorAll('nav-tabs-custom > li > a.active');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.color = "#fff";
        }

        cols = document.getElementsByClassName('button-trade-order-blue');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.backgroundColor = '#1f2431';
            cols[i].style.color = '#ff7d39';
            cols[i].style.border = '1px solid #000';
        }

        cols = document.getElementsByClassName('label-text');
        for(i=0;i<cols.length;i++){
            cols[i].style.color = '#585c63';
        }

        cols = document.getElementsByClassName('button-order-trade');
        for (i = 0; i < cols.length; i++) {
            cols[i].style.backgroundColor = '#ff7d39';
            cols[i].style.color = '#1f2431';
            cols[i].style.border = '1px solid';
        }

        cols = document.getElementsByClassName('input-trade');
        for (i=0;i<cols.length;i++){
            cols[i].style.border = '1px solid #000';
            cols[i].style.backgroundColor = '#1f2431';
            cols[i].style.color = '#ff7d39';
        }

        var cols = document.getElementsByClassName('call-menu-color');
        for (i=0;i<cols.length;i++){
            cols[i].style.color = '#fff';
        }

        var cols = document.querySelectorAll('table td, .table th');
        for (i=0;i<cols.length;i++){
            cols[i].style.backgroundColor = '#1f2431';
        }

        var cols = document.querySelectorAll('nav-tabs-custom > li > a::after');
        for (i=0;i<cols.length;i++){
            cols[i].style.background = '#ff7d39';
        }




}