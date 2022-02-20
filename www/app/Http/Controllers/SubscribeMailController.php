<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscribeMail;
use App\Jobs\SubscribeMailJob;
use Carbon\Carbon;
use App\Mail\WelcomeMail;
use Mail;

class SubscribeMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mail' => 'required'
        ]);

        
        $categoryAdd = SubscribeMail::where("mail",$request->mail)->first();
        if(!$categoryAdd){
            
            // First entered
            SubscribeMail::create(
                ["mail" => $request->mail]
            );

            // Mail in the queue.
            $job = (new SubscribeMail($request->mail)); 
            dispatch($job);
        }


       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
