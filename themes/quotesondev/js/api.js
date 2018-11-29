$(document).ready(function () {
   //  console.log(red_vars.rest_url);
    $('.quote-form').on('submit', function(event) {
        event.preventDefault(); //prevents page from refreshing
    //Get the author and the quote from the form
    const quote_author = $('#quote-author').val(); // .val() means to get the value
    const quote = $('#quote').val();
    const quote_source = $('#quote-source').val();
    const quote_url = $('#quote-url').val();
// var fail_check = 0;
// if fail check = 1, exit teh jquery function
//if any of the tests for the field fail, set fail check one
// if source doesnt exist but url does, output the error .. need a source

   //  console.warn(quote_author);
   //  console.warn(quote);
   //  console.warn(quote_source);
   //  console.warn(quote_url);

   // this is an AJAX requet to post your data to the server and or WP
   $.ajax({
      method: 'post', //post to the server
      url: red_vars.rest_url + 'wp/v2/posts',
      data: { //data being passed through the server from the form
         'title': quote_author,
         'content': quote,
         '_qod_quote_source': quote_source,
         '_qod_quote_source_url': quote_url
      },
      beforeSend: function(xhr) { //for security purposes
         xhr.setRequestHeader( 'X-WP-Nonce', red_vars.wpapi_nonce );
      }
   }).done( function(response) { //when things are done
      alert('Success! Comments are closed for this post.');
   });
   });
});


// grabs the json object and stores it into the variable 'result'
$('.quotes-button').on("click", function() {
   // console.log('clicked');
   $.ajax({
       method: "GET",
       url: red_vars.rest_url + "wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1"
   }).done(result => {
       let quote = (result[0].content.rendered);
       let author = (result[0].title.rendered);
       let source = (result[0]._qod_quote_source);
       let url = (result[0]._qod_quote_source_url);
       $('.quotes-content').html(quote);
       $('.quote-author').html('- ' + author);
      
      // if there is a source
      // if there is no source we replace it with an empty strings
       if(source) {
         $('.quote-source').html((url) ? ", <a href='" + url + "'>" + source + "</a>" : ", " + source);
      } else {
         $('.quote-source').html("");
      }
   }).fail(function(err) {
      console.log(err);
   })
});





// $( document ).ready(function() {
//     //prevents arrow functions to keep this context
//     //prevents the page from doing its most 'natural' thing
//     event.preventDefault();

//     console.log( "ready!" );
//     const quote = $(".hotdog");
//     const author = $(".burger");

//     $(".ketchup").on("click", function() {
//         $.ajax({
//             url: red_vars.rest_url + "wp-json/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1", //filtered by random posts and one post per page
//             method: "GET"})
//             .done(result => {
//                 $("div.author").html(result.author_of_authorz);
//                 console.log("This is the result from the endpoint". result);


//                 quote.html(result.quote); 
//                 author.html(result.author);
//             })
//             .fail(err => {
//                 $("div.error").html("Oh no! We couldn't get a quote");
//                 console.error("An error occured with teh AJAX", error);
//                 quote.html("hola"); 
//                 author.html("harry potter");
//                 console.log("errorerror");
//             });
//     })
// });

// //$.ajax({url: "api/createQuotes", method: "POST"})