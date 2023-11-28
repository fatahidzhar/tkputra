// Nama cache untuk menyimpan file yang di-cache
const CACHE_NAME = "my-pwa-cache-v1";

const fileMapping = {
    "resources/css/app.css": {
        file: "assets/app-f5667342.css",
        isEntry: true,
        src: "resources/css/app.css",
    },
    "resources/js/app.js": {
        file: "assets/app-8acc8fc3.js",
        isEntry: true,
        src: "resources/js/app.js",
    },
};

// Daftar file yang akan di-cache
const urlsToCache = [
    "/",
    fileMapping["resources/css/app.css"].file,
    fileMapping["resources/js/app.js"].file,
    "/images/logo.png",
];

// Install service worker dan simpan file-file yang di-cache
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(urlsToCache);
        })
    );
});

// Menggunakan strategi cache-first untuk mengambil file dari cache jika tersedia
// Jika tidak ada di cache, ambil dari jaringan dan simpan di cache
self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            if (response) {
                return response;
            }

            return fetch(event.request)
                .then((response) => {
                    if (
                        !response ||
                        response.status !== 200 ||
                        response.type !== "basic"
                    ) {
                        return response;
                    }

                    const responseToCache = response.clone();

                    caches.open(CACHE_NAME).then((cache) => {
                        cache.put(event.request, responseToCache);
                    });

                    return response;
                })
                .catch(() => {
                    // Jika gagal mengambil dari jaringan, coba mencari gambar dari cache
                    if (
                        event.request.url.endsWith(".png") ||
                        event.request.url.endsWith(".jpg")
                    ) {
                        return caches.match("/images/logo.png");
                    }

                    return new Response("Not found", {
                        status: 404,
                        statusText: "Not found",
                        headers: new Headers({
                            "Content-Type": "text/plain",
                        }),
                    });
                });
        })
    );
});

// self.addEventListener("fetch", (event) => {
//     event.respondWith(
//         caches.match(event.request).then((response) => {
//             if (response) {
//                 return response;
//             }

//             return fetch(event.request).then((response) => {
//                 if (
//                     !response ||
//                     response.status !== 200 ||
//                     response.type !== "basic"
//                 ) {
//                     return response;
//                 }

//                 const responseToCache = response.clone();

//                 caches.open(CACHE_NAME).then((cache) => {
//                     cache.put(event.request, responseToCache);
//                 });

//                 return response;
//             });
//         })
//     );
// });

// Menghapus cache lama saat service worker diaktivasi ulang
self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames
                    .filter((cacheName) => {
                        return cacheName !== CACHE_NAME;
                    })
                    .map((cacheName) => {
                        return caches.delete(cacheName);
                    })
            );
        })
    );
});
