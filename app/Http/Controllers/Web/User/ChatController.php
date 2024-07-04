<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $chats = Chat::with('chatReply.user')->where('user_id', $userId)->orderBy('id', 'desc')->get();
        return view('user.layouts.live-chat', compact('chats'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string|max:1000',
            ]);

            // Check if validation fails
            if ($validate->fails()) {
                flash()->addError('error','Please Check your data and try again');
                return redirect()->route('user.live-chat')
                    ->withErrors($validate)
                    ->withInput();
            }

            // Create a new chat message
            $chat = Chat::create([
                'user_id' => auth()->user()->id,
                'random_chat_id' => Str::random(10),
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            // Redirect with success message
            return redirect()->route('user.live-chat')->with('success', 'Message sent successfully');

        } catch (\Exception $e) {
            // Redirect with error message in case of an exception
            return redirect()->route('user.live-chat')->with('error', $e->getMessage());
        }
    }

    public function chatReplyStore(Request $request)
    {
        try {
            // Validate the request data
            $validate = Validator::make($request->all(), [
                'chat_id' => 'required|integer',
                'reply_message' => 'required|string|max:1000',
            ],[
                'chat_id.required' => 'Invalid chat ID',
               'reply_message.required' => 'Reply message is required',
                'reply_message.string' => 'Message should be text',
                'reply_message.max' => 'Message should not exceed 1000 characters',
            ]);

            // Check if validation fails
            if ($validate->fails()) {
                $errors = $validate->errors()->all();
                // Flash errors to the session
                foreach ($errors as $error) {
                    flash()->addError('error', $error);
                }
                return redirect()->route('user.live-chat')
                    ->withErrors($validate)
                    ->withInput();
            }

            // Create a new chat message
            $chat = ChatReply::create([
                'content' => $request->reply_message,
                'user_id' => auth()->user()->id,
                'chat_id' => $request->chat_id
            ]);

            // Redirect with success message
            return redirect()->route('user.live-chat')->with('success', 'Message Reply sent successfully');

        } catch (\Exception $e) {
            // Redirect with error message in case of an exception
            return redirect()->route('user.live-chat')->with('error', $e->getMessage());
        }
    }

    public  function chatDetails($randomChatId){
        try {
            $userId = auth()->user()->id;
            $chatsDetails = Chat::with('user:id,avatar','chatReply.user')->where('user_id', $userId)->where('random_chat_id', $randomChatId)->limit(100)->get();
            return response()->json([
                'success' => true,
                'data' => $chatsDetails,
            ]);
        }catch (\Exception $e){
            return response()->json([
               'success' => false,
               'message' => $e->getMessage(),
            ]);
        }
    }

}
