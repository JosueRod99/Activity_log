/// dribbble
let dribbbleLink = 'https://dribbble.com/ryanparag';

const dribbble = () => {
  let styleRules = '<style> #dribbble { position: fixed; bottom: 15px; right: 15px;width: 100px;z-index: 100; } #dribbble a, #dribbble svg { display: block; } #dribbble svg{ width: 100%;fill: rgba(0, 0, 0, 0.25);} #dribbble svg:hover circle, #dribbble svg:focus circle{ fill: #ea4c89; } #dribbble svg:hover path, #dribbble svg:focus path{ fill: #C32361; }</style>';
  let styleContainer = document.createElement('div');
  styleContainer.innerHTML = styleRules;
  document.head.appendChild(styleContainer);
 
};
dribbble();
console.clear();

feather.replace();

const root = document.documentElement;

document.getElementById('miniButton').addEventListener('click', () => {
  const sidebar = document.querySelector('.sidebar');
  sidebar.classList.toggle('sidebar--mini');
  if (sidebar.classList.contains('sidebar--mini')) {
    sidebar.querySelector('.profile__name').style.display = 'none';
    sidebar.querySelector('.theme-btn__label').style.display = 'none';
    sidebar.querySelectorAll('.menu__title').forEach(item => {
      item.style.display = 'none';
    });
  } else {
    setTimeout(() => {
      sidebar.querySelector('.profile__name').style.display = 'block';
      sidebar.querySelector('.theme-btn__label').style.display = 'block';
      sidebar.querySelectorAll('.menu__title').forEach(item => {
        item.style.display = 'block';
      });
    }, 200);
  }
});

const themeChange = (bodyBg, bg, color, subtle, border) => {
  root.style.setProperty('--bg', `var(--${bodyBg})`);
  root.style.setProperty('--component-bg', `var(--${bg})`);
  root.style.setProperty('--component-color', `var(--${color})`);
  root.style.setProperty('--component-subtle', `var(--${subtle})`);
  root.style.setProperty('--component-border', `var(--${border})`);
};

document.getElementById('themeButton').addEventListener('click', function () {
  const sidebar = document.querySelector('.sidebar');
  if (sidebar.classList.contains('sidebar--light')) {
    sidebar.classList.remove('sidebar--light');
    themeChange('faded', 'black', 'white', 'lightest-gray', 'gray');
    setTimeout(() => {
      this.innerHTML = `<i data-feather="moon" class="theme-btn__icon"></i><span class="theme-btn__label">Night mode</span>`;
      feather.replace();
    }, 200);
  } else {
    sidebar.classList.add('sidebar--light');
    themeChange('black', 'white', 'black', 'gray', 'lightest-gray');
    setTimeout(() => {
      this.innerHTML = `<i data-feather="sun" class="theme-btn__icon"></i><span class="theme-btn__label">Day mode</span>`;
      feather.replace();
    }, 200);
  }
});