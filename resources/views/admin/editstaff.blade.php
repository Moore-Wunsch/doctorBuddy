@extends('layouts.adminlayout')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Admin Staff</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Staff <small></small></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">
                    <br></br>
<?php // 
//echo '<>pre>';
//print_r($data);
//echo $data['username']."KK";
//foreach($data as $val){ 
?>
                  <form class="form-horizontal form-label-left" novalidate  method="post" >
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Staff Username <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input data-parsley-id="3638" id="username" name="username" value="<?php echo $data['username'];?>" required="required" title="Username" class="form-control col-md-7 col-xs-12" type="text"><ul id="parsley-id-3638" class="parsley-errors-list"></ul>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Staff Email <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input data-parsley-id="3638" id="admin_email_id" name="admin_email_id" value="<?php echo $data['admin_email_id'];?>" title="Email" required="required" class="form-control col-md-7 col-xs-12" type="email"><ul id="parsley-id-3638" class="parsley-errors-list"></ul>
                                               <input name="admin_id" type="hidden" value="<?php echo $data['admin_id'];?>" />
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="password" class="control-label col-md-3">Password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="password" type="password" name="password" data-validate-length="" required="required" title="Password" class="form-control col-md-7 col-xs-12" required="required">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="password2" type="password" name="password2" required="required" data-validate-linked="password" title="Password" class="form-control col-md-7 col-xs-12" required="required">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="radio">
                                                    <label>
                                                        <input <?php if($data['admin_status'] == 1){?>checked="checked" <?php } ?>value="1" id="admin_status" name="admin_status" type="radio"> Enable</label><label>
                                                        <input <?php if($data['admin_status'] == 0){?>checked="checked" <?php } ?> value="0" id="admin_status" name="admin_status" type="radio"> Disable</label>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="../staff"><button type="button" class="btn btn-primary">Cancel</button></a>
                                                <button type="submit" class="btn btn-success" name="update" id="update">Update</button>
                                            </div>
                                        </div>

                                    </form>
                    
                 
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>
<script>
$('form')
    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern]', validator.keypress);

$('.multi.required')
    .on('keyup blur', 'input', function () {
        validator.checkField.apply($(this).siblings().last()[0]);
    });
    $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });
</script>
@stop
