<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatReply;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::with('user:id,first_name,last_name,email,avatar')->paginate(20);

        return view('admin.layouts.help-center.index', compact('chats'));
    }

    public function show($id)
    {
        $chat = Chat::with('user:id,first_name,last_name,email,avatar')->findOrFail($id);

        return view('admin.layouts.help-center.show', compact('chat'));
    }

    public function chatDetails($randomChatId)
    {
        try {
            $userId = auth()->user()->id;
            //            $chatsDetails = Chat::with('user:id,avatar','chatReply.user')->where('user_id', $userId)->where('random_chat_id', $randomChatId)->limit(100)->get();

            $chatsDetails = Chat::with('user:id,avatar', 'chatReply.user')->where('random_chat_id', $randomChatId)->get();

            return response()->json([
                'success' => true,
                'data' => $chatsDetails,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function chatReplyStore(Request $request)
    {
        try {
            // Validate the request data
            $validate = Validator::make($request->all(), [
                'chat_id' => 'required|integer',
                'reply_message' => 'required|string|max:1000',
            ], [
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
                'chat_id' => $request->chat_id,
            ]);

            // Redirect with success message
            return redirect()->route('admin.help.show', $request->chat_id)->with('success', 'Message Reply sent successfully');

        } catch (\Exception $e) {
            // Redirect with error message in case of an exception
            return redirect()->route('admin.help')->with('error', $e->getMessage());
        }
    }

    public function status(Request $request, $id)
    {
        try {
            Chat::findOrFail($id)->update([
                'status' => $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Chat Status Changed Successfully.',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
