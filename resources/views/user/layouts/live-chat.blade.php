@extends('user.app')

@section('title', 'Dashboard')

@section('header_title')
Help Center
@endsection;

@push('style')
    <style>
        .cursor--pointer{
            cursor: pointer;
        }
    </style>
@endpush

@section('content')

<!-- start app content area  -->
<section class="app--content--main user--portal statistics">
    <div class="help--area">
      <div class="row">

          <div class="col-md-8">
              <div class="">
                  <div class="ticket--history--box position-relative">
                      <div class="top--title">
                          <h3 class="common--title">Chat Reply</h3>
                          {{-- <a href="#" class="button mb_25">See All</a> --}}
                      </div>
                      <div class="">

                          <div class="all--purchase--tickets default--scrollbar" id="all-chat-reply" >
                              <p class="text-center">No Chat Found</p>

                              <!-- message single  -->
                          </div>
                          <div class="d-flex justify-content-center">
                            <button class="user--common--btn d-none" data-bs-toggle="modal" data-bs-target="#chat-reply-modal" id="replyBtn">Reply</button>
                              <div class="modal fade" id="chat-reply-modal" tabindex="-1" aria-labelledby="chat-reply-modalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg modal-dialog-centered ">
                                      <div class="modal-content">
                                          <form action="{{ route('user.live-chat.reply.store') }}" method="POST">
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

          <div class="col-md-4">
              <!-- chat--box  -->
              <div class="chat--box">
                  <h3>
                      We are here to help, please do not hesitate to contact us!
                  </h3>
                  <a class="user--common--btn" href="" data-bs-toggle="modal" data-bs-target="#chat-modal">Start a new chat</a>
              </div>
              <!-- Modal -->
              <form action="{{ route('user.live-chat.store') }}" method="POST">
                  @csrf
              <div class="modal fade" id="chat-modal" tabindex="-1" aria-labelledby="chat-modalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered ">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h1 class="modal-title fs-5" id="chat-modalLabel"></h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                  @csrf
                                  <div class="form-group mb-3">
                                      <label for="name">Name</label>
                                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                                      @error('name')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="form-group mb-3">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                                      @error('email')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="form-group mb-3">
                                      <label for="message">Message</label>
                                      <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Enter your message">{{ old('message') }}</textarea>
                                      @error('message')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
              </form>

                <div class="chat--box mt-3" style="height: 460px">
                    <h4 class="mb-3">All Chat</h4>
                  <div class="all--purchase--tickets default--scrollbar h-100">
                      @foreach($chats as $chat)
                        <div class="single--chat border mb-3 border-3 border-info  rounded rounded-3 p-3 cursor--pointer" data-random-chat-id="{{$chat->random_chat_id}}" data-chat-id = "{{$chat->id}}">
                          <div class="d-flex justify-content-between">
                              <p>
                                  {{$chat->status ?? ''}}
                              </p>
                              <p>
                                  Date: {{$chat->created_at ?? ''}}
                              </p>
                          </div>
                              <p class="text-start mt-3">
                                  {{$chat->message ? substr($chat->message, 0, 50)."..." : ''}}
                              </p>
                      </div>
                      @endforeach

                  </div>
                </div>
          </div>

      </div>
    </div>
  </section>
  <!-- end app content area  -->

@endsection


@push('script')
    <script>
        $(document).ready(function() {
            var allChatReply = $('#all-chat-reply');
            $('.single--chat').on('click', function() {
                var randomChatId = $(this).data('random-chat-id');
                allChatReply.attr('data-random-chat-id', randomChatId);
                $('#replyInput').val($(this).data('chat-id'));
                allChatReply.empty();

                let url = "{{ route('user.live-chat.reply.details', ['random_chat_id' => ':random_chat_id']) }}";
                url = url.replace(':random_chat_id', randomChatId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
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
                                        <div class="col">
                                            <img class="img-fluid mt-1 rounded rounded-circle" src="{{ asset('${userAvatar}') }}" alt="">
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
                                    if (reply.user_id == 2) {
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
                                    } else if (reply.user_id == 1) {
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

                                // Scroll to the bottom of the div
                                var $scrollableDiv = $('.ticket--history--box .default--scrollbar');
                                $scrollableDiv.scrollTop($scrollableDiv[0].scrollHeight);
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
            });
            $('.single--chat').eq(0).click();

        });

    </script>
@endpush
