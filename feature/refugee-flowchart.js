var Node = function (question, yes, no) {
	this.question = question;
	this.yes = yes;
	this.no = no;
	if (yes === undefined) {
		this.yes = null;
	}
	if (no === undefined) {
		this.no = null;
	}
};

var start = new Node("Are you from Iran, Syria, Yemen, Somalia, Sudan, or Libya?")
var refugee = new Node("Are you a refugee?")
refugee.yes = new Node("Do you already have refugee status?", new Node("You are not barred from the U.S."),
	new Node("Are you Syrian?", new Node("You are now banned temporarily—but not indefinitely. All refugee resettlement will stop for 120 days."),
		new Node("All refugee resettlement will stop for 120 days. After that, it will be difficult for you to get to the U.S. with a 50,000 refugee cap—less than half of the number pledged under the Obama administration.")))

refugee.no = new Node("Do you have dual citizenship, a valid visa, or a green card?",
	new Node("You are not barred from getting a visa to the U.S., starting on March 16th."), new Node("You are barred from getting a visa to the U.S. for 90 days, starting on March 16th."))
start.yes = refugee
var iraq = new Node("Are you from Iraq?",
	new Node("You would have been banned under the last order, but starting on March 16th you're not. This means that Iraqis granted repatriation in exchange for service to the American military will be able enter the U.S."),
	new Node("You are not barred from getting a visa to the U.S."))
start.no = iraq

$(document).ready(function () {
	var current = start
	function update() {
		$('.flowchart-ques').text(current.question)
		if (current.yes == null) {
			$('.flowchart-yes').css('display', 'none')
			$('.flowchart-no').css('display', 'none')
			$('.flowchart-restart').css('display', 'unset')
		} else {
			$('.flowchart-yes').css('display', 'inline-block')
			$('.flowchart-no').css('display', 'inline-block')
			$('.flowchart-restart').css('display', 'none')
		}
	}
	$('.flowchart-ques').text(current.question)
	$('.flowchart-restart').css('display', 'none')
	$('.flowchart-yes').click(function () {
		current = current.yes
		update()
	})
	$('.flowchart-no').click(function () {
		current = current.no
		update()
	})
	$('.flowchart-restart').click(function () {
		current = start
		update()
	})
});

