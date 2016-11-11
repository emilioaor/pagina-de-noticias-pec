

function IrArriba(){

	$("body").animate({
		"scrollTop" : "0"
	},500);

}



function NavBarChange(){

	var t = $(window).scrollTop();

	if(t>300){

		//movilizar nav

		$("#navbar").attr("class","navMov");

	}else{

		//Nav estatica

		$("#navbar").attr("class","navEst");

	}

}