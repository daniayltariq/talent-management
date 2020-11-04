<script src="{{ asset('web/libs/jquery/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('web/libs/modernizr/modernizr.js') }}"></script>
<script src=" {{ asset('web/libs/bootstrap/js/bootstrap.min.js') }}"></script>
<script src=" {{ asset('web/libs/plugins-scroll/plugins-scroll.js') }}"></script>
<script src=" {{ asset('web/libs/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src=" {{ asset('web/libs/izotope/isotope.pkgd.min.js') }}"></script>
<script src=" {{ asset('web/libs/hero-slider/hero-slider.js') }}"></script> <!-- Resource jQuery -->
<script src=" {{ asset('web/js/common.js') }}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script>
	@if (Session::has('message'))
		var type = "{{ Session::get('alert-type', 'info') }}"
		
	switch(type){
		case 'info':
		
		  
			toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-bottom-center",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			}
			toastr.info("{{Session::get('message')}}");
			var audio = new Audio('audio.mp3');
			audio.play();
			break;


		case 'success':
		
		   
			toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-bottom-center",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			}
			toastr.success("{{Session::get('message')}}");
			var audio = new Audio('audio.mp3');
			audio.play();
			
			break;
		case 'warning':
		
		
			toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-bottom-center",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			}
			toastr.warning("{{Session::get('message')}}");
			var audio = new Audio('audio.mp3');
			audio.play();
			
			break;
		case 'error':
		
		
			toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-bottom-center",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			}
			toastr.error("{{Session::get('message')}}");
			var audio = new Audio('audio.mp3');
			audio.play();
		
			break;
	}
	@endif
	

	$(".modal").each(function(l){
        $(this).on("show.bs.modal",function(l)
        {
            var o=$(this).attr("data-easein");
            $(".modal-dialog").velocity("transition."+o)
        })
    });

	$(document).on('click','#create-picklist-btn',function(){
		$('[name="picklist_id"]').val('');
		$('div#picklist-select').toggleClass('new-picklist');

		$('div#new-picklist').toggleClass('new-picklist');
		/* $(this).text('Add to picklist'); */
	})

	$(document).on('click','.picklist-btn',function(){
		var member=$(this).data('memberid');
		$('[name="member_id"]').val(member);
	})
	/* function toggleModal() 
	{
		$('#picklist-modal').modal('toggle');
	} */
</script>