ymaps.ready(init);
var placemarks = [
    {
        latitude: 56.46900168645355,
        longitude: 84.9647499562564,
        hintContent: '<div class="map__hint">ROCK GYM</div>',
        balloonContent: [
            '<div class="map__balloon">',
            'Работаем для Вас с 9 до 24 ежедневно',
            '</div>'
        ]
    }
]
geoObjects = [];

function init() {
    var map = new ymaps.Map('map', {
        center: [56.46900168645355, 84.9647499562564],
        zoom: 18,
        controls: ['zoomControl'],
        behaviors: ['drag']
    });

    for (var i = 0; i < placemarks.length; i++) {
        geoObjects[i] = new ymaps.Placemark([placemarks[i].latitude, placemarks[i].longitude],
            {
                hintContent: placemarks[i].hintContent,
                balloonContent: placemarks[i].balloonContent.join('')
            },
            {
                iconLayout: 'default#image',
                iconImageHref: './img/logo-red-black.png',
                iconImageSize: [70, 70],
            });
    }

    var clusterer = new ymaps.Clusterer();
    clusterer.createCluster = function (center, geoObjects) {
        var clusterPlacemark = ymaps.Clusterer.prototype.createCluster.call(this, center, geoObjects);

        clusterPlacemark.properties.set('hintContent', 'Нажмите чтобы увидеть больше');

        return clusterPlacemark;
    };

    map.geoObjects.add(clusterer);
    clusterer.add(geoObjects);
}