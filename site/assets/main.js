(() => {
  // ---------------------------
  // Sticky header scroll state
  // ---------------------------
  const header = document.getElementById("siteHeader");
  if (header) {
    const setScrolled = () => {
      if (window.scrollY > 30) header.classList.add("is-scrolled");
      else header.classList.remove("is-scrolled");
    };

    setScrolled();
    window.addEventListener("scroll", setScrolled, { passive: true });
  }

  // ---------------------------
  // Mobile menu toggle
  // ---------------------------
  const navBtn = document.querySelector(".navtoggle");
  const navMenu = document.getElementById("mobileMenu");

  if (navBtn && navMenu) {
    const closeMenu = () => {
      navBtn.setAttribute("aria-expanded", "false");
      navMenu.setAttribute("hidden", "");
    };

    navBtn.addEventListener("click", () => {
      const isOpen = navBtn.getAttribute("aria-expanded") === "true";
      navBtn.setAttribute("aria-expanded", String(!isOpen));
      if (isOpen) navMenu.setAttribute("hidden", "");
      else navMenu.removeAttribute("hidden");
    });

    // Optional polish: close on resize to desktop
    window.addEventListener("resize", () => {
      if (window.innerWidth > 860) closeMenu();
    });

    // Optional polish: close when a menu link is clicked
    navMenu.addEventListener("click", (e) => {
      if (e.target && e.target.tagName === "A") closeMenu();
    });
  }

  // ---------------------------
  // Contact modal
  // ---------------------------
  const modal = document.getElementById("contactModal");
  if (modal) {
    const openers = document.querySelectorAll('[data-modal-open="contact"]');
    const closers = modal.querySelectorAll("[data-modal-close]");

    const open = () => {
      modal.classList.add("is-open");
      modal.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";
    };

    const close = () => {
      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");
      document.body.style.overflow = "";
    };

    openers.forEach((el) => el.addEventListener("click", open));
    closers.forEach((el) => el.addEventListener("click", close));

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") close();
    });
  }
})();
