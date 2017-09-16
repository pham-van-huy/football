
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('chat', require('./components/GuestChat.vue'));

const app = new Vue({
    el: '#app'
});

var axios = require('axios')

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
})

$(document).ready(function(){

    // axios.get('/oauth/clients')
    //     .then(response => {
    //         console.log(response.data);
    //     })

    // axios.get('/api/loginDemo')
    //     .then(response => {
    //         console.log(response.data);
    //     })




})

// console.log($('meta[name="csrf-token"]').attr('content'))
// window.axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content')

$('#bt-login').on('click', function () {
    //  const form_params = {
    //         grant_type: 'password',
    //         client_id: '4',
    //         client_secret: 'yCxEgvOhoag9O24bhvYLs8lIzZtXextMlxRf7Qxn',
    //         username: 'admin@gmail.com',
    //         password: '123123',
    //         scope: '',
    //     }

    // axios.post('/oauth/token', { data: form_params })
    //     .then(response => {
    //         console.log(response.data);
    //     })
    //  axios.post('api/loginDemo', { email: $('#email').val(), password: $('#password').val() })
    //     .then(res => {
    //         console.log(res)
    //         axios.get('api/demo')
    //             .then(res => {
    //                 console.log(res)
    //             })
    //     })
    // $.post('api/loginDemo', { email: $('#email').val(), password: $('#password').val() }, function (data) {
    //     console.log(data)
    // })

    axios.post('login', { email: $('#email').val(), password: $('#password').val() })
        .then(response => {
            // console.log(response)
            axios.get('/get-userId')
                .then(response => {
                    console.log(response.data)
                })
            axios.get('/home')
        })
})
