<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::all();
    }

    public function store()
    {
        $data = request()->all();
        $payment = new Payment();
        $payment->fname=$data['fname'];
        $payment->campaign=$data['campaign'];
        $payment->influencer=$data['influencer'];
        $payment->amount=$data['amount'];
        $payment->service_fee=$data['service_fee'];
        $payment->vat=$data['vat'];

        $payment->save();
        return ($payment);
    }

    public function update($paymentId)
    {
        $payment = Payment::find($paymentId);

        $payment->fname = request()->fname;
        $payment->campaign = request()->campaign;
        $payment->influencer = request()->influencer;
        $payment->amount = request()->amount;
        $payment->service_fee = request()->password;
        $payment->vat = request()->vat;

        $payment->save();

        return ($payment);
    }
    public function destroy($paymentId)
    {
        $influencer = Payment::find($paymentId);

        $influencer->delete();

        return "influencer $paymentId deleted successfuly";
    }
}
