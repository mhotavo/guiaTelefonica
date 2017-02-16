<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Plugin JavaScript -->
<script src="{{ asset('js/jquery.easing.min.js') }}"></script><!-- Contact Form JavaScript -->
<script src="{{ asset('js/bootstrap3-typeahead.min.js') }}"></script><!-- Contact Form JavaScript -->
<script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('js/contact_me.js') }}"></script>

<script src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
<script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
<script src="{{ asset('plugins/dataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Theme JavaScript -->
<script src="{{ asset('js/agency.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
	if ($("#city").length) {
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
	}
	if ($("#search, #category").length) {
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
	}

</script>