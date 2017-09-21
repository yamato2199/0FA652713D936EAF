<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;

class ContactAdminController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::where('user_id',Auth::user()->id)->get();
  
        return view('ucp/contact/index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        
        $user = $request->user_id;
        return view('ucp/contact/create', compact('user'));
        //return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = Auth::user();
        $contacts = $request->all();
        //Contact::create($contacts);
        $contact = $user->contacts()->create($contacts);
        //$user_id = $request->user_id;
        //return $request->all();
        //默认default
        $this->default($contact->id);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $contacts = Contact::where('user_id',Auth::user()->id)->get();
        //return $contacts;
        return view('ucp/contact/index', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $contact = Contact::find($id);
        return view('ucp/contact.edit')->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
       
        $contact = Contact::find($id);
        $contact->update($request->all());
        //修改其他地址default为0
        //Contact::where('id','!=',$id)->update(['cont_isdefault' => 0]);
        return redirect('ucp/contact/index');
        
    }
    public function default($id)
    {
        //return $request->all();
        //修改其他地址default为0
        $contact = Contact::find($id);
        $contact->update(['cont_isdefault' => 1]);
        Contact::where('id','!=',$id)->update(['cont_isdefault' => 0]);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('ucp.contact.index');
    }
}
