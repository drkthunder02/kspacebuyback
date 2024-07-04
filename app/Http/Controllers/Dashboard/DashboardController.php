<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Library
use App\Library\Lookups\LookupHelper;
use App\Library\Esi\Esi;
use App\Library\Helpers\BuybackHelper;

//Models
use App\Models\User\User;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:User');
    }

    public function index() {
        return view('dashboard.dashboard');
    }

    public function buyback(Request $request) {
        $buybackHelper = new BuybackHelper;
        
        $this->validate($request, [
            'buybackList' => 'required',
        ]);

        //Process the buyback list sent here
        $processed = $buybackHelper->ProcessBuybackList($request);
        $contract = $buybackHelper->StoreBuybackContract($processed);

        return view('dashboard.buyback.display')->with('contract', $contract);
    }

    public function profile() {
        //Declare items we are going to need
        $buybackHelper = new BuybackHelper();
        $months = 12;
        $buybackPayouts = array();

        //Get dates for the cards
        $dates = $buybackHelper->GetTimeFrameInMonths($months);
        
        //Get the user data
        $user = User::where(['character_id' => $this->user()->getId()])->first();
        //Get the user's buyback data
        foreach($dates as $date) {
            $buybackPayouts[] = [
                'date' => $date['start']->toFormattedDateString(),
                'payout' => number_format($buybackHelper->GetPayoutsByMonthByUser($user, $date['start'], $date['end'], 2, ".", ",")),
            ];
        }

        return view('dashboard.profile')->with('user', $user)
                                        ->with('buybackpayout', $buybackPayouts);
    }
}
