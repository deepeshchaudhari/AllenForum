/*
File Name : library.js
 */
$("#addBookForm").on('submit',function (e) {
    var book_id = $("#book_id").val();
    var book_name = $("#book_name").val();
    var book_author = $("#book_author").val();
    var book_category= $("#book_category").val();
    var book_year = $("#book_year").val();
    // var book_qty = $("#book_qty").val();

    $("form#addBookForm").hide();
    $("#submitAddBookLoading").show();
    e.preventDefault();
    $.ajax({
        url : 'functions/library/library-ajax-request.php',
        data :{q: 'addLibraryBooks',
              book_id:book_id,book_name:book_name,book_author:book_author,
             book_category:book_category,book_year:book_year
        },
        method : 'POST',
        success : function (response) {
           // alert(response);
            window.location.href = 'view-library-books.php';
        },
        complete : function () {
            $("form#addBookForm").show();
            $("#submitAddBookLoading").hide();
            $("form#addBookForm").each(function(){
                this.reset();
            });
        }
    });
});


$("#bookEntryExitForm").on('submit',function (e) {
    e.preventDefault();
    $("#searchEntryBookLoader").show();
    var bookId = $("#bookId").val();
    if (bookId !="" ) {
        $("#search_bookBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        $.post('functions/library/library-ajax-request.php',
            {bookEntryExitForm: 'bookEntryExitForm', bookId: bookId},
            function (response) {
                // alert(response);
                $("#bookEntryExitDiv").html(response);
                $("#search_bookBtn").html('Find <i class="fa fa-search"></i>');

            });
          }
        });


   /* function bookEntry() {
    var bookTypeId = $("#bookTypeId").val();
    var bookQty = $("#bookQty").val();
    //alert(bookTypeId);
        $.post('functions/library/library-ajax-request.php',
            {updateBookEntry:'updateBookEntry',bookTypeId:bookTypeId,bookQty:bookQty,type:'entry'},
            function (response) {
                 alert(response);
                 window.location.reload();

            });
    }
    function bookExit() {
        var bookTypeId = $("#bookTypeId").val();
        var bookQty = $("#bookQty").val();
        //alert(bookTypeId);
        $.post('functions/library/library-ajax-request.php',
            {updateBookEntry:'updateBookEntry',bookTypeId:bookTypeId,bookQty:bookQty,type:'return'},
            function (response) {
                alert(response);
                window.location.reload();
            });

    }*/

    function getbookBySearch() {
        $("#book-loader").show();
      var searchBookKeyword = $("#searchBookKeyword").val();
      $.post("functions/library/library-ajax-request.php",{bookSearchByKeyWord:'bookSearchByKeyWord',searchBookKeyword:searchBookKeyword},function (response) {
         // alert(response);
          $("#load-book-data").html(response);
          $("#book-loader").hide();
      });

    }

    function updateBookEntryExit(bookId,type) {
        $.ajax({
            url : "functions/library/library-ajax-request.php",
            data :{updateBookEntry:"updateBookEntry",bookId:bookId,type:type},
            method : "POST",
            success : function (response) {
                alert(response);
                window.location.reload();
            }
        });
    }

    /*
    upload Library book Sheet
     */
    $("form#uploadBookSheetForm").on("submit",function (e) {
       e.preventDefault();
        $("#uploadBookBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Uploading...');
        $.ajax({
            url: "functions/library/library-ajax-request.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (response)   // A function to be called if request succeeds
            {
               var res = response.split('^');
               if (res[1] == "uploaded"){
                   alert("Sheet Uploaded Successfully !");
                   $("#formSuccessMessage").show();
                   setTimeout(function() {
                       $("#formSuccessMessage").hide('blind', {}, 500);
                   }, 2000);
                   $("form#uploadBookSheetForm").each(function () {
                       this.reset();
                   });

                   $("#uploadBookBtn").html('<i class="fa fa-upload"></i> Upload Book');
               }
           }
       });
    });

    function getLibraryDasboardData() {
        var librarybookCategory = $("#librarybookCategory").val();
        $.post("functions/library/library-ajax-request.php",{
            getLibrarianDahboard:'getLibrarianBooksByType',
            bookType:librarybookCategory
        },function (response) {
            //alert(response);
            var res = response.split('^');
            var specifiedBook = res[1];
            var csBookCount = res[2];
            var meBookCount = res[3];
            var ecBookCount = res[4];
            var managementBookCount = res[5];
            var defaultBookCount = res[6];
            var appliedBook = res[7];
            var totalBooks = res[8];

            if (librarybookCategory == ""){
                $("#csBookCount").html(csBookCount);
                $("#meBookCount").html(meBookCount);
                $("#ecBookCount").html(ecBookCount);
                $("#eeBookCount").html('0');
                $("#ceBookCount").html('0');
                $("#appliedBookCount").html(appliedBook);
                $("#managementBookCount").html(managementBookCount);
                $("#defaultBookCount").html(defaultBookCount);
                $("#totalBooksCount").html(totalBooks);
            }
            // else if (librarybookCategory == "Applied Science & Humanities") {
            //     $("#appliedBookCount").html(specifiedBook);
            // }
        });
    }

