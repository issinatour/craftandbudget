$(document).ready(function(){

    $('.summernote').summernote();

});
var edit = function() {
    $('.click2edit').summernote({focus: true});
};
var save = function() {
    var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
    $('.click2edit').destroy();
};/**
 * Created by Issam on 21/05/2015.
 */
