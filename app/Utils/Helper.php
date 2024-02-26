<?php

namespace App\Utils;

use App\Models\Currency;

use function Pest\Laravel\put;

class Helper
{
     public static function loadCurrency()
     {
          if (!session()->has('currency_code')) {
               $currency = Currency::where('id', 1)->first();

               session()->put('currency_code', $currency->code);
               session()->put('currency_symbol', $currency->symbol);
               session()->put('currency_exchange', $currency->exchange);
          }
     }


     public static function convertPrice($price)
     {
          $convert_price = number_format($price * session('currency_exchange'), 2);
          return $convert_price . session('currency_symbol');
     }
}
