jQuery.fn.extend({
    createRepeater: function (options = {}) {
        var hasOption = function (optionKey) {
            return options.hasOwnProperty(optionKey);
        };

        var option = function (optionKey) {
            return options[optionKey];
        };

        var generateId = function (string) {
            return string
                .replace(/\[/g, '_')
                .replace(/\]/g, '')
                .toLowerCase();
        };

        var addItem = function (items, key, fresh = true) {
            var itemContent = items;
            var group = itemContent.data("group");
            var item = itemContent;
            var input = item.find('input,select,textarea');

            var itemClone = items.clone();

            /* console.log(item.html());
            console.log(itemClone.html()); */
            input.each(function (index, el) {
                var attrName = $(el).data('name');
                var skipName = $(el).data('skip-name');
                if (skipName != true) {
                    $(el).attr("name", group + "[" + key + "]" + "[" + attrName + "]");
                } else {
                    if (attrName != 'undefined') {
                        $(el).attr("name", attrName);
                    }
                }
                if (fresh == true) {
                    $(el).attr('value', '');
                }

                $(el).attr('id', generateId($(el).attr('name')));
                $(el).parent().find('label').attr('for', generateId($(el).attr('name')));
            })

            /* console.log(item.html());
            console.log(itemClone.html()); */
            /* Handling remove btn */
            var removeButton = itemClone.find('.remove-btn');

            if (key == 0) {
                removeButton.attr('disabled', true);
            } else {
                removeButton.attr('disabled', false);
            }

            removeButton.attr('onclick', '$(this).parents(\'.items\').remove()');

            var newItem = $("<div class='items' data-group='experience'>" + itemClone.html() + "<div/>");
            newItem.attr('data-index', key)

            newItem.appendTo(repeater);
        };

        /* find elements */
        var repeater = this;
        var items = repeater.find(".items");
        var key = 0;
        var itemToClone;
        var addButton = repeater.find('.repeater-add-btn');

        items.each(function (index, item) {
            /* items.remove(); */
            if (hasOption('showFirstItemToDefault') && option('showFirstItemToDefault') == true) {
                console.log('Show first');
                /* addItem($(item), key);
                key++; */
            }
            else if (hasOption('showItemsToDefault') && option('showItemsToDefault') == true) {
                console.log(option('startIndex'));
                key = option('startIndex');
                itemToClone = option('startIndex');
            }
            else {
                items.remove();
                if (items.length > 1) {
                    addItem($(item), key);
                    key++;
                }
            }
        });

        /* handle click and add items */
        addButton.on("click", function () {
            items = repeater.find(".items");
            /* console.log(itemToClone, $(items).last().html()); */
            addItem($(items).last(), key);

            key++;
        });
    }
});
