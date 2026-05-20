document.addEventListener("DOMContentLoaded", () => {
  const tabContainer = document.querySelector(".tab-content");
  if (!tabContainer || typeof servicesData === "undefined") return;

  // Hanya jasa operasional
  const keysOperasional = [
    "cleaning_service",
    "pramubakti",
    "pengacara",
    "driver",
    "pengelola_parkir",
  ];

  keysOperasional.forEach((key) => {
    const service = servicesData.find((s) => s.key === key);
    if (!service) return;

    const tabPane = tabContainer.querySelector(`.tab-pane[data-key="${key}"]`);
    if (!tabPane) return;

    const titleEl = tabPane.querySelector(".process__title");
    const descEl = tabPane.querySelector(".process__desc");
    const imgEl = tabPane.querySelector(".service-image");

    if (titleEl) titleEl.textContent = service.title;
    if (descEl) descEl.textContent = service.desc;
    if (imgEl) {
      imgEl.src = service.imgService;
      imgEl.alt = service.title;
    }
  });
});
