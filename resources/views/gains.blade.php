@extends('layouts.master-webpage', ['account'=>$account, 'typeAccount'=>$typeAccount, 'gainsLoss'=>$gainsLoss])

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

@section('breadcrumb')
    <h4 class="page-title">Gains</h4>
@endsection

@section('content')
    <div class="container-fluid p-0 m-0">
        <div class="row m-0">
            <div class="col-md-12 p-0" >
                <div class="card m-b-0" >
                    <div class="card-body portfolio-content">
                        <h2 class="mt-0 header-title float-left title-card"><strong>GAINS</strong></h2>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="home2" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-vertical">
                                        <thead>
                                            <tr>
                                                <th>Symbol</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Proceeds</th>
                                                <th>Total Gain</th>
                                                <th>Open Date</th>
                                                <th>Close Date</th>
                                            </tr>

                                        </thead>

                                        <tbody id="gains-tbody">
                                            <!--tr>
                                                <td>FB</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="red">-$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>11/18/2020 AMZN 1,150.0 Call</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="green">$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>FB</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="green">$4,005.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>11/18/2020 AMZN 1,150.0 Call</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="red">-$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>FB</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="green">$4,005.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>FB</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="green">$4,005.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>FB</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="green">$4,005.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>FB</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="green">$4,005.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>11/18/2020 AMZN 1,150.0 Call</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="red">-$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>11/18/2020 AMZN 1,150.0 Call</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="red">-$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>11/18/2020 AMZN 1,150.0 Call</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="red">-$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>11/18/2020 AMZN 1,150.0 Call</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="red">-$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>11/18/2020 AMZN 1,150.0 Call</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="red">-$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr>
                                            <tr>
                                                <td>11/18/2020 AMZN 1,150.0 Call</td>
                                                <td>100</td>
                                                <td>5,310.00</td>
                                                <td>5,265.00</td>
                                                <td class="red">-$45.00 (0.85%)</td>
                                                <td>Jan 9, 2019</td>
                                                <td>Jan 10, 2019</td>
                                            </tr-->
                                            {{--@foreach ($gainsLoss as $item)
                                                <tr>
                                                    <td>{{$item['symbol']}}</td>
                                                    <td>{{$item['quantity']}}</td>
                                                    <td>{{$item['cost']}}</td>
                                                    <td>{{$item['proceeds']}}</td>
                                                <td>{{$item['gain_loss']}} {{$item['gain_loss_percent']}}</td>
                                                    <td>{{$item['open_date']}}</td>
                                                    <td>{{$item['close_date']}}</td>
                                                </tr>
                                            @endforeach
                                            @foreach ($gainsLoss as $item)
                                                <tr>
                                                    <td>{{$item['symbol']}}</td>
                                                    <td>{{$item['quantity']}}</td>
                                                    <td>{{number_format($item['cost'], 2, '.', ',')}}</td>
                                                    <td>{{number_format($item['proceeds'], 2, '.', ',')}}</td>
                                                    <td @if ($item['gain_loss'] > 0)
                                                        class = "green";
                                                    @else
                                                        class = "red";
                                                    @endif
                                                    ><strong>{{number_format($item['gain_loss'], 2, '.', ',')}}  ({{number_format($item['gain_loss_percent'], 2, '.', ',')}}%)</strong>
                                                    </td>
                                                    <td>{{date('M d, Y', strtotime($item['open_date']))}}</td>
                                                    <td>{{date('M d, Y', strtotime($item['close_date']))}}</td>
                                                </tr>
                                            @endforeach--}}
                                        </tbody>
                                    </table>
                                    <div class="pagination-section justify-content-end">
                                        <nav class="pagination justify-content-end">
                                            <span>{{ $gainsLoss->links() }}</span>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <!-- Responsive-table-->
    <script src="{{ URL::asset('assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>

    <!-- switch color Theme -->
    <script src="{{ URL::asset('assets/js/switch.js') }}"></script>
    <script src="{{ URL::asset('assets/js/darkTheme.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slick.js') }}"></script>
    <script src="{{ URL::asset('assets/js/changeGains.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pagination.js') }}"></script>

@endsection
