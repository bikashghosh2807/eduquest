<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block"> <i class="mdi mdi-grease-pencil title_icon"></i> <?php echo get_phrase('online_exam_details'); ?> </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body grade_content">
               <?php $online_exams = $this->db->select('online_exam_details.*, exams.name')->from('online_exam_details')->join('exams', 'online_exam_details.quarter_id = exams.id')->where('online_exam_details.status', '1')->get()->result_array();  
                if (count($online_exams) > 0):?>
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                    <thead>
                        <tr style="background-color: #313a46; color: #ababab;">
                            <th><?php echo get_phrase('exam_name'); ?></th>
                            <th><?php echo get_phrase('starting_date'); ?></th>
                            <th><?php echo get_phrase('exam_time'); ?></th>
                            <th><?php echo get_phrase('exam_duration'); ?></th>
                            <th><?php echo get_phrase('status'); ?></th>
                            <th><?php echo get_phrase('student_exam_status'); ?></th>
                            <th><?php echo get_phrase('option'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($online_exams as $exam):
                        $examId = $exam['id'];
                        date_default_timezone_set('Asia/kolkata'); // Replace with your desired time zone
                        //$currentDatetime = new DateTime(); 
                        $currentDatetimeToday = new DateTime(); 
                        $currentDatetimeString = $currentDatetimeToday->format('Y-m-d h:i A');

                        $currentDatetime = DateTime::createFromFormat('Y-m-d h:i A', $currentDatetimeString);

                        $get_exam_status = $this->db->get_where('online_exam_details', array('status' => '1','id' => $examId))->row_array();

                         $loginStudentId = $this->session->userdata('user_id'); 
                         $get_student_exam_status = $this->db->get_where('online_exam_result', array('student_id' => $loginStudentId,'exam_id' => $examId,'quarter_id' => $get_exam_status['quarter_id']))->row_array();

                         $stu_online_exam_status = $get_student_exam_status ? ($get_student_exam_status['exam_status'] == 1 ? "Pending" : "Completed")  : "Exam not given";

                        $get_exam_start_dt = $get_exam_status['exam_start_date'];
                        // $get_exam_start_time = $get_exam_status['exam_start_time'];
                        // $get_exam_start_am_pm = $get_exam_status['exam_start_am_pm'];
                        $get_exam_end_time = $get_exam_status['exam_end_time'];
                        $get_exam_end_am_pm = $get_exam_status['exam_end_am_pm'];

                        // $examStartDateTimeString = $get_exam_start_dt.' '.$get_exam_start_time.' '.$get_exam_start_am_pm;

                        $examEndDateTimeString = $get_exam_start_dt.' '.$get_exam_end_time.' '.$get_exam_end_am_pm;

                        // echo $examStartDateTime = $get_exam_start_dt.' '.$get_exam_start_time.' '.$get_exam_start_am_pm;

                        // $examEndDateTime = $get_exam_start_dt.' '.$get_exam_end_time.' '.$get_exam_end_am_pm;

                        // Convert the datetime string to a DateTime object
                        // For 12 hour use 'h'
                    //    $examStartDateTime = DateTime::createFromFormat('Y-m-d h:i A', $examStartDateTimeString);
                       $examEndDateTime = DateTime::createFromFormat('Y-m-d h:i A', $examEndDateTimeString);
                        // For 24 hour use 'H'
                        // $examStartDateTime = DateTime::createFromFormat('Y-m-d H:i', $examStartDateTimeString);
                        // $examEndDateTime = DateTime::createFromFormat('Y-m-d H:i', $examEndDateTimeString);

                        $exam_status = $get_student_exam_status ? "Closed" : (($examEndDateTime < $currentDatetime) ? 'Closed' : 'Open');

                        // $exam_start_status = ($currentDatetime >= $examStartDateTime ) ? 'start' : 'notstart';
                    ?>
                    <tr>
                        <td><?php echo $exam['online_exam_name']; ?></td>
                        <td><?php echo $exam['exam_start_date']; ?></td>
                        <td>Time: <?php echo $exam['exam_start_time'].$exam['exam_start_am_pm']."-".$exam['exam_end_time'].$exam['exam_end_am_pm']; ?></td>
                        <td><?php echo $exam['exam_duration']; ?> Min</td>
                        <td><?php echo $exam_status; ?></td>
                         <td><?php echo $stu_online_exam_status; ?></td>
                        <td>
                        <?php if ($examEndDateTime > $currentDatetime && empty($get_student_exam_status)) {?> 
                        <div class="dropdown text-center">
                            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/online_exam/exam-page/'.$exam['quarter_id'].'/'.$exam['id'])?>', '<?php echo get_phrase('exam_page'); ?>')"><?php echo get_phrase('start_exam'); ?></a>
                               
                            </div>
                        </div>
                        <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                <?php else: ?>
                    <?php include APPPATH.'views/backend/empty.php'; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<script>
    var showAllGrades = function () {
        var url = '<?php echo route('grade/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.grade_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }

</script>

<script>
    $(document).ready(function() {
        var examStartStatus = '<?php echo $exam_start_status; ?>';
        // Sweet alert will be shown if exam is not start 
        // if (examStartStatus === 'notstart') {
        //     Swal.fire({
        //     title: 'Exam Not Started',
        //     text: 'The exam has not started yet.',
        //     icon: 'info',
        //     confirmButtonText: 'OK'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
       
        //         }
        //     });
        // }

        // Timer automatically run
        if (examStartStatus === 'start') {
            alert("hello");
            $('#startTimer').click(); 
        }
        
    });
   </script>
