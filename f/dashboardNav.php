<?php
error_reporting(0);
include("../dbcon.php");
session_start();
$femail = "";
if (isset($_SESSION['email'])) {
    $femail = $_SESSION['email'];
} else {
    header("location:index.php?msg=se");
}
// $msg=$_REQUEST['msg'];
?>

</head>

<body>

    <header style="background: linear-gradient(90deg, #05A6F0 0%, #6a62fe 100%);">

        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="./KnowledgeBank/index.php">
                    <i class="fas fa-book-reader fa-3x mx-3"></i>
                    Knowledge Bank</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-right text-light"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <a href="#" class="nav-link"><i class="fas fa-user"></i>&nbsp;&nbsp;<?php echo $femail; ?></a>
                                <div class="content-item">
                                    <a href="../dblogic.php?pageno=11">Logout&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>