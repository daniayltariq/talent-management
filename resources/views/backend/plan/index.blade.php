@extends('backend.layouts.app')
@section('styles')
<style>
   .btn-primary {
    color: #fff;
    background-color: #5867dd;
    border-color: #5867dd;
    color: #ffffff;
   }
</style>
@endsection

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Plans 
				</h3>
				
			</div>
			<div class="kt-portlet__head-label" style="float: right">
				<a href="{{ route('backend.plan.create') }}" style="background-color: #0abb87;" class="btn btn-success btn-xs"><i class='fa fa-plus'></i> New Plan</a>
			</div>
		</div>
		<div class="kt-portlet__body">
			<!--begin::Section-->
			<div class="kt-section">
				 
				<div class="kt-section__content">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
                        <tr>
                           {{-- <th>Type</th> --}}
                           <th>Name</th>
                           <th>Cost</th>
                           <th>Details</th>
                           <th>Operation</th>
                        </tr>
                     </thead>
                     <tbody>
                           {{-- <td>Anual</td> --}}
                           @foreach ($plans as $plan)
                           <tr>
                              <td>{{$plan->name}}</td>
                              <td>{{$plan->cost}}</td>
                              <td>{!! $plan->description !!}</td>
                              <td>
                                 <a  href="{{route('backend.plan.edit',$plan->slug ?? $plan->id)}}" class="btn btn-primary btn-xs" ><i class="fa fa-pencil-alt" ></i> Edit </a>
                                 {{-- <a  href="#" class="btn btn-secondary btn-xs" ><i class="fa fa-folder" ></i> View </a> --}}
                                 {{-- @include('components.form.delete' , ['data' => $plan->id, 'route' => 'superadmin.plan.destroy']) --}}
                              </td>
                           </tr>
                           @endforeach
                           
                        </tr>
                     </tbody>
						</table>
					</div>
				</div>
			</div>
			<!--end::Section-->
		</div>
		<!--end::Form-->
	</div>
	<!--end::Portlet-->
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){


	})

</script>
@endsection