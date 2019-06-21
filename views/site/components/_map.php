<?php

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\layers\BicyclingLayer;

?>

<section class="section--bg section--map">
    <div class="section--content uk-padding-large">
        <div class="uk-padding-large uk-width-1-1">
            <h6>NAŠE SÍDLA</h6>
            <h1>
                Kde nás <span>najdete</span>
            </h1>
        </div>
        <div class="uk-margin-large-bottom">
            <?php
            $coord = new LatLng(['lat' => 49.0047742, 'lng' => 14.4901458]);
            $map = new Map([
                'center' => $coord,
                'zoom' => 12,
            ]);
            $map->width = '100%';

            // lets use the directions renderer
            $home = new LatLng(['lat' => 48.994754, 'lng' => 14.472819]);
            $borek = new LatLng(['lat' => 49.022974, 'lng' => 14.500284]);
            // Lets add a marker now
            $marker = new Marker([
                'position' => $home,
                'icon' => '/img/marker.png',
                'title' => 'My Home Town',
            ]);
            $marker2 = new Marker([
                'position' => $borek,
                'icon' => '/img/marker.png',
                'title' => 'My Home Town',
            ]);

            // Provide a shared InfoWindow to the marker
            $marker->attachInfoWindow(
                new InfoWindow([
                    'content' => '<h3>Prodejna</h3><p>text</p>'
                ])
            );
            $marker2->attachInfoWindow(
                new InfoWindow([
                    'content' => '<h3>Prodejna</h3><p>text</p>'
                ])
            );

            // Add marker to the map
            $map->addOverlay($marker);
            $map->addOverlay($marker2);

            // Lets show the BicyclingLayer :)
            $bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

            // Append its resulting script
            $map->appendScript($bikeLayer->getJs());

            // Display the map -finally :)
            echo $map->display();
            ?>
        </div>
    </div>
</section>