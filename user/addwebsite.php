<!DOCTYPE html>

<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .body-cont {
            margin-right: 2%;
            margin-left: 2%;
            padding-top : 2%;
        }

        /* Remove the navbar's default margin-bottom and rounded borders */

        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */

        .row.content {
            height: 450px
        }

        /* Set gray background color and 100% height */

        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */

        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */

        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {
                height: auto;
            }
            body {
                max-width: 700px;
            }
        }

        .iii {
            position: absolute;
            background: #f00;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
    </style>
</head>

<body>
    <div class="my-nav"></div>


    <div class="container-fluid text-center body-cont">
        <div class="row content">
            <div class="col-sm-6">

                <form class="well form-horizontal" id="formss">
                    <fieldset>
                        <legend>
                            <center>
                                <h2>
                                    <b>Add a website</b>
                                </h2>
                            </center>
                        </legend>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-globe"></i>
                                    </span>
                                    <input placeholder="http://www.example.com" class="form-control input-lg" type="url" id="website">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <br>

                                <button type="submit" class="btn btn-lg btn-warning btn-block" name="login">Add WebSite</button>

                            </div>
                        </div>


                    </fieldset>
                </form>


            </div>
            <div class="col-sm-6">
                <div class="col text-center">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe id="if" class="embed-responsive-item" src="https://glyphicons.bootstrapcheatsheets.com/"></iframe>
                        <div class="embed-responsive  iii">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>



</body>


<script>
    var website;
    $(function () {
        $(".my-nav").load("nav.php");
    });

    $("#formss").on('submit', function (e) {

        e.preventDefault();
         website = $("#website").val();


        if (website == "")
            $("#website").focus();
        else {
    
                $("#if").attr('src', website);
        
            $.post("userinput.php",{
                addweb : 1,
                website : website,
            },function(data){
                console.log(data);

                if(data == "exists"){
                    alert("website already exist");
                }
                else if(data == "success")
                    alert("added");
            }

            );

            console.log(website);

        }


    });


</script>

</html>