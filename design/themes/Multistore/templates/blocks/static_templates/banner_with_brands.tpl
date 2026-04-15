<div class="row align-items-center text-center text-md-left">
    <div class="col-md-5 offset-md-1">
        <img src="/design/themes/Multistore/media/images/banner_with_brands_image.png" class="w-100 image"/>
    </div>
    <div class="col-md-9">
        <h1 class="title">REPAIR MY INFRARED SAUNA</h1>
        
        <ul class="pointed"><li>We have been providing sauna repair service across the country for over three years.</li><li>
We have helped fix a massive range of sauna models from existing and defunct brands.</li><li>
Our main goal is to make the sauna repair process easy, convenient and affordable, in addition to being quick. </li><li>
                Besides identifying and solving your sauna problems we also want you to continue enjoying the sauna long after we conclude the repair, so check out our <a href="/warranty.html">warranty page.</a><br> </li></ul>
<br>
<b>Please select the brand of sauna that needs repair.</b><br>

        




 



        <form id="main-brands-form">
            <div class="input-group">
                <select class="selectpicker">
                    <option value="">---</option>
                    {foreach from=fn_brands_get_all() item=brand}
                    <option value="{$brand.brand_id}" data-url="{"brands.view?brand_id=`$brand.brand_id`"|fn_url}">{$brand.name}</option>
                    {/foreach}
                </select>
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">NEXT</button>
                </div>
            </div>
        </form>
        <p><a  href="#">Cannot find your sauna brand?</a></p>
    </div>
</div>