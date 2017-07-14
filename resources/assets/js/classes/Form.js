import {Errors} from './Errors';

export class Form{
    constructor(){
        this.title = '';
        this.poster = '';
        this.language = [];
        this.errors = new Errors();
    }

    createMovie() {
        var formData = new FormData(document.querySelector('#create-movie-form'))
        axios.post('/movies', formData)
            .then(response => {
                swal("Good job!", "Movie has been Saved!", "success");
                this.resetForm()
            })
            .catch(error => {
                this.errors.record(error.response.data);
            });
    };

    /**
     * remove image
     * @param e
     */
    removeImage(e) {
        this.poster = '';
    }

    /**
     * detect language change
     * @param e
     */
    changeLanguage(n){
        if(n > 0){
            $(".text-red.language").hide()
            this.errors.clear('language')
        }
    }

    /**
     * clear form fields
     */
    resetForm(){
        $('#create-movie-form')[0].reset();
        location.reload(true)
    }
}