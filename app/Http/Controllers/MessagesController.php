<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Created';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
        //dd($request->all());
        //$this->validate($request);
        $user = $request->user();
        $image = $request->file('image');

        $message = Message::create([
            'content' => $request->input('message'),
            'image' => $image->store('image','public'),
            'user_id' => $user->id
        ]);

        //dd($message);
        return redirect('/messages/'.$message->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //dd($message);
        return view('messages.show',compact('message'));
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

    public function search(Request $request)
    {
        $query = $request->input('query');

        /*
         * Buscamos los mensajes de otra manera usando el metodo search() para buscar en algolia , por lo cual los users se extraen despues de crear los mensajes con el metodo load() en vez de with() ya que with es cuando se arma la query y load cuando ya la tienes y necesitas los users de dicha query o resultado.
         */
        /*$messages = Message::with('user')->where('content', 'LIKE', "%$query%")->get();*/
        $messages = Message::search($query)->get();

        $messages->load('user');

        return view('messages.index', [
            "messages" => $messages
        ]);


    }

    public function responses(Message $messages)
    {
        //dd($message) ;
        return $messages->responses;
    }
}
