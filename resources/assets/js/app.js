/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');
import {Form} from './classes/Form';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


var vm = new Vue({
    el: '#app',

    data: {
        form: new Form({
            title: '',
            language: [],
            poster: ''
        }),
        person : ''
    },
    methods: {

        /**
         * detect file change
         * @param e
         */
        onFileChange(e){
            if (!e.length){
                $(".text-red.poster").hide()
                this.form.errors.clear('poster')
            }
        }
    }
});

/**
 * custom work
 */

$("#language").on("select2:select", function (e){
    var length = ($("#language :selected").length)
    vm.form.changeLanguage(length)
});
