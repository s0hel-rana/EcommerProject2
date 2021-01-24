@extends('admin_layout')
@section('admin_content')


			
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Brand</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
                <div class="pull-right">

                            <p class="alert-success">
                                <?php
                                
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                                ?>
                            
                            </p>
                </div>

            <div class="box-content">
            <form method="post" action="{{route('update.brand',$posts->brand_id)}}" class="form-horizontal">
                @csrf
                    <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Brand Name</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="date01" name="brand_name" value="{{$posts->brand_name}}" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">Brand_Description</label>
                        <div class="controls">
                        <textarea class="cleditor" id="textarea2" name="brand_description" rows="3" required>value="{{$posts->brand_description}}"</textarea>
                        </div>
                    </div>          
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2"> Brand_Status</label>
                        <div class="controls">
                        <input type="checkbox" class="input-xlarge" id="date01" name="brand_status" value="1" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">update changes</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

			

    
@endsection