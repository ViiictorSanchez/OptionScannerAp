@extends('layouts.master-webpage', ['account'=>$account, 'typeAccount'=>$typeAccount])

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
                        <div class="tab-content position-order mt-1">
                            <div class="tab-pane active p-0" id="home2" role="tabpanel">
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
                                        </tbody>

                                    </table>
                                    <div class="pagination-section justify-content-end">
                                        <nav aria-label="...">
                                            <ul class="pagination justify-content-end">
                                            </ul>
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


    <!-- Responsive-table-->
    <script src="{{ URL::asset('assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>

    <!-- switch color Theme -->
    <script src="{{ URL::asset('assets/js/switch.js') }}"></script>
    <script src="{{ URL::asset('assets/js/darkTheme.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slick.js') }}"></script>
    <script src="{{ URL::asset('assets/js/changeGains.js') }}"></script>

@endsection
