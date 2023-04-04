<?php
        if(isset($_COOKIE["userid"])){
            $user_id=$_COOKIE['userid'];
            $query=("SELECT * FROM users where id =$user_id");
            $user_data = mysqli_query($conn,$query);
            $user_data=$user_data->fetch_assoc();
            $user_name = $user_data['Name'];
            $f_text = "placeholder='$user_name' disabled";
        }
        else{
            $f_text= "'placeholder = 'Your name'";
        }
?>
<div class="container contact-form">
    <div class="contact-image">
        <img src="images/Ourlogo.png" alt="JF LOGO"/>
    </div>
    <form id="formId">
        <h3>We are happy to see your message</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="txtName" class="form-control"<?= $f_text ?> required>
                </div>
                <div class="form-group">
                    <input type="text" name="txtEmail" class="form-control" placeholder="<?= $user_data['E_mail']?>" required>
                </div>
                <div class="form-group">
                    <button type="button" name="btnSubmit" class="btn btn-success rounded smsg" placeholder="Send Message" required data-toggle="modal" data-target="#exampleModalCenter">Send message</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="txtMsg" class="form-control" placeholder="Your Message here" style="width: 100%; height: 150px;"></textarea>
                </div>
            </div>
        </div>
    </form>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div bg class="res"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
</div>
