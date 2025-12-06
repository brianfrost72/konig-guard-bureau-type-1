// ===================== DATA LAYANAN =====================
const servicesData = [
  {
    title: "Jasa Security",
    tagline:
      "Keamanan kuat, perlindungan menyeluruh.<br>Kami hadir sebagai garda utama untuk keamanan aset Anda.",
    desc: `Keamanan solid adalah landasan utama dalam kelangsungan operasional sebuah perusahaan. Konig Guard Bureau menyediakan layanan Jasa Security dengan standar profesional tinggi untuk memastikan setiap area kerja, fasilitas, dan aset perusahaan terlindungi dari berbagai potensi ancaman.

Petugas keamanan kami telah melalui pelatihan intensif dalam prosedur pengamanan modern, analisa risiko, hingga komunikasi taktis. Mereka tidak hanya menjaga lingkungan tetap aman, namun juga menghadirkan ketenangan bagi seluruh pihak di dalamnya. Dengan kehadiran satpam Konig Guard Bureau yang sigap, disiplin, dan berintegritas, produktivitas perusahaan akan meningkat karena seluruh kegiatan dapat berlangsung tanpa gangguan.`,
    imgIndex: "assets/images/jasa/security/security.jpg",
    imgService: "assets/images/jasa/security/security-detail.jpg",
    link: "#",
    showOnIndex: true,
    showOnService: true,
  },
  {
    title: "Jasa Bodyguard",
    tagline:
      "Perlindungan personal kelas profesional.<br>Selalu siap mengawal langkah penting Anda.",
    desc: `Perlindungan personal merupakan kebutuhan penting bagi eksekutif perusahaan, tokoh publik, atau tamu kehormatan. Konig Guard Bureau menghadirkan layanan Jasa Bodyguard yang mengutamakan keselamatan, kenyamanan, dan kepercayaan penuh bagi setiap klien, tanpa membatasi aktivitas mereka dalam pekerjaan maupun kehidupan sehari-hari.

Bodyguard kami memiliki keahlian dalam bela diri, pengamatan ancaman, protokol keselamatan, serta pengaturan rute pengawalan. Setiap pengawalan direncanakan melalui analisa risiko yang matang dan metode pengamanan yang selalu disesuaikan dengan kondisi di lapangan.`,
    imgIndex: "assets/images/jasa/security/bodyguard.jpg",
    imgService: "assets/images/jasa/security/bodyguard-detail.jpg",
    link: "#",
    showOnIndex: true,
    showOnService: true,
  },
  {
    title: "Jasa Pengamanan Event",
    tagline:
      "Acara aman, pengalaman maksimal.<br>Keamanan menyeluruh untuk setiap momen penting.",
    desc: `Kesuksesan suatu acara bukan hanya soal kemeriahan, tetapi juga kepastian keamanan. Konig Guard Bureau menyediakan layanan pengamanan event untuk konser, festival, seminar, hingga kegiatan perusahaan yang melibatkan banyak pengunjung.

Kami melakukan pemetaan area, mengatur arus keluar-masuk, serta mengantisipasi berbagai potensi gangguan. Dengan koordinasi tim yang kuat dan penggunaan prosedur pengamanan profesional, setiap acara dapat berjalan tertib, aman, dan memberikan pengalaman terbaik bagi seluruh peserta.`,
    imgIndex: "assets/images/jasa/security/eventsecurity.jpg",
    imgService: "assets/images/jasa/security/eventsecurity-detail.jpg",
    link: "#",
    showOnIndex: true,
    showOnService: true,
  },
  {
    title: "Jasa Cleaning Service",
    tagline:
      "Bersih rapi, citra perusahaan meningkat.<br>Lingkungan sehat membentuk kinerja yang kuat.",
    desc: `Lingkungan kerja yang bersih dan higienis adalah bagian penting dalam menjaga kesehatan karyawan serta profesionalitas perusahaan. Konig Guard Bureau menyediakan tenaga kebersihan terlatih dengan standar operasional tinggi.

Petugas kami memahami teknik kebersihan modern, penggunaan peralatan yang tepat, dan pemilihan bahan pembersih yang aman. Kami siap melayani berbagai area mulai dari perkantoran, fasilitas industri, hingga area publik.`,
    imgIndex: "assets/images/jasa/facility/cleaningservice.jpg",
    imgService: "assets/images/jasa/facility/cleaningservice-detail.jpg",
    link: "#",
    showOnIndex: true,
    showOnService: true,
  },
  {
    title: "Jasa Pramubakti",
    tagline:
      "Pelayanan ramah, operasional lebih mudah.<br>Mendukung administrasi dengan kualitas terbaik.",
    desc: `Pelayanan administrasi yang baik mencerminkan kualitas perusahaan. Konig Guard Bureau menyediakan tenaga pramubakti profesional yang siap mendukung berbagai tugas perkantoran seperti resepsionis, pengarsipan, pelayanan tamu, hingga dukungan operasional harian.

Dengan sikap ramah, cekatan, dan teliti, pramubakti kami membantu meningkatkan kualitas pelayanan perusahaan sehingga setiap proses kerja menjadi lebih teratur.`,
    imgIndex: "assets/images/jasa/facility/pramubakti.jpg",
    imgService: "assets/images/jasa/facility/pramubakti-detail.jpg",
    link: "#",
    showOnIndex: true,
    showOnService: true,
  },
  {
    title: "Jasa Pengacara",
    tagline:
      "Legal kuat, bisnis lebih nyaman.<br>Keputusan tepat dengan analisa hukum terpercaya.",
    desc: `Dalam dunia bisnis, kepastian hukum menjadi perlindungan terpenting bagi perusahaan. Layanan Jasa Pengacara Konig Guard Bureau menyediakan dukungan hukum profesional untuk membantu penyelesaian permasalahan hukum, pendampingan litigasi, hingga konsultasi regulasi perusahaan.

Dengan pengalaman di berbagai bidang hukum, tim kami mampu memberikan analisa serta solusi tepat demi melindungi kepentingan perusahaan.`,
    imgIndex: "assets/images/jasa/facility/pengacara.jpg",
    imgService: "assets/images/jasa/facility/pengacara-detail.jpg",
    link: "#",
    showOnIndex: true,
    showOnService: true,
  },
  {
    title: "Jasa Driver",
    tagline:
      "Perjalanan aman, efisiensi maksimal.<br>Profesional dalam berkendara dan pelayanan.",
    desc: `Driver profesional memiliki peran penting dalam kelancaran mobilitas perusahaan. Layanan Jasa Driver Konig Guard Bureau menyediakan pengemudi terlatih yang memahami etika berkendara, keselamatan jalan, serta tata krama pelayanan.`,
    imgIndex: "assets/images/jasa/facility/driver.jpg",
    imgService: "assets/images/jasa/facility/driver-detail.jpg",
    link: "#",
    showOnIndex: true,
    showOnService: true,
  },
  {
    title: "Pengelolaan Parkir",
    tagline:
      "Parkir tertata, pelayanan meningkat.<br>Kelancaran akses meningkatkan citra perusahaan.",
    desc: `Area parkir yang tertata rapi merupakan bagian dari pelayanan kualitas perusahaan terhadap karyawan maupun tamu.`,
    imgIndex: "assets/images/jasa/facility/parkir.jpg",
    imgService: "assets/images/jasa/facility/parkir-detail.jpg",
    link: "#",
    showOnIndex: true,
    showOnService: true,
  },
];

// ===================== FUNGSI RENDER =====================
function renderServices(filterKey, isIndexPage) {
  const container = document.getElementById("services-container");
  if (!container) return;

  container.innerHTML = "";

  const filteredData = servicesData.filter((item) => item[filterKey]);

  filteredData.forEach((service) => {
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
}

// ===================== LOGIC HALAMAN =====================
const page = window.location.pathname;

if (page.endsWith("index.html") || page === "/" || page === "") {
  renderServices("showOnIndex", true);
} else if (page.endsWith("layanan.html") || page.includes("layanan")) {
  renderServices("showOnService", false);
}
