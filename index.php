<!doctype html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My php Website</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.11.2.min.js"></script>
</head>

<body>
  <div class="container-fluid" style="margin-top: 200px;">
    <div class="row col-xs-12">
<!--      <div class="col-xs-10 col-xs-offset-1">
        <form class="form-horizontal" action="php/action.php" method="post">
          <div class="form-group">
            <label class="col-xs-2 control-label text-center" for="urlSearch">Enter Url</label>
            <div class="col-xs-9">
              <input type="text" name="url" class="form-control col-xs-9"  id="urlSearch" placeholder="enter your url to search">
            </div>
            <div>
              <input class="btn btn-danger col-xs-1" value="Go" type="submit">
            </div>
          </div>
        </form>

      </div>
-->
      <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <form class="form-horizontal" action="php/search.php" method="get" target="_blank">
          <div class="form-group">
            <label class="control-label col-xs-2 text-center" for="itemSearch">Enter item</label>
            <div class="col-xs-8 input-append">
              <input type="text" class="form-control"  name = "item" id="itemSearch" placeholder="enter your item to search">
            </div>
            <div>
              <input class="btn btn-danger col-xs-1" value="Go" type="submit" id = "x">
            </div>
          </div>
        </form>

      </div>
    </div>
<!--    <div class="col-xs-8 col-xs-offset-2">
      <div class="input-group input-group-lg">
        <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      </div> -->

    <div class="row" id = "return">
      <div class="col-xs-10 col-sm-offset-1">

      </div>
    </div>

  </div>
</body>

</html>
