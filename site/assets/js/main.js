/**
 * Global interaction logic for the site.
 *
 * This file handles:
 *  - Sticky header behavior based on scroll position
 *  - Mobile navigation menu toggle and accessibility
 *  - Contact modal open/close interactions
**/

(() => {
  // =================================================
  // Sticky Header Scroll Behavior
  // Adds or removes a class on the header based on 
  // scroll position to change background styling.
  // ================================================= 

  const header = document.getElementById("siteHeader");
  if (header) {
    // Toggle "is-scrolled" class when user scrolls past 30px
    const setScrolled = () => {
      if (window.scrollY > 30) header.classList.add("is-scrolled");
      else header.classList.remove("is-scrolled");
    };

    // Run on load and on scroll
    setScrolled();

    // Listen for scroll events
    window.addEventListener("scroll", setScrolled, { passive: true });
  }


  // =================================================
  // Mobile Navigation Menu Toggle
  // Controls hamburger menu open/close state
  // =================================================
  const navBtn = document.querySelector(".navtoggle");
  const navMenu = document.getElementById("mobileMenu");

  if (navBtn && navMenu) {
    // Function to close the menu
    const closeMenu = () => {
      navBtn.setAttribute("aria-expanded", "false");
      navMenu.setAttribute("hidden", "");
    };

    // Toggle menu on button click
    navBtn.addEventListener("click", () => {
      const isOpen = navBtn.getAttribute("aria-expanded") === "true";
      navBtn.setAttribute("aria-expanded", String(!isOpen));

      if (isOpen) navMenu.setAttribute("hidden", "");
      else navMenu.removeAttribute("hidden");
    });

    // Close menu if window is resized above mobile breakpoint
    window.addEventListener("resize", () => {
      if (window.innerWidth > 860) closeMenu();
    });

    // Close menu when a link inside it is clicked
    navMenu.addEventListener("click", (e) => {
      if (e.target && e.target.tagName === "A") closeMenu();
    });
  }


  // =================================================
  // Contact Modal Logic
  // Handles opening and closing the contact modal
  // =================================================
  const modal = document.getElementById("contactModal");
  if (modal) {
    // Elements that open and close the modal
    const openers = document.querySelectorAll('[data-modal-open="contact"]');
    const closers = modal.querySelectorAll("[data-modal-close]");

    // Function to open the modal
    const open = () => {
      modal.classList.add("is-open");
      modal.setAttribute("aria-hidden", "false");

      document.body.style.overflow = "hidden"; // Prevent background scrolling
    };

    // Function to close the modal
    const close = () => {
      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");

      document.body.style.overflow = ""; // Restore background scrolling
    };

    // Bind open and close events
    openers.forEach((el) => el.addEventListener("click", open));
    closers.forEach((el) => el.addEventListener("click", close));

    // Close modal on Escape key press
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") close();
    });
  }


  // =================================================
  // Contact Form — Lead Save Before Formspree Submit
  // Intercepts every contact form submit, awaits a
  // POST to /save-lead (writes to leads.json for the
  // admin dashboard), then lets the form proceed to
  // Formspree for email delivery.
  // Capped at 2 s so a slow server never blocks UX.
  // =================================================
  document.querySelectorAll("form[data-save]").forEach((form) => {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const saveUrl = form.dataset.save;
      if (saveUrl) {
        const timeout = new Promise((res) => setTimeout(res, 2000));
        const save    = fetch(saveUrl, {
          method: "POST",
          body: new FormData(form),
        }).catch(() => {});
        await Promise.race([save, timeout]);
      }

      form.submit();
    });
  });

})();
