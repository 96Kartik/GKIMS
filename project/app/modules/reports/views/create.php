
  <section class="content-header">
          <h1>
            <?php echo lang('project_management');?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class=""><?php echo lang('project_management');?></li>
			<li class="active"><?php echo lang('add_page');?></li>
          </ol>
        </section>

<div class="row">
    <div class="col-md-12">
         <a href="<?php echo base_url('project');?>" class="btn btn-primary pull-right"><i class="fa fa-hand-o-left"></i> <?php echo lang('back');?></a>
    </div>
</div>

<hr class="whiter"/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list"></i> <?php echo lang('page_form');?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10">
                        <?php echo $this->load->view('form');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
