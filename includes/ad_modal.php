<?php
// =========================
// KONEKSI DATABASE
// =========================
require_once __DIR__ . '/../koneksi.php';


// =========================
// AMBIL IKLAN RANDOM
// =========================
$adQuery = mysqli_query($conn, "
    SELECT id, ad_title, ad_img, ad_link
    FROM manage_ads
    ORDER BY RAND()
    LIMIT 1
");

$adData = mysqli_fetch_assoc($adQuery);


// =========================
// JIKA ADA IKLAN
// =========================
if ($adData):

    $adTitle = htmlspecialchars($adData['ad_title']);
    // lokasi folder gambar ads
    $adImg = "myapp/dashboard/assets/images/uploads/ads/" . htmlspecialchars($adData['ad_img']);
    $adLink  = htmlspecialchars($adData['ad_link']);

?>

    <style>
        /* =========================
        PROMO MODAL
        ========================= */

        .promo-modal {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 38, 0.88);
            backdrop-filter: blur(5px);

            display: flex;
            align-items: center;
            justify-content: center;

            z-index: 999999;

            opacity: 0;
            visibility: hidden;

            transition: all .35s ease;
        }

        .promo-modal.show {
            opacity: 1;
            visibility: visible;
        }

        .promo-modal-content {
            position: relative;
            width: 70%;
            max-width: 500px;

            animation: promoZoom .35s ease;
        }

        /* gambar */
        .promo-img {
            width: 100%;
            border-radius: 18px;

            border: 4px solid #ceab6f;

            box-shadow:
                0 0 25px rgba(206, 171, 111, .45),
                0 10px 40px rgba(0, 0, 0, .5);

            transition: transform .3s ease;
        }

        .promo-img:hover {
            transform: scale(1.02);
        }

        /* tombol close */
        .promo-close {
            position: absolute;
            top: -18px;
            right: -18px;

            width: 45px;
            height: 45px;

            border-radius: 50%;

            background: #162c52;
            color: #fff;

            font-size: 30px;
            line-height: 1;

            cursor: pointer;

            border: 3px solid #ceab6f;

            transition: all .3s ease;

            z-index: 2;
        }

        .promo-close:hover {
            background: #ceab6f;
            color: #162c52;
            transform: rotate(90deg);
        }

        /* animasi */
        @keyframes promoZoom {
            from {
                transform: scale(.7);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* mobile */
        @media(max-width:768px) {

            .promo-modal-content {
                width: 92%;
            }

            .promo-close {
                width: 38px;
                height: 38px;
                font-size: 24px;

                top: -12px;
                right: -12px;
            }

        }
    </style>

    <!-- =========================
    PROMO MODAL ADS
    ========================= -->
    <div id="promoModal" class="promo-modal">
        <div class="promo-modal-content">

            <!-- tombol close -->
            <button class="promo-close" id="closePromoModal">
                &times;
            </button>

            <!-- gambar iklan -->
            <a href="<?= $adLink; ?>" target="_blank">
                <img
                    src="<?= $adImg; ?>"
                    alt="<?= $adTitle; ?>"
                    class="promo-img">
            </a>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const promoModal = document.getElementById("promoModal");
            const closePromoModal = document.getElementById("closePromoModal");

            // =========================
            // SETTING
            // =========================

            // muncul pertama kali setelah 7 detik
            const SHOW_DELAY = 7000;

            // muncul lagi setelah 1 menit
            const REOPEN_DELAY = 1 * 60 * 1000;


            // =========================
            // FUNCTION SHOW MODAL
            // =========================

            function showModal() {

                promoModal.classList.add("show");
                document.body.style.overflow = "hidden";

            }


            // =========================
            // FUNCTION CLOSE MODAL
            // =========================

            function closeModal() {

                promoModal.classList.remove("show");
                document.body.style.overflow = "auto";

                // =========================
                // MUNCUL LAGI SETELAH 1 MENIT
                // =========================

                setTimeout(() => {

                    showModal();

                }, REOPEN_DELAY);

            }


            // =========================
            // TAMPIL PERTAMA
            // =========================

            setTimeout(() => {

                showModal();

            }, SHOW_DELAY);


            // =========================
            // CLICK CLOSE BUTTON
            // =========================

            closePromoModal.addEventListener("click", function() {

                closeModal();

            });


            // =========================
            // CLICK OUTSIDE MODAL
            // =========================

            promoModal.addEventListener("click", function(e) {

                if (e.target === promoModal) {

                    closeModal();

                }

            });

        });
    </script>

<?php endif; ?>