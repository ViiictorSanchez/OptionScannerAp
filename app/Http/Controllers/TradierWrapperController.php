<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradierWrapperController extends Controller
{

    const apiUrl = "https://sandbox.tradier.com";
    const apiAuth = "Authorization: Bearer ";
    const clientId = "ZA6vGYYgJj0QeDhvNKAwkQAxFAwqR6Hj";
    const consumerKey = "tkg3Ow4WDG9vqCuS";
    const scopeAuth = "read,write,trade,market,stream";
    const state = "optionscannerpost";
    const callBackUrl = "http://optionscanner.local/auth.php";

    /*
     *
     * */
    public function __construct(){

    }
    public static function  getSymbolCall(){
        $watchlistId = TradierWrapperController::getWatchlistId();


        $symbols = $watchlistId['watchlist']['items']['item'];
        $symbolCall="";
        $j = 0;

        if($symbols){
            foreach($symbols as $item){
                if($j == 0){
                    $symbolCall .= $item['symbol'];
                }else{

                    $symbolCall .= "," . $item['symbol'];
                }
                $j++;
            }
        }else{
            $watchlistId = TradierWrapperController::getWatchlistId();
            $symbols = $watchlistId['watchlist']['items']['item'];
            foreach($symbols as $item){
                if($j == 0){
                    $symbolCall .= $item['symbol'];
                }else{
                    $symbolCall .= "," . $item['symbol'];
                }
                $j++;
            }
        }

        return $symbolCall;

    }

    public static function getWatchlistData(Request $request){

        $symbolCall = TradierWrapperController::getSymbolCall();

        return $sym = TradierWrapperController::getQuotes($symbolCall);


    }
    /*
     * Call index.blade.php
     * */

    public function index(Request $request){
        if(self::apiUrl == "https://api.tradier.com"){
            $authCode = $_GET['code'];
            if(session()->get('ACCESSTOKEN') == '9hdR5iv3N4asyPqVkMVylSfxYuir'){
                session()->put('ACCESSTOKEN', '');
            }
            if(empty($authCode)){
                $loginPage = TradierWrapperController::getAuthCode();
                header("Location: $loginPage");
            }else{
                TradierWrapperController::getTokenAPI($authCode,$request);
            }
        }else{
            session()->put('ACCESSTOKEN', '9hdR5iv3N4asyPqVkMVylSfxYuir');
        }

        $sym = TradierWrapperController::getWatchlistData($request);
        $typeAccount = TradierWrapperController::getUsersProfile();
        $account = TradierWrapperController::accountNumbers();

        $arrayAccountBalances = array();
        foreach ($account as $count){
            $balances = TradierWrapperController::getAccountBalances($count);
            array_push($arrayAccountBalances,$balances);
        }

        var_dump($arrayAccountBalances);
        die();

//_---------------------------------------------------------------------------------------
        //IN PROGRESS
        $positionAccount = array();
        $quotes = array();


        foreach ($account as $count){
            $position = TradierWrapperController::getAccountPositions($count);
            array_push($positionAccount,$position);
        }

               $length = sizeof($positionAccount);
               $lengthTemp = 0;

               for($j=0;$j<$length;$j++){
                   array_splice($positionAccount[$j]['positions'],0,0,$account[$j]);
                        $lengthTemp = sizeof($positionAccount[$j]['positions']['position']);
                        for ($k=0;$k<$lengthTemp;$k++){

                            //$quotes = TradierWrapperController::getQuotes($positionAccount[$j]['positions']['position'][$k]['symbol']);

                           array_push($positionAccount[$j]['positions']['position'][$k],$quotes);
                        }
               }

        echo "<pre>"; var_dump($positionAccount); echo "</pre>";
//------------------------------------------------------------------------------------------------
        return view ("index", ['spy_price'=>$sym, 'account'=>$account,'arrayAccountBalances'=>$arrayAccountBalances, 'typeAccount'=>$typeAccount]);
    }

    public function account(Request $request){
        $sym = TradierWrapperController::getWatchlistData($request);
        $account = TradierWrapperController::accountNumbers();
        $typeAccount = TradierWrapperController::getUsersProfile();


        $balances = TradierWrapperController::getAccountBalances("6YA00005");

        return view ("index", ['spy_price'=>$sym, 'account'=>$account, 'balances'=>$balances, 'typeAccount'=>$typeAccount]);
    }

    public function index_data(){
        $symbolCall= TradierWrapperController::getSymbolCall();

        $array = explode(',', $symbolCall); //split string into array seperated by ', '
        $allSymbols = array();
        foreach($array as $value) //loop over values
        {
            $symbol = ['all_data'=> TradierWrapperController::getTimeSales($value)];
            array_push($symbol, ['name' => $value]);
            array_push( $allSymbols, $symbol);
        }

        return $allSymbols;
    }
    /*
     * Call stockprofile.blade.php
     * */
    public  function stock(Request $request){
        $sym = TradierWrapperController::getWatchlistData($request);
        $typeAccount = TradierWrapperController::getUsersProfile();
        $account = TradierWrapperController::accountNumbers();

        return view ("stockprofile", ['spy_price'=>$sym, 'account'=>$account, 'typeAccount'=>$typeAccount]);
    }


    public function dashboard(Request $request){
        $sym = TradierWrapperController::getWatchlistData($request);
        $typeAccount = TradierWrapperController::getUsersProfile();
        $account = TradierWrapperController::accountNumbers();
        $arrayAccountBalances = array();
        foreach ($account as $count){
            $balances = TradierWrapperController::getAccountBalances($count);
            array_push($arrayAccountBalances,$balances);
        }

        return view ("index", ['spy_price'=>$sym,'account'=>$account,'arrayAccountBalances'=>$arrayAccountBalances, 'typeAccount'=>$typeAccount]);
    }

    /*
        makes an Endpoint to the Tradier Developer API to ask for an authorization code to obtain an access token
        by redirecting to the Tradier Brokerage login page

        @return nothing
    */
    public static function getAuthCode(){

        $url = self::apiUrl . "/v1/oauth/authorize?client_id=" . self::clientId . "&scope=" . self::scopeAuth . "&state=" . self::state;
        echo "url";

        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);

        $auth = curl_exec($curl);
        $info = curl_getinfo($curl);
        $login = $info['redirect_url'];
        curl_close($curl);
        return $login;
    }

    /*
        Makes and endpoint to the Tradier Developer API to ask for the Access Token

        @return string token
    */
    public static function getTokenAPI($code, Request $request){
        if(empty($code)){
            echo "Authorization Code Invalid"."<br/>"."Code is empty";
        }else {
            if(session()->get('ACCESSTOKEN') == ""){

                $url = self::apiUrl . "/v1/oauth/accesstoken";

                $postParam = [
                    "grant_type" => 'authorization_code',
                    "code" => $code
                ];
                $user = self::clientId; $pass = self::consumerKey;

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $postParam);
                $success = curl_exec($curl);
                curl_close($curl);

                $json = json_decode($success, true);

                session()->put('ACCESSTOKEN', $json["access_token"]);
            }
        }
    }

    /*
     *Assigns the request headers data to an array to be used on the API endpoint headers
     *
     *@param array $headers

     @return array
     */
    public static function requestHeaders(){

        $token = session()->get('ACCESSTOKEN');
        $headers = [
            "Accept: application/json",
            "Authorization: Bearer $token"
        ];
        return $headers;
    }


    #-------------------------------------USER DATA FUNCTIONS--------------------------------#
    public static function getUsersProfile(){
        $url = self::apiUrl . "/v1/user/profile";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $userProf = json_decode($success, true);
        curl_close($curl);

        return $userProf['profile']['account'];
    }
    /*
     * Check if the users exists on the api and redirects to the main site if the user exists
     * if not redirects the user to a sign up page
     *
     * @param string $user  username
     * @param string $password user's password
     * */
    public static function userAuthentication($user, $password){
        $url = self::apiUrl . "/v1/user/profile";
        $token = $_SESSION["ACCESSTOKEN"];
        $reqHeaders = [
            "Accept: application/json",
            "Authorization: Bearer $token"
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $userProf = json_decode($success, true);
        curl_close($curl);

        /*THIS IS JUST TESTING, $userProf["profile"]["name"] AND $userProf["profile"]["name"] VALUES
        AREN'T FULLY KNOWN YET*/
        if($user === $userProf["profile"]["name"] && $password === $userProf["profile"]["id"]){
            echo "Welcome " . $user;
            //header("Location: redirection's URL to the main site);
        }else{
            echo "Registrese por favor";
            //header("Location: redirection's URL for the sign up");
        }
    }

    /*
     *makes an endpoint to the API to get the user's balances and returns the data after obtained

     @return array
     */
    public static function getUsersBalances(){
        $url = self::apiUrl . "/v1/user/balances";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $userBal = json_decode($success, true);
        curl_close($curl);

        return $userBal['accounts']['account'];
    }

    /*
     *makes an endpoint to the API to get the user's positions and returns the data after obtained
     *
     * @return array
     */
    public static function getUsersPositions(){
        $url = self::apiUrl . "/v1/user/positions";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $userPos = json_decode($success, true);
        curl_close($curl);

        return $userPos['accounts']['account'];
    }

    /*
     *makes an endpoint to the API to get the user's history and returns the data after obtained
     *
     * @return array
     */
    public static function getUserHistory(){
        $url = self::apiUrl . "/v1/user/history";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $userHist = json_decode($success, true);
        curl_close($curl);

        return $userHist['accounts']['account'];
    }

    /*makes an endpoint to the API to get the user's Cost Basis and returns the data after obtained
     *
     * @return array
     */
    public static function getUserCostBasis(){
        $url = self::apiUrl . "/v1/user/gainloss";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $userCB = json_decode($success, true);
        curl_close($curl);

        return $userCB['accounts']['account'];
    }

    /*makes an endpoint to the API to get the user's Orders and returns the data after obtained
     *
     * @return array
     */
    public static function getUserOrders(){
        $url = self::apiUrl . "/v1/user/orders";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $userOrders = json_decode($success, true);
        curl_close($curl);

        return $userOrders['accounts']['account'];
    }

    #-------------------------------------MARKET DATA FUNCTIONS--------------------------------#
    /*makes and endpoint to the APi to obtain quotes from an individual or multiple symbols
     *returns the data obtained from the endpoint
     *
     * @param string symbols
     *
     * @return array
     */
    public static function getQuotes($symbols){

        $url = self::apiUrl . "/v1/markets/quotes?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $quote = json_decode($success, true);
        curl_close($curl);

        return $quote;

    }

    /**Makes and enpoint to the API to obtain the timesales data from a given symbol
     *
     * @param string symbol
     * @param string interval (optional)
     * @param string start (optional)
     * @param string end (optional)
     * @param string sessionFilter (optional)
     *
     * @return array
     * */
    public static function getTimeSales($symbol){

        $startDate = date('Y-m-d');

        $url = self::apiUrl . "/v1/markets/timesales?symbol=" . $symbol . "&interval=5min&session_filter=open&start=" . $startDate;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $timeSales = json_decode($success, true);
        curl_close($curl);

        return $timeSales;
    }

    /**Makes and endpoint to the API to obtain the Option chain and return the data as an array
     *
     * @param string symbol
     * @param string date
     *
     *
     * @return array
     */
    public static function getOptionChain($symbol, $date){
        $reqHeaders = TradierWrapperController::requestHeaders();
        $time = strtotime($date);
        $expiration = date('Y-m-d', $time);

        $url = self::apiUrl . "/v1/markets/options/chains?symbol=" . $symbol .  "&expiration=" . $expiration;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $optionChain = json_decode($success, true);
        curl_close($curl);

        return $optionChain;
    }

    /**Makes and Endpoint to the API to obtain the options strike prices data and returns it as an array
     *
     * @param string symbol
     * @param string date
     *
     * @return array
     */
    public static function getOptionStrikePrices($symbol, $date){
        $reqHeaders = TradierWrapperController::requestHeaders();
        $time = strtotime($date);
        $expiration = date('Y-m-d', $time);

        $url = self::apiUrl . "/v1/markets/options/strikes?symbol=" . $symbol .  "&expiration=" . $expiration;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $strikePrices = json_decode($success, true);
        curl_close($curl);

        return $strikePrices;
    }

    /**Makes and Endpoint to the API to obtain the options expiration dates data and returns it as an array
     *
     * @param string symbol
     * @param bool includeAllRoots
     *
     * @return array
     */
    public static function getExpirationDates($symbol, $includeAllRoots = true){
        $reqHeaders = TradierWrapperController::requestHeaders();
        $time = strtotime($date);
        $expiration = date('Y-m-d', $time);

        $url = self::apiUrl . "/v1/markets/options/expirations?symbol=" . $symbol . "&includeALlRoots=" . $includeALlRoots;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $expDates = json_decode($success, true);
        curl_close($curl);

        return $expDates;
    }

    /**Makes an Endpoint to the API to obtain the historical pricing for a symbol and returns it as an array.
     *
     * @param string symbol
     * @param string start  (optional)
     * @param string end    (optional)
     * @param string interval   (optional)
     *
     * @return array
     */
    public static function getHistPricing($symbol, $start = "", $end = "", $interval = "daily"){
        /*checks if the start and ed params aren't empty to send them to the endpoint
        if empty the endpoint is send only with the symbol param as default*/
        if (!empty($start) || !empty($end)) {
            $beg = strtotime($start); $fin = strtotime($end);
            $startDate = date('Y-m-d', $beg);    $endDate = date('Y-m-d', $fin);
            $url = self::apiUrl . "/v1/markets/history?symbol=" . $symbol . "&interval" . $interval . "&start" . $startDate . "&end" . $endDate;

        }else{
            $url = self::apiUrl . "/v1/markets/history?symbol=" . $symbol;
        }
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $hisPri = json_decode($success, true);
        curl_close($curl);

        return $hisPri;
    }

    /**Makes an Endpoint to the API to Get the intraday market status. This call will change and return information pertaining to the current day.
     * and returns it as an array
     *
     * @return array
     *
     */
    public static function getIntraStatus(){
        $url = self::apiUrl . "/v1/markets/clock";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $intraStatus = json_decode($success, true);
        curl_close($curl);

        return $intraStatus;
    }

    /**Makes an endpoint to the API to obtain the market calendar for a given month and is returned as an array
     *
     * @return array
     */
    public static function getMarketCalendar(){
        $url = self::apiUrl . "/v1/markets/calendar";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $marCal = json_decode($success, true);
        curl_close($curl);

        return $marCal;
    }

    /**Makes and endpoint to the API to search for a stock symbol using a keyword lookup on the symbols description
     * Results are ordered by average volume of the symbol
     *
     * @param string q
     * @param string indexes
     *
     * @return array
     */
    public static function companySearch($q, $indexes = false){
        $url = self::apiUrl . "/v1/markets/search?q=" . $q . "&indexes=" . $indexes;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $searSymb = json_decode($success, true);
        curl_close($curl);

        return $searSymb;
    }

    /**Makes an endpoint to Lookup a symbol or partial symbol. Results are ordered by average volume of the symbol.
     *
     * @param string q
     * @param string exchanges
     * @param string types
     *
     * @return array
     */
    public static function lookUpSymbol($q, $exchanges = "", $types = ""){
        if(!empty($exchanges)  || !empty($types)){
            $url = self::apiUrl . "/v1/markets/lookup?q=" . $q . "&exchanges=" . $exchanges . "&types=" . $types;
        }else{
            $url = self::apiUrl . "/v1/markets/lookup?q=" . $q;
        }
        $reqHeaders = TradierWrapperController::requestHeaders();
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $lupSymb = json_decode($success, true);
        curl_close($curl);

        return $lupSymb;
    }

    /**Makes an Endpoint to create a Streaming session
     * This session can be used with the streaming endpoints to obtain updates to the market as they happen.
     *
     * @return array
     */
    public static function createStreamingSession(){
        $url = self::apiUrl . "/v1/markets/events/session";
        $reqHeaders = TradierWrapperController::requestHeaders();
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_POST, 1);
        $success = curl_exec($curl);
        $strSess = json_decode($success, true);
        curl_close($curl);

        return $strSess;
    }

    #------------------------------ACCOUNT DATA FUNCTIONS--------------------------------------#
    /**obtains the accounts numbers info from an specific user's.
     *
     * @param string accountId
     *
     * @return array
     */
    public static function accountNumbers(){
        $accounts = TradierWrapperController::getUsersProfile();

        $accNumbers = array();
        foreach($accounts as $item){
            array_push($accNumbers, $item['account_number']);
        }
        return $accNumbers;
    }

    /**obtains the balances info from an specific user's account.
     *
     * @param string accountId
     *
     * @return array
     */
    public static function getAccountBalances($accountId){
        $url = self::apiUrl . "/v1/accounts/" . $accountId . "/balances";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $accBal = json_decode($success, true);
        curl_close($curl);

        return $accBal;
    }

    /**obtains the position info from an specific user's account
     *
     * @param string accountId
     *
     * @return array
     */
    public static function getAccountPositions($accountId){
        $url = self::apiUrl . "/v1/accounts/" . $accountId . "/positions";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $accPos = json_decode($success, true);
        curl_close($curl);

        return $accPos;
    }

    /**Obtains history info from an specific user's account
     *
     * @param string accountId
     *
     * @return array
     */
    public static function getAccountHistory($accountId){
        $url = self::apiUrl . "/v1/accounts/" . $accountId . "/history";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $accHist = json_decode($success, true);
        curl_close($curl);

        return $accHist;
    }

    /**Obtains the Cost basis info for a specific user's account, which includes all closed positions
     *
     * @param string accountId
     *
     *
     * @return array
     */
    public static function getAccountCB($accountId){
        $url = self::apiUrl . "/v1/accounts/" . $accountId . "/gainloss";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $accCB = json_decode($success, true);
        curl_close($curl);

        return $accCB;
    }

    /**obtains intraday and open/pending order info of an specific user's  account
     *
     * @param string accountId
     *
     * @return array
     */
    public static function getAcccountOrders($accountId){
        $url = self::apiUrl . "/v1/accounts/" . $accountId . "/orders";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $accOrd = json_decode($success, true);
        curl_close($curl);

        return $accOrd;
    }

    /**Obtains information from a specific order.
     *
     * @param string accountId
     * @param string id
     *
     * @return array
     */
    public static function getAcccountIndOrder($accountId, $id){
        $url = self::apiUrl . "/v1/accounts/" . $accountId . "/orders/" . $id;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $accIOrd = json_decode($success, true);
        curl_close($curl);

        return $accIOrd;
    }

#-----------------------------TRADING FUNCTIONS-------------------------------------
    /**Makes an Endpoint to the API to create a preview order, which will be made but not sent to the market
     * also showing info useful to inform the client about the order to be actually placed
     *
     * improve on this function
     *
     * @param string preview
     * @param string account_id
     * @param string class
     * @param string symbol
     * @param string duration
     * @param string side
     * @param string quantity
     * @param string type
     * @param string price
     * @param string stop
     * @param string optSym
     *
     * @return array
     */
    public static function createOrder($preview = "false", $accountId, $class, $symbol, $duration, $side, $quantity, $type, $price = "", $stop = "", $optSym = ""){
        //Checks if the preview param is either true or false and if its true only sends an ednpoint to The API for a preview order
        //if false creates an endpoint url to create an actual order
        if($preview == "true"){
            $urlIni = self::apiUrl . "/v1/accounts/". $accountId ."/orders?preview=true&class=" . $class . "&symbol=" . $symbol . "&duration=" . $duration . "&side=" . $side . "&quantity=" . $quantity . "&type=" . $type;
        }else{
            $urlIni = self::apiUrl . "/v1/accounts/". $accountId ."/orders?class=" . $class . "&symbol=" . $symbol . "&duration=" . $duration . "&side=" . $side . "&quantity=" . $quantity . "&type=" . $type;
        }

        //checks if the param $type has the required data to also add the $price and $stop params to the endpoint URL
        //also checks if the params price and stop are not empty
        if(($type == "limit" || $type == "stop_limit") && (!empty($price) && !empty($stop))){
            $urlMid = $urlIni . "&price=" . $price . "&stop=" . $stop;
        }else{
            $urlMid = $urlIni;
        }

        //Checks if the $class option has the required data to add the $optSym param to the endpoint URL
        //and checks if the optSym param is not empty
        if($class == "option" && !empty($optSym)){
            $url = $urlMid . "&option_symbol=" . $optSym;
        }else{
            $url = $urlMid;
        }
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_POST, 1);
        $success = curl_exec($curl);
        $preOrd = json_decode($success, true);
        curl_close($curl);

        return $preOrd;
    }

    /**
     *
     * */
    public static function multiLegOrder(){

    }
#---------------------------WATCHLISTS FUNCTIONS-----------------------------------

    /**Obtains the watchlists from a specific user
     *
     * @return array
     */
    public static function getWatchlists(){
        $url = self::apiUrl . "/v1/watchlists/";
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $getWat = json_decode($success, true);
        curl_close($curl);

        return $getWat;
    }

    /**Obtains an specific watchlist that a user has from an Id
     *
     * @param string id
     * @return array
     *
     */
    public static function getWatchlistId($id = "default"){
        $url = self::apiUrl . "/v1/watchlists/" . $id;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $getWatId = json_decode($success, true);
        curl_close($curl);

        return $getWatId;
    }

    /**creates a Watchlist with specificated symbol and name
     *
     * @param string name
     * @param string symbols
     *
     * @return array
     */
    public static function createWatchlist($name, $symbols){
        $url = self::apiUrl . "/v1/watchlists?name=" . $name . "&symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_POST, 1);
        $success = curl_exec($curl);
        $creWat = json_decode($success, true);
        curl_close($curl);
        return $creWat;
    }

    /**updates an existing Watchlist by changing the name and symbol of an id based watchlist
     *
     * @param string id
     * @param string name
     * @param string symbols
     *
     * @return array
     *
     */
    public static function updateWatchlist($id, $name, $symbols){
        $url = self::apiUrl . "/v1/watchlists/". $id . "?name=" . $name . "&symbols=" .$symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        $success = curl_exec($curl);
        $updWat = json_decode($success, true);
        curl_close($curl);

        return $updWat;
    }

    /**Deletes an existing watchlist based on a given ID
     *
     * @param string ID
     *
     * @return array
     *
     */
    public static function deleteWatchlist($id){
        $url = self::apiUrl . "/v1/watchlists/" . $id;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        $success = curl_exec($curl);
        $delWat = json_decode($success, true);
        curl_close($curl);

        return $delWat;
    }

    /**Adds a symbol or a list of symbols to an existing watchlist based on an id
     *
     * @param string id
     * @param string symbols
     *
     * @return array
     *
     */
    public static function addSymbols($id, $symbols){
        $url = self::apiUrl. "/v1/watchlists/" . $id . "/symbols?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_POST, 1);
        $success = curl_exec($curl);
        $addSym = json_decode($success, true);
        curl_close($curl);
        return $addSym;
    }

    /**Deletes a selection of symbols from an existign watchlist based on an id
     *
     * @param string id
     * @param string symbols
     *
     * @return array
     */
    public static function removeSymbols($id, $symbols){
        $url = self::apiUrl . "/v1/watchlists/" . $id . "/symbols/" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        $success = curl_exec($curl);
        $remSym = json_decode($success, true);
        curl_close($curl);

        return $remSym;
    }

#------------------------------------FUNDAMENTALS FUNCTIONS------------------------------------------------------

    /**Obtains information from a symbol's company
     *
     * @param string symbols
     *
     * @return array
     */
    public static function getCompanyInfo($symbols){
        $url = self::apiUrl . "/beta/markets/fundamentals/company?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $getComInf = json_decode($success, true);
        curl_close($curl);

        return $getComInf;
    }

    /**Obtains information from a symbol's corporate's Calendar
     *
     * @param string symbols
     *
     * @return array
     */
    public static function getCalendar($symbols){
        $url = self::apiUrl . "/beta/markets/fundamentals/calendars?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $getCal = json_decode($success, true);
        curl_close($curl);

        return $getCal;
    }

    /**obtains a company's dividend info based on its symbol
     *@param string symbols
     *
     *@return array
     *
     */
    public static function getDividendInfo($symbols){
        $url = self::apiUrl . "/beta/markets/fundamentals/dividends?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $getDiv = json_decode($success, true);
        curl_close($curl);

        return $getDiv;
    }

    /**obtains a company's actions info based on its symbol
     *@param string symbols
     *
     *@return array
     *
     */
    public static function getActionsInfo($symbols){
        $url = self::apiUrl . "/beta/markets/fundamentals/corporate_actions?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $actInfo = json_decode($success, true);
        curl_close($curl);

        return $actInfo;
    }

    /**obtains a company's operation ratio info based on its symbol
     *@param string symbols
     *
     *@return array
     *
     */
    public static function getRatioInfo($symbols){
        $url = self::apiUrl . "/beta/markets/fundamentals/ratios?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $opeInfo = json_decode($success, true);
        curl_close($curl);

        return $opeInfo;
    }

    /**obtains a corporate's financial info based on its symbol
     *@param string symbols
     *
     *@return array
     *
     */
    public static function getFinancialsInfo($symbols){
        $url = self::apiUrl . "/beta/markets/fundamentals/financials?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $finInfo = json_decode($success, true);
        curl_close($curl);

        return $finInfo;
    }

    /**Obtains price statistics info from a certain symbol or a list of symbols
     *@param string symbols
     *
     *@return array
     *
     */
    public static function getPriceStatistics($symbols){
        $url = self::apiUrl . "/beta/markets/fundamentals/statistics?symbols=" . $symbols;
        $reqHeaders = TradierWrapperController::requestHeaders();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $reqHeaders);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        $success = curl_exec($curl);
        $priSta = json_decode($success, true);
        curl_close($curl);

        return $priSta;
    }
}
