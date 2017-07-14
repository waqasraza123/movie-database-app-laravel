import {Errors} from './Errors';

export class Form{
    constructor(){
        this.title = '';
        this.poster = '';
        this.language = [];
        this.errors = new Errors();
    }

    /**
     * create movie resource
     */
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
     * update movie resource
     * specified by id
     */
    /*updateMovie() {
        var formData = new FormData($("#update-movie-form"))
        var data = $("#update-movie-form").serialize()
        var movieId = $('#movie-id').val()
        axios.patch('/movies/' + movieId, {formData, data})
            .then(response => {
                swal("Good job!", "Movie has been Updated!", "success");
            })
            .catch(error => {
                this.errors.record(error.response.data);
            });
    };*/

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
        //$('#language').select2('val', '');
        $('#create-movie-form')[0].reset();
        location.reload(true)
    }
}