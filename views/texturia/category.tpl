{*Страница категории*}

{*
<h1>Товары категории {$rsCategory['name']}</h1>

<div class="joomcat">
    <div class="joomcat96_row">
        {foreach $rsProducts as $item name = products}
        <div class="joomcat65_imgct" style="width: 216px !important; margin-right:10px;">
            <div class="joomcat96_img cat_img">
                <a href="/product/{$item['id']}/">
                    <img src="/images/products/{$item['image']}" width="100"/>
                </a>
            </div>
            <div style="padding-bottom:10px;padding-top:0px;" class="joomcat96_txt">
                <ul>
                    <li><a href="/product/{$item['id']}/">{$item['name']}</a></li>
                </ul>
            </div>
        </div>

        {if $smarty.foreach.products.iteration mod 3 == 0}
        <div class="joomcat96_clr"></div>
    </div>

    <div class="joomcat96_row">
        {/if}
        {/foreach}
    </div>
</div>

{foreach $rsChildCats as $item name=childCats}
    <h2><a href="/category/{$item['id']}/">{$item['name']}</a></h2>
{/foreach}
*}

<h1>Товары категории {$rsCategory['name']}</h1>

{foreach $rsProducts as $item name=products}
    <div style="float:left; padding: 0px 30px 40px 0px;">
        <a href="/product/{$item['id']}/">
            <img src="/images/products/{$item['image']}" width="100" >
        </a><br>
        <a href="/product/{$item['id']}/">{$item['name']}</a>
    </div>

    {if $smarty.foreach.products.iteration mod 3 == 0}
        <div style="clear: both;"></div>
    {/if}
{/foreach}

{foreach $rsChildCats as $item name=childCats}
    <h2><a href="/category/{$item['id']}/">{$item['name']}</a></h2>
{/foreach}