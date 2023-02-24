@extends('layouts.app')

@section('content')
<div class="container">
@if(auth('owner')->check())
<input type="text" class="form-control" id="userId"name="userId" value="{{auth('owner')->user()->id}}">
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
                <button onclick="startFCM()"
                    class="btn btn-danger btn-flat">Allow notification
                </button>
            <div class="card mt-3">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('send.web-notification') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Message Title</label>
                            <input type="text" class="form-control" name="title">
                            <input type="text" class="form-control" id="userId"name="userId" value="{{auth('owner')->user()->id}}">
                        </div>
                        <div class="form-group">
                            <label>Message Body</label>
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script>
    $( document ).ready(function() {

     startFCM();
});


// if ('serviceWorker' in navigator) {
// navigator.serviceWorker.register('http://localhost/WeFix/public/firebase-messaging-sw.js')

//   .then(function(registration) {
//       alert("yes")
//     console.log('Registration successful, scope is:', registration.scope);
//   }).catch(function(err) {
//         alert("no")
//     console.log('Service worker registration failed, error:', err);
//   });
// }
const firebaseConfig = {
  apiKey: "AIzaSyBWA4ZPIHX6BhiM1hLwi8GJPLIoh1pIR3c",
  authDomain: "ishoper-3bd49.firebaseapp.com",
  projectId: "ishoper-3bd49",
  storageBucket: "ishoper-3bd49.appspot.com",
  messagingSenderId: "503005352070",
  appId: "1:503005352070:web:b41b6681f03723be5e0107",
  measurementId: "G-RZYS54BG8Z"
};
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function startFCM() {
        alert("dsfds")
        let uid = $("#userId").val();

        messaging
            .requestPermission()
            .then(function () {
                console.log(messaging.getToken());
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        token: response,
                        id:uid
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error);
                    },
                });
            }).catch(function (error) {
                alert(error);
            });
    }
    messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };

        new Notification(title, options);
    });
</script>
<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

 $(document).ready(function() {
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    //  var pusher = new Pusher('81805c7c25a28215813a', {
    //     cluster: 'ap2'
    //     });

    //     var channel = pusher.subscribe('my-channel');

    //     channel.bind('my-event', function(data) {

    //         if(data.from) {
    //             let pending = parseInt($('#' + data.from).find('.notif-count').html());
    //             if(pending) {
    //                 $('#' + data.from).find('.notif-count').html(pending + 1);
    //             } else {
    //                 $('#' + data.from).html('<a href="#" class="nav-link" data-toggle="dropdown"><i  class="fa fa-bell text-white"><span class="badge badge-danger notif-count">1</span></i></a>');
    //             }
    //         }
    //     });
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>
@endsection
