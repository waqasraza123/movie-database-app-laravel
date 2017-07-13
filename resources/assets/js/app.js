
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

class Errors{

    /**
     * Create a new Errors instance.
     */
    constructor(){
        this.errors = {};
    }

    /**
     * Retrieve the error message for a field.
     *
     * @param {string} field
     */
    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }
    /**
     * Record the new errors.
     *
     * @param {object} errors
     */
    record(errors){
        this.errors = errors
    }

    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clear(field){
        if (field) {
            delete this.errors[field];

            return;
        }

        this.errors = {};
    }

    /**
     * Determine if we have any errors.
     */
    any(){
        return Object.keys(this.errors).length > 0;
    }
}

new Vue({
    el: '#app',

    components: {
    },

    data: {
        movie: {
            title: '',
            language: '',
            poster: ''
        },

        errors: new Errors(),
    },

    methods: {
        createMovie() {
            axios.post('/movies', this.$data)
                .then(response => alert('success'))
                .catch(error => this.errors.record(error.response.data));
        }
    }
});
