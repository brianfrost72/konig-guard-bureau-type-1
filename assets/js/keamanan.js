document.addEventListener("DOMContentLoaded", () => {
  const tabContainer = document.querySelector(".tab-content"); // sesuai HTML
  if (!tabContainer || typeof servicesData === "undefined") return;

  const keysKeamanan = [
    "security",
    "bodyguard",
    "pengamanan_event",
    "detektif_swasta",
  ];

  keysKeamanan.forEach((key) => {
    const service = servicesData.find((s) => s.key === key);
    if (!service) return;

    const tabPane = tabContainer.querySelector(`.tab-pane[data-key="${key}"]`);
    if (!tabPane) return;

    const titleEl = tabPane.querySelector(".process__title");
    const descEl = tabPane.querySelector(".process__desc");
    const imgEl = tabPane.querySelector(".service-image"); // class bukan id

    if (titleEl) titleEl.textContent = service.title;
    if (descEl) descEl.textContent = service.desc;
    if (imgEl) {
      imgEl.src = service.imgService;
      imgEl.alt = service.title;
    }
  });
});
