<!doctype html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My php Website</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-1.11.2.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc2/js/bootstrap.min.js"></script>
    <style type="text/css">
        #loading{
            width: 100%;
            height: 100%;

        }
        li.active,
        li.active:hover,
        li.active:focus  {
            background: #9CF;
        }
        li.active a,
        li.active:hover a,
        li:focus a  {
            color: #FFF;
        }

    </style>


</head>

<body style="position: relative">
<div class="container-fluid" style="margin-top: 20px; display: none">
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
            <form class="form-horizontal" action="../php/search.php" method="get">
                <div class="form-group">
                    <label class="control-label col-xs-2 text-center" for="itemSearch">Enter item</label>
                    <div class="col-xs-8 input-append">
                        <input type="text" class="form-control"  name = "item" id="itemSearch" placeholder="enter your item to search" value="<?php


                        if(isset($_GET["item"])){

                            echo $_GET["item"];

                        }




                        ?>">
                    </div>
                    <div>
                        <input class="btn btn-danger col-xs-1" value="Go" type="submit" id = "x">
                    </div>
                </div>
            </form>

        </div>
    </div>
    <nav class="row col-xs-12 col-sm-10 col-sm-offset-1" id="nav_target">
        <ul class="nav navbar-fixed-top">
            <li role="presentation" class="active"><a href="#jd_panel">京东</a></li>
            <li role="presentation"><a href="#amazon_panel">亚马逊</a></li>
            <li role="presentation"><a href="#yhd_panel">一号店</a></li>
            <li role="presentation"><a href="#suning_panel">苏宁易购</a></li>

        </ul>
    </nav>
    <!--    <div class="col-xs-8 col-xs-offset-2">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
          </div> -->
    <div class="row" id = "return">
        <div class="col-xs-12 col-sm-3">
            <div class="panel panel-default" id="jd_panel">
                <div class="panel-heading">
                    <h1 class="panel-title">京东商城</h1>
                </div>
                <div class="panel-body">

                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="panel panel-default" id="amazon_panel">
                <div class="panel-heading">
                    <h1 class="panel-title">亚马逊</h1>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="panel panel-default" id="yhd_panel">
                <div class="panel-heading">
                    <h1 class="panel-title">一号店</h1>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="panel panel-default" id="suning_panel">
                <div class="panel-heading">
                    <h1 h1 class="panel-title">苏宁易购</h1>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>


    </div>

</div>
<div class="center" id="loading">
    <div class="container">
        <div class="col-xs-10 col-sm-10 col-sm-offset-1 col-xs-offset-1">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="">
                    0%
                </div>
            </div>
        </div>

    </div>
</div>

</body>

<script type="text/javascript" src="../js/q.js"></script>

</html>
