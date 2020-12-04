var CACHE_NAME = 'ikanku';
const assets=[
    './',
    './Assets\dist\img\logoikanku.png',
            './Assets/vendor/fontawesome-free/css/all.min.css',
            './Assets/bower_components/bootstrap/dist/css/bootstrap.min.css',
            './Assets/css/sb-admin-2.min.css',
            './Assets/asset/css/main.css',
            './Assets/dist/css/AdminLTE.min.css',
            './Assets/vendor/fontawesome-free/css/all.min.css',
            './Assets/asset/css/util.css',
            './Assets/dist/css/skins/_all-skins.min.css',
            './Assets/assets/js/jquery-3.4.1.min.js',
            './Assets/bower_components/font-awesome/css/font-awesome.min.css',
            'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
            'site.css'
            
    ];
//instal service worker
self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME).then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(assets);
      })
  );

});
self.addEventListener('activate',function(event){
    console.log('Finally active. Ready to start Serving content!');
});

//cache n return requests
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }

        return fetch(event.request).then(
          function(response) {
            // Check if we received a valid response
            if(!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // IMPORTANT: Clone the response. A response is a stream
            // and because we want the browser to consume the response
            // as well as the cache consuming the response, we need
            // to clone it so we have two streams.
            var responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function(cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          }
        );
      })
    );
});















