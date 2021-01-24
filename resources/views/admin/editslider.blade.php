@extends('admin_layout')
@section('admin_content')


			
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
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
            <form method="post" action="{{route('update.slider',$post->slidert_id)}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                    <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Slider Name</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="date01" name="slider_name" value="{{$post->slider_name}}" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Slider Title</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="date01" name="slider_title" value="{{$post->slider_title}}" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Sliders_Description</label>
                        <div class="controls">
                        <textarea class="cleditor" id="textarea2" name="slider_description" rows="3" required>{{$post->slider_description}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Sliders Image</label>
                        <div class="controls">
                        <input type="file" class="input-xlarge" id="date01" name="slider_image" value="{{$post->slider_image}}">
                        </div>
                    </div>          
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2"> Sliders_Status</label>
                        <div class="controls">
                        <input type="checkbox" class="input-xlarge" id="date01" name="slider_status" value="1" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Edit Slider</button>
                        <button type="reset" class="btn btn-danger" >Re-Set</button>
                    </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

			

    
@endsection