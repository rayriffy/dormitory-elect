importScripts('js/sw-toolbox.js');
importScripts('js/sw-toolbox-cache.js');

toolbox.precache([
  '/offline.html',
  '/manifest.json',
  '/css/materialize.min.css',
  '/js/materialize.js',
  '/js/jquery.min.js',
  'https://fonts.googleapis.com/css?family=Kanit:400,400i,700,700i|Material+Icons&amp;subset=thai',
  '/img/ico.png',
  '/img/bg.jpg',
  '/img/loader.gif',
  '/js/init.js'
])

toolbox.options.debug = false;
toolbox.options.cache.name = "dmis-v1";

self.addEventListener('install', function install() {
  self.skipWaiting();
})
self.addEventListener('activate', function activate(e) {
  e.waitUntil(self.clients.claim())
})

toolbox.router.get("(.*)", function get(req, vals, opts) {
  return toolbox.networkFirst(req, vals, opts)
    .catch(function(error) {
      console.log({req, vals, opts, error})
      if (req.method === "GET" && req.headers.get("accept").includes("text/html")) {
        return toolbox.cacheOnly(new Request("offline.html"), vals, opts)
      }
      throw error
    })
})

toolbox.router.get("css/*.css", toolbox.cacheFirst)
toolbox.router.get("js/*.js", toolbox.cacheFirst)
toolbox.router.get("img/*.jpg", toolbox.cacheFirst)
toolbox.router.get("img/*.png", toolbox.cacheFirst)
toolbox.router.get("img/*.gif", toolbox.cacheFirst)
toolbox.router.get("img/*.svg", toolbox.fastest)
toolbox.router.get("manifest.json", toolbox.networkFirst)
