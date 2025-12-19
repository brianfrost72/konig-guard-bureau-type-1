// ===================== DATA LAYANAN =====================
const servicesData = [
  {
    key: "security",
    title: "Jasa Security",
    tagline:
      "Keamanan kuat, perlindungan menyeluruh.<br>Kami hadir sebagai garda utama untuk keamanan aset Anda.",
    desc: `Keamanan solid adalah landasan utama dalam kelangsungan operasional sebuah perusahaan. Konig Guard Bureau menyediakan layanan Jasa Security dengan standar profesional tinggi untuk memastikan setiap area kerja, fasilitas, dan aset perusahaan terlindungi dari berbagai potensi ancaman.

Petugas keamanan kami telah melalui pelatihan intensif dalam prosedur pengamanan modern, analisa risiko, hingga komunikasi taktis. Mereka tidak hanya menjaga lingkungan tetap aman, namun juga menghadirkan ketenangan bagi seluruh pihak di dalamnya. Dengan kehadiran satpam Konig Guard Bureau yang sigap, disiplin, dan berintegritas, produktivitas perusahaan akan meningkat karena seluruh kegiatan dapat berlangsung tanpa gangguan.`,
    imgIndex: "assets/images/jasa/security/security.jpg",
    imgService: "assets/images/jasa/security/security.jpg",
    link: "jasa_keamanan.html#jasa_security",
    showOnIndex: true,
    showOnService: true,
  },
  {
    key: "bodyguard",
    title: "Jasa Bodyguard",
    tagline:
      "Perlindungan personal kelas profesional.<br>Selalu siap mengawal langkah penting Anda.",
    desc: `Perlindungan personal merupakan kebutuhan penting bagi eksekutif perusahaan, tokoh publik, atau tamu kehormatan. Konig Guard Bureau menghadirkan layanan Jasa Bodyguard yang mengutamakan keselamatan, kenyamanan, dan kepercayaan penuh bagi setiap klien, tanpa membatasi aktivitas mereka dalam pekerjaan maupun kehidupan sehari-hari.

Bodyguard kami memiliki keahlian dalam bela diri, pengamatan ancaman, protokol keselamatan, serta pengaturan rute pengawalan. Setiap pengawalan direncanakan melalui analisa risiko yang matang dan metode pengamanan yang selalu disesuaikan dengan kondisi di lapangan.`,
    imgIndex: "assets/images/jasa/security/bodyguard.jpg",
    imgService: "assets/images/jasa/security/bodyguard.jpg",
    link: "jasa_keamanan.html#jasa_bodyguard",
    showOnIndex: true,
    showOnService: true,
  },
  {
    key: "pengamanan_event",
    title: "Jasa Pengamanan Event",
    tagline:
      "Acara aman, pengalaman maksimal.<br>Keamanan menyeluruh untuk setiap momen penting.",
    desc: `Kesuksesan suatu acara bukan hanya soal kemeriahan, tetapi juga kepastian keamanan. Konig Guard Bureau menyediakan layanan pengamanan event untuk konser, festival, seminar, hingga kegiatan perusahaan yang melibatkan banyak pengunjung.

Kami melakukan pemetaan area, mengatur arus keluar-masuk, serta mengantisipasi berbagai potensi gangguan. Dengan koordinasi tim yang kuat dan penggunaan prosedur pengamanan profesional, setiap acara dapat berjalan tertib, aman, dan memberikan pengalaman terbaik bagi seluruh peserta.`,
    imgIndex: "assets/images/jasa/security/eventsecurity.jpg",
    imgService: "assets/images/jasa/security/eventsecurity.jpg",
    link: "jasa_keamanan.html#jasa_pengamanan_event",
    showOnIndex: true,
    showOnService: true,
  },
  {
    key: "detektif_swasta",
    title: "Jasa Detektif Swasta",
    tagline: "Menyelidiki dengan Cermat, Mengungkap Fakta yang Tersembunyi.",
    desc: `Kepercayaan adalah hal yang penting, namun kadang-kadang kita perlu memastikan bahwa apa yang terlihat benar adanya. Konig Guard Bureau menyediakan layanan detektif swasta untuk membantu mengungkap kebenaran yang tersembunyi di balik kasus pribadi, bisnis, atau hukum.

Kami menggunakan metode penyelidikan yang canggih, dibantu oleh tim profesional yang berpengalaman, untuk memberikan laporan yang akurat dan terpercaya. Apakah itu untuk investigasi pasangan, pemeriksaan latar belakang, atau pengumpulan bukti hukum, kami siap membantu Anda menemukan jawaban yang Anda cari, dengan tetap menjaga kerahasiaan dan integritas prosesnya.`,
    imgIndex: "assets/images/jasa/security/eventsecurity.jpg",
    imgService: "assets/images/jasa/security/eventsecurity.jpg",
    link: "jasa_keamanan.html#jasa_detektif_swasta",
    showOnIndex: true,
    showOnService: true,
  },
  {
    key: "cleaning_service",
    title: "Jasa Cleaning Service",
    tagline:
      "Bersih rapi, citra perusahaan meningkat.<br>Lingkungan sehat membentuk kinerja yang kuat.",
    desc: `Lingkungan kerja yang bersih dan higienis adalah bagian penting dalam menjaga kesehatan karyawan serta profesionalitas perusahaan. Konig Guard Bureau menyediakan tenaga kebersihan terlatih dengan standar operasional tinggi.

Petugas kami memahami teknik kebersihan modern, penggunaan peralatan yang tepat, dan pemilihan bahan pembersih yang aman. Kami siap melayani berbagai area mulai dari perkantoran, fasilitas industri, hingga area publik.`,
    imgIndex: "assets/images/jasa/facility/cleaningservice.jpg",
    imgService: "assets/images/jasa/facility/cleaningservice.jpg",
    link: "jasa_operasional.html#jasa_cleaning_service",
    showOnIndex: true,
    showOnService: true,
  },
  {
    key: "pramubakti",
    title: "Jasa Pramubakti",
    tagline:
      "Pelayanan ramah, operasional lebih mudah.<br>Mendukung administrasi dengan kualitas terbaik.",
    desc: `Pelayanan administrasi yang baik mencerminkan kualitas perusahaan. Konig Guard Bureau menyediakan tenaga pramubakti profesional yang siap mendukung berbagai tugas perkantoran seperti resepsionis, pengarsipan, pelayanan tamu, hingga dukungan operasional harian.

Dengan sikap ramah, cekatan, dan teliti, pramubakti kami membantu meningkatkan kualitas pelayanan perusahaan sehingga setiap proses kerja menjadi lebih teratur.`,
    imgIndex: "assets/images/jasa/facility/pramubakti.jpg",
    imgService: "assets/images/jasa/facility/pramubakti.jpg",
    link: "jasa_operasional.html#jasa_pramubakti",
    showOnIndex: true,
    showOnService: true,
  },
  {
    key: "pengacara",
    title: "Jasa Pengacara",
    tagline:
      "Legal kuat, bisnis lebih nyaman.<br>Keputusan tepat dengan analisa hukum terpercaya.",
    desc: `Dalam dunia bisnis, kepastian hukum menjadi perlindungan terpenting bagi perusahaan. Layanan Jasa Pengacara Konig Guard Bureau menyediakan dukungan hukum profesional untuk membantu penyelesaian permasalahan hukum, pendampingan litigasi, hingga konsultasi regulasi perusahaan.

Dengan pengalaman di berbagai bidang hukum, tim kami mampu memberikan analisa serta solusi tepat demi melindungi kepentingan perusahaan.`,
    imgIndex: "assets/images/jasa/facility/pengacara.jpg",
    imgService: "assets/images/jasa/facility/pengacara.jpg",
    link: "jasa_operasional.html#jasa_pengacara",
    showOnIndex: true,
    showOnService: true,
  },
  {
    key: "driver",
    title: "Jasa Driver",
    tagline:
      "Perjalanan aman, efisiensi maksimal.<br>Profesional dalam berkendara dan pelayanan.",
    desc: `Driver profesional memiliki peran penting dalam kelancaran mobilitas perusahaan. Layanan Jasa Driver Konig Guard Bureau menyediakan pengemudi terlatih yang memahami etika berkendara, keselamatan jalan, serta tata krama pelayanan.`,
    imgIndex: "assets/images/jasa/facility/driver.jpg",
    imgService: "assets/images/jasa/facility/driver.jpg",
    link: "jasa_operasional.html#jasa_driver",
    showOnIndex: true,
    showOnService: true,
  },
  {
    key: "pengelola_parkir",
    title: "Pengelolaan Parkir",
    tagline:
      "Parkir tertata, pelayanan meningkat.<br>Kelancaran akses meningkatkan citra perusahaan.",
    desc: `Area parkir yang tertata rapi merupakan bagian dari pelayanan kualitas perusahaan terhadap karyawan maupun tamu.`,
    imgIndex: "assets/images/jasa/facility/parkir.jpg",
    imgService: "assets/images/jasa/facility/parkir.jpg",
    link: "jasa_operasional.html#jasa_parkir",
    showOnIndex: true,
    showOnService: true,
  },
];

// ===================== FUNGSI RENDER =====================
function renderServices(filterKey, isIndexPage) {
  const container = document.getElementById("services-container");
  if (!container) return;

  container.innerHTML = ""; // Clear the container

  const filteredData = servicesData.filter((item) => item[filterKey]);

  // Menampilkan hanya 7 layanan pertama
  const displayedServices = filteredData.slice(0, 7);

  displayedServices.forEach((service) => {
    const item = document.createElement("div");
    item.className = "col-sm-6 col-md-6 col-lg-3 fancybox-item mb-0";

    const imgSrc = isIndexPage ? service.imgIndex : service.imgService;

    const textHTML = isIndexPage
      ? `<p class="fancybox__desc flip-item">${service.tagline}</p>`
      : `<p class="fancybox__desc flip-item">${service.desc}</p>`;

    item.innerHTML = ` 
      <div class="fancybox__img">
        <div class="bg-img">
          <img src="${imgSrc}" alt="${service.title}">
        </div>
      </div>
      <div class="fancybox__body">
        <h4 class="fancybox__title flip-item">${service.title}</h4>
        ${textHTML}
        <a href="${service.link}" class="btn btn__white btn__link">
          <i class="icon-arrow-right icon-filled"></i>
        </a>
      </div>
    `;

    container.appendChild(item);
  });

  // Jika ada lebih dari 7 layanan, tambahkan box "Jasa Lebih Lanjut"
  if (filteredData.length > 7) {
    const moreServicesBox = document.createElement("div");
    moreServicesBox.className =
      "col-12 col-sm-6 col-md-6 col-lg-3 fancybox-item mb-0";

    moreServicesBox.innerHTML = `
      <div class="fancybox__img">
        <div class="bg-img">
          <img src="path/to/your/image.jpg" alt="Jasa Lebih Lanjut">
        </div>
      </div>
      <div class="fancybox__body text-center">
        <h4 class="fancybox__title flip-item">Jasa Lebih Lanjut</h4>
        <p class="fancybox__desc flip-item">Klik di sini untuk melihat layanan lainnya</p>
        <a href="jasa_operasional.html#jasa_parkir" class="btn btn__white btn__link flip-item">
          Lihat Semua Layanan
        </a>
      </div>
    `;

    container.appendChild(moreServicesBox);
  }
}

// ===================== LOGIC HALAMAN =====================
const page = window.location.pathname;

if (page.endsWith("index.html") || page === "/" || page === "") {
  renderServices("showOnIndex", true);
} else if (page.endsWith("layanan.html") || page.includes("layanan")) {
  renderServices("showOnService", false);
}

// JASA LAYANAN KEAMANAN

document.addEventListener("DOMContentLoaded", () => {
  if (typeof servicesData === "undefined") {
    console.error("servicesData tidak ditemukan");
    return;
  }

  servicesData.forEach((service) => {
    const tabPane = document.querySelector(
      `.tab-pane[data-key="${service.key}"]`
    );

    if (!tabPane) {
      console.warn("Tab pane tidak ada:", service.key);
      return;
    }

    // TITLE
    const titleEl = tabPane.querySelector(".process__title");
    if (titleEl) {
      titleEl.innerHTML = service.title;
    }

    // DESC
    const descEl = tabPane.querySelector(".process__desc");
    if (descEl) {
      descEl.innerHTML = service.desc;
    }

    // IMAGE
    const imgEl = tabPane.querySelector("#service-image");

    if (imgEl) {
      imgEl.src = service.imgService;
      imgEl.alt = service.title;
    } else {
      console.warn("IMG tidak ditemukan di:", service.key);
    }
  });
});

// URL JASA KEAMANAN
document.addEventListener("DOMContentLoaded", function () {
  // Saat halaman dibuka pakai hash
  if (window.location.hash) {
    const hash = window.location.hash;
    const tab = document.querySelector('.nav-tabs a[href="' + hash + '"]');
    if (tab) tab.click();
  }

  // Saat tab diklik → update URL
  document.querySelectorAll(".nav-tabs a").forEach((tab) => {
    tab.addEventListener("click", function () {
      const target = this.getAttribute("href");
      history.pushState(null, "", target);
    });
  });
});
