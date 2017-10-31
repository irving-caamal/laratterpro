<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Notifications\UserFollowed;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;
use Mockery\Exception;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        /*throw new \Exception('debug');*/
        $user = $this->findByUsername($username);
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function followers($username)
    {
        $user = $this->findByUsername($username);
        return view('users.follows',
            [
                'user' => $user,
                'follows' => $user->followers
            ]);

    }

    public function follows($username)
    {
        $user = $this->findByUsername($username);
        return view('users.follows',
            [
                'user' => $user,
                'follows' => $user->follows
            ]);
    }

    public function follow($username,Request $request)
    {
        $user = $this->findByUsername($username);

        $me = $request->user();

        $me->follows()->attach($user);

        $user->notify(new UserFollowed($me));

        return redirect('/'.$username.'')->withSuccess('Followed');
    }

    public function unfollow($username,Request $request)
    {
        $user = $this->findByUsername($username);

        $me = $request->user();

        $me->follows()->detach($user);

        return redirect('/'.$username.'')->withSuccess('User Unfollwed');
    }

    public function sendPrivateMessage($username,Request $request)
    {
        $user=$this->findByUsername($username);
        $me =$request->user();
        $message =$request->input('message');

        $conversation = Conversation::between($me, $user);

        /* Se mueve la logica al metodo between el el model Conversation
         $conversation = Conversation::create();
        $conversation->users()->attach($me);
        $conversation->users()->attach($user);*/

        $privateMessage = PrivateMessage::create([
            'conversation_id'=> $conversation->id,
            'user_id' => $me->id,
            'message' => $message,
        ]);

        return redirect('/conversations/'.$conversation->id);
    }

    private function findByUsername($username)
    {
        return $user = User::where('username', $username)->firstOrFail();
    }

    public function notifications(Request $request)
    {
        return $request->user()->notifications;
    }
}
