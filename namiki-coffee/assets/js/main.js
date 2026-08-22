// ==========================================================================
// main.js
// 全ページ共通JavaScript
// ==========================================================================

document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.querySelector('.m_hamburger');
  const nav = document.querySelector('.l_header-nav');
  const body = document.body;

  if (!hamburger || !nav) return;

  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('is-active');
    nav.classList.toggle('is-active');
    body.classList.toggle('is-active');
  });

  const navLinks = nav.querySelectorAll('a');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      hamburger.classList.remove('is-active');
      nav.classList.remove('is-active');
      body.classList.remove('is-active');
    });
  });
});

/**
 * MVスライダー
 */
function initMvSlider() {
  const list = document.querySelector('.js_slider-list');
  if (!list) return;

  const items = Array.from(list.children);
  const itemCount = items.length;
  if (itemCount <= 1) return;

  const intervalMs = 5000;
  let currentIndex = 0;
  let timerId = null;

  items.forEach((item, index) => {
    if (index === 0) {
      item.classList.add('is-active');
    } else {
      item.classList.remove('is-active');
    }
  });

  function goToSlide(nextIndex) {
    items[currentIndex].classList.remove('is-active');
    items[nextIndex].classList.add('is-active');

    currentIndex = nextIndex;
  }

  function nextSlide() {
    const nextIndex = (currentIndex + 1) % itemCount;
    goToSlide(nextIndex);
  }

  function startAutoPlay() {
    if (timerId !== null) return;
    timerId = window.setInterval(nextSlide, intervalMs);
  }

  function stopAutoPlay() {
    if (timerId !== null) {
      window.clearInterval(timerId);
      timerId = null;
    }
  }

  startAutoPlay();

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) {
      stopAutoPlay();
    } else {
      startAutoPlay();
    }
  });
}

document.addEventListener('DOMContentLoaded', initMvSlider);

document.addEventListener('DOMContentLoaded', () => {
  const tabButtons = document.querySelectorAll('.js_tab-btn');
  const tabPanels = document.querySelectorAll('.js_tab-panel');

  if (!tabButtons.length || !tabPanels.length) return;

  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetName = button.getAttribute('data-target');

      tabButtons.forEach(btn => {
        btn.classList.remove('is-active');
        btn.setAttribute('aria-selected', 'false');
      });
      button.classList.add('is-active');
      button.setAttribute('aria-selected', 'true');

      tabPanels.forEach(panel => {
        const panelName = panel.getAttribute('data-panel');
        if (panelName === targetName) {
          panel.classList.remove('is-hidden');
        } else {
          panel.classList.add('is-hidden');
        }
      });
    });
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const track = document.querySelector('.about-slider-track');
  if (!track) return;

  const items = track.innerHTML;
  track.innerHTML += items;

  let scrollSpeed = 0.5;
  let isPaused = false;
  let animationId;

  function infiniteScroll() {
    if (!isPaused) {
      track.scrollLeft += scrollSpeed;

      if (track.scrollLeft >= track.scrollWidth / 2) {
        track.scrollLeft = 0;
      }
    }
    animationId = requestAnimationFrame(infiniteScroll);
  }

  // アニメーション開始
  animationId = requestAnimationFrame(infiniteScroll);

  // マウスホバーしたときに一時停止させたい場合
  track.addEventListener('mouseenter', () => {
    isPaused = true;
  });
  track.addEventListener('mouseleave', () => {
    isPaused = false;
  });
});

/**
 * ヘッダーのスクロール連動アニメーション
 * ・ヒーロー(m_slider)を過ぎたら固定表示に切り替え
 * ・下スクロールで隠す、上スクロールで再表示
 * ・ヒーローが無いページ(下層ページ)では最初から固定扱い
 */
document.addEventListener('DOMContentLoaded', () => {
  const header = document.querySelector('.l_header');
  const nav = document.querySelector('.l_header-nav');
  if (!header) return;

  const hero = document.querySelector('.m_slider');
  const heroHeight = hero ? hero.offsetHeight : 0;

  let lastScrollY = window.scrollY;
  let ticking = false;

  function updateHeader() {
    const currentScrollY = window.scrollY;

    // ヒーローを超えたら固定表示に切り替え
    if (currentScrollY > heroHeight - 72) {
      header.classList.add('is-fixed');
    } else {
      header.classList.remove('is-fixed');
    }

    // メニューが開いている時は隠さない
    const menuOpen = nav && nav.classList.contains('is-active');

    if (!menuOpen && currentScrollY > lastScrollY && currentScrollY > 150) {
      header.classList.add('is-hidden'); // 下スクロール → 隠す
    } else {
      header.classList.remove('is-hidden'); // 上スクロール → 表示
    }

    lastScrollY = currentScrollY;
    ticking = false;
  }

  // 初期表示時にも一度実行しておく（リロード時の状態ズレを防ぐ）
  updateHeader();

  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(updateHeader);
      ticking = true;
    }
  });
});