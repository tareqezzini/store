<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    public function index()
    {
        $currencies = Currency::all();
        return view('backend.currency.index', compact('currencies'));
    }


    public function create()
    {

        return view('backend.currency.create');
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'symbol' => 'required|string',
            'exchange' => 'required|numeric',

        ]);
        $data = $request->all();

        $status = Currency::create($data);
        if ($status) {
            return redirect()->back()->with('success', 'The Currency have been Added Successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    public function edit(Currency $currency)
    {
        return view('backend.currency.edit', compact('currency'));
    }


    public function update(Request $request, Currency $currency)
    {

        $validation = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'symbol' => 'required|string',
            'exchange' => 'required|numeric',

        ]);
        $data = $request->all();

        $status = $currency->update($data);
        if ($status) {
            return redirect()->back()->with('success', 'The Currency have been Edited Successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }


    public function destroy(Currency $currency)
    {

        if ($currency) {
            $status = $currency->delete();
            if ($status) {
                return redirect()->back()->with('success', 'The Currency have been Deleted Successfully');
            }
            return redirect()->back()->with('error', 'Something went wrong');
        }
        abort('404');
    }



    // change currency
    public function changeCurrency(Request $request)
    {
        // Get the selected currency code from the request
        $currencyCode = $request->input('currency');
        $currency =  Currency::where('code', $currencyCode)->first();

        session()->put('currency_code', $currency->code);
        session()->put('currency_symbol', $currency->symbol);
        session()->put('currency_exchange', $currency->exchange);

        $response['status'] = true;
        return $response;
    }
}
