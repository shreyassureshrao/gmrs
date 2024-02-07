$(document).ready(function(){
    $(".icon-bg").click(function () {
        $(".btn").toggleClass("active");
        $(".icon-bg").toggleClass("active");
        $(".container").toggleClass("active");
        $(".box-upload").toggleClass("active");
        $(".box-caption").toggleClass("active");
        $(".box-tags").toggleClass("active");
        $(".private").toggleClass("active");
        $(".set-time-limit").toggleClass("active");
        $(".button").toggleClass("active");
    });

    $(".button").click(function () {
        $(".button-overlay").toggleClass("active");
    });

    $(".iconmelon").click(function () {
        $(".box-upload-ing").toggleClass("active");
        $(".iconmelon-loaded").toggleClass("active");
    });

    $(".private").click(function () {
        $(".private-overlay").addClass("active");
        $(".private-overlay-wave").addClass("active");
    });
	
	$('input[name="committeeFilter"]').on('change', function() {
	$('select[name="committeeList"]').attr('disabled', this.value != "singlecommittee")
	});
	
	$('input[name="dateFilter"]').on('change', function() {
	$('select[name="yearList"]').attr('disabled', this.value != "monthly")
	$('select[name="monthList"]').attr('disabled', this.value != "monthly")
	$('#fromdatepicker').attr('disabled', this.value != "datePeriod")
	$('#todatepicker').attr('disabled', this.value != "datePeriod")	
	});
});