<!doctype html>
<html lang="fr" ng-app="app" ng-controller="ListeCtrl">
<head>
    <title>{{currentList.name}} - {{currentList.slug}}</title>
    <script src="http://code.angularjs.org/1.1.2/angular.min.js"></script>
    <script src="http://code.angularjs.org/1.1.2/angular-sanitize.js"></script>
    <script>var mescourses={slug:"<?php

    echo (isset($_GET['l']) ? $_GET['l'] : 'default');

        ?>"};</script>

    <script src="https://raw.github.com/angular-ui/bootstrap/gh-pages/ui-bootstrap-0.3.0.min.js"></script>
    <!--script src="https://raw.github.com/angular-ui/bootstrap/gh-pages/ui-bootstrap-tpls-0.3.0.min.js"></script-->

    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script src="./js/app.js"></script>
    <script src="./js/controllers.js"></script>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">
    <link type='text/css' rel='stylesheet' href='./toggle-switch.css' />
    <link type='text/css' rel='stylesheet' href='./style.css' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<body class='{{listemode}}'>

    <div id='main-navbar' class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="navbar-inner">



            <ul class="nav nav-left">
                <li>

                    <label class="checkbox toggle well" onclick="">
                        <input id="view" type="checkbox" ng-model="listemode" ng-true-value="edit" ng-false-value="check" />
                        <p>
                            <span>Edition</span>
                            <span>Course</span>
                        </p>

                        <a class="btn btn-primary slide-button"></a>
                    </label>

                </li>
            </ul>

            <div class="nav-center" >
                <div class="progress" ng-show='listemode=="check"'>
                    <div class="bar" style="width: {{ppc=(liste|FArticles|FChecked).length/(liste|FArticles|FSelected).length*100}}%;"></div>
                </div>
                <a  class="title" href='./{{currentList.slug}}'>{{currentList.name}}</a>
            </div>




            <div class="nav-right">
                <ul class="nav icons-menu not-in-check">
                    <li><a href="" ng-click="organize=true" title='organiser les rayons'><i class="icon-magic"></i><span>organiser</span></a></li>
                    <li><a href="" ng-click="loadmenu=true" title='ouvrir'><i class="icon-file-alt"></i><span>ouvrir</span></a></li>
                    <li><a href="" ng-click="savemenu=true" title='enregistrer'><i class="icon-save"></i><span>enregistrer</span></a></li>
                </ul>
                <span class='pct' ng-show='listemode=="check"'>{{ppc|number:0}} %</span>
            </div>

        </div>
    </div>


    <!--  LISTE -->
    <div  class="container liste">

        <!--h2>
            <a href='./{{currentList.slug}}'>{{currentList.name}}</a>
        </h2-->

        <div class='row'>
            <div class='span9'>
                <div class='alert alert-info' ng-show='query.length'> <i class="icon-filter"></i>
                    Filtre actif: <strong>"{{query}}"</strong>
                    {{(rayonShown|FArticles|FShow|filter:query).length}} résultat(s)
                    <button class="btn btn-small pull-right" ng-click="query=''">vider</button>
                </div>
            </div>

            <form class="navbar-search span3">
                <input ng-model="query"  type="text" class="search-query " placeholder="Filtrer"/>
            </form>

        </div>


        <ul class='sortable'>

            <li class='rayon qtt{{(rayon.articles|FSelected).length}}' ng-repeat="rayon in rayonShown" class='span12'  ng-class="{checked:rayon.checked}" data-name='{{rayon.name}}'>

                <div ng-show='filteredArticles.length||query.length==0'>

                    <h3 class='c{{rayon.color}}'>{{rayon.name}}
                        <span ng-show='listemode=="check"' class='check-count pull-right'>{{(rayon.articles|FChecked).length}} / {{(rayon.articles|FSelected).length}}</span>
                    </h3>
                    <span class='checkmark' ng-show='rayon.checked&&listemode=="check"'>✓</span>
                    <ul class='option-btn not-in-check'>
                        <li class="dropdown pull-right">
                            <a class="dropdown-toggle" title='options'> <i class="icon-cog  icon-white"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li ng-class="{disabled: (rayon.articles | FSelected).length==0}">
                                    <a href='' ng-click="emptyRayonArticles(rayon)">vider ce rayon</a>
                                </li>
                                <li ng-class="{disabled: (rayon.articles | FShow).length==0}">
                                    <a href=''  ng-click="removeRayonArticles(rayon)">supprimer tout les articles</a>
                                </li>
                                <li>
                                    <a href='' ng-click="removeRayon(rayon)">retirer ce rayon</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="progress"  ng-show='listemode=="check"'>
                        <div class="bar bar-success" style="width: {{(rayon.articles|FChecked).length/(rayon.articles|FSelected).length*100}}%;"></div>
                    </div>

                    <ul class="row articles-row">

                        <li ng-repeat="article in filteredArticles = (rayon.articles | FShow |  filter:query  | orderBy:'name')" class='article qtt{{article.quantite}}' ng-class="{checked:article.checked}"  ng-click="selectArticle(article,rayon,$event)">
                            <a href='' class='checkmark'>☐<span>✓</span></a>
                            <a href='' class="article-name" title='+1'>{{article.name}}<span class='qtt'> x{{article.quantite}}</span></a>
                            <span class='article-btn'  ng-show="article.quantite>0">
                                <a href='' class='less btn btn-mini' ng-click="addArticle(article,rayon,-1,$event)" title='-1'>-</a>
                                <span> {{article.quantite}} </span>
                                <a href='' class='more btn btn-mini' ng-click="addArticle(article,rayon,1,$event)" title='+1'>+</a>
                                <a href='' class='info btn btn-mini' ng-show="article.info==null"  ng-click="addInfoArticle(article,$event)" title='ajouter un commentaire'>i</a>
                                <a href='' class='clear btn btn-mini'  ng-click="clearArticle(article,$event)" title='vider'>x</a>
                            </span>
                            <a href='' class='delete btn btn-mini btn-danger'  ng-show="article.quantite==0"  ng-click="removeArticle(article,$event)" title='supprimer'>x</a>
                            <textarea ng-show="article.info!=null" ng-model="article.info" ng-click='$event.stopPropagation()'  ng-change="checkInfo(article)"></textarea>
                        </li>

                        <p ng-show="!filteredArticles.length" class='span3'>aucun article</p>

                    </ul>

                    <form ng-submit="newArticle(rayon)" class='not-in-check'>
                        <input type="text" ng-model="articleFilter" name="article" placeholder="ajouter un article" />
                    </form>

                    <ul ng-show="articleFilter.length">
                        <li ng-repeat="article in rayon.articles | FNotShow | filter:articleFilter | orderBy:'name'" style='display:inline-block'>
                            <a href='' ng-click="selectArticle(article)">{{article.name}}</a>
                            &nbsp;
                        </li>
                    </ul>

                </div>
            </li>
        </ul>

        <div ng-show="!(liste|FArticles|FSelected).length&&listemode=='check'" class='alert alert-warning'>aucun article selectionné</div>

        <div class='span12 not-in-check' ng-show='query.length==0'>

            <h1>Ajouter un rayon</h1>
            <form ng-submit="newRayon()">
                <input type="text" ng-model="rayonFilter" name="rayon"  placeholder="nouveau rayon"/>
            </form>

            <ul ng-show="rayonFilter.length">
                <li ng-repeat="rayon in liste | FNotShow | filter:rayonFilter | orderBy:'name'" style='display:inline-block'>
                    <a href='' ng-click="addRayon(rayon)">{{rayon.name}}</a>
                    &nbsp;
                </li>
            </ul>
        </div>

    </div>
    <!-- end liste -->

    <div ng-show="loadmenu" class="modal fade in">
        <div class="modal-header">
            <h4>Ouvrir la liste</h4>
        </div>
        <div class="modal-body">
            <ul>
                <li ng-class="{current:currentList.slug=='default'}">
                    <a href='./default' ng-click="load('default')" onClick='return false'>liste par defaut</a>
                </li>
                <li   ng-class="{current:currentList.slug=='full'}">
                    <a href='./full' ng-click="load('full')" onClick='return false'>liste complète</a>
                </li>

                <li>&nbsp;</li>

                <li ng-repeat="liste in userlistes| orderBy:'created_at':true"  ng-class='{current:currentList.slug==liste.slug}'>
                    <a href='./{{liste.slug}}' ng-click="load(liste.slug)" onClick='return false'>
                        <span class='date'>{{liste.created_at|customDate}}</span>
                        - {{liste.name}} -
                        <span class='slug'>{{liste.slug}}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <button class="btn" ng-click="loadmenu=false">fermer</button>
        </div>
    </div>
    <div ng-show="loadmenu" class="modal-backdrop fade in"  ng-click="loadmenu=false"></div>
    <!-- end container open -->

    <div ng-show="savemenu" class="modal fade in">
        <div class="modal-header">
            <h4>Enregister la liste</h4>
        </div>
        <div class="modal-body">
            <form ng-submit="save()">
                <input type="text" ng-model="listname" name="listname" placeholder="titre" />
                <input type="submit" value="enregister" />
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" ng-click="savemenu=false">fermer</button>
        </div>
    </div>
    <div ng-show="savemenu" class="modal-backdrop fade in"  ng-click="savemenu=false"></div>
    <!-- end container save -->

    <div ng-show="organize" class="modal fade in">
        <div class="modal-header">
            <h4>Organisez les rayons</h4>
        </div>
        <div class="modal-body organize">
            <ul class='sortable'>
                <li ng-repeat="rayon in rayonShown = (liste | FShow | orderBy:'position')" class='c{{rayon.color}} color-picker' data-name='{{rayon.name}}'>
                    {{rayon.name}}
                    <a href='' class='pull-right c{{c}}' ng-repeat="c in [9,8,7,6,5,4,3,2,1,0]" ng-class="{selected: c==rayon.color}" ng-click="changeColor(rayon,c)"></a>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <button class="btn" ng-click="organize=false">fermer</button>
        </div>
    </div>
    <div ng-show="organize" class="modal-backdrop fade in"  ng-click="organize=false"></div>

    <div ng-show="lightbox!=null" class="modal fade in">
        <div class="modal-header">
            <h4>{{lightbox.title}}</h4>
        </div>
        <div class="modal-body" ng-bind-html-unsafe="lightbox.content"></div>
        <div class="modal-footer">
            <button class="btn" ng-click="lightbox=null">fermer</button>
        </div>
    </div>
    <div ng-show="lightbox!=null" class="modal-backdrop fade in"  ng-click="lightbox=null"></div>

</body>
</html>
