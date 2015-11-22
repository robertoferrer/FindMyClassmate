<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/21/15
 * Time: 6:38 PM
 */
include "header.php";

?>
    <div class="container">

        <h1>My courses</h1>
        <h3>Your school is: <strong><?php echo "UTSA"; ?></strong></h3>
        <div id="my-courses">
            <div class="">
                <table id="courses-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Days of week</th>
                        <th>CRN or SEC #</th>
                        <th>Classmates</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $courses = isset($_SESSION['courses']) ? $_SESSION['courses'] : array();
                    foreach($courses as $course){
                        ?>
                        <tr>
                            <td><?php echo $course['name']; ?></td>
                        </tr>
                        <tr>
                            <?php
                                if(strcmp($course['days_of_week'],'MWF')==0){
                                    ?>
                                    <td>
                                        <div class="schedule-for-days">
                                            <div class="day active">M</div>
                                            <div class="day">T</div>
                                            <div class="day active">W</div>
                                            <div class="day">R</div>
                                            <div class="day active">F</div>
                                            <div class="day">S</div>
                                        </div>
                                    </td>
                                    <?php
                                } else if(strcmp($course['days_of_week'],'TR')==0) {
                                    ?>
                                    <td>
                                        <div class="schedule-for-days">
                                            <div class="day">M</div>
                                            <div class="day active">T</div>
                                            <div class="day">W</div>
                                            <div class="day active">R</div>
                                            <div class="day">F</div>
                                            <div class="day">S</div>
                                        </div>
                                    </td>
                                    <?php
                                } else{
                                    echo "What?";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td><?php echo $course['crn']; ?></td>
                        </tr>
                        <tr>
                            <button class="btn btn-primary btn-show-classmates">Show classmates</button>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <div class="schedule-for-days">
                    <div class="day active">M</div>
                    <div class="day">T</div>
                    <div class="day active">W</div>
                    <div class="day">R</div>
                    <div class="day active">F</div>
                    <div class="day">S</div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        var table = $('#courses-table').dataTable();

        $('#button').click( function () {
            var hidden = table.fnGetHiddenNodes();
            alert( hidden.length +' nodes were returned' );
        } );
    } );
</script>
<?php

include "footer.php";