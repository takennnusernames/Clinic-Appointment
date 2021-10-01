<?php 
    if(isset($_POST['btn']))
    {
        $doctor = $_POST['dId'];
        $date = $_POST['date'];
        $time = $_POST['time'];
    }
?>


<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="setAppointmentLabel">Set Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">  
            <div class="mb-3">
                <label class="form-label">Set Appointment this <?php echo $date ?> at <?php echo $time ?> for <?php echo $doctor ?></label>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Reason for Appointment</label>
                <input maxlength="16" type="text" name="reason" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="e.g. checkup">

            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" name="set">Set</button>
            </div>
        </div>
    </div>
</div>