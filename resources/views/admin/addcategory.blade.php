@extends('admin_layout')
@section('admin_content')


			
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
                <div class="polright">

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
            <form method="post" action="{{route('save.category')}}" class="form-horizontal">
                @csrf
                    <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Category Name</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="date01" name="category_name" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">Category_Description</label>
                        <div class="controls">
                        <textarea class="cleditor" id="textarea2" name="category_description" rows="3" required></textarea>
                        </div>
                    </div>          
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2"> Category_Status</label>
                        <div class="controls">
                        <input type="checkbox" class="input-xlarge" id="date01" name="category_status" value="1" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

			

    
@endsection