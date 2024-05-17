document.addEventListener("DOMContentLoaded", function () {
    const toTopButton = document.getElementById("toTopButton");

    window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) {
            toTopButton.classList.remove("hidden");
        } else {
            toTopButton.classList.add("hidden");
        }
    });

    toTopButton.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
});

var mySwiper = new Swiper(".mySwiper2", {
    slidesPerView: 1,
    spaceBetween: 20,
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        990: {
            slidesPerView: 2,
        },
        // Tambahkan breakpoints sesuai kebutuhan
    },
    autoplay: {
        delay: 3000, // Ubah nilai ini sesuai keinginan (dalam milidetik)
    },
});

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    grid: {
        rows: 1,
      },
    breakpoints: {
        769: {
            slidesPerView: 2,
        },
        1200: {
            slidesPerView: 3,
        },

        // Tambahkan breakpoints sesuai kebutuhan
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 3000, // Ubah nilai ini sesuai keinginan (dalam milidetik)
    },
});

document.addEventListener("DOMContentLoaded", function () {
    const copyButton = document.getElementById("copyButton");
    const copyLink = document.getElementById("copyLink");

    copyLink.addEventListener("click", function (event) {
        event.preventDefault(); // Menghentikan aksi default (scroll ke atas)

        const urlToCopy = window.location.href;

        const tempInput = document.createElement("input");
        tempInput.value = urlToCopy;
        document.body.appendChild(tempInput);

        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        copyButton.style.display = "inline-block";
        setTimeout(function () {
            copyButton.style.display = "none";
        }, 2000);
    });
});


// const notifications = document.querySelector(".notifications"),
//         buttons = document.querySelectorAll(".buttons .btn");

//     const alertDetails = {
//         timer: 5000,
//         danger: {
//             icon: 'fa-circle-xmark',
//             text: 'Peringatan: Ini adalah peringatan berbahaya.',
//         },
//     };

//     const removeAlert = (alert) => {
//         alert.classList.add("hide");
//         if (alert.timeoutId) clearTimeout(alert.timeoutId);
//         setTimeout(() => alert.remove(), 500);
//     };

//     const createAlert = (id) => {
//         const { icon, text } = alertDetails[id];
//         const alert = document.createElement("li");
//         alert.className = `toast ${id}`;
//         alert.innerHTML = `<div class="column">
//                                <i class="fa-solid ${icon}"></i>
//                                <span>${text}</span>
//                            </div>
//                            <i class="fa-solid fa-xmark" onclick="removeAlert(this.parentElement)"></i>`;
//         notifications.appendChild(alert);
//         alert.timeoutId = setTimeout(() => removeAlert(alert), alertDetails.timer);
//     };

//     buttons.forEach(btn => {
//         btn.addEventListener("click", () => createAlert(btn.id));
//     });