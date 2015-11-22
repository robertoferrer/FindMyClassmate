<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/21/15
 * Time: 6:38 PM
 */
include "script_session_handler.php";
include "header.php";
?>
    <div class="container">

        <h1>
            My courses
            <a href="addNewCourse.php">
                <button type="button" class="btn btn-success btn-lg ">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new
                </button>
            </a>

        </h1>
        <h3>Your school is: <strong><?php echo "UTSA"; ?></strong></h3>
        <div id="my-courses">
            <div class="">
                <table id="courses-table" class="zebra">
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
                    include_once "functions.php";
                    $_SESSION["uid"] = isset($_SESSION["uid"]) ? $_SESSION["uid"] : 1;
                    $courses = getMyCourses($_SESSION["uid"]);

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
                                <?php
                                $classmates = getClassmatesByCourse($course['courseId']);
                                ?>
                                <button class="btn btn-primary btn-show-classmates" type="button" data-classmates="<?php echo $course['courseId'] ?>">
                                    Show classmates <span class="badge"><?php echo count($classmates) ?></span>
                                </button>
                                <div class="classmates-list" data-classmates="<?php echo $course['courseId'] ?>">
                                    <ul>
                                        <?php
                                            foreach($classmates as $classmate){
                                                ?>
                                                <li>
                                                    <p><?php echo $classmate["fname"]." ".$classmate["lname"];  ?></p>
                                                </li>
                                                <?php
                                            }
                                        ?>

                                    </ul>
                                </div>
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

    <!-- Modal -->
    <div class="modal fade" id="classmatesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="classmatesModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        var table = $('#courses-table').dataTable();

        $('.btn-show-classmates').click(function(){
            var number = $(this).attr('data-classmates');
            $('.classmates-list[data-classmates="'+number+'"]').toggle("slow");
        });
    } );
</script>


<?php

include "footer.php";