/**
 * Получение данных из формы админки
 *
 */
function getData(obj_form) {
    var hData = {};
    $('input, textarea, select', obj_form).each(function () {
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
}


/**
 * Добавление ноаой категории
 */
function newCategory() {
    var postData = getData('#blockNewCategory');  // собирает данные из id=blockNewCategory, все это помещается в
    // массив, создаваемый выше

    $.ajax({
        type: 'POST',
        async: false,
        url: "/admin/addnewcat/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                alert(data['message']);
                $('#newCategoryName').val('');
            } else {
                alert(data['message']);
            }
        }
    });
}


/**
 * 5й шаг Обновление данных категории в категориях в админке / действие на onClick
*/
function updateCat(itemId) {
    var parentId     = $('#parentId_' + itemId).val();
    var newName  = $('#itemName_' + itemId).val();
    var postData    = {itemId: itemId, parentId: parentId, newName: newName};

    $.ajax({
        type: 'POST',
        async: false,
        url: "/admin/updatecategory/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            alert(data['message']);
        }
    });
}
