var Script = function () {



    $().ready(function () {
        // validate signup form on keyup and submit
        $("#register_form").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 6
                },
              
                lastname: {
                    required: true,
                    minlength: 6
                },
                  username: {
                    required: true,
                    minlength: 6
                },
                 course: {
                    required: true,
                    minlength: 6
                },
                 section: {
                    required: true,
                    minlength: 6
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                  agree: {
                    required: true,
                    agree: true
                },               
                agree: "required"
               
            },
            messages: {
                firstname: {
                    required: "Please enter a First Name.",
                    minlength: "Your First Name must consist of at least 6 characters long."
                },
       
                lastname: {
                    required: "Please enter a Last Name.",
                    minlength: "Your Last Name must consist of at least 6 characters long."
                },
               
                password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long."
                },
                confirm_password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long.",
                    equalTo: "Please enter the same password as above."
                },
                   username: {
                    required: "Please enter a Username.",
                    minlength: "Your username must consist of at least 6 characters long."
                },
                   course: {
                    required: "     Please enter your class.",
                },
                   section: {
                    required: "    Please enter your section.",
                },
                email: "Please enter a valid email address.",
                agree: "Please accept our terms & condition.",
            }
        });               
    });
}();
