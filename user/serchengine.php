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
      margin-right: 30px;
      margin-left: 30px;
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
    .text-large {
      font-size: 150%;
    }
    .lastrow{
      margin-bottom: 20px;
    }
  </style>
</head>

<body>

  <body>
    <div class="my-nav"></div>


    <div class="container-fluid text-center body-cont">
      <div class="row content">
        <div class="col-sm-12">

          <form class="well form-horizontal" id="formss">
            <fieldset>
              <legend>
                <center>
                  <h2>
                    <b>Search Engine</b>
                  </h2>
                </center>
              </legend>
              <br>
              <div class="form-group">
                <div class="col-md-12 inputGroupContainer">

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-search"></i>
                    </span>
                    <input placeholder="Search  Here..." class="form-control input-lg" type="text" id="searchWebsite" required>
                    <span class="input-group-addon">
                      <input type="checkbox" value="1"> Exact Words
                    </span>


                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-6 control-label"></label>
                <div class="col-md-12">
                  <br>

                  <button type="submit" class="btn btn-lg btn-primary" id="search">Search searchWebsite</button>

                </div>
              </div>


            </fieldset>
          </form>


        </div>


      </div>
      <div class="row" >
        <div class="form-group">
          <div class="col-md-12 inputGroupContainer">
            <table class="table table-striped text-center">
              <thead id = "result">
               
              </thead>
            </table>

          </div>
        </div>




        </fieldset>
      </div>
    </div>


    </div>

    </div>



  </body>


  <script>
    var searchWebsite;
    $(function () {
      $(".my-nav").load("nav.php");

    });

    $("#formss").on('submit', function (e) {

      e.preventDefault();
      searchWebsite = $("#searchWebsite").val();


      if (searchWebsite == "")
        $("#searchWebsite").focus();
      else {



        $("#search").html("searching..");
        $("#search").attr("disabled", true);

        var type = "like";
        if ($('input[type=checkbox]').prop('checked'))
          type = "match";


        $.post("userinput.php", {
          searchWebsite: searchWebsite,
          type: type
        }, function (data) {
          console.log(data);
          data = JSON.parse(data);
          $("#result").empty();
          $("#result").append("<tr>\
                    <th class='col-sm-6 btn btn-lg btn-success text-large'>\
                     <a href='website name'> \
                        <i class='glyphicon glyphicon-globe'></i>\
                  </a>\
                    </th>\
                    <th class='text-center btn-primary text-large'>avgsco re</th>\
                    \
                    \
                       \
                            <th class='text-center btn-warning text-large' >tags</th>\
                          </tr><tr><th></th></tr><tr></tr><th></th></tr>\
                         ");

          $.each(data, function (key, web) {

            $("#result").append("<tr>\
                    <th class='col-sm-6 btn btn-lg btn-success text-large'>\
                     "+web.website_name+"<a href='"+web.website_name+"'> \
                        <i class='glyphicon glyphicon-globe'></i>\
                  </a>\
                    </th>\
                    <th class='text-center btn-primary text-large'>"+web.avg_score+"</th>\
                    \
                    \
                       \
                            <th class='text-center btn-warning text-large' >"+web.tags+"</th>\
                          </tr><tr><th></th></tr><tr></tr><th></th></tr>\
                         ");

          });
        }

        );

        // console.log(searchWebsite);
        $("#search").html("Search searchWebsite");
        $("#search").attr("disabled", false);


      }


    });


  </script>


</body>

</html>