 function ListeCtrl($scope, $http, $window, $filter) {

	$scope.OpenListe=mescourses.slug;


	$scope.query='';
 	$scope.currentList={'name':'chargement...', 'slug': 'mes courses'};
 	$scope.listemode='edit';
 	$scope.lightbox=null;
 	$scope.status=null;

 	$scope.organize=false;
 	$scope.savemenu=false;
 	$scope.loadmenu=false;




 	var getKeyWith=function(array,attr,targetValue) {
 		var res=false;
 		angular.forEach(array, function(value, key) {
 			if (res===false)
 				if (value[attr]===targetValue) res=key;
 		});
 		return res;
 	}


 	window.onpopstate = function(event) {
	  $scope.load(event.state);
	};


	$scope.toCompressed= function() {
		var out = [];

		angular.forEach($scope.liste, function(value, key){
			var rayon={n:value.name, c:value.color, p:value.position, a:[]}
 	 		angular.forEach(value.articles, function(article, key2){
 	 				var obj={n:article.name};
 	 				if (article.quantite>0) obj.v=article.quantite;
 	 				if (article.info!=null) obj.i=article.info;
 	 				if (article.show) rayon.a.push( obj );
 			});

 			if (value.show) out.push( rayon );
 		});
 		return out;
	}


	$scope.fromCompressed=function(content) {
		var liste=[];

 	 	angular.forEach(content, function(value, key){
 	 		if (value.c==undefined) value.c=0;
 	 		if (value.p==undefined) value.p=0;
 	 		var rayon={name:value.n, show:true, color:value.c, position:value.p, checked: false, articles:[]}

 	 		angular.forEach(value.a, function(article, key2){
 	 			if (article.v==undefined) article.v=0;
 	 			if (article.i==undefined) article.i=null;
 	 			rayon.articles.push( {name:article.n, show:true, quantite:article.v, info:article.i, checked:false} );
 	 		});
 	 		liste.push(rayon);
 	 	});

	 	return liste;
	}

 	$scope.selectArticle= function(article,rayon,$event) {

 		if ($scope.listemode=='edit') {
			if (article.quantite==0)
				$scope.addArticle(article,rayon,1,$event);
		}
		else {

			article.checked=!article.checked;
			$scope.checkRayon(rayon);
			}
		$event.stopPropagation();

	}


	$scope.checkRayon= function(rayon,force) {
		if ($filter('FSelected')(rayon.articles).length == $filter('FChecked')(rayon.articles).length) rayon.checked=true;
				else rayon.checked=false;
	}


	$scope.addArticle= function(article,rayon,inc,$event) {
		article.show=true;
		article.checked=false;
		if (inc==null) inc=+1;
		article.quantite=article.quantite+inc;
		if (article.quantite<0) article.quantite=0;
		$scope.checkRayon(rayon);
		$event.stopPropagation();
	}


	$scope.addInfoArticle= function(article,$event) {
		article.info='';
		article.checked=false;
		$event.stopPropagation();
	}


	$scope.removeArticle= function(article,$event) {
		article.show=false;
		$event.stopPropagation();
	};

	$scope.clearArticle= function(article,$event) {
		article.quantite=0;
		article.info=null;
		article.checked=false;
		$event.stopPropagation();
	};


	$scope.checkInfo= function(article) {
		if (article.info=='') article.info=null;
	}


	$scope.newArticle = function(rayon) {
		if (this.articleFilter) {
			aKey=getKeyWith(rayon.articles, 'name', this.articleFilter);
			if (false===aKey) 	rayon.articles.push( {name:this.articleFilter, show:true, quantite:1, info:null, checked:false} );
				else $scope.selectArticle(rayon.articles[aKey]);
			this.articleFilter = '';
		}
	};




	$scope.changeColor = function(rayon,color) {
		rayon.color=color;
	};



	$scope.reOrderRayon = function(nameArray) {
		angular.forEach($scope.liste, function(value, key){
			$scope.liste[key].position= nameArray.indexOf(value.name);
		});
		$scope.$digest();
	};





	$scope.emptyRayonArticles = function(rayon) {
		angular.forEach(rayon.articles, function(article, key){
	 	 	article.info=null;
	 	 	article.quantite=0;
 		});
	};

	$scope.removeRayonArticles = function(rayon) {
		$scope.emptyRayonArticles(rayon);
		angular.forEach(rayon.articles, function(article, key){
	 	 	article.show=false;
 		});
	};


	$scope.removeRayon = function(rayon) {
		$scope.removeRayonArticles(rayon);
		rayon.show= false;
	};

	$scope.addRayon = function(rayon) {
		rayon.show= true;
	};



	$scope.newRayon = function() {
		if (this.rayonFilter) {
			rKey=getKeyWith($scope.liste, 'name', this.rayonFilter);
			if (false===rKey) $scope.liste.push( {name:this.rayonFilter, position:9999, color:0, checked:false, show:true, articles:[]} );
				else $scope.addRayon($scope.liste[rKey]);
			this.rayonFilter = '';
		}
	};





	$scope.save = function() {
		$scope.status='enregistrement en cours ...';
		$http.put('./api/liste/',{liste:$scope.toCompressed(), name:this.listname})
		.success(function(data) {
			$scope.currentList=data;
			$window.history.pushState(null, null, "./"+$scope.currentList.slug);
			$scope.loaduserlistes();
			$scope.savemenu=false;
			$scope.status=null;
			$scope.savemenu=false;
		})
		.error(function(data) { $scope.lightbox={title:"erreur",content:data.error};$scope.status=null; });

	};


	$scope.load = function(filename) {
		$scope.status='chargement en cours ...';
		if (null==filename) filename='default';
		$http.get('./api/liste/'+filename+'.json').success(function(data) {
			$scope.currentList=data.liste;
			$window.history.pushState(null, null, "./"+$scope.currentList.slug);// bug
			$scope.page='liste';
			$scope.liste=$scope.fromCompressed(data.content);
	 	 	$scope.combineData();
	 	 	$scope.status=null;
	 	 	$scope.loadmenu=false;
		})
		.error(function(data) { $scope.lightbox={title:"erreur",content:data.error};$scope.status=null; });
	return false;
	};


	$scope.loaduserlistes= function() {
		$http.get('./api/liste/').success(function(data) {
			$scope.userlistes=data;
		});
	};

	$scope.loadfullliste= function() {
		$http.get('./api/liste/full.json').success(function(data) {
			$scope.full=data.content;
			$scope.combineData();
		});
	};





	$scope.combineData= function() {
		if ( ($scope.full==undefined) || ($scope.liste==undefined) ) return false;
		else {
			angular.forEach($scope.full, function(rayon){

				rKey=getKeyWith($scope.liste, 'name', rayon.n);
				if (false===rKey) {
					r= {name:rayon.n, show:false, color:0, articles:[]};
					$scope.liste.push(r);
					rKey=$scope.liste.length-1;
				}


				angular.forEach(rayon.a, function(article){
					aKey=getKeyWith($scope.liste[rKey].articles, 'name', article.n);
					if (false===aKey) {
						a= {name:article.n, show:false, quantite:0, info:null};
						$scope.liste[rKey].articles.push(a);
					}
				});

			});

		}

	}



	$scope.showdata= function() {
		$scope.lightbox={title:"data",content: JSON.stringify($scope.toCompressed()) };
	}



	// INIT

	$scope.loaduserlistes();
	$scope.loadfullliste();
	$scope.load( $scope.OpenListe );



	$(function() {

		$( ".sortable" ).sortable({
			axis: "y",
			distance: 5,
			update: function( event, ui ) {
			 	$scope.reOrderRayon( $(this).sortable( "toArray", {attribute:'data-name'} ) );
			}
	 	});



	});

};


