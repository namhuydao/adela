<form method="GET" action="" class="filter-products">
    <input type="hidden" name="sort" value="">
    <!-- single-shop start -->
    <div class="single-shop mb-40">
        <div class="categories">
            <h3>Lọc Giá</h3>
        </div>
        <div id="slider-range"></div>
        <input type="text" name="price" id="amount"/>
    </div>
    <!-- singl-shop end -->
    <div class="single-shop mb-40">
        <div class="categories-title">
            <h3>Thương Hiệu</h3>
        </div>
        <div class="categories-list">
            <ul>
                @foreach($brands as $brand)
                    <li>
                        <label style="cursor: pointer;">
                            <input type="checkbox" name="brand_ids[]"
                                   {{ ((isset($_GET['brand_ids']) && !empty($_GET['brand_ids']) && in_array($brand->id, $_GET['brand_ids'])) ? 'checked' : '') }} value="{{ $brand->id }}"
                                   style="    width: 20px;">
                            {{$brand->name}}
                            @php($i = 0)
                            @foreach($products as $product)
                                @if($product->brand_id == $brand->id)
                                    @if(isset($category))
                                        @if($product->category_id == @$category->id)
                                            @php($i++)
                                        @endif
                                    @else
                                        @php($i++)
                                    @endif
                                @endif
                            @endforeach
                            ({{$i}})
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- single-shop end -->
    <!-- single-shop start -->
    <div class="single-shop mb-40">
        <div class="categories-title">
            <h3>Size</h3>
        </div>
        <div class="categories-list">
            <ul>
                @foreach($sizes as $size)
                    <li>
                        <label style="cursor: pointer;">
                            <input type="checkbox" value="{{ $size->id }}"
                                   {{ ((isset($_GET['sizes']) && !empty($_GET['sizes']) && in_array($size->id, $_GET['sizes'])) ? 'checked' : '') }} name="sizes[]"
                                   style="    width: 20px;">
                            {{$size->name}}
                            @php($i = 0)
                            @foreach($products as $product)
                                @if($product->sizes->contains($size))
                                    @php($i++)
                                @endif
                            @endforeach
                             ({{$i}})
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- single-shop end -->
    <script>
        $('.filter-products input[type=checkbox]').change(function () {
            var form_data = $('form.filter-products').serialize();
            console.log(form_data);
            window.location.href = "{{ URL::to(@$category->slug) }}?" + form_data;
        });

        $('.sorter-options').change(function () {
            $('input[name=sort]').val($(this).val());
            $('.filter-products').submit();
        });
    </script>
</form>
