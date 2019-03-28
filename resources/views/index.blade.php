@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

 @section('breadcrumb')
							<h4 class="page-title">OptionScanner</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">

                                </li>
                            </ol>
@endsection

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7" >
                        <div class="card m-b-0" >
                            <div class="card-body">
                                    <ul>
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                            <a class="font-size-portfolio">$124,010.50</a>
                                        </li >
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                            <a class="menu-my-portfolio-color">Unrealized P/L</a>
                                            <p class="green">$2,300.00</p>
                                        </li>
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                            <a class="menu-my-portfolio-color" >Realized P/L</a>
                                            <p class="red">-$500.34</p>
                                        </li>

                                        <li class="float-right list-unstyled ">
                                           <a class="menu-my-portfolio-color"><strong> My Portfolio</strong> </a>
                                        </li>
                                    </ul>


                                     <ul class="float-left line-separate">
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                           <a class="menu-my-portfolio-color">  Cash </a>
                                            <p> <strong>$100,050.25 </strong></p>
                                        </li >
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                            <a class="menu-my-portfolio-color"> Stocks </a>
                                            <p><strong>$15,030.50</strong></p>
                                        </li>
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                            <a class="menu-my-portfolio-color"> Options</a>
                                            <p><strong> $9,895.10</strong></p>
                                        </li>
                                    </ul>

                                <div class="table-responsive col-xl-12" >
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item float-left">
                                            <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Positions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">Orders</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- tab content-->
                                <div class="tab-content">

                                    <div class="tab-pane active p-3" id="home2" role="tabpanel">

                                        <div class="table-responsive">
                                            <table class="table table-vertical">

                                                <thead>
                                                <tr>
                                                    <th>Symbol</th>
                                                    <th>Change</th>
                                                    <th>Quantity</th>
                                                    <th>Cost Basis</th>
                                                    <th>Market Value</th>
                                                    <th>Total Gain</th>
                                                    <th></th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr>
                                                    <td>
                                                        11/18/2020 AMZN 1,150.0 Call
                                                        <p>$10.50</p>
                                                    </td>
                                                    <td class="green">
                                                        $0.50
                                                        <p class="green">5.00%</p>
                                                    </td>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        $9.00
                                                    </td>
                                                    <td>
                                                        $12,600.00
                                                    </td>
                                                    <td class="green">
                                                        $1,800.00
                                                        <p class="green">16.67%</p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">
                                                            <strong>Trade</strong></button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        FB
                                                        <p>$165.25</p>
                                                    </td>
                                                    <td class="red">
                                                        $-0.50
                                                        <p class="red">-1.45%</p>
                                                    </td>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        $9.00
                                                    </td>
                                                    <td>
                                                        $12,600.00
                                                    </td>
                                                    <td class="green">
                                                        $1,800.00
                                                        <p class="green">16.67%</p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">
                                                            <strong>Trade</strong></button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        TSLA
                                                        <p>$280.50</p>
                                                    </td>
                                                    <td class="red">
                                                        $-0.50
                                                        <p class="red">-1.45%</p>
                                                    </td>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        $9.00
                                                    </td>
                                                    <td>
                                                        $12,600.00
                                                    </td>
                                                    <td class="red">
                                                        $-1,800.00
                                                        <p class="red">-16.67%</p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">
                                                            <strong>Trade</strong></button>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="tab-pane p-3" id="profile2" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                            single-origin coffee squid. Exercitation +1 labore velit, blog
                                            sartorial PBR leggings next level wes anderson artisan four loko
                                            farm-to-table craft beer twee. Qui photo booth letterpress,
                                            commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                            vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                            aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr,
                                            vero magna velit sapiente labore stumptown. Vegan fanny pack
                                            odio cillum wes anderson 8-bit.
                                        </p>
                                    </div>
                                    <div class="tab-pane p-3" id="messages2" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                            sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                            farm-to-table readymade. Messenger bag gentrify pitchfork
                                            tattooed craft beer, iphone skateboard locavore carles etsy
                                            salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                            Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                            mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                            retro mlkshk vice blog. Scenester cred you probably haven't
                                            heard of them, vinyl craft beer blog stumptown. Pitchfork
                                            sustainable tofu synth chambray yr.
                                        </p>
                                    </div>
                                    <div class="tab-pane p-3" id="settings2" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                            art party before they sold out master cleanse gluten-free squid
                                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                            art party locavore wolf cliche high life echo park Austin. Cred
                                            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                            farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                            mustache readymade thundercats keffiyeh craft beer marfa
                                            ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                            vegan.
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="card m-b-0">
                            <div class="card-body">
                                <div id="linea">
                                    <ul>
                                        <li class="float-right list-unstyled ">
                                            <a><strong>Falling Knife Screener</strong></a>
                                        </li>
                                    </ul>

                                    <br>

                                    <ul class="float-left">
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                            <a> <strong> Cash </strong> </a>
                                            <p>$100,050.25</p>
                                        </li >
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                            <a> <strong>Stocks </strong></a>
                                            <p>$15,030.50</p>
                                        </li>
                                        <li class="float-left list-unstyled my-portfolio-menu">
                                            <a> <strong>Options</strong></a>
                                            <p>$9,895.10</p>
                                        </li>
                                    </ul>

                                </div>

                                <div class="table-responsive">

                                    <table class="table table-vertical">

                                        <thead>
                                        <tr>
                                            <th>Symbol</th>
                                            <th>Change</th>
                                            <th>Quantity</th>
                                            <th>Cost Basis</th>
                                            <th>Market Value</th>
                                            <th>Total Gain</th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>
                                                11/18/2020 AMZN 1,150.0 Call
                                                <p>$10.50</p>
                                            </td>
                                            <td>
                                                $0.50
                                                <p>5.00%</p>
                                            </td>
                                            <td>
                                                12
                                            </td>
                                            <td>
                                                $9.00
                                            </td>
                                            <td>
                                                $12,600.00
                                            </td>
                                            <td>
                                                $1,800.00
                                                <p>16.67%</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">Trade</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                FB
                                                <p>$165.25</p>
                                            </td>
                                            <td>
                                                $0.50
                                                <p>5.00%</p>
                                            </td>
                                            <td>
                                                12
                                            </td>
                                            <td>
                                                $9.00
                                            </td>
                                            <td>
                                                $12,600.00
                                            </td>
                                            <td>
                                                $1,800.00
                                                <p>16.67%</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">Trade</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                TSLA
                                                <p>$280.50</p>
                                            </td>
                                            <td>
                                                $0.50
                                                <p>5.00%</p>
                                            </td>
                                            <td>
                                                12
                                            </td>
                                            <td>
                                                $9.00
                                            </td>
                                            <td>
                                                $12,600.00
                                            </td>
                                            <td>
                                                $1,800.00
                                                <p>16.67%</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">Trade</button>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                             <div class="col-md-3">
                                  <div class="card m-b-20">
                                        <div class="card-body">
                                            <a class="mt-0 header-title float-right" style="font-size: 13px; color: #6d757d;"> <strong>Trending Sectors</strong></a>
                                <div class="table-responsive">
                                    <table class="table table-vertical">
                                        <tr>
                                            <td>
                                                Airline & Travel Leisure
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Banking (Regional / Foreign)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Computer (Big Data)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Computer (Big Data)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Computer (Big Data)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Banking (Regional / Foreign)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Banking (Regional / Foreign)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Computer (Big Data)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>





                                    </table>
                                </div>
                            </div>
                        </div>

                                 <div class="card m-b-20">
                                     <div class="card-body">
                                         <a class="mt-0 header-title float-right" style="font-size: 13px; color: #6d757d;"> <strong>Top Gainers</strong></a>

                                         <div class="table-responsive">
                                             <table class="table table-vertical">
                                                 <tr>
                                                     <td>
                                                         <strong>
                                                             AAPL
                                                         </strong>
                                                     </td>
                                                     <td>
                                                         2.12%
                                                     </td>
                                                     <td>
                                                         178.25
                                                     </td>
                                                 </tr>

                                                 <tr>
                                                     <td>
                                                         <strong>
                                                             AAPL
                                                         </strong>
                                                     </td>
                                                     <td>
                                                         2.12%
                                                     </td>
                                                     <td>
                                                         178.25
                                                     </td>
                                                 </tr>

                                                 <tr>
                                                     <td>
                                                         <strong>
                                                             AAPL
                                                         </strong>
                                                     </td>
                                                     <td>
                                                         2.12%
                                                     </td>
                                                     <td>
                                                         178.25
                                                     </td>
                                                 </tr>

                                                 <tr>
                                                     <td>
                                                         <strong>
                                                             AAPL
                                                         </strong>
                                                     </td>
                                                     <td>
                                                         2.12%
                                                     </td>
                                                     <td>
                                                         178.25
                                                     </td>
                                                 </tr>



                                             </table>
                                         </div>


                                     </div>
                                 </div>

                                 <div class="card m-b-20">
                                     <div class="card-body">
                                         <a class="mt-0 header-title float-right" style="font-size: 13px; color: #6d757d;"><strong> Volumen Movers </strong></a>

                                         <div class="table-responsive">
                                             <table class="table table-vertical">
                                                 <tr>
                                                     <td>
                                                         <strong>
                                                             AAPL
                                                         </strong>
                                                     </td>
                                                     <td>
                                                         2.12%
                                                     </td>
                                                     <td>
                                                         178.25
                                                     </td>
                                                 </tr>

                                                 <tr>
                                                     <td>
                                                         <strong>
                                                             AAPL
                                                         </strong>
                                                     </td>
                                                     <td>
                                                         2.12%
                                                     </td>
                                                     <td>
                                                         178.25
                                                     </td>
                                                 </tr>

                                                 <tr>
                                                     <td>
                                                         <strong>
                                                             AAPL
                                                         </strong>
                                                     </td>
                                                     <td>
                                                         2.12%
                                                     </td>
                                                     <td>
                                                         178.25
                                                     </td>
                                                 </tr>

                                                 <tr>
                                                     <td>
                                                         <strong>
                                                             AAPL
                                                         </strong>
                                                     </td>
                                                     <td>
                                                         2.12%
                                                     </td>
                                                     <td>
                                                         178.25
                                                     </td>
                                                 </tr>



                                             </table>
                                         </div>


                                     </div>
                                 </div>

                             </div>

                            <div class="col-md-2 ">
                                <div class="card m-b-20 color-watchlist">
                                    <div class="padding-watchlist">
                                        <a class="mt-0 header-title float-right" style="font-size: 13px; color: #6d757d;"> <strong>Watchlist</strong></a>

                                        <div class="table-responsive">
                                            <table class="table table-vertical">
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            AAPL
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>



                                            </table>
                                        </div>


                                    </div>
                                </div>
                            </div>

                </div>  <!-- end row -->

@endsection

@section('script')
		<!--Morris Chart-->
        <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js')}}"></script>
		<script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>

         <!-- switch color Theme -->
         <script src="{{ URL::asset('assets/js/switch.js') }}"></script>
         <script src="{{ URL::asset('assets/js/darkTheme.js') }}"></script>

@endsection