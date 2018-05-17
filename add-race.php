<?php
include_once './config.php';
include_once './classes/Race.php';
include './classes/User.php';

$user= new User();
$race= new Race();
if(!$user->validate_user_page_access())
{
    header("location: log-out.php");
}


if(isset($_POST["save_race"]))
{    
    $race->race_title=$_POST["race_title"];
    $race->race_date=$_POST["race_date"];
      
    $race->add_race($race->race_title, $race->race_date, $con);
    header("location: add-race.php");
}//end save customer

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Race</title>
        <?php include './header-links.php';?>
        
                                <script>
                                    $(document).ready(function () {
                                        $('#customers_table').DataTable(
                                                {responsive: true});
                                    });
                                </script>
                                <style>
                                    .center-align{
                                        margin-left: auto !important;
                                        margin-right: auto !important;
                                        float: none !important;
                                    }
                                </style>
    </head>
    <body>
        <div class="container">
                    
             <?php include './header.php'; ?>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-6 center-align">
                        <h1 style="text-align: center;">Add Race</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Race Title:</label>
                                    <input class="form-control" id="race_title" required="" name="race_title" type="text" value="" />

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Race Date:</label>
                                    <input class="form-control" id="race_date" required="" name="race_date" type="text" value="" />

                                </div>
                            </div>
                          
                        </div>                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form group -->
                                <!-- Color Picker -->
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" style="text-align: center; width: 150px; margin: auto; float: none;" name="save_race" class="btn btn-block custom-button" id="save_customer">Save Race</button>
                                </div>
                                <!-- /.form group -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
            
            <div class="row">
                <div class="col-md-12 center-align" style="padding-bottom: 30px;">
                    <table id="customers_table"  style="width: 100%;">
                        <thead>
                        <th>Sr. #</th>
                        <th>Race Title</th>
                        <th>Date</th>
                        
                        </thead>
                        <tbody>
                            <?php
                            $counter=1;
                            $races = $race->get_races($con);
                            foreach ($races as $rac)
                            {
                                ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $rac->race_title; ?></td>
                                <td><?php echo $rac->race_date; ?></td>                                
                                </td>
                            </tr>
                            <?php
                            
                            $counter++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </body>
</html>
