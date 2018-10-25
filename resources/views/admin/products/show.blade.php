@extends('layouts.admin')
@section('content')
<div class="showProduct container">
    <div class="row">
        <div class="col-6">
            <div id="products_example">
                <div id="products">
                    <div class="row">
                        <div class="col-12">
                            <div class="slides_container images_3_of_2">
                            @foreach($product->images as $image)
                            <a href="#" target="_blank"><img src="{{url($image->name)}}" alt=" " /></a>
                            @endforeach      
                            </div>                    
                        </div>
                        <div class="col-12">
                            <div class="price price-red text-center">
                                <p>Giá: <span>{!!number_format($product->price,0,",",".") . ' đ'!!}</span> </p>
                            </div> 
                        </div>
                    </div>                               
                </div>
            </div>
        </div>
        <div class="col-6">
            <h2>{{$product->name}}</h2>
            <div class="share-desc">
                <ul class="parameter">
                    <li>
                        <span>Màn Hình:</span>
                        <div>{{$product->screen}}</div>
                    </li>
                    <li>
                        <span>Hệ điều hành:</span>
                        <div>{{$product->system}}</div>
                    </li>
                    <li>
                        <span>Camera sau:</span>
                        <div>{{$product->bcamera}} MB</div>
                    </li>
                    <li>
                        <span>Camera trước:</span>
                        <div>{{$product->fcamera}} MB</div>
                    </li>
                    <li>
                        <span>CPU:</span>
                        <div>{{$product->cpu}}</div>
                    </li>
                    <li>
                        <span>Ram:</span>
                        <div>{{$product->ram}} GB</div>
                    </li>
                    <li>
                        <span>Bộ nhớ trong:</span>
                        <div>{{$product->rom}} GB</div>
                    </li>
                    <li>
                        <span>Thẻ nhớ:</span>
                        <div>Hỗ trợ tối đa {{$product->smenory}} GB</div>
                    </li>
                    <li>
                        <span>Pin:</span>
                        <div>{{$product->pin}} mAh</div>
                    </li>
                </ul>
                            
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="description area_article area_articleFull">
            <h2>Mô tả sản phẩm</h2>
             {{ $product->description }}
        </div>
    </div>
</div>
@endsection