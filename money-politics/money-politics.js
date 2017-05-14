var $ = jQuery.noConflict();
$(document).ready(function () {
	var baseUrl = "http://thepolitic.org/wp-content/themes/the_politic_2016/money-politics/"
	var nominee_table = {}
	var Nominee = function(name, position, image) {
		this.name = name
		this.position = position
		this.image = image
		this.for_donate = []
		this.against_donate = []
		this.for_remain = []
		this.against_remain = []
	}

	var Senator = function (name, party, state) {
		this.name = name
		this.party = party
		this.state = state
	}

	$.ajax({
		type: "GET",
		url: "http://thepolitic.org/wp-content/themes/the_politic_2016/money-politics/moneypol.csv",
		dataType: "text",
		success: function(data) {
			moneyData = $.csv.toObjects(data);
			loadData(moneyData)
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});

	function loadData(data) {
		nominee_table['Tillerson'] = new Nominee('Rex Tillerson', 'Secretary of State', "tillerson.jpg")
		nominee_table['Mnuchin'] = new Nominee('Steven Mnuchin', 'Secretary of the Treasury', 'mnuchin.jpg')
		nominee_table['Ross'] = new Nominee('Wilbur Ross', 'Secretary of Commerce', 'ross.jpg')
		nominee_table['Carson'] = new Nominee('Ben Carson', 'Secretary of Housing and Urban Development', 'carson.jpg')
		nominee_table['Chao'] = new Nominee('Elaine Chao', 'Secretary of Transportation', 'chao.jpg')
		nominee_table['DeVos'] = new Nominee('Betsy DeVos', 'Secretary of Education', 'devos.jpg')
		nominee_table['Shulkin'] = new Nominee('David Shulkin', 'Secretary of Veterans Affairs', 'shulkin.jpg')
		nominee_table['McMahon'] = new Nominee('Linda McMahon', 'Administrator of the Small Business Administration', 'mcmahon.jpg')
		nominee_table['Perdue'] = new Nominee('Sonny Perdue', 'Secretary of Agriculture', 'perdue.jpg')
		// nominee_table['Acosta'] = new Nominee('Acosta', 'Secretary of Labor')
		// nominee_table['Lighthizer'] = new Nominee('Lighthizer', 'Trade Representative')

		for (var i = 0; i < data.length; i++) {
			var current = data[i]
			var senator = new Senator(current['First Name'] + ' ' + current['Last Name'], current['Party'], current['State'])
			for (var key in nominee_table) {
				if (current[key] <= 4 && current[key] >= -4 && current[key] != 0) {
					if (Math.abs(current[key]) == 1) {
						if (current[key] > 0){
							nominee_table[key].for_remain.push(senator)
						} else {
							nominee_table[key].against_remain.push(senator)
						}
					} else {
						if (current[key] > 0){
							nominee_table[key].for_donate.push([senator, Math.abs(current[key])])
						} else {
							nominee_table[key].against_donate.push([senator, Math.abs(current[key])])
						}
					} 
				}
			}
		}

		for (var key in nominee_table) {
			var id = nominee_table[key].name.split(' ')[1];
			$('.nav').append($('<li role="presentation"><a href="#' + id.toLowerCase() + '" role="tab" class="nom-tab" data-toggle="tab">' + id + '</a></li>'))
			$('.tab-content').append($('<div role="tabpanel" class="tab-pane fade" id="' + id.toLowerCase() + '"></div>'))
			
			$nominee = $("<div>", {"class":'nominee'})
			$nominee.append($("<img>", {"src": baseUrl + nominee_table[key].image, "class":'nominee-image'}))
			var $info = $("<div>", {"class":'nominee-info'})
			$info.append($("<div>", {"class":'nominee-name'}).text(nominee_table[key].name))
			$info.append($("<div>", {"class":'nominee-title'}).text(nominee_table[key].position))
			$nominee.append($info)
			var $sum = $("<div>", {"class":'nominee-summary'})
			$sum.append($("<div>", {"class":'summary donate'}).text("With donations"))
			$progress = $("<div>", {"class":'progress vote-bar'})
			var total_all = nominee_table[key].for_donate.length + nominee_table[key].against_donate.length
			+ nominee_table[key].for_remain.length + nominee_table[key].against_remain.length;
			var for_all = nominee_table[key].for_donate.length + nominee_table[key].for_remain.length
			var against_all = nominee_table[key].against_donate.length + nominee_table[key].against_remain.length
			$progress.append($("<div>", {"class":'progress-bar for', "style": "width: " + (for_all / total_all) * 100 + "%"}))
			$progress.append($("<div>", {"class":'progress-bar against', "style": "width: " + (against_all / total_all) * 100 + "%"}))
			$sum.append($progress)
			$sum.append($("<div>", {"class":'summary-voting'}).text(for_all + " for, " + against_all + " against"))
			$sum.append($("<div>", {"class":'summary'}).text("Without donations"))
			$progress = $("<div>", {"class":'progress vote-bar'})
			$progress.append($("<div>", {"class":'progress-bar for', "style": "width: " + (nominee_table[key].for_remain.length /
				(nominee_table[key].for_remain.length + nominee_table[key].against_remain.length)) * 100 + "%"}))
			$progress.append($("<div>", {"class":'progress-bar against', "style": "width: " + (nominee_table[key].against_remain.length /
				(nominee_table[key].for_remain.length + nominee_table[key].against_remain.length)) * 100 + "%"}))
			$sum.append($progress)
			$sum.append($("<div>", {"class":'summary-voting'}).text(nominee_table[key].for_remain.length + " for, " + nominee_table[key].against_remain.length + " against"))
			$nominee.append($sum)

			var $votesfor = $("<div>", {"class":'vote-indicator for'}).append($("<span>", {"class":'glyphicon glyphicon-ok'}))
			var $voting = $("<div>", {"class":'voting'})
			var $votes = $("<div>", {"class":'nominee-votes'})
			var $donate = $("<span>", {"class":'results donate'})
			for (var i = 0; i < nominee_table[key].for_donate.length; i++){
				var item = nominee_table[key].for_donate[i]
				var desc = ""
				switch (item[1]){
					case 2:
					desc = nominee_table[key].name + " donated to this senator's campaign or state politial party.";
					break;
					case 3:
					desc = nominee_table[key].name + " donated to a PAC that then donated to this senator within 6 months of the donation.";
					break;
					case 4:
					desc = nominee_table[key].name + " donated to this senator's campaign or state politial party, and also to to a PAC that donated to this senator within 6 months.";
					break;
				}
				var $tooltip = $("<div>", {"class":'vote-tooltip'}).append($("<div>", {"class":'senator-info'}).text(item[0].name + " (" + item[0].party + "), " + item[0].state)).append($("<div>", {"class":'senator-desc'}).text(desc))
				if (item[0].party == "D") {
					$donate.append($("<span>", {"class":'vote blue'}).append($tooltip))
				} else {
					$donate.prepend($("<span>", {"class":'vote red'}).append($tooltip))
				}
			}
			var $remain = $("<span>", {"class":'results'})
			for (var i = 0; i < nominee_table[key].for_remain.length; i++){
				var item = nominee_table[key].for_remain[i]
				if (item.party == "D") {
					$remain.append($("<span>", {"class":'vote blue'}))
				} else {
					$remain.prepend($("<span>", {"class":'vote red'}))
				}
			}
			if (nominee_table[key].for_donate.length > 0)
				$votes.append($donate)
			$votes.append($remain)
			$nominee.append($voting.append($votesfor).append($votes)).append($("<div>", {"class":'nominee-divider'}))

			var $votesagainst = $("<div>", {"class":'vote-indicator against'}).append($("<span>", {"class":'glyphicon glyphicon-remove'}))
			var $voting = $("<div>", {"class":'voting'})
			var $votes = $("<div>", {"class":'nominee-votes'})
			var $donate = $("<span>", {"class":'results donate'})
			for (var i = 0; i < nominee_table[key].against_donate.length; i++){
				var item = nominee_table[key].against_donate[i]
				var desc = ""
				switch (item[1]){
					case 2:
					desc = nominee_table[key].name + " donated to this senator's campaign or state politial party.";
					break;
					case 3:
					desc = nominee_table[key].name + " donated to a PAC that then donated to this senator within 6 months of the donation.";
					break;
					case 4:
					desc = nominee_table[key].name + " donated to this senator's campaign or state politial party, and also to to a PAC that donated to this senator within 6 months.";
					break;
				}
				var $tooltip = $("<div>", {"class":'vote-tooltip'}).append($("<div>", {"class":'senator-info'}).text(item[0].name + " (" + item[0].party + "), " + item[0].state)).append($("<div>", {"class":'senator-desc'}).text(desc))
				if (item[0].party == "D") {
					$donate.append($("<span>", {"class":'vote blue'}).append($tooltip))
				} else {
					$donate.prepend($("<span>", {"class":'vote red'}).append($tooltip))
				}
			}
			var $remain = $("<span>", {"class":'results'})
			for (var i = 0; i < nominee_table[key].against_remain.length; i++){
				var item = nominee_table[key].against_remain[i]
				if (item.party == "D") {
					$remain.append($("<span>", {"class":'vote blue'}))
				} else {
					$remain.prepend($("<span>", {"class":'vote red'}))
				}
			}
			if (nominee_table[key].against_donate.length > 0)
				$votes.append($donate)
			$votes.append($remain)
			$nominee.append($voting.append($votesagainst).append($votes))
			$('#' + id.toLowerCase()).append($nominee)
		}

		$('.vote-tooltip').mouseenter(function (e) {
			e.stopPropagation()
		})

		var current = null
		var timer = null
		$('.results.donate .vote').hover(function (e) {
			$item = $(this).find($('.vote-tooltip'))
			if ($item == current)
				console.log('clear')
			clearTimeout(timer)
			$item.css('z-index', 1000).css('opacity', 1).offset({top: $(this).offset().top - 200, left: $(this).offset().left - 80})
		},
		function (e) {
			$item = $(this).find($('.vote-tooltip'))
			current = $item
			$item.css('opacity', 0)
			timer = setTimeout(function () {
				current.css('z-index', -5)
			}, 500)
		})
		$('.nav :first').addClass('active')
		$('.tab-pane').first().addClass('in active')
	}


});