{*Страница продукта*}
{*<div id="jf-content">

    <div id="image_detail" class="gallery">

        <div>
            <h3 id="jg_photo_title" class="jg_imgtitle">{$rsProducts['name']}</h3>
        </div>

    </div>
    <div style="text-align:center;" class="jg_dtl_photo" id="jg_dtl_photo">

        <img width="675" id="jg_photo_big" class="jg_photo" src="/images/products/{$rsProducts['image']}">

    </div>

    <div class="jg_photo_details" style="font-size: 20px; padding-top: 20px;">
    </div>
    <div class="jg_details">
        <div class="sectiontableentry2">
            <div class="jg_photo_left">
                Стоимость
            </div>
            <div id="jg_photo_date" class="jg_photo_right">
                {$rsProduct['price']}        </div>
        </div>

    </div>


    <div class="jg_detailnavi" style="padding-top: 8px;">
        <div class="jg_iconbar">
            <a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart}class="hideme"{/if} href="#"
               onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины">Удалить из
                корзины</a>
            <a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if} href="#"
               onClick="addToCart ({$rsProduct['id']}); return false;" alt="Добавить в карзину">Добавить в карзину</a>
        </div>
    </div>
    <div style="clear: both;"></div>
</div>


<div id="jg_photo_description">
    <div id="jg_photo_desctiption_label">
        Описание
    </div>
    <div class="jg_photo_des">
        <p>{$rsProducts['description']}</p>
    </div>
</div>
<div class="sectiontableheader">
    &nbsp;
</div>
</div>
</div>*}


<h3>{$rsProduct['name']}</h3>

<img src="/images/products/{$rsProduct['image']}" width="575">
Стоимость: {$rsProduct['price']}
<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart}class="hideme"{/if} href="#"
   onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины">Удалить из корзины</a>
<a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if} href="#"
   onClick="addToCart ({$rsProduct['id']}); return false;" alt="Добавить в карзину">Добавить в карзину</a>
<p>Описание: <br>{$rsProduct['description']}</p>
