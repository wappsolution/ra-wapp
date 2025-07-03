<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>AR Conector</title>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
    <style>
      body {
        margin: 0px;
        overflow: hidden;
      }
    </style>
  </head>
  <body>
    <a-scene embedded arjs='sourceType: webcam; debugUIEnabled: false;'>
      <!-- AIDEV-TODO: Substituir ralfJones.mp4 e pattern-hiro.png por assets reais -->
      <a-assets>
        <video id="video" src="<?= base_url('public/assets/ar/ralfJones.mp4') ?>" loop="true" autoplay="true"></video>
      </a-assets>

      <a-marker preset="hiro" type="pattern" url="<?= base_url('public/assets/ar/pattern-hiro.png') ?>">
        <a-video src="#video" width="1.6" height="0.9" position="0 0.5 0"></a-video>
      </a-marker>

      <a-entity camera></a-entity>
    </a-scene>
  </body>
</html>