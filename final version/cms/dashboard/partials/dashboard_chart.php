        <!--Queries to populate tables-->
        <?php
        $db_id= $_SESSION['user_id'];     
        $userID = $_SESSION['user_id'];
        $query = "SELECT * FROM tasks WHERE creator_id = '{$userID}' and status_id = '1' ";
        $open_task_query = mysqli_query($connection, $query);  
        $open_task_count  = mysqli_num_rows($open_task_query);  

        $db_id= $_SESSION['user_id'];     
        $userID = $_SESSION['user_id'];
        $query = "SELECT * FROM tasks WHERE creator_id = '{$userID}' and status_id = '2' ";
        $tasks_waiting_approval_query = mysqli_query($connection, $query);  
        $tasks_waiting_approval_count  = mysqli_num_rows($tasks_waiting_approval_query);  
        
        $db_id= $_SESSION['user_id'];     
        $userID = $_SESSION['user_id'];
        $query = "SELECT * FROM tasks
                    RIGHT JOIN claimed_tasks
                    ON tasks.task_id = claimed_tasks.task_id
                    INNER JOIN users
                    ON claimed_tasks.student_id = users.user_id
                    WHERE tasks.creator_id = '{$userID}' and tasks.status_id = '3';
                    ";
        $tasks_waiting_completion_query = mysqli_query($connection, $query);  
        $tasks_waiting_completion_count  = mysqli_num_rows($tasks_waiting_completion_query);  

        $db_id= $_SESSION['user_id'];     
        $userID = $_SESSION['user_id'];
        $query = "SELECT * FROM tasks 
                    INNER JOIN claimed_tasks on  tasks.task_id = claimed_tasks.task_id
                    WHERE student_id = '{$userID}' and status_id ='2'
                    ORDER BY claimed_tasks.claimed_expiration DESC; ";

        $claimed_tasks_waiting_approval = mysqli_query($connection, $query);  
        $claimed_tasks_waiting_approvalcount  = mysqli_num_rows($claimed_tasks_waiting_approval);  
        ?>
        <!--CHART FROM GOOGLE TABLES-->
        <!--https://developers.google.com/chart/interactive/docs/customizing_charts-->
        <div class ="row">
            <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Data', 'Count',],
                        <?php
                        /*Making array of above */
                        $element_text = ['Total Tasks Created','Current Open Tasks','Tasks awaiting your approval','Your task being worked on', 'Claimed Tasks awaiting Approval','Tasks You Are Working On', 'Reputation Score'];
                        /*Array holding count */
                        $element_count = [$task_counts, $open_task_count, $tasks_waiting_approval_count,$tasks_waiting_completion_count,$claimed_tasks_waiting_approvalcount, $claimed_count, $user_reputaion];
                        /*Creating a loop to display each value */
                        for($i =0; $i < 7; $i++) {
                            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                        }
                        ?>
                    ]);
                    var options = {
                        chart: {
                        title: 'Your Stats',
                        subtitle: '',
                        }
                    };
                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                    chart.draw(data, options);
                }
            </script>
        <!--Chart properties-->
        </div>
            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
        </div>