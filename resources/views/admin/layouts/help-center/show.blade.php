@extends('admin.app')
@section('title', 'User')
@section('header_title')
    User
@endsection;
@push('style')
    <style>

        .default--scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .default--scrollbar::-webkit-scrollbar-track {
            background-color: var(--border-color);
            border-radius: 10px;
        }
        .default--scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(151deg, #fdd5b3 7.38%, #c3edfa 100%);
            border-radius: 10px;
        }
        .all--purchase--tickets {
            height: 520px;
            overflow-y: auto;
            padding-right: 16px;
        }
        .app--content--main{
            margin-top: 86px;
            padding: 0 47px 11px;
        }
    </style>
@endpush
@section('content')
    <!-- start app content area  -->
    <section class="app--content--main statistics">
        <div class="row align-content-center justify-content-evenly p-3" >
            <div class="top--affliates card h-100">
                <div class="ticket--history--box position-relative p-5">
                    <div class="top--title">
                        <h3 class="common--title mb-3">Chat Reply</h3>

                    </div>
                    <div class="">

                        <div class="all--purchase--tickets default--scrollbar p-5" id="all-chat-reply" data-random-chat-id="{{$chat->random_chat_id}}" data-chat-id="{{$chat->id}}">
                            <!-- message single  -->
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="user--common--btn d-none" data-bs-toggle="modal" data-bs-target="#chat-reply-modal" id="replyBtn">Reply</button>
                            <div class="modal fade" id="chat-reply-modal" tabindex="-1" aria-labelledby="chat-reply-modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered ">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.live-chat.reply.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="chat-reply-modalLabel"></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label for="message">Reply Message</label>
                                                    <textarea class="mt-3 form-control @error('reply_message') is-invalid @enderror"
                                                              id="reply_message" name="reply_message"
                                                              placeholder="Enter your reply message"
                                                              rows="6">{{ old('reply_message') ?? '' }}</textarea>
                                                    @error('reply_message')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="chat_id" id="replyInput">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var allChatReply = $('#all-chat-reply');
            function getChatReply(){
                var randomChatId = allChatReply.data('random-chat-id');

                allChatReply.attr('data-random-chat-id', randomChatId);
                $('#replyInput').val(allChatReply.data('chat-id'));
                allChatReply.empty();

                let url = "{{ route('admin.live-chat.reply.details', ['random_chat_id' => ':random_chat_id']) }}";
                url = url.replace(':random_chat_id', randomChatId);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response)
                        if (response.success) {
                            if(response.data.length > 0) {
                                $('#replyBtn').removeClass('d-none')
                                var chatData = response.data[0];
                                var userName = chatData.name;
                                var userMessage = chatData.message;
                                var userAvatar = chatData.user.avatar;

                                var userDate = new Date(chatData.created_at).toLocaleDateString();

                                // User's initial message
                                var singleChatHtml = `
                                    <div class="row user--chat--single mb-5">
                                        <div class="col">
                                            <img class="img-fluid mt-1 rounded rounded-circle" src="{{ asset('${userAvatar}') }}" alt="">
                                        </div>
                                        <div class="col-11">
                                            <div class="border border-5 border-info-subtle rounded rounded-5 p-3">
                                                <div class="d-flex justify-content-between">
                                                    <p>${userName}</p>
                                                    <p>Date: ${userDate}</p>
                                                </div>
                                                <div class="message--box mt-4">
                                                    <p>${userMessage}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                `;

                                // Append user's initial message
                                allChatReply.append(singleChatHtml);

                                // Append replies
                                chatData.chat_reply.forEach(function(reply) {

                                    var replyUserName = reply.user.first_name + ' ' + reply.user.last_name;
                                    var replyMessage = reply.content;
                                    var replyDate = new Date(reply.created_at).toLocaleDateString();
                                    var replyUserAvatar = reply.user.avatar;

                                    var replyHtml = '';
                                    console.log(reply.user.role)
                                    if (reply.user.role == 'admin') {
                                        replyHtml = `

                                        <div class="row user--chat--single mb-5">
                                                <div class="col-11">
                                                    <div class="border border-5 border-info-subtle rounded rounded-5 p-3">
                                                        <div class="d-flex justify-content-between">
                                                            <p>${replyUserName}</p>
                                                            <p>Date: ${replyDate}</p>
                                                        </div>
                                                        <div class="message--box mt-4">
                                                            <p>${replyMessage}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <img class="img-fluid mt-1 rounded rounded-circle" src="{{ asset('${replyUserAvatar}') }}" alt="">
                                                </div>
                                            </div>
                                        `;
                                    } else {
                                        replyHtml = `


                                    <div class="row admin--chat--single mb-5">
                                        <div class="col">
                                            <img class="img-fluid mt-1 rounded rounded-circle" src="{{ asset('${replyUserAvatar}') }}" alt="">
                                        </div>
                                        <div class="col-11">
                                            <div class="border border-5 border-info-subtle rounded rounded-5 p-3">
                                                <div class="d-flex justify-content-between">
                                                    <p>${replyUserName}</p>
                                                    <p>Date: ${replyDate}</p>
                                                </div>
                                                <div class="message--box mt-4">
                                                    <p>${replyMessage}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            `;
                                    }

                                    allChatReply.append(replyHtml);
                                });
                            }else {

                                noDataText = `<p class="text-center">No Chat Found</p>`;
                                allChatReply.html(noDataText);
                            }
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching chat:', error);
                        // Optionally, display an error message in the UI
                    }
                });
            }
            getChatReply()

        });

    </script>
@endpush
