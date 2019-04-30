@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

@section('breadcrumb')
    <h4 class="page-title">Flot Chart</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Lexa</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Charts</a></li>
        <li class="breadcrumb-item active">Flot Chart</li>
    </ol>

@endsection

@section('content')
    <h1> Hello </h1>


@endsection

@section('script')

    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.time.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.pie.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.selection.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.stack.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/curvedLines.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/flot.init.js')}}"></script>
    <!--Morris Chart-->
    <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>

    <!-- Responsive-table-->
    <script src="{{ URL::asset('assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>

    <!-- switch color Theme -->
    <script src="{{ URL::asset('assets/js/switch.js') }}"></script>
    <script src="{{ URL::asset('assets/js/darkTheme.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slick.js') }}"></script>
    <script src="{{ URL::asset('assets/js/filters.js') }}"></script>

@endsection

@section('script-bottom')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection