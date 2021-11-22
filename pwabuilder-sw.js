//This is the service worker with the Advanced caching

importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.0.0/workbox-sw.js');


const CACHE = "pwabuilder-adv-cache";

//Ini memastikan bahwa setiap versi baru dari sw akan mengambil alih halaman dan segera diaktifkan.(tdk akan tumpang tindih)
self.addEventListener("message", (event) => {
  if (event.data && event.data.type === "SKIP_WAITING") {
    self.skipWaiting();
  }
});

const networkFirstPaths = [
  /* Add an array of regex of paths that should go network first , root folder*/
  //digunakan untuk menggambarkan pola di mana banyak URL sebenarnya dapat mengidentifikasi satu halaman di situs web
  //regex path for css
  /{(\w+)}(?:\()?([^{[\)]+)(?:\))?(?:{\/\1})?/
];


//network falling back to cache
networkFirstPaths.forEach((path) => {
  workbox.routing.registerRoute(
    new RegExp(path),
    //check network first then to cache
    new workbox.strategies.NetworkFirst({
      cacheName: CACHE
    })
  );
});


//Cache Falling Back to Network
workbox.routing.registerRoute(
  new RegExp('/*'),
  //check cache first then to network
  new workbox.strategies.CacheFirst({
    cacheName: CACHE
    
  })
);

