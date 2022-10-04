<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Traits\DeleteModelTrait;
use App\Traits\DeleteSelectedTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    use DeleteModelTrait , DeleteSelectedTrait;
    private $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    
    public function index () {
        $data = $this->message->latest()->get();
        return view('backend.pages.message.index' , compact('data'));
    }

    public function create (Request $request) {
        try {
            DB::beginTransaction();
            $email = $this->message->where('email', $request->email)->first();
            if($email){
                $mes = [];
                $mes[] = $email['message'];
            }else{
                $this->message->create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "subject" => $request->subject,
                    "message" => $request->message
                ]);
            }
            
            DB::commit();
            return redirect()->route('home');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }
    public function view($email){
        return view('backend.pages.message.view');
    }

    public function delete ($id){
        return $this->deleteModelTrait($id, $this->message);
    } 
    public function deleteSelected ( Request $request ) {
        if($request->ajax()){
            return $this->deleteSelectedTrait($request->ids , $this->message);
        }
    }
}
