{* 4 шаг страницы Заказов*}
<h2>Заказы</h2>
{if !$rsOrders}
    Заказов нет
{else}
    <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th>№</th>
            <th>Действие</th>
            <th>ID заказа</th>
            <th width="110">Статус</th>
            <th>Дата создания</th>
            <th>Дата оплаты</th>
            <th>Дополнительная информация</th>
            <th>Дата изменения заказа</th>
        </tr>
        {foreach $rsOrders as $item name=orders}
            <tr>
                <th>{$smarty.foreach.orders.iteration}</th>
                <th><a href="#" onclick="showProducts('{$item['id']}'); return false;">Показать товар заказа</a></th>
                <th>{$item['id']}</th>
                <th><input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']}checked="checked"{/if}
                           onclick="updateOrderStatus('{$item['id']}');">Закрыт
                </th>
                <th>{$item['date_created']}</th>
                <th>
                    <input type="text" id="datePayment_{$item['id']}" value="{$item['date_payment']}">
                    <input type="button" value="Сохранить" onclick="updateDatePayment('{$item['id']}');">
                </th>
                <th>{$item['comment']}</th>
                <th>{$item['date_modification']}</th>
            </tr>
            {*Стрытая таблица, показывающая заказы*}
            <tr class="hideme" id="purchasesForOrdersId_{$item['id']}">
                <td colspan="8">
                    {if $item['children']}
                    <table border="1" cellpadding="1" cellspacing="1" width="100%">
                        <tr>
                            <th>№</th>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Количество</th>
                        </tr>
                        {foreach $item['children'] as $itemChild name=products}
                            <tr>
                                <td>{$smarty.foreach.products.iteration}</td>
                                <td>{$itemChild['id']}</td>
                                <td><a href="/product/{$itemChild['id']}/">{$itemChild['name']}</a></td>
                                <td>{$itemChild['price']}</td>
                                <td>{$itemChild['amount']}</td>
                            </tr>
                        {/foreach}
                    </table>
                    {/if}
                </td>
            </tr>
        {/foreach}
    </table>
{/if} // далее реализуем работу чекбокса "статус" и ПОля "данные оплаты" в OrdersModel