<!DOCTYPE html>

<html lang="en">

<head>
  <title>Rate it</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  
  
  
  <style>

    img {
	   border-radius: 50%;
	   width: 3em;
        
          transition:         transform .8s ease-in-out;
}
.imgs:hover {
          transform: rotate(360deg);
}
    .body-cont {
      margin-right: 2%;
      margin-left: 2%;
      padding-top: 2%;
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

    .text-large {
      font-size: 150%;
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
                  <!-- <select class="form-control input-lg js-example-basic-single" id="website" onchange="ifrChange();"> -->
                  <select class="form-control input-lg" id="website" onchange="ifrChange();">
                    <?php
                          include_once "../include/sqlConnect.php";

                          $sqlCheck = "SELECT * FROM `websites`";
                          $result = mysqli_query($db, $sqlCheck);
                          while($row = mysqli_fetch_assoc($result)){
              
                            echo "<option class = 'sll text-large' value = '".$row['web_id']."' site = '".$row['website_name']."'>".$row['website_name']."</option>";

                          }
                      ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12 inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-comment"></i>
                  </span>
                  <textarea placeholder="your Comment Here" class="form-control input-lg" type="text" id="cmt" required minlength="3"></textarea>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12 control-label"></label>
              <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-lg btn-warning btn-block" id="post">Post</button>

              </div>
            </div>


          </fieldset>
        </form>


      </div>
      <div class="col-sm-6">
        <div class="well form-horizontal" id="formss">
          <fieldset>
            <legend>
              <center>
                <h2>
                  <b>Score For this Website </b>
                </h2>
              </center>
            </legend>
            <br>

            <div class="form-group">
              <div class="col-md-12 inputGroupContainer">
                <table class="table table-striped text-center">
                  <thead>
                    <tr>

                      <th class="text-center btn-primary text-large">yours</th>
                      <th class="text-center">
                        <i class="glyphicon glyphicon-arrow-right"></i>
                      </th>

                      <th class="text-center btn-warning text-large" id="myScore">0</th>
                      <th class="text-center" id="mimg"></th>    
                    </tr>
                    <tr>

                      <th class="text-center btn-primary text-large">Maximum</th>
                      <th class="text-center ">
                        <i class="glyphicon glyphicon-arrow-right"></i>
                      </th>

                      <th class="text-center btn-warning text-large" id="maxScore">0</th>
                      <th class="text-center" id="ximg"></th>  
                    </tr>
                    <tr>

                      <th class="text-center btn-primary text-large">Average</th>
                      <th class="text-center ">
                        <i class="glyphicon glyphicon-arrow-right"></i>
                      </th>

                      <th class="text-center btn-warning text-large" id="avgScore">0</th>
                      <th class="text-center" id="aimg"></th>  
                    </tr>
                  </thead>

                </table>

              </div>
            </div>




          </fieldset>
        </div>

      </div>


    </div>
    <div class="row content">


      <div class="col-sm-6">
        <div class="well form-horizontal" id="formss">
          <fieldset>
            <legend>
              <center>
                <h2>
                  <b>previous comments</b>
                </h2>
              </center>
            </legend>
            <br>
         


            <div class="row" id="comment">
                <div class="col-sm-2">
                    <div class="thumbnail">
                    <img class="img-responsive user-photo" src="../img/avatar_2x.png">
                    </div>
                    </div>
                    
                    <div class="col-sm-10">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <strong id="user"></strong>
                    </div>
                    <div class="panel-body" id="cmt">
                   
                    </div>
                    </div>
                    </div>
              
            </div>


          </fieldset>
        </div>


      </div>


      <div class="col-sm-6">
        <div class="col text-center">
          <div class="embed-responsive embed-responsive-4by3">
            <iframe id="if" class="embed-responsive-item" src="rateit.php"></iframe>
            <div class="embed-responsive  iii">
            </div>
          </div>

        </div>
      </div>



    </div>
  </div>


</body>


<script>
  var token = "0fce4b9b25af4337a0cbfb6b31eb296e";
  var website;
  $(function () {
    $(".my-nav").load("nav.php");
    $('.js-example-basic-single').select2();
  });

  $("#formss").on('submit', function (e) {

    e.preventDefault();
    var comment = $("#cmt").val();
    $("#post").html("Posting..");
    $("#post").attr("disabled", true);

    $.post("https://api.dandelion.eu/datatxt/sent/v1", {

      lang: "en",
      text: comment,
      token: token
    }, function (data) {

    //   // console.log(data.sentiment.score);
      $("#post").attr("disabled", false);
      $("#post").html("Post");
      postDb(((((data.sentiment.score)*10-(-10)) * 10) / 20) + 0, data.sentiment.type, comment);
      //postDb(((((comment)*10-(-10)) * 10) / 20) + 0, 'p', 'dfgdfg');
    }
    );
  });

  function postDb(score, type, cmt) {

    var webId = $("#website").val();
    // console.log(webId);
    $.post("userinput.php", {
      score: score,
      type: type,
      cmt: cmt,
      webId: webId

    }, function (data) {
      //  console.log(data);
      $("#cmt").val("");
      var s = data.split("::");
      updateScores(score, s[0], s[1]);  // console.log(s);
    });


  }

  function updateScores(my, max, avg) {
    // console.log(m);
    $("#myScore").html(my);
    $("#maxScore").html(max);
    $("#avgScore").html(avg);
    $("#mimg").html("<img class = 'imgs img-responsive' src='../img/"+imgsrc(my)+".png' alt ='"+imgsrc(my)+"' />");
    $("#ximg").html("<img class = 'imgs img-responsive' src='../img/"+imgsrc(max)+".png' alt ='"+imgsrc(max)+"' />");
    $("#aimg").html("<img class = 'imgs img-responsive' src='../img/"+imgsrc(avg)+".png' alt ='"+imgsrc(avg)+"' />");
    alert("your comments are added");


  }
  function ifrChange() {

    var web = $("#website").find(':selected').attr('site');
    $("#if").attr('src', web);
    $.post("userinput.php",{
        webIdd:$("#website").val()

    },function(data){
        populateCmt(data);
    });

  }
  function populateCmt(data){

    //  console.log(data);
    data = JSON.parse(data);
    var i=0;
    $("#comment").empty();
    $.each(data, function(key,value) {
      $("#comment").append(" <div class='col-sm-2'>\
    <div class='thumbnail'>\
    <img class='img-responsive user-photo' src='../img/avatar_2x.png'>\
    </div>\
    </div>\
    <div class='col-sm-10'>\
    <div class='panel panel-primary'>\
    <div class='panel-heading '>\
    <strong id='user'>"+value.user_id+"</strong>\
    </div>\
    <div class='panel-body' id='cmt1'>"+value.comment+"\
    </div>\
    </div>\
    </div> ");
   
      
}); 
  }
  function imgsrc(scos){
		if(scos<2)
			return 'totallynegative';
		else if(scos<3.5)
			return 'verynegative';

		else if(scos<5)
			return 'negative';
		
		else if(scos<5.5)
			return 'neutral';
		
		else if(scos<7)
			return 'positive';

		else if(scos<8.5)
			return 'verypositive';
		
		else
			return 'totallypositive';
	}

</script>

</html>