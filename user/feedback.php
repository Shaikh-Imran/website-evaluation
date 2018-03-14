<!DOCTYPE html>

<html lang="en">

<head>
  <title>FEEDBACK</title>
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
  </style>
</head>

<body>
  <div class="my-nav"></div>
  
  <div class="page-header text-center">
    <h1>GIVE YOUR FEEDBACK TO OUR SITE </h1>
  </div>

  <div class="container-fluid text-center body-cont">
    <div class="row content">
      <div class="col-sm-12">

        <form class="well form-horizontal" id="formss" action = 'userinput.php' method = 'POST'>
          <fieldset>
            <legend>
              <center>
                <h3>
                  <b>PLACE YOUR COMMENT HERE</b>
                </h3>
              </center>
            </legend>
            <br>
            
            <div class="form-group">
              <label class="col-sm-12 control-label"></label>
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-comment"></i>
                  </span>
                  <textarea placeholder = 'type your feedback here.....' class="form-control input-lg" required minlength="5" name = 'cmt'></textarea>
                </div>
                </div>
                </div>
              
            <div class="form-group">
              <label class="col-sm-6 control-label"></label>
              <div class="col-md-12">
                <br>


                <input type="submit" name ='post' VALUE = 'Post Your Feedbak' class="btn btn-lg btn-primary" id="addWebsite"/>      </div>
            </div>


          </fieldset>
        </form>
      </div>


    </div>
  </div>



</body>
<script>
  $(function () {
    $(".my-nav").load("nav.php");
  });



</script>


</html>