
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Chat</title>
    <link href="/images/logo.png" rel="icon" type="image/png"/>
    <link href="logo.ico" rel="shortcut icon"/>
    <link href="/images/apple-icon.png" rel="apple-touch-icon-precomposed">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">


    <!--[if lt IE 9]> <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script> <![endif]-->
</head>
<body>
<div class="vertical-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
                <h1 class="text-center">
                    Join Chat !</h1>
                <form action="/chat.html" class="">

                    <div class="form-group">
                        <label for="name">
                            Display Name :</label>
                        <div class="input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                  </span>
                            <input class="form-control" id="name" name="name" placeholder="" type="text">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="room">Enter Room :</label>
                        <div class="input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-comment"></i>
                  </span>
                            <input class="form-control" id="room" name="room" placeholder="" type="text"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary btn-block" type="submit" value="Join Chat"/>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>
