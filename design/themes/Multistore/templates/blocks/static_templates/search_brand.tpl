<form class="search-brand-form">
    <div class="input-group">
        <input name="q" type="text" class="form-control search-brand-field" placeholder="SEARCH BY BRAND" value="">
        <div class="input-group-prepend">
            <button type="submit" class="btn btn-light search-brand-button"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
<div class="quick-search-brand">
    <ul>
        <li class="active">A-E</li>
        <li>F-K</li>
        <li>L-Q</li>
        <li>R-W</li>
        <li>X-Z</li>
    </ul>
    <div class="list" id="simplebar">
        {foreach from=fn_brands_by_lettes('A-E') item=brand}
        <a href="{$brand.url}">{$brand.name}</a>
        {/foreach}
    </div>
</div>