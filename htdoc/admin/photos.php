<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect('login.php');}  ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           

            <?php include "includes/top_nav.php"; ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


           <?php include "includes/side_nav.php"; ?>


            <!-- /.navbar-collapse -->

        </nav>





        <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        PHOTOS Page
                        <small>Subheading</small>
                    </h1>
                    
                    <div class="col-md-12">
                        <table class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>                             
                                <?php

                                $photos = photo::find_all();

                                foreach ($photos as $photo ) {
                                    echo "<tr>";
                                    echo "<td><img class='admin-thumbnail' src='{$photo->picture_path()}'>
                                            <div class='picture_link'>
                                                <a href='delete_photo.php/?id={$photo->id}'>Delete</a>
                                                <a href='edit_photo.php?id={$photo->id}'>Edit</a>
                                                <a href='#'>View</a>
                                            </div>
                                        </td>";
                                    echo "<td>{$photo->id}</td>";
                                    echo "<td>{$photo->file_name}</td>";
                                    echo "<td>{$photo->title}</td>";
                                    echo "<td>{$photo->size}</td>";
                                    echo "<tr>";
                                }
                                
                                ?>
                            </tbody>
                        </table> <!-- end of the table -->
                    </div>


                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>