<tr>
                    <td><?php echo $result['doctor_name']?></td>
                    <td><?php echo $result['location']?></td>
                    <td><?php echo date("M jS, Y", strtotime($result['appt_date'])) . " at " .date("H:i", strtotime($result['appt_time']));?></td>
                    <td><?php echo $result['reason'] ?></td>
                    <?php
                        if($result['reason'] == "cancelled"){?>
                            <td>
                                CANCELLED
                            </td>
                        <?php }
                        else{?>
                            <td>
                                <button name="cancel" type="submit" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#cancelAppointment<?php echo $result['appt_id'] ?>">Cancel Appointment</button>
                            </td>
                            <form method="POST">
                                <div class="modal fade" id="cancelAppointment<?php echo $result['appt_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="setAppointmentLabel" aria-hidden="true">
                                    <input type="hidden" name="doctor" value="<?php echo $result['doctor_id'] ?>">
                                    <input type="hidden" name="time" value="<?php echo $result['appt_time'] ?>">
                                    <input type="hidden" name="date" value="<?php echo $result['appt_date'] ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="setAppointmentLabel">Cancel Appointment</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">  
                                                <div class="mb-3">
                                                    <label class="form-label">Cancel Appointment this <?php echo date("M jS, Y", strtotime($result['appt_date'])); ?> at <?php echo date("H:i", strtotime($result['appt_time'])); ?> for Dr. <?php echo $result['doctor_name'] ?></label>
                                                </div>
                                                <div class="mb-3">
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-primary" name="confirm">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>        
                            </form>
                        <?php
                            }
                    ?>
                    
                </tr>