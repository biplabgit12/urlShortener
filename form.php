<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Url Shortener Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    
   <?php include('db_connect.php'); ?>
    <?php include('partials/header.php')?>
    <?php
    //    print_r($_POST);
     if (isset($_POST['link'])) {
        $link = $_POST['link'];
        $short_link = $_POST['short_link'];
        $txt = $_POST['txt'];
   
        $query = mysqli_query($con, "SELECT * FROM `urlshortener` where short_link='$short_link'");
         $count = mysqli_num_rows($query);

         if ($count > 0) {
            echo "Url already exists";
            header("location:form.php");
            die();
         } 
         else {   
            $sql = "INSERT INTO `urlshortener` (`link`, `short_link`, `txt`, `status`) VALUES ('$link', '$short_link', '$txt', '1')";
            $result = mysqli_query($con,$sql);

            header("location:list.php");
            die();
         }
              

      $sql = "INSERT INTO `urlshortener` (`link`, `short_link`, `txt`, `status`) VALUES ('$link', '$short_link', '$txt', '1')";
      $result = mysqli_query($con,$sql);

      header("location:list.php");
      die();

     }

    ?>
     
    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="container">
        <div class="wraper container-fluid m-4" style="min-height:80vh;">
            <div class="page-title">
                <h3 class="title">Add Short Link</h3>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-group my-3">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="link" name="link"
                                            placeholder="link" required>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Short Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="short_link" name="short_link"
                                            placeholder="short link" required>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <label for="inputPassword4" class="col-sm-3 control-label">Text</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txt" name="txt"
                                            placeholder="Text" required>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary" name="submit">Generate</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- panel-body -->
                    </div>
                    <!-- panel -->
                </div>
                <!-- col -->
            </div>
            <!-- End row -->

        </div>
    </div>
    <!-- Page Content Ends -->
    <!-- ================== -->
    <!-- Footer Start -->
    <?php include('partials/footer.php')?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>