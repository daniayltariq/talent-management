@extends('backend.layouts.app')

@section('styles')
	<style>
		.error{
			color: red;
		}

        #delete_req_btn{
            display: none;
        }

        .kt-widget3__item:hover #delete_req_btn{
            display: inline;
        }

        .h-37{
            height: 37px;
        }

        .text-white{
            color: white;
        }
	</style>
@endsection

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="col-xl-12 col-lg-12 order-lg-12 order-xl-1">
        <!--begin:: Widgets/Support Tickets -->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        User Post
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" id="status" data-status="{{$blog->status==1 ? 0 : 1}}" class="btn {{$blog->status==1 ? 'btn-success' : 'btn-danger'}} btn-sm text-white">
                         {{$blog->status ==1 ? 'Active' : 'Inactive'}}
                        </button>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget3">
                    <div class="kt-widget3__item"> 
                        <div class="kt-widget3__body">
                            <h5>{{$blog->title ?? ''}}</h5>
                            <div class="kt-widget3__text"> 
                                {!! html_entity_decode($blog->content  ?? '')!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Support Tickets -->   
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{asset('backend-assets/assets/vendors/general/initial-js/initial.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.demo').initial({width:60,height:60});

            $('#status').on('click',function () {
                /* console.log($(this).data('userid')); */
                const that=this;
                $.get("{{ route('backend.topic.updateStatus') }}",
                {
                    topic_id: {{$blog->id}},
                    status:$(that).attr('data-status')
                },
                function(res){
                    if (res.status=="success") {
                        $(that).text(res.blog_status ==1?' Active' : ' Inactive');
                        $(that).removeClass('btn-success').removeClass('btn-danger').addClass(res.blog_status ==1?' btn-success' : ' btn-danger');
                        $(that).attr('data-status',res.blog_status);
                    } else {
                        toastr.error('Something went wrong');
                    }
                });
                
            });
        })
        

    </script>
@endsection