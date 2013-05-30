
var app=angular.module('app', ['ui.bootstrap','ngSanitize']);


app.config( function($locationProvider) {
	$locationProvider.html5Mode(true);
})


app.filter('FShow', function() {
	return function(input) {
		if (input!=undefined) {
			var out = [];
			for (var i = 0; i < input.length;i++)
				if (input[i].show===true) out.push(input[i]);
			return out;
		}
	};
});

app.filter('FNotShow', function() {
	return function(input) {
		if (input!=undefined) {
			var out = [];
			for (var i = 0; i < input.length;i++)
				if (input[i].show===false) out.push(input[i]);
			return out;
		}
	};
});

app.filter('FSelected', function() {
	return function(input) {
		if (input!=undefined) {
			var out = [];
			for (var i = 0; i < input.length;i++)
				if ((input[i].show===true)&&(input[i].quantite>0)) out.push(input[i]);
			return out;
		}
	};
});

app.filter('FArticles', function() {
	return function(input) {
		if (input!=undefined) {
			var out = [];
			for (var i = 0; i < input.length; i++)
				for (var j = 0; j < input[i].articles.length; j++)
						out.push(input[i].articles[j]);
			return out;
		}
	};
});



app.filter('customDate', function($filter){

    var nomMois=['janvier','février','mars','avril','mai','juin'];

    return function(dateToFormat){

    	var d=  new Date(dateToFormat.replace(/-/gi,'/') );
    	var now=new Date();
    	if ($filter('date')(now, 'dd/MM/yyyy')==$filter('date')(d, 'dd/MM/yyyy'))
     		return 'aujourd\'hui ' + $filter('date')(d, 'HH:mm');
     	else {
     		var mois= nomMois[$filter('date')(d,'MM')-1];
     		if ($filter('date')(now, 'yyyy')==$filter('date')(d, 'yyyy'))
     			return  $filter('date')(d, 'dd ') + mois + $filter('date')(d,' HH:mm');
     		else
     			return  $filter('date')(d, 'dd ') + mois + $filter('date')(d,' yyyy HH:mm');
     	}

    }

});



