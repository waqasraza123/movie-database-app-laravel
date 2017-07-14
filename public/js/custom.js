$(function(){

    /**
     * global variables
     */
    var releaseDate = $("#release-date")
    var runtime = $("#runtime")
    var language = $("#language")
    var updatingMovieForm = $("#update-movie-form")

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
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

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
        $(this).valid();
    });
    if(updatingMovieForm.length){
        updatingMovieForm.validate({
            ignore: 'input[type=hidden]',
        })
    }

    /**
     * hide alerts
     */
    setInterval(function hideAlert() {
        if($('div.alert').length > 0){$('div.alert').slideUp('slow')}
    }, 5000)

})