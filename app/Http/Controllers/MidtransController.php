<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;

use Illuminate\Http\Request;
use App\Transaction;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback(Request $request) {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $notification = new Notification();

        $order = explode('-', $notification->order_id);

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $order[1];

        $transaction = Transaction::findOrFail($order_id);

        if($status == 'capture') {
            if($type == 'credit_card') {
                if($fraud == 'challenge') {
                    $transaction->transaction_status = 'CHALLENGE';
                } else {
                    $transaction->transaction_status = 'SUCCESS';
                    Mail::to($transaction->user->email)->send(
                        new TransactionSuccess($transaction)
                    );
                }
            }
        } else if($status == 'settlement') {
            $transaction->transaction_status = 'SUCCESS';
            Mail::to($transaction->user->email)->send(
                new TransactionSuccess($transaction)
            );
        } else if($status == 'pending') {
            $transaction->transaction_status = 'PENDING';
        } else if($status == 'deny') {
            $transaction->transaction_status = 'FAILED';
        } else if($status == 'expired') {
            $transaction->transaction_status = 'EXPIRED';
        } else if($status == 'cancel') {
            $transaction->transaction_status = 'FAILED';
        }

        $transaction->save();

        return response()->json([
            'status' => 'success',
            'message' => 'callback success'
        ]);
    }
}
