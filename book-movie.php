<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online movie ticket reservation">
    <meta name="author" content="Menaka & Pranali">

    <title>Movie Magic - Online Tickets</title>
    <link rel="shortcut icon" href="img/logo2.png" type="img/ico">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/moviemagic.css" rel="stylesheet">
    <link href="css/booking.css" rel="stylesheet">

	<!--php-->
	<?php session_start();?>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span><img src="img/logo2-nav.png" height="24px"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav" id="left-nav">
                    <li>
                        <a href="lang-hindi.php">HINDI</a>
                    </li>
                    <li>
                        <a href="lang-english.php">ENGLISH</a>
                    </li>
                    <li>
                        <a href="lang-regional.php">REGIONAL</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="faq.php"><span class="fa fa-question-circle" aria-hidden="true"></span>&nbsp;&nbsp;SUPPORT</a>
                    </li>
                    <li>
                        <a href="contact.php"><span class="fa fa-phone" aria-hidden="true"></span>&nbsp;&nbsp;CONTACT</a>
                    </li>
                    <?php
					if(!isset($_SESSION["user_name"])) {

					echo '<li id="visible">
                        <a href="#loginModal" data-toggle="modal" data-target="#loginModal"><span class="fa fa-logged-in" aria-hidden="true"></span>&nbsp;&nbsp;LOGGED IN</a>
                    </li>';
					}
					else {
						echo '
				        <li id="visible" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user" aria-hidden="true"></span>&nbsp;&nbsp;YOU&nbsp;&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php"><span class="fa fa-cog" aria-hidden="true"></span>&nbsp;&nbsp;Profile</a></li>
                                <li><a href="bin/logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span>&nbsp;&nbsp;Sign Out</a></li>
                            </ul>
						</li>
						';
					}
					?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Login modal -->
    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login </h4>
            </div>
            <div class="modal-body">
                 <form class="form" action="bin\login.php" method="post" id="signin" value="login">
                     <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                            <div class="form-group">
                                <label for="Email">Email address</label>
                                <input type="email" class="form-control" id="Email" aria-describedby="Email" placeholder="Enter email" name="Email" value="menaka.ravi23@gmail.com">
                            </div>
                        </div>
                        <div class="col-xs-8 col-xs-offset-2">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" placeholder="Password" name="Password" value="menu123">
                            </div>
                        </div>
                     </div>
                    <div class="row"><p style="padding:10px;"></p></div>
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                            <button type="submit" class="btn btn-danger btn-block" value="login" id="submitForm" name="login">Sign In</button>
                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    <br>
                </form>
                <br>
                <p class="center-align bold text-muted">Still not connected?
                    <a href="signup.php" class="text-danger">Sign up</a> here!
                </p>
            </div>
        </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Book Now</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-8">
                <p>Choose your booking preferences here and proceed to receive your unique Booking ID which you can show at the theatre Box Office to collect your tickets!</p>
                <small>You can currently book tickets only for the day after your booking date with MovieMagic.</small>
            </div>
        </div>
        <!-- /.row -->

        <br>

        <!-- BookMovie Form -->
        <div class="row">
            <div class="col-md-8">
                <form name="bookingForm" id="bookingForm" action="success.php" method="post" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Choose your Show Timings:</label>
                            <select class="form-control" id="timing" name="timing" required>
                                <option name="timing1" selected>1:00 PM</option>
                                <option name="timing2">2:00 PM</option>
                                <option name="timing3">3:00 PM</option>
                                <option name="timing4">4:00 PM</option>
                            </select>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Number of tickets:</label>
                            <input type="number" min="1" max="10" class="form-control" id="ticket" value="1" required>
                        </div>
                    </div>
                    <div id="visible">
                        <small class="help-block">You cannot change these options once you proceed.</small>
                        <button type="button" id="btnTicket" class="btn btn-danger">Confirm and proceed &raquo;</button>
                    </div>
                    <div id="invisible">
                        <p><strong>Choose seats by clicking the corresponding seat in the layout below:</strong></p>
                        <div id="holder">
                            <ul  id="place">
                            </ul>
                        </div>
                        <div>
                            <ul id="seatDescription" style="list-style-type:none;">
                                <li><span><img src="img/chair.jpg" height="24px"></span> Available Seat</li>
                                <li><span><img src="img/seat-booked.png" height="24px"></span> Booked Seat</li>
                                <li><span><img src="img/seat-selected.png" height="24px"></span> Selected Seat</li>
                            </ul>
                        </div>
                        <br>
                        <div style="clear:both;width:100%;">
                            <input type="button" id="btnShowNew" value="Show My Seats" class="btn btn-default btn-sm"/>
                            <input type="button" id="btnShow" value="Show All" class="btn btn-default btn-sm"/>
                        </div>

                        <br>
                        <h3 class="text-center" style="min-height:100px;">
                        <strong>Total Amount:</strong>
                        <p id="amount">&#8377; 200.00</p>
                        </h3>

                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <br><br>
                        <button type="submit" id="btnBook" class="btn btn-danger btn-block" >Book Tickets</button>

                        <div id="success"></div>
                        <!-- For success/fail messages -->
                    </div>
                </form>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <div>
        <p style="padding:50px;"></p>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/sign_up.js"></script>
    <script src="js/booking.js"></script>

</body>

</html>
