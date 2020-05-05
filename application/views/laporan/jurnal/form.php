<?php $this->libs->rowOpen('', ''); ?>
<div class="sparkline10-list mt-b-30">
    <div class="sparkline10-hd">
        <div class="main-sparkline10-hd">
            <h1>Bla bla bla</h1>
        </div>
    </div>
    <div class="sparkline10-graph">
        <div class="basic-login-form-ad">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="basic-login-inner inline-basic-form">
                        <form action="<?php echo $form; ?>" method="POST">
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <input type="date" class="form-control basic-ele-mg-b-10 responsive-mg-b-10" name="tanggal_awal"/>
                                        <?php echo form_error('tanggal_awal'); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <input type="date" class="form-control basic-ele-mg-b-10 responsive-mg-b-10" name="tanggal_akhir"/>
                                        <?php echo form_error('tanggal_akhir'); ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                    <div class="login-horizental lg-hz-mg"><button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->libs->rowClose(); $this->libs->rowOpen('', ''); ?>