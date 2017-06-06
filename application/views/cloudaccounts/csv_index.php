

<div id="container">
	<h1>EE-cloud send email</h1>

	<div id="body">
		

		 <div class="row">
          <div class="col-lg-4 col-sm-4 well">
          <?php 
          $attributes = array("class" => "form-horizontal", "id" => "uploadform", "name" => "uploadform", "enctype"=>"multipart/form-data");
          echo form_open("cloudaccounts/csv_fetch", $attributes);?>
          <fieldset>
               <legend>Convertor form</legend>
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
                    <label for="txt_filename" class="control-label">Upload CSV file</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="txt_filename" name="txt_filename" placeholder="fileName" type="file" value="<?php echo set_value('txt_filename'); ?>" required accept=".csv" />
					<span class="text-danger" style='color:red;'><? if (isset($message))	echo $message;	?></span>
               </div>
               </div>
               </div>

			   <div class="form-group">
			   <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
                    <label for="txt_filename" class="control-label">Output format</label>
               </div>
			   <div class="col-lg-8 col-sm-8">
                    <!--<input class="form-control" id="txt_opformat" name="txt_opformat" placeholder="opFormat" type="radio" value="XML" required /> XML
					<input class="form-control" id="txt_opformat" name="txt_opformat" placeholder="opFormat" type="radio" value="Json" required /> Json-->
					<input class="form-control" id="txt_opformat" name="txt_opformat" placeholder="opFormat" type="radio" value="List" required /> Send email
					<!--<input class="form-control" id="txt_opformat" name="txt_opformat" placeholder="opFormat" type="radio" value="SQL" required /> SQL
					<input class="form-control" id="txt_opformat" name="txt_opformat" placeholder="opFormat" type="radio" value="YML" required /> YML -->

                    <span class="text-danger"><?php echo form_error('txt_opformat'); ?></span>
               </div>
			   </div>
                              
               <div class="form-group">
               <div class="col-lg-12 col-sm-12 text-center">
                    <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Submit" />
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
               </div>
               </div>
          </fieldset>
          <?php echo form_close(); ?>
          <?php //echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
	</div>

	