@extends('admin_layout')

@section('admin_content')



			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Category</h2>
						<span class="pull-right">
							<p class="alert-success">
								
                                <?php
                                
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                                ?>
                            	
                            </p>
						</span>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
						

                            
                		
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Category Id</th>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Category Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
						   @foreach ($posts as $post)
							<tbody>
								<tr>
									<td>{{$post->category_id}}</td>
									<td>{{$post->category_name}}</td>
									<td>{{$post->category_description}}</td>

									@if ($post->category_status==1)
										<td>
										<span class="label label-success">Active</span>
									</td>
									@else
										<td>
										<span class="label label-danger">Inactive</span>
										</td>
									@endif
									
									<td class="center">
										@if ($post->category_status==1)
											<a class="btn btn-danger" href="{{route('inactive.category',$post->category_id)}}">
												<i class="halflings-icon white thumbs-down"></i>  
											</a>
										@else
											<a class="btn btn-success" href="{{route('active.category',$post->category_id)}}">
												<i class="halflings-icon white thumbs-up"></i>  
											</a>
										@endif
											<a class="btn btn-info" href="{{route('edit.category',$post->category_id)}}">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" onclick="return confirm('do you want to delete it?')" href="{{route('delete.category',$post->category_id)}}">
												<i class="halflings-icon white trash"></i> 
											</a>
									</td>
								</tr>
							</tbody>
						  @endforeach
					  </table>          
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			


@endsection