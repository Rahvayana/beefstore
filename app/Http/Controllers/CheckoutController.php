<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use App\BeefPackage;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details','beef_package','user'])->findOrFail($id);
        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $data['item'] = BeefPackage::findOrFail($id);
        // $transaction = Transaction::create([
        //     'beef_packages_id' => $id,
        //     'users_id' => Auth::user()->id,
        //     'total_kilo' => $request->inputKilo,
        //     'transaction_total' => $beef_package->price,
        //     'transaction_status' => 'IN_CART'
        // ]);

        // dd($transaction);

        // TransactionDetail::create([
        //     'transactions_id' => $transaction->id,
        //     'username' => Auth::user()->username,
        //     'address' => $transaction_details->address,
        //     'total_kilo' => $request->inputKilo
        // ]);
        // dd($data);

        return view('pages.checkout', $data);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details','beef_package'])
            ->findOrFail($item->transactions_id);

            if($item->total_kilo)
            {
                $transaction->transaction_total -= 190;
                $transaction->total_kilo -= 190;
            }
            $transaction->transaction_total -= 
                $transaction->beef_package->price;
    
            $transaction->save();
            $item->delete();

            return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'address' => 'required|string|exists:address',
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['beef_package'])->find($id);

        if($request->total_kilo)
        {
            $transaction->transaction_total += 190;
            $transaction->total_kilo += 190;
        }
        $transaction->transaction_total += 
            $transaction->beef_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }


    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }

    public function transaction(Request $request,$id)
    {

        dd($request);
        $hargaDaging=DB::table('beef_packages')->select('price','title')->where('id',$id)->first();
        
        $id_transaction=DB::table('transactions')->insertGetId(
            [
                'beef_packages_id' => $id,
                'beef_price' => $hargaDaging->price,
                'users_id' => Auth::id(),
                'transaction_total' => array_sum($request->kilo)*$hargaDaging->price,
                'transaction_status' => 'PENDING',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ]
        );


        $n=0;
        foreach($request->nama as $nama){
            $id=DB::table('transaction_details')->insertGetId(
                [
                    'transaction_id' => $id_transaction,
                    'beefname' => $hargaDaging->title,
                    'address' => $request->alamat[$n],
                    'total_kilo' => array_sum($request->kilo),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                 ]
            );
            $n++;
        }
        return view('pages.success');
    }
}
