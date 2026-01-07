(() => {
  const header = document.getElementById("siteHeader");
  if (!header) return;

  const setScrolled = () => {
    if (window.scrollY > 30) header.classList.add("is-scrolled");
    else header.classList.remove("is-scrolled");
  };

  setScrolled();
  window.addEventListener("scroll", setScrolled, { passive: true });

  // Mobile menu toggle (keep)
  const btn = document.querySelector(".navtoggle");
  const menu = document.getElementById("mobileMenu");
  if (!btn || !menu) return;

  btn.addEventListener("click", () => {
    const isOpen = btn.getAttribute("aria-expanded") === "true";
    btn.setAttribute("aria-expanded", String(!isOpen));
    menu.hidden = isOpen;
  });
})();
