/*
    'use strict';


    // Declare app level module which depends on filters, and services
    angular.module('myApp', [
      'ngRoute',
      'myApp.filters',
      'myApp.services',
      'myApp.directives',
      'myApp.controllers'
    ]).
    config(['$routeProvider', function($routeProvider) {
      $routeProvider.when('/view1', {templateUrl: 'partials/partial1.html', controller: 'MyCtrl1'});
      $routeProvider.when('/view2', {templateUrl: 'partials/partial2.html', controller: 'MyCtrl2'});
      $routeProvider.otherwise({redirectTo: '/view1'});
    }]);



var map = new ol.Map({
    target: 'map',
    layers: [
      new ol.layer.Tile({
        source: new ol.source.MapQuest({layer: 'sat'})
      })
    ],
    view: new ol.View({
      center: ol.proj.transform([37.41, 8.82], 'EPSG:4326', 'EPSG:3857'),
      zoom: 4
    })
  });

*/

 var projection = ol.proj.get('EPSG:3857');

var raster = new ol.layer.Tile({

    /*
     * 
    source: new ol.source.BingMaps({
    imagerySet: 'Aerial',
    key: 'Ak-dzM4wZjSqTlzveKz5u0d4IQ4bRzVI309GxmkgSVr1ewS6iPSrOvOKhA-CJlm3'
     
    **/
    source: new ol.source.BingMaps({        
        imagerySet: 'Road',
        key: 'Ak-dzM4wZjSqTlzveKz5u0d4IQ4bRzVI309GxmkgSVr1ewS6iPSrOvOKhA-CJlm3'
    })
});
 
var vector = new ol.layer.Vector({
  source: new ol.source.KML({
    projection: projection,
    url: '../resources/kml/LescommunesdeRhamna.kml'
  })
});

var osm = new ol.layer.Tile({
    source: new ol.source.OSM()
});

//var gmap = new google.maps.Map(document.getElementById('gmap'));

var divMap = document.getElementById('map');
var map = new ol.Map({
  layers: [raster, vector],
  target: 'map',
  view: new ol.View({

    center: [ -886058.03 , 3796168.57],
    projection: projection,

    zoom: 9
  })
});
