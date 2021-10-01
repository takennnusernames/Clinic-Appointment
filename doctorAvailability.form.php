  
    <tr>
        <td><a href="#"><?php echo $result['doctor_name']?></a></td>
        <td colspan="2"><?php echo $result['doctor_location']?></td>
        <?php if (empty($date) OR empty($time)){ ?>
            <td>Select Date & Time</td>
        <?php }else if(isset($_POST['check'])){
            $dId = $result['doctor_id'];
            $doctor = $result['doctor_name'];
            $location = $result['doctor_location'];
            $sql = "SELECT * FROM appointments WHERE doctor_id='$dId' AND appt_date='$date' AND appt_time='$time'";
            $appointments = mysqli_query($conn, $sql);
            $check = mysqli_num_rows($appointments);
            if($check < 1){?>
                <td>
                    <button name="btn" type="submit" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#setAppointment<?php echo $dId ?>">Available</button>
                </td>
                <form method="POST">
                    <div class="modal fade" id="setAppointment<?php echo $dId ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="setAppointmentLabel" aria-hidden="true">           
                        <input type="hidden" name="date" value="<?php echo $date ?>">
                        <input type="hidden" name="time" value="<?php echo $time ?>">
                        <input type="hidden" name="location" value="<?php echo $location ?>">
                        <input type="hidden" name="dId" value="<?php echo $dId ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="setAppointmentLabel">Set Appointment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">  
                                <div class="mb-3">
                                    <label class="form-label">Set Appointment this <?php echo date("M jS, Y", strtotime($date)); ?> at <?php echo $time ?> for Dr. <?php echo $doctor ?></label>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Reason for Appointment</label>
                                    <input type="text" name="reason" required="required" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="e.g. checkup">

                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" name="set">Set</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>        
                </form>

        <?php }else { ?>
            <td><p>Not Available</p></td>
        <?php } }?>
    </tr>
    
    
   