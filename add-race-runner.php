<?php
include_once './config.php';
include_once './classes/Race.php';
include_once './classes/Runner.php';
include './classes/User.php';

$user = new User();
$race = new Race();
$runner = new Runner();

if (!$user->validate_user_page_access()) {
    header("location: log-out.php");
}


if (isset($_POST["save_race_runner"])) {
    $runner_id = $_POST["race_runner"];
    $time = $_POST["race_runner_time"];
    $race_id = $_POST["race_id"];
    $runner->add_race_runner($runner_id, $race_id, $time, $con);
    header("location: add-race-runner.php");
}//end save customer
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Runners in a Race</title>
        <?php include './header-links.php'; ?>

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
                        <h1 style="text-align: center;">Add Runner in Race</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Race:</label>

                                    <select class="form-control" id="race_title" required="" name="race_id" >
                                        <?php
                                        $races = $race->get_races($con);
                                        foreach ($races as $rac) {
                                            ?>
                                            <option value="<?php echo $rac->id; ?>"><?php echo $rac->race_title ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Runner:</label>
                                    <select class="form-control" id="race_date" required="" name="race_runner" >
                                        <?php
                                        $runners = $runner->get_all_runners($con);
                                        foreach ($runners as $runnr) {
                                            ?>
                                            <option value="<?php echo $runnr->id; ?>"><?php echo $runnr->runner_name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Runner Time:</label>
                                    <input class="form-control" id="race_date" required="" name="race_runner_time" type="text" value="" />

                                </div>
                            </div>

                        </div>                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form group -->
                                <!-- Color Picker -->
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" style="text-align: center; width: 150px; margin: auto; float: none;" name="save_race_runner" class="btn btn-block custom-button" id="save_customer">Save Race Runner</button>
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
                        <th>Runner Nmae</th>
                        <th>Runner Time</th>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $runners = $runner->get_all_runners_assigned($con);
                            foreach ($runners as $runer) {
                                ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $runer->race_title; ?></td>
                                    <td><?php echo $runer->runner_name; ?></td> 
                                    <td><?php echo $runer->runner_time; ?></td> 
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
