<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Url shortener</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <?php include('db_connect.php'); ?>
    <?php include('partials/header.php');?>

    <?php
        if (isset($_GET['type']) && $_GET['type'] == 'delete'){
            $id = $_GET['id'];
            $sql = "DELETE FROM `urlshortener` WHERE `sno` = '$id'";
            $result = mysqli_query($con, $sql);     
            if (!$result) {
                echo "not Connected";
            }

        }


        if (isset($_GET['type']) && $_GET['type'] == 'status'){
            $id = $_GET['id'];
            $status = $_GET['status'];
            if ($status == 'active') {
                $sql = "UPDATE `urlshortener` SET `status` = '1' WHERE `sno` = $id";
                $result = mysqli_query($con, $sql);     
            }else {
                $sql = "UPDATE `urlshortener` SET `status` = '0' WHERE `sno` = $id";
                $result = mysqli_query($con, $sql);
            }
            
        }
        
    ?>
<button class="btn btn-primary btn-sm mx-5 my-4" style="float:right;"><a class="text-light" href="form.php" style="text-decoration:none;">Add Link</a></button>
    <div class="container my-4" style="min-height:80vh;">
        <h3>Short Link</h3>
        <!-- <button class="btn btn-primary btn-sm" style="float:right;"><a class="text-light" href="form.php"
                style="text-decoration:none;">Add Link</a></button> -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Text</th>
                    <th scope="col">Short link</th>
                    <th scope="col">Link</th>
                    <th scope="col">count</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM `urlshortener`";
                    $result = mysqli_query($con, $sql);     
                    if (!$result) {
                        echo "not Connected";
                      }
                    $sno = 0;
                    while ($rows = mysqli_fetch_assoc($result)){
                      $sno = $sno+1;
                ?>
                <tr>
                    <th scope="row"><?php echo $sno ?></th>
                    <td><?php echo $rows['txt'] ?></td>
                    <td>http://localhost/url_shortener/<?php echo $rows['short_link'] ?></td>
                    <td><a href="<?php echo $rows['link'] ?>" target="_blank"><?php echo $rows['link'] ?> </a></td>
                    <td><?php echo $rows['hit_link'] ?></td>
                    <td><a href="?id=<?php echo $rows['sno'] ?>&type=delete">Delete</a>
                    <?php 
                        if($rows['status'] == 1){  
                         ?><a href="?id=<?php echo $rows['sno'] ?>&type=status&status=deactive">Active</a><?php 
                         }else { 
                         ?><a href="?id=<?php echo $rows['sno'] ?>&type=status&status=active">Deactive</a><?php
                          } 
                        ?>
                      
                </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
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