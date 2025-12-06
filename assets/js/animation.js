const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate");
        observer.unobserve(entry.target); // animasi hanya sekali
      }
    });
  },
  {
    threshold: 0.2, // hanya muncul 20% sudah dihitung terlihat
  }
);

document.querySelectorAll(".flip-item").forEach((item) => {
  observer.observe(item);
});
