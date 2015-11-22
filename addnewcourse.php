<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/22/15
 * Time: 4:41 AM
 */
include('script_db_connect.php');
include "script_session_handler.php";
include "header.php";
?>
    <div class="container">
        <h1>
            Add new Course
        </h1>
        <h3>Your school is: <strong><?php echo "UTSA"; ?></strong></h3>
        <div id="courses">
            <form id="department-select">
                <p>Select a Department to see courses</p>
                <select name="department">
                    <option>
                        <?php
                        include_once "functions.php";
                        $departments = getDepartments();
                        foreach($departments as $department){
                            echo '<option name="'.$department.'">'.$department.'</option>';
                        }
                        ?>
                    </option>
                    <?php
                    if($result = mysql_query("SELECT DISTINCT `department` FROM `courses`;")){
                        echo(mysql_num_rows($result));
                        while($row = mysql_fetch_array($result)){
                            echo('<option>'.htmlentities($row['department']).'</option>');
                        }
                    }
                    else{
                        die(mysql_error());
                    }
                    ?>
                </select>
            </form>
            <!--
            <div class="">
                <table id="courses-table" class="zebra">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Days of week</th>
                        <th>CRN or SEC #</th>
                        <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $courses = getCoursesForUser($_SESSION["uid"]);

                    foreach($courses as $course){
                        ?>
                        <tr>
                            <td><?php echo $course['title']; ?></td>
                            <td>
                                <?php
                                $letters = array('M','T','W','R','F','S');
                                $arrayOfLetters = str_split($course['days']);
                                ?>
                                <div class="schedule-for-days">
                                    <?php
                                    $counter = 0;
                                    $class="";
                                    foreach($letters as $letter){
                                        if(array_key_exists($counter,$arrayOfLetters) && $arrayOfLetters[$counter] == $letter){
                                            $class="active";
                                            $counter++;
                                        } else
                                            $class="";
                                        ?>
                                        <div class="day <?php echo $class; ?>"><?php echo $letter; ?></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td><?php echo isset($course['crn']) ? $course['crn'] : "Sorry" ; ?></td>

                            <td>
                                <button class="btn btn-success btn-add-course" data-course="<?php echo $course['id'] ?>">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Course
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
//            var table = $('#courses-table').dataTable({
//                "order": [[ 0, "desc" ]],
//            });

            $('#department-select').submit(function(e){
                e.preventDefault();

            });

            $('.btn-add-course').click(function(){
                $.ajax({
                    url:"controller.php",
                    type:"POST",
                    data: {"function":"getDepartments","userId":userId}
                })
            });

        } );
    </script>


<?php

include "footer.php";
