    
    /*
	* ===============================================================
	* Search
	* ===============================================================
	*
	* Function for query the search result from database.
    */

	$(document).ready(function(){
		$('#search_box').hide();
	});

	function fetch_search(query = ''){
		$.ajax({
			url: config.route.SearchATK,
			method: 'GET',
			data:{query:query},
			dataType: 'html',
			success: function(data){
				$('#search_suggest').html(data);
			}
		});
	}

	/*
	* Function to (show search area & run the search query) if txtSearch >= 4 characters and hide of not such as said.
    */    
	$(document).on('keyup', '#txtSearch', function(){
		query = $(this).val();
		if(query.length >= 4){
			$('#search_box').show();
			fetch_search(query);
		}else{
			$('#search_box').hide();
			$('#search_suggest').html('');
		}
	});

	/*
	* Function for close the search area.
    */
	$(document).on('click',['#closeSearchBox','a'], function(){
		$('#search_box').hide();
		$('#txtSearch').val('');
	});
	


	$(document).on('click', 'tbody > tr.sid_selector', function(){
		hn = $(this).data('hn');
		console.log('HN: '+hn);
		if(hn){
			window.location.replace("/profile/patient/" + hn);
		}
	});