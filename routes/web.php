<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\tastjob;
use App\Jobs\Failjob;
use App\Mail\sendtestmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use App\Models\User;
use App\Http\Controllers\tastcontroller;
use Symfony\Component\HttpFoundation\Request;
// use Throwable;

Route::get('/', function (\Illuminate\Http\Request $request) {
    $user =[
        "name"=> "darshan",
        "age" => "22",
        "email"=> "example@gmail.com",
        "password"=> "23q2sd"
    ];
    //we create a custum methed inside request class
        // dd($request->username());

        // Mail::to("test1@exampale.com")->send(new sendtestmail($data));
    //1 way to use queue
        // dispatch(function (){
        //     Mail::to("test1@exampale.com")->send(new sendtestmail());
        // })->delay(now()->addSecond(5));
    
    //2 using passing object
        // dispatch(new tastjob())->delay(now()->addSecond(5));

    //pass arguments in job
    for ($i=0; $i < 2; $i++) { 
        dispatch(new tastjob($user))->delay(now()->addSecond(1));
        // dispatch(new Failjob($user))->delay(now()->addSecond(1));
        // dispatch(new tastjob($user))->delay(now()->addSecond(2));
        // dispatch(new tastjob($user))->delay(now()->addSecond(4));
        // dispatch(new tastjob($user))->delay(now()->addSecond(5));
        // dispatch(new tastjob($user))->delay(now()->addSecond(6));
    }


    //Laravel Queue Workers Process Progress Information
        // $batch = Bus::batch([
        // new tastjob($user),
        // new tastjob($user),
        // new tastjob($user),
        // new tastjob($user),
        // new tastjob($user),
        // ])->then(function (Batch $batch) {
        //     return "all the batch are camplited"; 
        //     // All jobs completed successfully...
        // })->catch(function (Batch $batch, Throwable $e) {
        //     // First batch job failure detected...
        // return $e;   
        // })->finally(function (Batch $batch) {
        //     // The batch has finished executing...
        //     return "batch is camplited";
        // })->name('first jobbatch')
        // ->dispatch();
        // // $batch->progress();
        // return $batch->id;   

    //model observer (multipal lisner in one class)
    //all the model event are lisen by observer

    //create model observer 
    // php artisan make:observer -m usermodel

        //when i save data using model created observer are called autometacily
            // $users_model = new User;
            // $users_model->name ="darshan";
            // $users_model->email ="example@gmail.com";
            // $users_model->password = "23q2sd";
            // $users_model->slug = "darshan";
            // $users_model->save();
            // dd($users_model->toarray());
});

//Returning Batches From Routes
Route::get('/batch/{batchId}', function (string $batchId) {
    return Bus::findBatch($batchId);
});

//routr model binding with slug
Route::get('/tast/{user}',[tastcontroller::class, "index"])
            ->missing(function (Request $request) {
                return redirect('notfound');
            });

Route::get('notfound', function (){
    return 'page not found';
});

Route::get('/join',[tastcontroller::class, "quaryjoin"]);

Route::get('/collection',[tastcontroller::class, "collection"]);

Route::get('/notify',[tastcontroller::class, "notify"]);