<?php
include_once './config.php';
include_once './classes/Race.php';

$race = new Race();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Race</title>
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
                        <th>Race Title</th>
                        <th>Date</th>

                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            $races = $race->get_races($con);
                            foreach ($races as $rac) {
                                ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><a href="race-runners.php?race=<?php echo $rac->id; ?>"><?php echo $rac->race_title; ?></a></td>
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
