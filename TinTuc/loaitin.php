<?php 

include "Controller/Control.php";

$c_tintuc = new Control_tintuc();
$tintucs = $c_tintuc->loaitin();
$tintuc=$tintucs['danhmuctin'];
$menu = $tintucs['menu'];
$title=$tintucs['title'];
$pagination= $tintucs['pagination'];
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Khoa Pham</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/shop-homepage.css" rel="stylesheet">
    <link href="public/css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.public/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> Tin Tức</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" id="tukhoa" class="form-control" placeholder="Search">
                    </div>
                    <button type="button" id="btnSearch" class="btn btn-default">Submit</button>
                </form>

                 <ul class="nav navbar-nav pull-right">

                    <?php if(isset($_SESSION['username'])==NULL){ ?>
                    <li>
                        <a href="dangki.php">Đăng ký</a>
                    </li>
                    <li>
                        <a href="dangnhap.php">Đăng nhập</a>
                    </li>
                    <?php  } else{?>
                    <li>
                        <a>
                            <span class ="glyphicon glyphicon-user"></span>
                            <?=$_SESSION['username'];?>
                        </a>
                    </li>

                    <li>
                        <a href="dangxuat.php">Đăng xuất</a>
                    </li>

                    <?php }?>
                    
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Menu
                    </li>

                    <?php  foreach ($menu as $itemtheloai) { ?>
                    <li href="#" class="list-group-item menu1">
                        <?=$itemtheloai->Ten ?>
                    </li>
                    <ul>

                        <?php 
                        $loaitin=explode(",",($itemtheloai->LoaiTin));
                        

                        foreach ($loaitin as $itemloaitin ) {
                        list($id,$ten,$tenkhongdau)= explode(":", $itemloaitin);  
                        ?>
                        <li class="list-group-item">
                            <a href="loaitin.php?id_loaitin=<?=$id?>"><?=$ten?></a>
                        </li>
                         
                         <?php  } ?>
                        
                    </ul>



                    <?php } ?>

                   
                </ul>
            </div>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b><?=$title->Ten; ?></b></h4>
                    </div>

                    <?php 
                        foreach ($tintuc as $itemtintuc) {
                           
                     ?>
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$itemtintuc->Hinh?>" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><?=$itemtintuc-> TieuDe ?></h3>
                            <p><?=$itemtintuc-> TomTat ?></p>
                            <a class="btn btn-primary" href="detail.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <?php }?>
                    

                    <!-- Pagination -->
                  <!--  <div class="row text-center">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <li>
                                    <a href="#">&laquo;</a>
                                </li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row text-center"><?=$pagination?></div>

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(#btnSearch).click(function(){
                var keywords= $(#tukhoa).val();
                $.post('timkiem.php', {tukhoa: keywords}, function(data) {
                    $(#datasearch).html(data);
                });
            })
        });

    </script>

</body>

</html>
