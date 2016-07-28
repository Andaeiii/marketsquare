// JavaScript Document

var distributionChart;
var testChart;


var randomScalingFactor = function(){ return Math.round(Math.random()*100)};


function mkCandidateDistribution(){
	
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]
		}
	
	//get graphic contetxt elemet of canvas(wit id cdistribution..... 
	var ctx = document.getElementById("cdistributn").getContext("2d");
	distributionChart = new Chart(ctx).Line(lineChartData);
}


function mkTestScores(){
	
	var pieData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Fails(34%)"
				},
				{
					value: 80,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Successful(20%)"
				},
				{
					value: 120,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Average(40%)"
				}

			];

	//get graphic contetxt elemet of canvas(wit id cdistribution..... 
	var ctx = document.getElementById("ctest").getContext("2d");
	testChart = new Chart(ctx).Pie(pieData);
}

$(document).ready(function(){
	//all charts responsive... 
	Chart.defaults.global.responsive = true;
	mkCandidateDistribution();
	mkTestScores();
	
});
