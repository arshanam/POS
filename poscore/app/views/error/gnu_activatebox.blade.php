{{Form::open(array('route'=>'postactivatebox', 'id'=>'form_gnukey', 'class'=>'form-horizontal'))}}
	
	<div class="center">LICENSE KEY- SAMPLE:  <span class="bolder">YSH9-278H-GDNC-O</span> </div>

	<div id="create-task-msg-error" class="error-msg"></div>

	{{Form::text('license_key', '', array('id'=>'gnukey', 'class'=>'span6', 'style'=>'text-transform:uppercase', 'validate'=>'required', 'limit'=>'32', 'counter'=>'euf'))}}
	<span counter-place="euf"></span>
	<br><br>
	<div class="alert alert-warning"> 
	<h2 class=" bolder">
	<i class="icon-bullhorn"></i> ANNOUNCEMENT:
	</h4>
	
	<span class="grey"> If you don't already the license key.. You can request for a license key by contacting us through: 
	 <br><br>
	 EMAIL: mytansill@yahoo.com <br>
	 EMAIL: bucketcodes@yahoo.com <br>
	 PHONE: 08092293336
	 </span>

	</div>

{{Form::close()}}

{{Larasset::start('footer')->only('charlimit', 'maskedinput')->show('scripts')}}

<script>
$(document).ready(function(){
	$('#gnukey').mask('****-****-****-****-****-****-****');
	$('#gnukey').keydown(function(e){ if( e.which == 13 ) e.preventDefault(); });

	$('button[data-ref="activate-software"]').on('click',function(e){
		e.preventDefault();
		$('#form_gnukey').ajaxrequest_wrapper({
			validate: {etype:'group', vtype:'inline'},
			pageReload:true
		});
	});
});
</script>