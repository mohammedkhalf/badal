// function test(){
//     console.log("service");
// }
// test()
// const staticCacheName = 'site-static-v5';
// const assets = [
//   "https://badal.sahla-ad.com/",
//   "https://badal.sahla-ad.com/themes/badal/css/style.css",
//   "https://badal.sahla-ad.com/themes/badal/js/app.js",
//   "https://badal.sahla-ad.com/storage/badel-logo-03.png",
//   "https://badal.sahla-ad.com/fallback.html"
// ];
// // install service worker
// self.addEventListener('install', evt => {
//     evt.waitUntil(
//       caches.open(staticCacheName).then((cache) => {
//           console.log("caching");
//         cache.addAll(assets);
//       })
//     );
//   });

// // active service worker
// self.addEventListener('activate', evt => {
//     evt.waitUntil(
//       caches.keys().then(keys => {
//         return Promise.all(keys
//           .filter(key => key !== staticCacheName)
//           .map(key => caches.delete(key))
//         );
//       })
//     );
//   });

// // fetch event
// self.addEventListener('fetch', evt => {
//     console.log('fetch');
//     evt.respondWith(
//       caches.match(evt.request).then(cacheRes => {
//         return cacheRes || fetch(evt.request).then(fetchRes => {
//           return caches.open(staticCacheName).then(cache => {
//             cache.put(evt.request.url, fetchRes.clone());
//             return fetchRes;
//           })
//         });
//       }).catch(() => {
//           if(evt.request.url.indexOf('.html') > -1)
//           return caches.match('https://badal.sahla-ad.com/fallback.html');
//       })
//     );
//   });

