// // Give the service worker access to Firebase Messaging.
// // Note that you can only use Firebase Messaging here. Other Firebase libraries
// // are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
// importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js");
// // importScripts("https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js");
// importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js");
// /*
// Initialize the Firebase app in the service worker by passing in the messagingSenderId.
// */
// firebase.initializeApp({
//     apiKey: "AIzaSyDJ8-q2wtsGIJRVfF_pkahm8fJZd71vbns",
//     authDomain: "laravel-web-push-notific-52216.firebaseapp.com",
//     projectId: "laravel-web-push-notific-52216",
//     storageBucket: "laravel-web-push-notific-52216.appspot.com",
//     messagingSenderId: "587610387505",
//     appId: "1:587610387505:web:2513453f7b2184ebdf1110",
//     measurementId: "G-09S97LFPPG",
// });
// console.log("yew herer ");
// // Retrieve an instance of Firebase Messaging so that it can handle background
// // messages.
// const messaging = firebase.messaging();
// messaging.setBackgroundMessageHandler(function (payload) {
//     console.log("Message received.", payload);
//     const title = "Hello world is awesome";
//     const options = {
//         body: "Your notificaiton message .",
//         icon: "/firebase-logo.png",
//     };
//     return self.registration.showNotification(title, options);
// });
