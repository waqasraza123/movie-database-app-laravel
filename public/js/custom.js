$(document).ready(function(){

    /**
     * global variables
     */
    var releaseDate = $("#release-date")
    var runtime = $("#runtime")

    /**
     * custom work
     */
    if(releaseDate.length){
        //Date picker
        releaseDate.datepicker({
            autoclose: true
        });
    }
    if(runtime.length){
        //
    }
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

})