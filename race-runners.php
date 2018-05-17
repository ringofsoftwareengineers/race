<?php
include_once './config.php';
include_once './classes/Runner.php';
if(!isset($_GET["race"]))
{
    header("location: index.php");
}
$runner = new Runner();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Race Runners</title>
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

            <div class="row">
                <div class="col-md-12 header-heading">
                    Welcome to <strong>CleverCherry</strong> Race Management System
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 center-align" style="padding-bottom: 30px; margin-top: 20px;">
                    <table id="customers_table"  style="width: 100%;">
                        <thead>
                        <th>Sr. #</th>
                        <th>Runner Name</th>
                        <th>Time</th>

                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $race_id=$_GET["race"];
                             $runners= $runner->get_runners_by_race_id($race_id,$con);
                            foreach ($runners as $runer) {
                                ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $runer->runner_name; ?></td>
                                    <td><?php echo $runer->runner_time; ?></td>                                
                                   
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
