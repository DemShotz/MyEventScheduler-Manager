importScripts('/cache-polyfill.js');

self.addEventListener('install', function(e) {
     e.waitUntil(
          caches.open('eventscheduler').then(function(cache) {
               return cache.addAll([
                    'index.php',
                    'scripts/script.js',
                    'header.php',
                    'css/styles.css'
               ]);
          })
     );
});

self.addEventListener('fetch', function(event) {
     event.respondWith(
          fetch(event.request).catch(function() {
               return caches.match(event.request);
          })
     );
});
