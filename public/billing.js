/**
 * Created by CarlosRenato on 09/01/2015.
 */
$(document).on('ready', function () {

    var formatResults = function (data) {
        return data.name + '(' + data.id + ')';
    };

    var filtering = function (term, data) {
        if ($(data).filter(function () {
                return this.name.localeCompare(term) === 0;
            }).length === 0) {
            return {text: term}
        }
        ;
    };

    function extractLast(term) {
        return split(term).pop();
    }

    //$('#filter_product').autocomplete({
    //
    //    source: function (request, response) {
    //        $.getJSON('http://admin.billingsystem/product/json', {
    //            term: extractLast(request.term)
    //        }, response);
    //    }
    //});
    var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"];
    $("#filter_product").autocomplete({source: availableTags});
    var getProducts = function(){

    }

    //$('#filter_product').select2({
    //    placeholder: "Select a product...",
    //    //multiple: true,
    //    closeOnSelect: false,
    //    maximumSelectionSize: 1,
    //    ajax:{
    //        url: 'http://admin.billingsystem/product/json',
    //        dataType: 'json',
    //        quietMillis: 300,
    //        data: function(term, page){
    //            return {
    //                q: term
    //            };
    //        },
    //        results: function(data, page){
    //            return {
    //                results: data
    //            };
    //        }
    //    },
    //    formatResult: formatResults,
    //    //createSearchChoice: filtering,
    //});


})
