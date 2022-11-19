<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = DB::select("SELECT c.id, c.title, CONCAT(i.fname, ' ', i.lname) as influencer,f.fees_amount-(f.fees_amount*0.1 + f.fees_amount*0.14) as amount,f.fees_amount*0.1 as service_fee,f.fees_amount*0.14 as vat,f.fees_amount as total_amount FROM campaigns c, influencers i, fees f where c.influencer_id = i.id and c.id = f.campaign_id");

        return $payments;
    }

    // public function store()
    // {
    //     $data = request()->all();
    //     $payment = new Payment();
    //     $payment->fname=$data['fname'];
    //     $payment->campaign=$data['campaign'];
    //     $payment->influencer=$data['influencer'];
    //     $payment->amount=$data['amount'];
    //     $payment->service_fee=$data['service_fee'];
    //     $payment->vat=$data['vat'];

    //     $payment->save();
    //     return ($payment);
    // }

    // public function update($paymentId)
    // {
    //     $payment = Payment::find($paymentId);

    //     $payment->fname = request()->fname;
    //     $payment->campaign = request()->campaign;
    //     $payment->influencer = request()->influencer;
    //     $payment->amount = request()->amount;
    //     $payment->service_fee = request()->password;
    //     $payment->vat = request()->vat;

    //     $payment->save();

    //     return ($payment);
    // }
    // public function destroy($paymentId)
    // {
    //     $influencer = Payment::find($paymentId);

    //     $influencer->delete();

    //     return "influencer $paymentId deleted successfuly";
    // }
}
