import { DotLottie } from '@lottiefiles/dotlottie-web';

const loader = document.getElementById("page-loader"),
CargaAnim = document.querySelector('#pageLoad')
// Inicializar la animación Lottie
// const animationLoad = new DotLottie({
//     autoplay: true,
//     loop: true,
//     canvas: CargaAnim,
//     src: "https://lottie.host/16d17efc-47f1-4ecd-a52e-1c638044e891/Id7GM0IlEM.lottie", // or .json file
// })

document.addEventListener("DOMContentLoaded", () => {


    // Ocultar loader cuando la página termine de cargar
     window.addEventListener("load", () => {
        setTimeout(() => {
            loader.style.opacity = "0";
            setTimeout(() => loader.style.display = "none", 500);
        }, 400);
    });

    // Mostrar loader al dar clic en enlaces internos
    // document.querySelectorAll("a[href]").forEach(link => {
    //     const url = new URL(link.href, window.location.origin);
    //     if (url.origin === window.location.origin && url.pathname !== window.location.pathname) {
    //         link.addEventListener("click", () => {
    //             loader.style.display = "block";
    //             loader.style.opacity = "1";
    //         });
    //     }
    // });

    // Mostrar loader al enviar formularios
    // document.querySelectorAll("form").forEach(form => {
    //     form.addEventListener("submit", () => {
    //         loader.style.display = "flex";
    //         loader.style.opacity = "1";
    //     });
    // });
});










// document.addEventListener("DOMContentLoaded", () => {
//     const loader = document.getElementById("page-loader");

//     // Ocultar cuando la página ya está lista
//     window.addEventListener("load", () => {
//         console.log("cargando")
//             // showModal(modalCarga)

//         setTimeout(() => { // pequeño delay para que se note
//             loader.style.opacity = "0";
//             show
//             setTimeout(() => loader.style.display = "none", 300);
//             // setTimeout(() => hideModal(modalCarga), 300);
//         }, 300);
//     });

//     // Mostrar cuando el usuario hace clic en un enlace interno
//     document.querySelectorAll("a[href]").forEach(link => {
//         const url = new URL(link.href, window.location.origin);
//         if (url.origin === window.location.origin && url.pathname !== window.location.pathname) {
//             link.addEventListener("click", e => {
//                 loader.style.display = "flex";
//                 loader.style.opacity = "1";
//             });
//         }
//     });

//     // Mostrar cuando se envía un formulario
//     // document.querySelectorAll("form").forEach(form => {
//     //     form.addEventListener("submit", () => {
//     //         loader.style.display = "flex";
//     //         loader.style.opacity = "1";
//     //     });
//     // });
// });
