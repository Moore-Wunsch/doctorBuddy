@extends('layouts.healthcarelayout')
@section('content')

<div class="cd-main-header">		
    <a class="cd-nav-trigger" href="#0">
        <span></span>
    </a>		
</div>
<main class="cd-main-content">
    @include('healthcare_professional.dashboardmenu')
    <div class="content-wrapper col-lg-9 col-sm-9 col-xs-12">
        
        <?php if($hpObj->healthcare_professional_status ==4) : ?>
        <div class="col-lg-12">
            <div class="warning-alert">Warning : Please complete your registration to access other areas.</div>
        </div>
        <?php endif ?>    
        
        <div class="col-lg-12">
        <div class="m-b">
          <h3>Customer Reviews</h3>
        </div>
        
        <?php if(Session::get('flash_msg')) : ?>
            <div class="m-b">
                <div class="success-alert alert"><?php echo Session::get('flash_msg') ?></div>
            </div>    
        <?php endif ;?>
            
        <?php if(Session::get('error_msg')) : ?>
            <div class="m-b">
                <div class="alert-danger alert"><?php echo Session::get('error_msg') ?></div>
            </div>    
        <?php endif ;?>    
            
        <div id="message"  class="hide m-b">
            <div id="message-text"></div>
        </div>        
                
        <div id="template_table_cover">
        <div class="table-responsive">
            <table class="table display" width="100%" cellspacing="0" id="customer_casefile">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Rating</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $i =0 ;?>
                <?php if(isset($data['reviews'])&& count($data['reviews']) > 0){ ?>
                    <?php foreach($data['reviews'] as $review){ ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $review->customer_fname." ".$review->customer_lname;?></td>           
                            <td><?php //echo ucfirst($review->review_score) ;?>
                                <form class="dt-review">
                                        <select title="Review Score" class="form-control review_score">                                                                       
                                            <option value="1" <?php if($review->review_score=="1"){ echo "selected='selected'";}?>>1</option>
                                            <option value="2" <?php if($review->review_score=="2"){ echo "selected='selected'";}?>>2</option>
                                            <option value="3" <?php if($review->review_score=="3"){ echo "selected='selected'";}?>>3</option>
                                            <option value="4" <?php if($review->review_score=="4"){ echo "selected='selected'";}?>>4</option>
                                            <option value="5" <?php if($review->review_score=="5"){ echo "selected='selected'";}?>>5</option>
                                        </select>
                                    </form>   
                            </td>  
                            <td>
                                <?php 
                                    $comments=trim($review->comments); 
                                    echo substr($comments,0,25);
                                    if(strlen($comments)>25) 
                                        echo '...';
                                ?>
                            </td>
                            <td><?php echo date(Config::get('constants.DATE_FORMAT'),  strtotime($review->date));?></td>                            
                            <td class="links">
                                <a href="<?php echo asset('healthcare_professional/reviews/view/'.$review->review_id );?>" >   
                                    <i aria-hidden="true" class="fa fa-eye fa-4" title="View Review"></i>
                                </a>&nbsp;
                            </td>
                        </tr>
                    <?php } ?>                        
                <?php }else{ ?>
                       <tr><td colspan="5" class="text-center">No Reviews to View</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
            </div>
        </div>        
        
    </div>
</main>

<script>
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="<?php echo asset('js/healthcare_professional/templates.js'); ?>"></script>
<script src="<?php echo asset('js/review/jquery.barrating.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('.review_score').barrating({
        theme: 'fontawesome-stars',
        readonly:'true'
      });
} );
</script>
@stop

@section('modal_popup_area')
<!-- START :Template view  Pop up -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="template_popup">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="template_modal_title"></h4>
        </div>
          <div class="modal-body" id="template_modal_body">
          
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 <!-- END :Template view  Pop up -->    
@stop 