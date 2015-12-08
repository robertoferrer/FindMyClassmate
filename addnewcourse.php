<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/22/15
 * Time: 4:41 AM
 */
include('script_db_connect.php');
include "script_session_handler.php";
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Find My Classmate | <?php echo (isset($_SESSION['page_title']) ? $_SESSION['page_title'] : null); ?></title>

    <?php
    include('head_includes.php');
    ?>
    <!--    FONTS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include "header.php";
?>
    <div class="container">
        <h1>
            Add new Course
        </h1>
        <h3>Your school is: <strong><?php echo "UTSA"; ?></strong></h3>
        <div id="courses">
            <form>
                <p>Select a Department to see courses...</p>
                <select name="department" id="department-select">
                    <option value="">-Select-</option>
                    <?php
                    if($result = mysql_query("SELECT DISTINCT `department` FROM `courses`;")) {
                        while($row = mysql_fetch_array($result)){
                            echo('<option value="'.$row['department'].'">'.htmlentities($row['department']).'</option>');
                        }
                    }
                    else{
                        die(mysql_error());
                    }
                    ?>
                </select>
            </form>
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
            $('#department-select').change(function(){
                var department = $('#department-select').val();
                $.ajax({
                    url:"controller.php",
                    type:"POST",
                    data: {"function":"getCourseByDepartment","department":department},
                    success:function(response){
                        var json = JSON.parse(response);
                        console.log(json.count);
                        console.log("SSSSS");
                    },
                    error: function(err){
                        console.log("Error "+err);
                    }
                });
            });


        } );

    </script>


<?php

include "footer.php";
