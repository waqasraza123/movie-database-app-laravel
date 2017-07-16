$(function(){

    /**
     * global variables
     */
    var releaseDate = $("#release-date")
    var runtime = $("#runtime")
    var language = $("#language")
    var genre = $("#genre")
    var updatingMovieForm = $("#update-movie-form")
    var confirmDelete = $('.confirm-delete')
    var deleteMovieForm = $(".delete-movie-form")
    var ageRating = $("#age-rating")
    var keywords = $("#keywords")
    var createMovieForm = $("#create-movie-form")

    /**
     * custom work
     */
    if(releaseDate.length){
        //Date picker
        releaseDate.datepicker({
            autoclose: true
        });
    }
    if(language.length){
        language.select2()
    }
    if(genre.length){
        genre.select2()
    }
    if(ageRating.length){
        ageRating.select2()
    }
    if(keywords.length){
        keywords.select2({
            tags: true,
            createTag: function (params) {
                var term = $.trim(params.term);
                var count = 0
                var existsVar = false;
                if($('#keywords option').length > 0){
                    $('#keywords option').each(function(){
                        if ($(this).text().toUpperCase() == term.toUpperCase()) {
                            existsVar = true
                            return false;
                        }else{
                            existsVar = false
                        }
                    });
                    if(existsVar){
                        return null;
                    }
                    return {
                        id: params.term,
                        text: params.term,
                        newTag: true
                    }
                }else{
                    return {
                        id: params.term,
                        text: params.term,
                        newTag: true
                    }
                }
            },
            maximumInputLength: 20, // only allow terms up to 20 characters long
            closeOnSelect: true
        })
    }
    try {
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    }catch (e){
        console.log(e)
    }

    /**
     * detect change in language dropdown
     */
    $("#language").change(function(){
        if($("#language").length){
            $(".text-read.language").hide()

            //this.errors.clear('language')
        }
    })
    language.on("select2:close", function (e) {
        //$(this).valid();
    });
    if(updatingMovieForm.length){
        updatingMovieForm.validate({
            ignore: 'input[type=hidden]',
        })
    }
    if(createMovieForm.length){
        createMovieForm.validate({
            ignore: 'input[type=hidden]',
        })
    }

    /**
     * hide alerts
     */
    setInterval(function hideAlert() {
        if($('div.alert').length > 0){$('div.alert').slideUp('slow')}
    }, 5000)

    //show warning message before deleting an item
    if(confirmDelete.length){
        //show popup before deleting the item
        confirmDelete.click(function (e) {
            showConfirmMessage(e, $(this))
        })
    }
    function showConfirmMessage(e, self) {
        e.preventDefault()
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        }, function (isConfirm) {
            if(!isConfirm)
                e.preventDefault()
            else
                self.closest('form').submit();
        });
    }

})