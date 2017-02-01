    var pathCity = "SearchCities";
    $('#city').typeahead({
        source: function(query, process) {
            return $.get(pathCity, {
                query: query
            }, function(data) {
                return process(data);
            });
        },
        updater: function(item) {
            $('#idCity').val(item.id);
            return item;
        }
    });
    var pathCategory = "SearchCategories";
    $('#search, #category').typeahead({
        source: function(query, process) {
            return $.get(pathCategory, {
                query: query
            }, function(data) {
                return process(data);
            });
        },
        updater: function(item) {
            $('#idCategory').val(item.id);
            return item;
        }
    });