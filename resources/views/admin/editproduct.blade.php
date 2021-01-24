@extends('admin_layout')
@section('admin_content')


			
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit_Product</h2>
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
            <form method="post" action="{{route('update.product',$post->product_id)}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
            
                    <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Name</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="date01" name="product_name" value="{{$post->product_name}}" required>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="selectError3">Product Category</label>
                        <div class="controls">
                            <select name="category_id" id="selectError3">
                                    <option>Select Category</option>
                                    <?php
                                    $showall_category=DB::table('tbl_caregory')
                                    ->where('category_status',1)
                                    ->get();
                                foreach ($showall_category as $item) {?>
                                <option value="{{$item->category_id}}" required>{{$item->category_name}}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="selectError3">Brand Name</label>
                        <div class="controls">
                            <select name="brand_id" id="selectError3">
                                    <option>Select Brand</option>
                                    <?php
                                    $showall_brand=DB::table('brands')
                                    ->where('brand_status',1)
                                    ->get();
                                foreach ($showall_brand as $item) {?>
                                <option value="{{$item->brand_id}}" required>{{$item->brand_name}}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Products Description</label>
                        <div class="controls">
                        <textarea class="cleditor" id="textarea2" name="product_description" rows="3" required>{{$post->product_description}}</textarea>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="date01">Products Pirce</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="date01" name="product_price" value="{{$post->product_price}}" required>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="date01">Products Image</label>
                        <div class="controls">
                        <input type="file" class="input-xlarge" id="date01" name="product_image"  value="{{$post->product_image}}" required>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="date01">Products Size</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="date01" name="product_size" value="{{$post->product_size}}" required>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="date01">Products Color</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="date01" name="product_color" value="{{$post->product_color}}" required>
                        </div>
                    </div>          
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2"> Products_Status</label>
                        <div class="controls">
                        <input type="checkbox" class="input-xlarge" id="date01" name="product_status" value="1" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

			

    
@endsection