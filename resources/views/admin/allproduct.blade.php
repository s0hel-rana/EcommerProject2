@extends('admin_layout')

@section('admin_content')



			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
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
								<th>P ID</th>
                                <th>P Name</th>
                                <th>C ID</th>
                                <th>B ID</th>
                                <th>P  D</th>
                                <th>P Price</th>
                                <th>P Image</th>
                                <th>P Size</th>
                                <th>P Color</th>   
                                <th>Status</th>
                                <th>Actions</th>
							  </tr>
						  </thead>  
						   @foreach ($posts as $post)
							<tbody>
								<tr>
									<td>{{$post->product_id}}</td>
									<td>{{$post->product_name}}</td>
									<td>{{$post->category_id}}</td>
									<td>{{$post->brand_id}}</td>
									<td>{{$post->product_description}}</td>
                                    <td>{{$post->product_price}}</td>
                                    <td><img src="{{URL::to($post->product_image)}}" style="height:80px; width:80px;"></td>
									<td>{{$post->product_size}}</td>
									<td>{{$post->product_color}}</td>

									@if ($post->product_status==1)
										<td>
										<span class="label label-success">Active</span>
									</td>
									@else
										<td>
										<span class="label label-danger">Inactive</span>
										</td>
									@endif
									
									<td class="center">
										@if ($post->product_status==1)
											<a class="btn btn-danger" href="{{route('inactive.product',$post->product_id)}}">
												<i class="halflings-icon white thumbs-down"></i>  
											</a>
										@else
											<a class="btn btn-success" href="{{route('active.product',$post->product_id)}}">
												<i class="halflings-icon white thumbs-up"></i>  
											</a>
										@endif
											<a class="btn btn-info" href="{{route('edit.product',$post->product_id)}}">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" onclick="return confirm('do you want to delete it?')" href="{{route('delete.product',$post->product_id)}}">
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


