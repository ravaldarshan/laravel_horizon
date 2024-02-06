<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Notifications\teastnotification;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class tastcontroller extends Controller
{
    public function index(User $user){

        return $user;
    }
    public function quaryjoin(){
                    // insert / insertoringnor / insertgetid
                    // update/ updateorinsert
                    //upsert -if recode not exist then insert 
                             //-if recode has exist then update
                    //whereBetween
                    //whereNotBetween
                    //whereBetweenColumns
                    //whereIn / whereNotIn / orWhereIn / orWhereNotIn
                    //whereNull / whereNotNull / orWhereNull / orWhereNotNull
                    //whereDate / whereMonth / whereDay / whereYear / whereTime
                    //whereColumn / orWhereColumn
                    //whereExists
                    //orderby /gruopBy /having / havingbetween
                    // latest /oldest /inrendemorder

    //use eloquent relationship
        // $data = User::with(['post'])->get();
        // $data = post::where('id', 1)->with(['user'])->get();
    //get singel columen first value based on condition
        // $inerjoin = DB::table('users')->value('name');

    //get singel columen first value based on condition [get all columen]
        // $inerjoin = DB::table('users')->first();

    //get columen all value based on condition
        // $inerjoin = DB::table('users')->pulck('name');

    //take
        // $inerjoin = DB::table('users')->take('5')->get();

    //skip
        // $inerjoin = DB::table('users')->skip('2')->take('10')->get();
        
    //limit offset   
        //  $inerjoin = DB::table('users')->offset('2')->limit('10')->get();
        
    //get distinct recode
        // $inerjoin = DB::table('users')->distinct();

    //get selected field
        // $inerjoin = DB::table('users')->select('name')->get()->toArray();

    //row expressions
        // $inerjoin = DB::table('users')
        //             ->selectRaw('count(*) as user_count, name')
        //             ->groupBy('name')
        //             ->get();

    // $inerjoin = DB::table('posts')
    //             ->selectRaw('count(*) as post_count, users.*')
    //             ->join('users', 'users.id', '=', 'posts.user_id')
    //             ->groupBy('users.id')
    //             ->get();

    //advance join (with closer)
        // $inerjoin = DB::table('users')
        //             ->join('posts', function ($q) {
        //                 $q->on('users.id', '=', 'posts.user_id');
        //                 // ->where('posts.id', '>', 3);
        //                 // ->orderBy('user.id')
        //                 // ->groupBy('posts.id');
        //             })
        //             ->where('posts.id', '>', 3)
        // ->get();


        // subquary of the join (it take table alise and closer)
            //demo
                //$duplicates = DB::table('members')
                //     ->selectRaw("count(id) as occurences, concat(surname, ' ', name) as fullname")
                //     ->groupBy('fullname')
                //     ->having('occurences', '>', '1');

                // $members = Member::selectRaw("id, surname, name, club, concat(surname, ' ', name) as fullname")
                //     ->joinSub($duplicates, 'duplicates', function ($join)
                //     {
                //         $join->on('members.fullname', '=', 'duplicates.fullname');
                //     })
                //     ->orderBy('name')
                //     ->get();

            
        // $tablealise = DB::table('posts')
        //             ->selectRaw('count(*) as post_count, posts.*')
        //             ->groupBy('posts.id');

        // $inerjoin = DB::table('users')
        //                 ->joinSub($tablealise, 'posts', function ($q) {
        //                     $q->on('users.id', '=', 'posts.user_id');
        //                 })->tosql();

        //Basic Where Clauses
        //whare (by defualt it take = oprater)
            // $inerjoin = DB::table('users')
            //             ->where('id',2)
            //             ->get();

        //thrar are two way to use multipale whare condition
        //1
            // $inerjoin = DB::table('users')
            //             ->where('id',2)
            //             ->where('id',2)
            //             ->tosql();

        //2
            // $inerjoin = DB::table('users')
            //             ->where([
            //                         ['id',3],
            //                         ['name','Prof. Norma Muller MD']
            //                     ])
            //             ->tosql();
            
        //orwhare
        // $inerjoin = DB::table('users')
        //                 ->where('id',2)
        //                 ->orwhere('id',2)
        //                 ->tosql();

        //whereColumn
        // $inerjoin = DB::table('users')
        //     ->whereColumn('id','id')
        //     ->get();

        //Subquery Where Clauses
        // $inerjoin = User::where(function ($query) {
        //     $query->select('posts.id')
        //         ->from('posts')
        //         ->whereColumn('posts.user_id', 'users.id')
        //         ->orderByDesc('posts.id')
        //         ->limit(1);
        // }, '1')->get();

        //whereFullText
        // $inerjoin = DB::table('users')
        //             ->whereFullText('name','Prof. Moriah Hintz PhD')
        //             ->get();

        //condition close
        // $uniq_id = "PR-7";
        // $inerjoin = DB::table('users')
        //         ->when($uniq_id, function ($query, $uniq_id) {
        //             $query->where('unique_id', $uniq_id);
        //         })
        //         ->get();


        //for debaging
        // DB::table('users')->where('id', '>', 9)->dd();
        // DB::table('users')->where('id', '>', 9)->dump();


    //    dd($inerjoin);        
    //   dd($inerjoin->toArray());
        // return $inerjoin;
    }
    public function collection(){
        //making collection
        $array = [1,2,4]; 
        $data = collect($array);
        dd($data);

        //dublicate 
        //chunk
        //shuffle
        //min /max/avg --agrigate function
        //mode /madian
        //first /last
        //join /implode
        //js mathed -trancfome / map /filter /reject
        //push /pop /prepand / appand /shift /pull 
        
        //lazy collection
        //it will lode the all data 
                // $users = User::all();
        //make lazy collection
            // $users = User::curser();
            // foreach ($users->take(10) as $key){
            //     echo $key->name;
            //     echo "<br>";
            // }

            //remmaber fatched recode 
            // $users = User::curser()->remember();
            // foreach ($users->take(10) as $key){
            //     echo $key->name;
            //     echo "<br>";
            // }
            
    }
    public function notify(){
        $user = User::find(1);
        dd($user);
        $extra_message = "new user";

        //send notification
        // 1 way
            // $notify = $user->notify(
            //     new teastnotification($extra_message)
            // );
        // 2 whay 
            // Notification::send($user, new teastnotification($extra_message));
        
        //accessing the notification
        // foreach ($user->notifications as $notification) {
            //     print_r($notification->data);
            //     echo "<br>";
            //     // echo $notification->data;
            // }        
            
        //notification marke as read
        // foreach ($user->unreadNotifications as $notification) {
        //     $notification->markAsRead();
        // }

        //get notreaded notification
        // foreach ($user->unreadNotifications as $notification) {
        //     print_r($notification->data);
        //         echo "<br>";
        //     // $notification->markAsRead();
        // }

        //remove notification
        // $user->notifications()->delete();
    }

}